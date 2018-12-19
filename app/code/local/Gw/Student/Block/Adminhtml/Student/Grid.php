<?php

class Gw_Student_Block_Adminhtml_Student_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('gwstudent/student')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {



        $helper = Mage::helper('gwstudent');

        $this->addColumn('id', array(
            'header' => $helper->__('ID'),
            'index' => 'id'
        ));

        $this->addColumn('first_name', array(
            'header' => $helper->__('First_Name'),
            'index' => 'first_name',
            'type' => 'text',
        ));

        $this->addColumn('last_name', array(
            'header' => $helper->__('Last_Name'),
            'index' => 'last_name',
            'type' => 'text',
        ));

        $this->addColumn('group', array(
            'header' => $helper->__('Group'),
            'index' => 'group',
            'type' => 'text',
        ));

        $this->addColumn('comment', array(
            'header' => $helper->__('Comment'),
            'index' => 'comment',
            'type' => 'text',
        ));

        $this->addColumn('photo', array(
            'header' => $helper->__('Photo'),
            'index' => 'photo',
            'type' => 'text',
        ));


        $this->addColumn('category', array(
            'header' => $helper->__('Category'),
            'index' => 'category_id',
            'options' => $helper->getCategoriesList(),
            'type'  => 'options',
            'width' => '150px',
        ));


        $this->addColumn('created', array(
            'header' => $helper->__('Created'),
            'index' => 'created',
            'type' => 'date',
        ));

        return parent::_prepareColumns();

    }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('id');
        $this->getMassactionBlock()->setFormFieldName('student');

        $this->getMassactionBlock()->addItem('delete', array(
            'label' => $this->__('Delete'),
            'url' => $this->getUrl('*/*/massDelete'),
        ));
        return $this;
    }

    public function getRowUrl($model)
    {
        return $this->getUrl('*/*/edit', array(
            'id' => $model->getId(),
        ));
    }

}