<?php


class Gw_Student_Model_Resource_Student extends Mage_Core_Model_Mysql4_Abstract
{

    public function _construct()
    {
        $this->_init('gwstudent/table_student','id');
    }

}