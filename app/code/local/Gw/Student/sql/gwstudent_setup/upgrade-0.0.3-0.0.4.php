<?php



$installer = $this;
$tableCategories = $installer->getTable('gwstudent/table_categories');
$tableStudents = $installer->getTable('gwstudent/table_student');

$installer->startSetup();
$installer->getConnection()->dropTable($tableCategories);
$table = $installer->getConnection()
    ->newTable($tableCategories)
    ->addColumn('category_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'nullable'  => false,
        'primary'   => true,
    ))
    ->addColumn('title', Varien_Db_Ddl_Table::TYPE_TEXT, '255', array(
        'nullable'  => false,
    ));
$installer->getConnection()->createTable($table);

$installer->getConnection()->addColumn($tableStudents, 'category_id', array(
    'comment'   => 'Students Category',
    'default'   => '0',
    'nullable'  => false,
    'type'      => Varien_Db_Ddl_Table::TYPE_INTEGER,
));

$installer->endSetup();
