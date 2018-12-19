<?php

/** @var Mage_Core_Model_Abstract $this */
class Gw_Student_Model_Student extends Mage_Core_Model_Abstract
{

    public function _construct()
    {
        parent::_construct();
        $this->_init('gwstudent/student');
    }

    protected function _afterDelete()
    {
        $helper = Mage::helper('gwstudent');
        @unlink($helper->getImagePath($this->getId()));
        return parent::_afterDelete();
    }

    protected function _beforeSave()
    {
        $helper = Mage::helper('gwstudent');

        if (!$this->getData('link')) {
            $this->setData('link', $helper->prepareUrl($this->getFirstName()));
        } else {
            $this->setData('link', $helper->prepareUrl($this->getData('link')));
        }
        return parent::_beforeSave();
    }


    public function getImageUrl()
    {
        $helper = Mage::helper('gwstudent');
        if ($this->getId() && file_exists($helper->getImagePath($this->getId()))) {
            return $helper->getImageUrl($this->getId());
        }
        return null;
    }


}