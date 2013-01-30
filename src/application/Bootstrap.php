<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	protected function _initView()
    {
        //ini_set('date.timezone', 'America/Buenos_Aires');
        // initialize smarty view
        $view = new Ext_View_Smarty($this->getOption('smarty'));
        // setup viewRenderer with suffix and view
        $viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper('ViewRenderer');
        $viewRenderer->setViewSuffix('tpl');
        $viewRenderer->setView($view);

        // ensure we have layout bootstraped
        $this->bootstrap('layout');
        // set the tpl suffix to layout also
        $layout = Zend_Layout::getMvcInstance();
        $layout->setViewSuffix('tpl');

        return $view;
    }
    
    protected function _initDoctype()
    {
        $this->bootstrap('view');
        $view = $this->getResource('view');
        $view->doctype('XHTML1_STRICT');
    }

/*
    protected function _initZFDebug()
    {
        if (APPLICATION_ENV !== 'development') {
            return;
        }
        $autoloader = Zend_Loader_Autoloader::getInstance();
        $autoloader->registerNamespace('ZFDebug');
        $autoloader->registerNamespace('Danceric');
        
        $this->bootstrap('doctrine');
        
        $options = array(
            'plugins' => array(
                'Variables',
                'Danceric_Controller_Plugin_Debug_Plugin_Doctrine',
                'Exception',
                'html','file'
            )
        );
        
        $debug = new ZFDebug_Controller_Plugin_Debug($options);
        
        $this->bootstrap('frontController');
        $fc = $this->getResource('frontController');
        $fc->registerPlugin($debug);
    }
*/
    
}

