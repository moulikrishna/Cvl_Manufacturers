<?php

    class Cvl_Manufacturer_Block_Adminhtml_Manufacturer_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
    {
        protected function _prepareForm()
        {
            $form = new Varien_Data_Form();
            $this->setForm($form);
            $fieldset = $form->addFieldset('manufacturer_form', array('legend'=>Mage::helper('manufacturer')->__('Manufacturer information')));
            $fieldset->addField('name', 'text', array(
                    'label'     => Mage::helper('manufacturer')->__('Name'),
                    'required'  => true,
                    'name'      => 'name',
                ));
                
            //At the time of insert of manufacturer the image uploaded is reqired
            //While time of Edit this can be blank
            if(Mage::registry('manufacturer_data')->getData('filename')!=""){
                $fieldset->addField('filename', 'file', array(
                        'label'     => Mage::helper('manufacturer/data')->__('Manufacturer Logo'),
                        'required'  => false,
                        'name'      => 'filename',
                        'after_element_html' => Mage::registry('manufacturer_data')->getData('filename') != "" ? '<span class="hint"><img src="'.Mage::getBaseUrl('media')."Manufacturer/".Mage::registry('manufacturer_data')->getData('filename').'" width="25" height="25" name="manufacturer_image" style="vertical-align: middle;" /></span>':'',
                    ));
            }else{
                $fieldset->addField('filename', 'file', array(
                        'label'     => Mage::helper('manufacturer/data')->__('Manufacturer Logo'),
                        'class'     => 'required-entry',
                        'required'  => true,
                        'name'      => 'filename',
                        'after_element_html' => Mage::registry('manufacturer_data')->getData('filename') != "" ? '<span class="hint"><img src="'.Mage::getBaseUrl('media')."Manufacturer/".Mage::registry('manufacturer_data')->getData('filename').'" width="25" height="25" name="manufacturer_image" style="vertical-align: middle;" /></span>':'',
                    ));
            }
           
           $fieldset->addField('est_year', 'text', array(
                    'label'     => Mage::helper('manufacturer')->__('Established Year'),
                    'required'  => true,
                    'name'      => 'est_year',
                ));

            $wysiwygConfig = Mage::getSingleton('cms/wysiwyg_config');
            $fieldset->addField('description', 'textarea', array(
                    'label'     => Mage::helper('manufacturer')->__('Description'),
                    'required'  => false,
                    'name'      => 'description',
                    'wysiwyg'   => true,
                    'config'    => $wysiwygConfig
                )); 

            $fieldset->addField('status', 'select', array(
                    'label'     => Mage::helper('manufacturer')->__('Status'),
                    'name'      => 'status',
                    'values'    => array(
                        array(
                            'value'     => 1,
                            'label'     => Mage::helper('manufacturer')->__('Enabled'),
                        ),

                        array(
                            'value'     => 2,
                            'label'     => Mage::helper('manufacturer')->__('Disabled'),
                        ),
                    ),
                ));

            if ( Mage::getSingleton('adminhtml/session')->getManufacturerData() )
            {
                $form->setValues(Mage::getSingleton('adminhtml/session')->getManufacturerData());
                Mage::getSingleton('adminhtml/session')->setManufacturerData(null);
            } elseif ( Mage::registry('manufacturer_data') ) {
                $form->setValues(Mage::registry('manufacturer_data')->getData());
            }
            return parent::_prepareForm();
        }
}