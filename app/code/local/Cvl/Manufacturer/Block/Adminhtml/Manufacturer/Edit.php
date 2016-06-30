<?php

class Cvl_Manufacturer_Block_Adminhtml_Manufacturer_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'manufacturer';
        $this->_controller = 'adminhtml_manufacturer';
        
        $this->_updateButton('save', 'label', Mage::helper('manufacturer')->__('Save Manufacturer'));
        $this->_updateButton('delete', 'label', Mage::helper('manufacturer')->__('Delete Manufacturer'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);
    }

    public function getHeaderText()
    {
        if( Mage::registry('manufacturer_data') && Mage::registry('manufacturer_data')->getId() ) {
            return Mage::helper('manufacturer')->__("Edit Manufacturer");
        } else {
            return Mage::helper('manufacturer')->__('Add Manufacturer');
        }
    }
}