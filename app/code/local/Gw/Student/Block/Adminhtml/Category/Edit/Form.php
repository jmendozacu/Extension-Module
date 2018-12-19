<?php

class Gw_Student_Block_Adminhtml_Category_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {


        $form = new Varien_Data_Form(array(
            'id' => 'edit_form',
            'action' => $this->getUrl('*/*/save', array(
                'category_id' => $this->getRequest()->getParam('category_id')
            )),
            'method' => 'post',
            'enctype' => 'multipart/form-data'
        ));

        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }



}


//    protected function _prepareForm()
//    {
//        $helper = Mage::helper('gwstudent');
//        $model = Mage::registry('current_student');
//
//        $form = new Varien_Data_Form(array(
//            'id' => 'edit_form',
//            'action' => $this->getUrl('*/*/save', array(
//                'id' => $this->getRequest()->getParam('id')
//            )),
//            'method' => 'post',
//            'enctype' => 'multipart/form-data'
//        ));
//
//        $this->setForm($form);
//
//        $fieldset = $form->addFieldset('student_form', array('legend' => $helper->__('Students Information')));
//
//        $fieldset->addField('first_name', 'text', array(
//            'label' => $helper->__('First_name'),
//            'required' => true,
//            'name' => 'first_name',
//        ));
//
//        $fieldset->addField('last_name', 'text', array(
//            'label' => $helper->__('Last_name'),
//            'required' => true,
//            'name' => 'last_name',
//        ));
//
//        $fieldset->addField('photo', 'text', array(
//            'label' => $helper->__('Photo'),
//            'required' => true,
//            'name' => 'photo',
//        ));
//
//        $fieldset->addField('comment', 'editor', array(
//            'label' => $helper->__('Comment'),
//            'required' => true,
//            'name' => 'comment',
//        ));
//
//        $fieldset->addField('created', 'date', array(
//            'format' => Mage::app()->getLocale()->getDateFormat(Mage_Core_Model_Locale::FORMAT_TYPE_SHORT),
//            'image' => $this->getSkinUrl('images/grid-cal.gif'),
//            'label' => $helper->__('Created'),
//            'name' => 'created'
//        ));
//
//        $form->setUseContainer(true);
//
//        if($data = Mage::getSingleton('adminhtml/session')->getFormData()){
//
//      $form->setValues($data);
//        } else {
//            $form->setValues($model->getData());
//        }
//
//        return parent::_prepareForm();
//    }