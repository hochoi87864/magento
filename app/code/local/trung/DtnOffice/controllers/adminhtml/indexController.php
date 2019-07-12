<?php

class trung_DtnOffice_adminhtml_indexController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction(){
        $this->loadLayout();
        /*$block = $this->getLayout()->createBlock('core/text')->setText('<h1>Sao khong hien ra</h1>');
        $this->_addContent($block);*/
        $this->renderLayout();
    }
    public function aaaAction(){
        echo "aaa";
    }
}