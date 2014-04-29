<?php

if ($object->xpdo) {
	/* @var modX $modx */
	$modx =& $object->xpdo;

	switch ($options[xPDOTransport::PACKAGE_ACTION]) {
		case xPDOTransport::ACTION_INSTALL:
			$modelPath = $modx->getOption('modlastmodified_core_path',null,$modx->getOption('core_path').'components/modlastmodified/').'model/';
			$modx->addPackage('modlastmodified', $modelPath);

			$manager = $modx->getManager();
			$objects = array(
				//'modLastModifiedItem',
			);
			foreach ($objects as $tmp) {
				$manager->createObjectContainer($tmp);
			}
			break;

		case xPDOTransport::ACTION_UPGRADE:
			break;

		case xPDOTransport::ACTION_UNINSTALL:
			break;
	}
}
return true;
