<?php



$installer = $this;

$table_students = $installer->getTable('gwstudent/table_student');


$installer->startSetup();

$installer->getConnection()->droptable($table_students);


$table = $installer->getConnection()
    ->newTable($table_students)
    ->addColumn('id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'nullable'  => false,
        'primary'   => true,
    ))
    ->addColumn('first_name', Varien_Db_Ddl_Table::TYPE_TEXT, '255', array(
        'nullable'  => false,
    ))
    ->addColumn('last_name', Varien_Db_Ddl_Table::TYPE_TEXT, '255', array(
        'nullable'  => false,
    ))
    ->addColumn('comment', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable'  => false,
    ))
    ->addColumn('photo', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
    'nullable'  => false,
    ))
    ->addColumn('created', Varien_Db_Ddl_Table::TYPE_DATETIME, null, array(
        'nullable'  => false,
    ));
$installer->getConnection()->createTable($table);

$installer->endSetup();
