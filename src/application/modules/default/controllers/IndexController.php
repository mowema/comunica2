<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $this->view->hello = 'Hello Smarty 3';
        $this->view->title = 'Smarty 3 on Zend Framework';
    }


}

