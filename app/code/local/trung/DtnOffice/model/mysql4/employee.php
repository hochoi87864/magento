<?php

class trung_DtnOffice_model_mysql4_employee extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {
        $this->_init('DtnOffice/employee', 'id');
    }
}
