<?php

class Gw_Student_Block_Adminhtml_Category_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{

    protected function _construct()
    {
        $this->_blockGroup = 'gwstudent';
        $this->_controller = 'adminhtml_category';

    }

    public function getHeaderText()
    {


        $helper = Mage::helper('gwstudent');
        $model = Mage::registry('current_category');


        if ($model->getCategoryId()) {
            return $helper->__("Edit Category field'%s'", $this->escapeHtml($model->getTitle()));
        } else {
            return $helper->__("Add Category field");
        }
    }

}