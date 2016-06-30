<?php
class Cvl_Manufacturer_Block_Manufacturer extends Mage_Core_Block_Template
{
	public function __construct()
    {
        parent::__construct();
        $collection = Mage::getModel('manufacturer/manufacturer')->getCollection()->addFieldToFilter('status',Array('eq'=>1));
        $this->setCollection($collection);
    }
 
    protected function _prepareLayout()
    {
        parent::_prepareLayout();
 
        $pager = $this->getLayout()->createBlock('page/html_pager', 'custom.pager');
        $pager->setAvailableLimit(array(4=>4,8=>8,12=>12,'all'=>'all'));
        $pager->setCollection($this->getCollection());
        $this->setChild('pager', $pager);
        $this->getCollection()->load();
        return $this;
    }
 
    public function getPagerHtml()
    {
        return $this->getChildHtml('pager');
    }
    
     public function getManufacturer()     
     { 
        if (!$this->hasData('manufacturer')) {
            $this->setData('manufacturer', Mage::registry('manufacturer'));
        }
        return $this->getData('manufacturer');
    }
}