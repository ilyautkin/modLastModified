<?php
/**
 * Create an Item
 */
class modLastModifiedItemCreateProcessor extends modObjectCreateProcessor {
	public $objectType = 'modLastModifiedItem';
	public $classKey = 'modLastModifiedItem';
	public $languageTopics = array('modlastmodified');
	public $permission = 'new_document';


	/**
	 * @return bool
	 */
	public function beforeSet() {
		$alreadyExists = $this->modx->getObject('modLastModifiedItem', array(
			'name' => $this->getProperty('name'),
		));
		if ($alreadyExists) {
			$this->modx->error->addField('name', $this->modx->lexicon('modlastmodified_item_err_ae'));
		}

		return !$this->hasErrors();
	}

}

return 'modLastModifiedItemCreateProcessor';