<?php

class Gw_Student_Block_Adminhtml_Student extends  Mage_Adminhtml_Block_Widget_Grid_Container
{

    protected function _construct()
    {
        parent::_construct();

        $helper = Mage::helper('gwstudent');
        $this->_blockGroup = 'gwstudent';
        $this->_controller = 'adminhtml_student';

        $this->_headerText = $helper->__('Student Management');
        $this->_addButtonLabel = $helper->__('Add Student');
    }

}