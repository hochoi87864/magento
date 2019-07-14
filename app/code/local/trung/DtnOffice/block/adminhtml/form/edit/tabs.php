<?php

class trung_DtnOffice_block_adminhtml_form_edit_tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('form_tabs');
        $this->setDestElementId('edit_form'); // this should be same as the form id define above
        $this->setTitle(Mage::helper('trung_DtnOffice')->__('Department Information'));
    }
    protected function _beforeToHtml()
    {
        $this->addTab('form_section', array(
            'label'     => Mage::helper('trung_DtnOffice')->__('Item Information'),
            'title'     => Mage::helper('trung_DtnOffice')->__('Item Information'),
            'content'   => $this->getLayout()->createBlock('DtnOffice/adminhtml_form_edit_tab_form')->toHtml(),
        ));

        return parent::_beforeToHtml();
    }
}