<?php

require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php';
require_once MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php';
require_once MODX_CONNECTORS_PATH . 'index.php';

$corePath = $modx->getOption('modlastmodified_core_path', null, $modx->getOption('core_path') . 'components/modlastmodified/');
require_once $corePath . 'model/modlastmodified/modlastmodified.class.php';
$modx->modlastmodified = new modLastModified($modx);

$modx->lexicon->load('modlastmodified:default');

/* handle request */
$path = $modx->getOption('processorsPath', $modx->modlastmodified->config, $corePath . 'processors/');
$modx->request->handleRequest(array(
	'processors_path' => $path,
	'location' => '',
));