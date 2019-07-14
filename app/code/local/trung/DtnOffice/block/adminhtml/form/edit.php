<?php

class trung_DtnOffice_block_adminhtml_form_edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
        $this->_objectId ='id';
        $this->_blockGroup='DtnOffice';
        $this->_controller='adminhtml_form';
        $this->_updateButton('save', 'label', Mage::helper('trung_DtnOffice')->__('Save'));
        $this->_updateButton('delete', 'label', Mage::helper('trung_DtnOffice')->__('Delete'));
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);
    }
    public function getHeaderText()
    {
        return Mage::helper('trung_DtnOffice')->__('My Form Container');
    }
}