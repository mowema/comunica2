<?php

class My_Ids_IdsMonitor extends Zend_Controller_Plugin_Abstract {
	
	 public function preDispatch(Zend_Controller_Request_Abstract $request) {
	
	    require_once 'IDS/Init.php';
	    $request = array ('REQUEST' => $_REQUEST, 'GET' => $_GET, 'POST' => $_POST, 'COOKIE' => $_COOKIE );
	    $init = IDS_Init::init(APPLICATION_PATH. '/../library/IDS/Config/Config.ini.php');
					$init->config['General']['base_path'] = APPLICATION_PATH. '/../library/IDS/';
				    $init->config['General']['use_base_path'] = true;
				    $init->config['Caching']['caching'] = 'none';
			

		// 2. Initiate the PHPIDS and fetch the results
		$ids = new IDS_Monitor ( $request, $init );
	    $result = $ids->run ();
	
	    if (! $result->isEmpty ()) {
	       // This is where you should put some code that
	       // deals with potential attacks, e.g. throwing
	       // an exception, logging the attack, etc.
	       echo '<div style="background:red">'.$result.'</div>';
	    }
	    return $request;
	 }
}