<?php

/**
 * Class modLastModifiedMainController
 */
abstract class modLastModifiedMainController extends modExtraManagerController {
	/** @var modLastModified $modLastModified */
	public $modLastModified;


	/**
	 * @return void
	 */
	public function initialize() {
		$corePath = $this->modx->getOption('modlastmodified_core_path', null, $this->modx->getOption('core_path') . 'components/modlastmodified/');
		require_once $corePath . 'model/modlastmodified/modlastmodified.class.php';

		$this->modLastModified = new modLastModified($this->modx);

		$this->addCss($this->modLastModified->config['cssUrl'] . 'mgr/main.css');
		$this->addJavascript($this->modLastModified->config['jsUrl'] . 'mgr/modlastmodified.js');
		$this->addHtml('<script type="text/javascript">
		Ext.onReady(function() {
			modLastModified.config = ' . $this->modx->toJSON($this->modLastModified->config) . ';
			modLastModified.config.connector_url = "' . $this->modLastModified->config['connectorUrl'] . '";
		});
		</script>');

		parent::initialize();
	}


	/**
	 * @return array
	 */
	public function getLanguageTopics() {
		return array('modlastmodified:default');
	}


	/**
	 * @return bool
	 */
	public function checkPermissions() {
		return true;
	}
}


/**
 * Class IndexManagerController
 */
class IndexManagerController extends modLastModifiedMainController {

	/**
	 * @return string
	 */
	public static function getDefaultController() {
		return 'home';
	}
}