<?php




$installer = $this;
$installer->startSetup();
$installer->getConnection()
    ->addColumn(
        $installer->getTable('gwstudent/table_student'), 'group', array(
            'type' => Varien_Db_Ddl_Table::TYPE_TEXT,
            'nullable'  => true, 'length'    => 255, 'default'   => 'Some thing default value',
            'comment'   => 'Your field comment'));
$installer->endSetup();
?>




