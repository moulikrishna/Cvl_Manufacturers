<?php
$installer = $this;
$installer->startSetup();
// Remove Product Attribute
$installer->removeAttribute('catalog_product', 'cvl_manufacturers');
// Add Product Attribute
$installer->addAttribute('catalog_product', 'cvl_manufacturers', array(
        'group'             => 'General',
        'label'             => 'Manufacturer',
        'note'              => '',
        'type'              => 'int',   //backend_type
        'input'             => 'select',    //frontend_input
        'frontend_class'    => '',
        'source'            => 'manufacturer/source_manufacturers',
        'backend'           => '',
        'frontend'          => '',
        'global'            => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_WEBSITE,
        'required'          => 0,
        'visible'           => 1,
        'visible_on_front'  => 1,
        'visible_in_advanced_search'  => 1,
        'searchable'        => 1,
        'is_filterable'     => 1,
        'apply_to'          => 'simple',
        'comparable'        => 1,
        'is_configurable'   => 1,
        'used_in_product_listing' => 1,
        'user_defined'=>'1',
        'sort_order'        => 50,
    ));
$installer->endSetup();