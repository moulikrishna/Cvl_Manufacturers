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
        'visible'           => 1,
        'global'            => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
        'required'          => 0,
        'visible_on_front'  => 1,
        'visible_in_advanced_search'  => 1,
        'searchable'        => 1,
        'filterable'        => 1,
        'apply_to'          => 'simple',
        'comparable'        => 1,
        'is_configurable'   => 0,
        'used_in_product_listing' => 1,
        'sort_order'        => 6,
    ));
$installer->endSetup();