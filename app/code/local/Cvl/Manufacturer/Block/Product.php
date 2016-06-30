<?php
class Cvl_Manufacturer_Block_Product extends Mage_Catalog_Block_Product_List
{
	 protected $_productCollection;

	 protected function _getProductCollection()
     {
	 	$manufacturerId = $this->getRequest()->getParam('id');
	    if (is_null($this->_productCollection)) {
        $collection = Mage::getModel('catalog/product')
                        ->getCollection()
                        ->addAttributeToSort('created_at', 'DESC')
                        ->addAttributeToSelect('*')
                        ->addAttributeToFilter('cvl_manufacturers', array('eq' => $manufacturerId));
        $collection->getSelect()->join(array('manufacturer'=>'cvl_manufacturer'),'at_cvl_manufacturers_default.value = manufacturer.id', array('name AS manufacturerName', 'filename AS manufacturerFilename', 'description AS manufacturerDescription', 'est_year AS manufacturerEstYear'));
	    Mage::getModel('catalog/layer')->prepareProductCollection($collection);
	     $this->_productCollection = $collection;
	    }
	    return parent::_getProductCollection();
	}

     public function getManufacturer()     
     { 
        if (!$this->hasData('manufacturer')) {
            $this->setData('manufacturer', Mage::registry('manufacturer'));
        }
        return $this->getData('manufacturer');
    }
}