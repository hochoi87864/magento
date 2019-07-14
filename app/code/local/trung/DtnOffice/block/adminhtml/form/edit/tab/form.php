<?php
class trung_DtnOffice_block_adminhtml_form_edit_tab_form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        $form = new Varien_Data_Form();
        $this->setForm($form);
        $fieldset = $form->addFieldset('form_form',array('legend'=>Mage::helper('trung_DtnOffice')->__('Item information')));

        $fieldset->addField('title', 'text', array(
            'label'     => Mage::helper('trung_DtnOffice')->__('name'),
            'class'     => 'required-entry',
            'required'  => true,
            'name'      => 'title',
        ));

        return parent::_prepareForm();
    }
}
