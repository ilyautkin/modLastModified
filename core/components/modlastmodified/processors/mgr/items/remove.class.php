<?php
/**
 * Remove an Items
 */
class modLastModifiedItemsRemoveProcessor extends modProcessor {
    public $checkRemovePermission = true;
	public $objectType = 'modLastModifiedItem';
	public $classKey = 'modLastModifiedItem';
	public $languageTopics = array('modlastmodified');

	public function process() {

        foreach (explode(',',$this->getProperty('items')) as $id) {
            $item = $this->modx->getObject($this->classKey, $id);
            $item->remove();
        }
        
        return $this->success();

	}

}

return 'modLastModifiedItemsRemoveProcessor';