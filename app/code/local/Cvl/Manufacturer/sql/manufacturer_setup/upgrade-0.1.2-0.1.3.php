<?php
/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;
$installer->startSetup(); 
$installer->addAttribute('catalog_product', 'cvl_manufacturers', array(
        'group'             => 'General',
		'label'             => 'Manufacturer',
		'note'              => '',
        'type'              => 'int',	//backend_type
		'input'             => 'select',	//frontend_input
		'frontend_class'	=> '',
		'source'			=> 'manufacturer/source_manufacturers',
        'backend'           => '',
        'frontend'          => '',
        'visible'           => true,
        'global'            => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
		'required'          => false,
        'visible_on_front'  => true,
        'visible_in_advanced_search'  => true,
        'searchable'        => true,
        'filterable'        => true,
        'apply_to'          => 'simple',
        'comparable'        => true,
        'is_configurable'   => false,
        'used_in_product_listing' => true,
        'sort_order'        => 6,
    ));
$installer->endSetup();