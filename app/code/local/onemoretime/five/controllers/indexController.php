<?php

class onemoretime_five_indexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $five = Mage::getModel('five/fivetable');
        echo get_class($five);
    }
    public function testModelAction(){
    }
}