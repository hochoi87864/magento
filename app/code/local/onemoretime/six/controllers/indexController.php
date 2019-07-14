<?php

class onemoretime_six_indexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction(){
        $this->loadLayout();
        $this->renderLayout();
    }
}