<?php


class ContactFormController extends Zend_Controller_Action
{

	public function init()
	{
		/* Initialize action controller here */
		$this->initView();
		$this->view->title = "Formulario de Contacto";
	}

	public function indexAction()
	    {
	    	// action body
	    	//creo el formulario
	    	$formContacto = new Application_Form_Contact();
	    	//cambio el texto del boton submit
	    	$formContacto->submit->setLabel('Enviar ahora');
	    	//lo añado a la vista
	    	//
	    	// 

	    	//los formularios envian sus datos a traves de POST
	    	//si vienen datos de post, es que el usuario ha enviado el formulario
	    	if ($this->getRequest()->isPost())
	    	{
	    		//extrae un arreglo con los datos recibidos por POST
	    		//es decir, los datos clave=>valor del formulario
	    		$formData = $this->getRequest()->getPost();
	    		$formContacto->populate($formData);
	    		//isValid() revisa todos los validadores y filtros que le
	    		//aplicamos a los objetos del formulario: se asegura de que los
	    		//campos requeridos se hallan llenado, etc
	    		if ($formContacto->isValid($formData))
			    	{
			    	//$monitor = new My_Ids_IdsMonitor();
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
	    
	    			
	    			//Aqui ya estamos seguros de que los datos son validos
	    			//Enviamos el email:
	    			$config = array('ssl' => 'tls', 'port' => 587, 'auth' => 'login', 'username' => 'alegperea17@gmail.com', 'password' => '31856342');
	    			
	    			/* $transport = new Zend_Mail_Transport_Smtp('smtp.gmail.com', $config);
	    			
	    			$mail = new Zend_Mail('utf-8');
	    			$mail->setFrom($formContacto->getValue('email'), 'Emisor');
	    			//$mail->addTo('alegperea17@gmail.com', 'Receptor');
	    			$mail->setSubject('Asunto del correo');
	    			$mail->setBodyHtml("Nombre:".$formContacto->getValue('nombre').
	    					"Empresa:".$formContacto->getValue('empresa').
	    					"Web:".$formContacto->getValue('website').
	    					"Mensaje:".$formContacto->getValue('mensaje'));
	    			$mail->send($transport);
	    			//vamos de nuevo a la página principal
	    			$this->_helper->redirector('index');
	    			*/
	    		}
	    		//si los datos del formulario no son validos, es decir, falta ingresar
	    		//algunos o el formato es incorrecto...
	    		else
	    		{
	    			//esta funcion vuelve a cargar el formulario con los datos que se
	    			//enviaron, Y ADEMAS CON LOS MENSAJES DE ERROR
	    			$formContacto->populate($formData);
	    		}
	    		 
	    	}

	    	$this->view->form = $formContacto;	
	    		
	    }
	




}

