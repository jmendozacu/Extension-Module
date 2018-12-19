<?php

class Gw_Student_Block_Adminhtml_Student_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{

    protected function _construct()
    {
        $this->_blockGroup = 'gwstudent';
        $this->_controller = 'adminhtml_student';


    }

    public function getHeaderText()
    {


        $helper = Mage::helper('gwstudent');
        $model = Mage::registry('current_student');


        if ($model->getId()) {
            return $helper->__("Edit Students field'%s'", $this->escapeHtml($model->getTitle()));
        } else {
            return $helper->__("Add Students field");
        }
    }

}