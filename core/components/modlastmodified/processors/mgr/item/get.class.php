<?php
/**
 * Get an Item
 */
class modLastModifiedItemGetProcessor extends modObjectGetProcessor {
	public $objectType = 'modLastModifiedItem';
	public $classKey = 'modLastModifiedItem';
	public $languageTopics = array('modlastmodified:default');
}

return 'modLastModifiedItemGetProcessor';