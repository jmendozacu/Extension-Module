<?php

class Gw_Student_Block_Adminhtml_Student_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

    public function __construct()
    {
        $helper = Mage::helper('gwstudent');

        parent::__construct();
        $this->setId('student_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle($helper->__('Students Information'));
    }

    protected function _prepareLayout()
    {


        $helper = Mage::helper('gwstudent');

        $this->addTab('general_section', array(
            'label' => $helper->__('General Information'),
            'first_name' => $helper->__('General Information'),
            'last_name' => $helper->__('General Information'),
            'photo' => $helper->__('General Information'),
            'content' => $this->getLayout()->createBlock('gwstudent/adminhtml_student_edit_tabs_general')->toHtml(),
        ));


        $this->addTab('custom_section', array(
            'label' => $helper->__('Custom Fields'),
            'first_name' => $helper->__('Custom Fields'),
            'last_name' => $helper->__('Custom Fields'),
            'photo' => $helper->__('Custom Fields'),
            'content' => $this->getLayout()->createBlock('gwstudent/adminhtml_student_edit_tabs_custom')->toHtml(),
        ));

        return parent::_prepareLayout();


    }

}