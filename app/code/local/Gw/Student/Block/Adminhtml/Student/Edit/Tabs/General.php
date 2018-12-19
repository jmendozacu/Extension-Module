<?php

class Gw_Student_Block_Adminhtml_Student_Edit_Tabs_General extends Mage_Adminhtml_Block_Widget_Form
{

    protected function _prepareForm()
    {


        $helper = Mage::helper('gwstudent');
        $model = Mage::registry('current_student');

        $form = new Varien_Data_Form();
        $fieldset = $form->addFieldset('general_form', array(
            'legend' => $helper->__('General Information')
        ));


        $fieldset->addField('first_name', 'text', array(
            'label' => $helper->__('First_name'),
            'name' => 'first_name',
            'required' => true,
        ));


        $fieldset->addField('last_name', 'text', array(
            'label' => $helper->__('Last_name'),
            'required' => true,
            'name' => 'last_name',
        ));

        $fieldset->addField('photo', 'image', array(
            'label' => $helper->__('Photo'),
            'required' => true,
            'name' => 'photo',
        ));

        $fieldset->addField('comment', 'editor', array(
            'label' => $helper->__('Comment'),
            'required' => true,
            'name' => 'comment',
        ));

        $fieldset->addField('category_id', 'select', array(
            'label' => $helper->__('Category'),
            'name' => 'category_id',
            'values' => $helper->getCategoriesOptions(),
        ));

        $fieldset->addField('link', 'text', array(
            'label' => $helper->__('Link'),
            'name' => 'link',
        ));

        $fieldset->addField('created', 'date', array(
            'format' => Mage::app()->getLocale()->getDateFormat(Mage_Core_Model_Locale::FORMAT_TYPE_SHORT),
            'image' => $this->getSkinUrl('images/grid-cal.gif'),
            'label' => $helper->__('Created'),
            'name' => 'created'
        ));

        $formData = array_merge($model->getData(), array('photo' => $model->getImageUrl()));
//        $formData[123] = 321;
        $form->setValues($formData);
        $this->setForm($form);

        return parent::_prepareForm();

    }

}

