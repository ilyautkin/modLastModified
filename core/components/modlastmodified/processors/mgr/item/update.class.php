<?php
/**
 * Update an Item
 */
class modLastModifiedItemUpdateProcessor extends modObjectUpdateProcessor {
	public $objectType = 'modLastModifiedItem';
	public $classKey = 'modLastModifiedItem';
	public $languageTopics = array('modlastmodified');
	public $permission = 'edit_document';
}

return 'modLastModifiedItemUpdateProcessor';
