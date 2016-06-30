<?php

class Cvl_Manufacturer_Model_Mysql4_Manufacturer extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {
        $this->_init('manufacturer/manufacturer', 'id');
    }
}