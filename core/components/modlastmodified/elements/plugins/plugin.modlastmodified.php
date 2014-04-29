<?php

switch ($modx->event->name) {

	case 'OnManagerPageInit':
		$cssFile = MODX_ASSETS_URL.'components/modlastmodified/css/mgr/main.css';
		$modx->regClientCSS($cssFile);
		break;
        
    case 'OnWebPagePrerender':
        $modx->resource->_contextKey = $modx->resource->context_key;
        $cache = $modx->cacheManager->getCacheProvider($modx->getOption('cache_resource_key', null, 'resource'));
        $key = $modx->resource->getCacheKey();
        if ($cache->get($key)) {
            $qtime = isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) ? $_SERVER['HTTP_IF_MODIFIED_SINCE'] : '';
            $modified = date("r", strtotime($modx->resource->get('editedon')));
            if ($qtime == $modified) {
                header ("HTTP/1.1 304 Not Modified ");
                header ("Last-Modified: $modified");
                exit();
            } else {
                header ("Last-Modified: $modified");
                header("Expires: " . date("r", time() + 3600));
            }
        } else {
            header("Expires: " . date("r", time() + 3600));
        }
        break;
}