<?php

class Cvl_Manufacturer_Helper_Data extends Mage_Core_Helper_Abstract
{
    public function getManufacturerUrl()
    {
        return $this->_getUrl('manufacturer/index');
    }
}