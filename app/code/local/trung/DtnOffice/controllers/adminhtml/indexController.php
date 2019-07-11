<?php

class trung_DtnOffice_adminhtml_indexController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction(){
        $this->loadLayout();

        $this->renderLayout();
    }
}
