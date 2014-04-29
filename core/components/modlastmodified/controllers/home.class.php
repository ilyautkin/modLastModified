<?php
/**
 * The home manager controller for modLastModified.
 *
 */
class modLastModifiedHomeManagerController extends modLastModifiedMainController {
	/* @var modLastModified $modLastModified */
	public $modLastModified;


	/**
	 * @param array $scriptProperties
	 */
	public function process(array $scriptProperties = array()) {
	}


	/**
	 * @return null|string
	 */
	public function getPageTitle() {
		return $this->modx->lexicon('modlastmodified');
	}


	/**
	 * @return void
	 */
	public function loadCustomCssJs() {
		$this->addJavascript($this->modLastModified->config['jsUrl'] . 'mgr/widgets/items.grid.js');
		$this->addJavascript($this->modLastModified->config['jsUrl'] . 'mgr/widgets/home.panel.js');
		$this->addJavascript($this->modLastModified->config['jsUrl'] . 'mgr/sections/home.js');
		$this->addHtml('<script type="text/javascript">
		Ext.onReady(function() {
			MODx.load({ xtype: "modlastmodified-page-home"});
		});
		</script>');
	}


	/**
	 * @return string
	 */
	public function getTemplateFile() {
		return $this->modLastModified->config['templatesPath'] . 'home.tpl';
	}
}