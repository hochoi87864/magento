<?php
class Codealist_BackendModule_Adminhtml_IndexController extends Mage_Adminhtml_Controller_Action
{

    public function indexAction()
    {
//        Load the Adminhtml layout
        $this->loadLayout();

//        Render the layout
        $this->renderLayout();
    }
}