<?php

class Gw_Student_Model_Resource_Student_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{

    public function _construct()
    {
        parent::_construct();
        $this->_init('gwstudent/student');
    }

}