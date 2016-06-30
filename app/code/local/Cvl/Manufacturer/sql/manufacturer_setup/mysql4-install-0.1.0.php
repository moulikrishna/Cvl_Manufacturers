<?php
$installer = $this;
$installer->startSetup();
$table = $installer->getConnection()->newTable($installer->getTable('cvl_manufacturer'))
    ->addColumn('id', Varien_Db_Ddl_Table::TYPE_INTEGER, 11, array(
        'unsigned' => true,
        'nullable' => false,
        'primary' => true,
        'identity' => true,
        ), 'ID')
    ->addColumn('name', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, array(
        'nullable' => false,
        'default' => '', 
        ), 'Manufacturer')
    ->addColumn('est_year', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, array(
        'nullable' => false,
        'default' => '',
        ), 'Established Year')
    ->addColumn('filename', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, array(
        'nullable' => true,
        'default' => '',
        ), 'File Name')
    ->addColumn('description', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable' => true,
        'default' => '',
        ), 'Description')
    ->addColumn('status', Varien_Db_Ddl_Table::TYPE_TINYINT, 2, array(
        'nullable' => false,
        'default' => '0',
        ), 'Status')
    ->addColumn('created_time', Varien_Db_Ddl_Table::TYPE_DATE, null, array(
        'nullable' => true,
        'default' => null,
        ), 'Created Date')
    ->addColumn('update_time', Varien_Db_Ddl_Table::TYPE_DATE, null, array(
        'nullable' => true,
        'default' => null,
        ), 'Update Date')    
    ->setComment('Manufacturer table');
    $installer->getConnection()->createTable($table);
    $installer->endSetup();
?>