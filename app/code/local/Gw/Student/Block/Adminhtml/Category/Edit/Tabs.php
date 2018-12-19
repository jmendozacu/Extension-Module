<?php

class Gw_Student_Block_Adminhtml_Category_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

    public function __construct()
    {
        $helper = Mage::helper('gwstudent');

        parent::__construct();
        $this->setId('category_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle($helper->__('Category Information'));
    }

    protected function _prepareLayout()
    {



        $helper = Mage::helper('gwstudent');

        $this->addTab('general_section', array(
            'label' => $helper->__('General Information'),
            'title' => $helper->__('General Information'),
            'content' => $this->getLayout()->createBlock('gwstudent/adminhtml_category_edit_tabs_general')->toHtml(),
        ));


        $this->addTab('student_section', array(
            'class' => 'ajax',
            'label' => $helper->__('Student'),
            'first_name' => $helper->__('Student'),
            'last_name' => $helper->__('Student'),
            'comment' => $helper->__('Student'),
            'url' => $this->getUrl('*/*/student', array('_current' => true)),
        ));

        return parent::_prepareLayout();



    }

}