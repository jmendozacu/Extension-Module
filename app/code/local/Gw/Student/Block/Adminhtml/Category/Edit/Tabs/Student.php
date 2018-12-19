<?php

class Gw_Student_Block_Adminhtml_Category_Edit_Tabs_Student extends Mage_Adminhtml_Block_Widget_Grid
{

    public function __construct()
    {
        parent::__construct();
        $this->setDefaultFilter(array('ajax_grid_in_category' => 1));
        $this->setId('categoryStudentGrid');
        $this->setSaveParametersInSession(false);
        $this->setUseAjax(true);
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('gwstudent/student')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();

    }

    protected function _prepareColumns()
    {

        $helper = Mage::helper('gwstudent');

        $this->addColumn('ajax_grid_in_category', array(
            'align' => 'center',
            'header_css_class' => 'a-center',
            'index' => 'id',
            'type' => 'checkbox',
            'values' => $this->getSelectedStudent(),
        ));

        $this->addColumn('ajax_grid_id', array(
            'header' => $helper->__('Student ID'),
            'index' => 'id',
            'width' => '100px',
        ));


        $this->addColumn('ajax_grid_first_name', array(
            'header' => $helper->__('First Name'),
            'index' => 'first_name',
            'type' => 'text',
        ));

        $this->addColumn('ajax_grid_last_name', array(
            'header' => $helper->__('Last_Name'),
            'index' => 'last_name',
            'type' => 'text',
        ));

        $this->addColumn('ajax_grid_group', array(
            'header' => $helper->__('Group'),
            'index' => 'group',
            'type' => 'text',
        ));

        $this->addColumn('ajax_grid_comment', array(
            'header' => $helper->__('Comment'),
            'index' => 'comment',
            'type' => 'text',
        ));

        $this->addColumn('ajax_grid_created', array(
            'header' => $helper->__('Created'),
            'index' => 'created',
            'type' => 'date',
        ));

        return parent::_prepareColumns();
    }

    protected function _addColumnFilterToCollection($column)
    {
        if ($column->getId() == 'ajax_grid_in_category') {
            $collection = $this->getCollection();
            $selectedStudent = $this->getSelectedStudent();
            if ($column->getFilter()->getValue()) {
                $collection->addFieldToFilter('id', array('in' => $selectedStudent));
            } elseif (!empty($selectedStudent)) {
                $collection->addFieldToFilter('id', array('nin' => $selectedStudent));
            }
        } else {
            parent::_addColumnFilterToCollection($column);
        }
        return $this;
    }


    public function getGridUrl()
    {
        return $this->getUrl('*/*/student', array('_current' => true, 'grid_only' => 1));
    }

    public function getSelectedStudent()
    {
        if (!isset($this->_data['selected_student'])) {
            $selectedStudent = Mage::app()->getRequest()->getParam('selected_student', null);
            if(is_null($selectedStudent) || !is_array($selectedStudent)){
                $category = Mage::registry('current_category');
                $selectedStudent = $category->getStudentCollection()->getAllIds();
            }
            $this->_data['selected_student'] = $selectedStudent;
        }
        return $this->_data['selected_student'];
    }


}
