<?php




$installer = $this;
$tableStudent = $installer->getTable('gwstudent/table_student');

$installer->startSetup();
$installer->getConnection()
    ->addColumn($tableStudent, 'link', array(
        'comment'   => 'Student URL link',
        'type'      => Varien_Db_Ddl_Table::TYPE_TEXT,
        'length'    => '255',
        'nullable'  => true,
    ));

$installer->getConnection()
    ->addKey($tableStudent, 'IDX_UNIQUE_Student_LINK', 'link', Varien_Db_Adapter_Interface::INDEX_TYPE_UNIQUE);

$installer->endSetup();
