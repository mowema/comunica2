<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initPhpConfig() {
    	$this->_front = Zend_Controller_Front::getInstance ();
    	$this->_reg = Zend_Registry::getInstance ();
    	//$this->_config = new Zend_Config_Ini ( APPLICATION_PATH . '/configs/application.ini', APPLICATION_ENV );
    	$app = $this->getApplication ();
    	$this->_config = $app->getOptions ();
    	$this->_reg->set ( 'config', $this->_config );
    }
    public function _initConfig() {
    
    	$this->view = new Zend_View ();
    	$this->view->addHelperPath ( APPLICATION_PATH . '/default/views/helpers', 'My_Helpers' );
    
    	// indico la vista a utilizar con el viewrenderer
    	$viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper ( 'ViewRenderer' );
    	$viewRenderer->setView ( $this->view );
    	return $this->view;
    }
    
		protected function _initHead(){
		$this->view->doctype ( 'XHTML1_TRANSITIONAL' );
		$this->view->headMeta()
						->appendHttpEquiv('Content-Type', 'text/html; charset="UTF-8"') 
						->appendHttpEquiv('expires', '-1')
						->appendName('Keywords', 'las palabras separadas por comas') 
		 				->appendName('Description', 'descripci—n de la p‡gina')
		 				->appendName('robots', 'all')
						//->appendName('Language', 'es')
						; 
		$this->view->headTitle()->setSeparator(' - '); 
		$this->view->headTitle('Evento'); 

	}
    
    protected function _initLinks() {
		$this->view->headLink ()->appendStylesheet ( '/assets/css/bootstrap.css' );
		
	}
	protected function _initScripts() {
		$this->view->headScript()->offsetSetFile ( 210, '/assets/js/jquery.js' );
	
	}
	
	/*
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
    
    
    protected function _initPlaceholders()
    {
        $this->bootstrap('view');
        $view = $this->getResource('view');
        $view->doctype('XHTML1_STRICT');

        
        // Set the initial title and separator:
        $view->headTitle('My Site')
             ->setSeparator(' :: ');

        // Set the initial stylesheet:
        $view->headLink()->prependStylesheet('/styles/site.css');

        // Set the initial JS to load:
        $view->headScript()->prependFile('/js/site.js');
    }
*/

    protected function _initZFDebug()
    {
        if (APPLICATION_ENV !== 'development') {
            return;
        }
        $autoloader = Zend_Loader_Autoloader::getInstance();
        $autoloader->registerNamespace('ZFDebug');
        //$autoloader->registerNamespace('Danceric');
        
        //$this->bootstrap('doctrine');
        
        $options = array(
            'plugins' => array(
                'Variables',
                //'Danceric_Controller_Plugin_Debug_Plugin_Doctrine',
                'Exception',
                'html','file'
            )
        );
        
        $debug = new ZFDebug_Controller_Plugin_Debug($options);
        
        $this->bootstrap('frontController');
        $fc = $this->getResource('frontController');
        $fc->registerPlugin($debug);
    }

    protected function _initZIDS() 
    {
        // Setup autoloader
        $autoloader = Zend_Loader_Autoloader::getInstance();
        $autoloader->registerNamespace('ZIDS');
            
        // Make sure that the front controller is initialized
        $this->bootstrap('FrontController');

        // Retrieve the front controller
        $front = $this->getResource('FrontController');

        // Register ZIDS if options have been specified
        if ($this->hasOption('zids'))
        {
            // Create ZIDS instance
            $zids = new ZIDS_Plugin_Ids($this->getOption('zids'));

            // create a logger (ADAPT THIS TO YOUR NEEDS!)
            $logger = new Zend_Log ();
            $filter = new Zend_Log_Filter_Priority(Zend_Log::ERR);
            $writer = new Zend_Log_Writer_Stream ("../data/logs/log.txt");
            $logger->addWriter ( $writer );

            // register all plugins that you need
            $zids->registerPlugin(new ZIDS_Plugin_ActionPlugin_Ignore());
            $zids->registerPlugin(new ZIDS_Plugin_ActionPlugin_Email());
            $zids->registerPlugin(new ZIDS_Plugin_ActionPlugin_Log($logger));
            $zids->registerPlugin(new ZIDS_Plugin_ActionPlugin_Redirect());

            // Register ZIDS with the front controller
            $front->registerPlugin($zids);
        }
    }

    
}

