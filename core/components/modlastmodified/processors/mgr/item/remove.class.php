<?php
/**
 * Remove an Item
 */
class modLastModifiedItemRemoveProcessor extends modObjectRemoveProcessor {
	public $checkRemovePermission = true;
	public $objectType = 'modLastModifiedItem';
	public $classKey = 'modLastModifiedItem';
	public $languageTopics = array('modlastmodified');

}

return 'modLastModifiedItemRemoveProcessor';