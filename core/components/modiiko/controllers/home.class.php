<?php

/**
 * The home manager controller for modiiko.
 *
 */
class modiikoHomeManagerController extends modiikoMainController
{
    /* @var modiiko $modiiko */
    public $modiiko;


    /**
     * @param array $scriptProperties
     */
    public function process(array $scriptProperties = array())
    {
    }


    /**
     * @return null|string
     */
    public function getPageTitle()
    {
        return $this->modx->lexicon('modiiko');
    }


    /**
     * @return void
     */
    public function loadCustomCssJs()
    {
        $this->addCss($this->modiiko->config['cssUrl'] . 'mgr/main.css');
        $this->addCss($this->modiiko->config['cssUrl'] . 'mgr/bootstrap.buttons.css');
        $this->addJavascript($this->modiiko->config['jsUrl'] . 'mgr/misc/utils.js');
        $this->addJavascript($this->modiiko->config['jsUrl'] . 'mgr/widgets/items.grid.js');
        $this->addJavascript($this->modiiko->config['jsUrl'] . 'mgr/widgets/items.windows.js');
        $this->addJavascript($this->modiiko->config['jsUrl'] . 'mgr/widgets/home.panel.js');
        $this->addJavascript($this->modiiko->config['jsUrl'] . 'mgr/sections/home.js');
        $this->addHtml('<script type="text/javascript">
		Ext.onReady(function() {
			MODx.load({ xtype: "modiiko-page-home"});
		});
		</script>');
    }


    /**
     * @return string
     */
    public function getTemplateFile()
    {
        return $this->modiiko->config['templatesPath'] . 'home.tpl';
    }
}