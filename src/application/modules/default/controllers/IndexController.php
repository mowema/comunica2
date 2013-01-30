<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        date_default_timezone_set("America/Buenos_Aires"); /* Initialize action controller here */
    }

    public function indexAction()
    {
        $this->view->hello = 'Hello Smarty 3';
        // action body
    }


}

