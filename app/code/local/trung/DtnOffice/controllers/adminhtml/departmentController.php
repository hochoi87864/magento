<?php

class trung_DtnOffice_adminhtml_departmentController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction(){
        $this->loadLayout();
        /*$block = $this->getLayout()->createBlock('core/text')->setText('<h1>Sao khong hien ra</h1>');
        $this->_addContent($block);*/
        $this->renderLayout();
    }
    public function newAction(){
        $this->loadLayout();
        /*$this->_addContent($this->getLayout()->createBlock('DtnOffice/adminhtml_form_edit'))->_addContent($this->getLayout()->createBlock('DtnOffice/adminhtml_form_edit_tabs'));*/
        $this->renderLayout();
    }
/*    public function saveAction() {
        if ($data = $this->getRequest()->getPost()) {
        }
    }*/
}