<?php

class onemoretime_five_Model_resource_fivetable extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('five/fivetable', 'id');
    }
}