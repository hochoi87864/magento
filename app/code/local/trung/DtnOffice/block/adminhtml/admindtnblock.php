<?php

class trung_DtnOffice_block_adminhtml_admindtnblock extends Mage_Adminhtml_Block_Widget_Container
{
    public function _construct()
    {
        parent::_construct();
        $this->_controller ='adminhtml_admindtnblock';
        $this->_blockGroup = 'DtnOffice';
    }
}