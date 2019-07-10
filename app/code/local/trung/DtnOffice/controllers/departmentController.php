<?php

class trung_DtnOffice_departmentController extends Mage_Core_Controller_Front_Action
{
    public function indexAction(){

    }
    public function createAction(){
        // 
        $this->loadLayout();
        $this->renderLayout();
    }
    public function handleaddAction(){
        if(isset($_POST['add'])){
            $dpmname= $this->getRequest()->getPost('dpmname');
            $add = mage::getModel('DtnOffice/department');
            $add->setName($dpmname);
            $add->save();
            $this->_redirect('dtn/department/index');
        }
    }
    public function getAction(){

    }
    public function updateAction(){

    }
    public function deleteAction(){

    }
}
