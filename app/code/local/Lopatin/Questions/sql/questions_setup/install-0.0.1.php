<?php
$installer = $this;
/* @var $installer Mage_Core_Model_Resource_Setup */

$installer->startSetup();
$tableName = $installer->getTable('questions/table_question');


$installer->getConnection()->dropTable($tableName);
$table = $installer->getConnection()
    ->newTable($tableName)
    ->addColumn('block_id', Varien_Db_Ddl_Table::TYPE_INTEGER, 11, array(
        'unsigned' => true,
        'nullable' => false,
        'primary' => true,
        'identity' => true,
    ), 'Faq ID')
    ->addColumn('name', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, array(
        'nullable' => false,
        'default' => '',
    ), 'Name')
    ->addColumn('question', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, array(
        'nullable' => false,
        'default' => '',
    ), 'Question')
    ->addColumn('answer', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
        'nullable' => false,
        'default' => '',
    ), 'Answer')
    ->addColumn('faq_date', Varien_Db_Ddl_Table::TYPE_DATETIME, null, array(
        'nullable' => false,
    ), 'Faq Date')
    ->addColumn('status', Varien_Db_Ddl_Table::TYPE_INTEGER, 4, array(
        'nullable' => false,
        'default' => 0,
    ), 'Status');
$installer->getConnection()->createTable($table);
$installer->endSetup();
