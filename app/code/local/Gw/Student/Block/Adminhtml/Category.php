<?php

class Gw_Student_Block_Adminhtml_Category extends  Mage_Adminhtml_Block_Widget_Grid_Container
{

    protected function _construct()
    {
        parent::_construct();

        $helper = Mage::helper('gwstudent');
        $this->_blockGroup = 'gwstudent';
        $this->_controller = 'adminhtml_category';

        $this->_headerText = $helper->__('Categories Management');
        $this->_addButtonLabel = $helper->__('Add categories');
    }

}