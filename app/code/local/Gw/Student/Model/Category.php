<?php

class Gw_Student_Model_Category extends Mage_Core_Model_Abstract
{

    protected function _construct()
    {
        parent::_construct();
        $this->_init('gwstudent/category');
    }

    protected function _afterDelete()
    {
        foreach($this->getStudentCollection() as $students){
            $students->setCategoryId(0)->save();
        }
        return parent::_afterDelete();
    }

    public function getStudentCollection()
    {
        $collection = Mage::getModel('gwstudent/student')->getCollection();
        $collection->addFieldToFilter('category_id', $this->getId());
        return $collection;
    }

}