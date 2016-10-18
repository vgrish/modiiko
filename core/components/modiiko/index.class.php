<?php

/**
 * Class modiikoMainController
 */
abstract class modiikoMainController extends modExtraManagerController
{
    /** @var modiiko $modiiko */
    public $modiiko;


    /**
     * @return void
     */
    public function initialize()
    {
        $corePath = $this->modx->getOption('modiiko_core_path', null,
            $this->modx->getOption('core_path') . 'components/modiiko/');
        require_once $corePath . 'model/modiiko/modiiko.class.php';

        $this->modiiko = new modiiko($this->modx);
        //$this->addCss($this->modiiko->config['cssUrl'] . 'mgr/main.css');
        $this->addJavascript($this->modiiko->config['jsUrl'] . 'mgr/modiiko.js');
        $this->addHtml('
		<script type="text/javascript">
			modiiko.config = ' . $this->modx->toJSON($this->modiiko->config) . ';
			modiiko.config.connector_url = "' . $this->modiiko->config['connectorUrl'] . '";
		</script>
		');

        parent::initialize();
    }


    /**
     * @return array
     */
    public function getLanguageTopics()
    {
        return array('modiiko:default');
    }


    /**
     * @return bool
     */
    public function checkPermissions()
    {
        return true;
    }
}


/**
 * Class IndexManagerController
 */
class IndexManagerController extends modiikoMainController
{

    /**
     * @return string
     */
    public static function getDefaultController()
    {
        return 'home';
    }
}