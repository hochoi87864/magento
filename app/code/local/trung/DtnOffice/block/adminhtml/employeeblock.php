<?php

class trung_DtnOffice_block_adminhtml_employeeblock extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_blockGroup= 'DtnOffice';
        $this->_controller='adminhtml_employee';
        $this->_headerText = Mage::helper('trung_DtnOffice')->__('Manage Employee');
        parent::__construct();
    }
}