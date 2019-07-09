<?php

class onemoretime_one_twoController extends Mage_Core_Controller_Front_Action
{
    /**
     * index action
     */
    public function threeAction()
    {
        $this->loadLayout();
        /*$head = Mage::app()->getLayout()->getBlock('head');*/
        /*$head->addItem('skin_css', 'css/myslide.css');*/
 /*       $head->addItem('skin_js', 'js/myslide.js');*/
        $this->renderLayout();
    }
}