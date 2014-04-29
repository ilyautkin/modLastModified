<?php

switch ($modx->event->name) {

	case 'OnManagerPageInit':
		$cssFile = MODX_ASSETS_URL.'components/modlastmodified/css/mgr/main.css';
		$modx->regClientCSS($cssFile);
		break;
        
    case 'OnWebPagePrerender':
        $modified = date("r", strtotime($modx->resource->get('editedon')));
        header ("Last-Modified: $modified");
        
        $modx->resource->_contextKey = $modx->resource->context_key;
        $cache = $modx->cacheManager->getCacheProvider($modx->getOption('cache_resource_key', null, 'resource'));
        $key = $modx->resource->getCacheKey();
        if ($cache->get($key)) {
            $qtime = isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) ? $_SERVER['HTTP_IF_MODIFIED_SINCE'] : '';
            if (strtotime($qtime) >= strtotime($modified)) {
                header ("HTTP/1.1 304 Not Modified ");
                header("Expires: " . date("r", time() + 3600));
                exit();
            }
        }
        header("Expires: " . date("r", time() + 3600));
        break;
}