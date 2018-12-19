<?php

class Gw_Student_Adminhtml_CategoryController extends Mage_Adminhtml_Controller_Action
{

    public function indexAction()
    {


        $this->loadLayout()->_setActiveMenu('gwstudent');

        $this->_addContent($this->getLayout()->createBlock('gwstudent/adminhtml_category'));

        $this->renderLayout();
//        echo '<h1>Hello</h1>';
    }

    public function newAction()
    {
        $this->_forward('edit');
    }


    public function editAction()
    {


        $id = (int)$this->getRequest()->getParam('category_id');
        $model = Mage::getModel('gwstudent/category');

        if ($data = Mage::getSingleton('adminhtml/session')->getFormData()) {
            $model->setData($data)->setId($id);
        } else {
            $model->load($id);
        }

        Mage::register('current_category', $model);

        $this->loadLayout()->_setActiveMenu('gwstudent');

        $this->getLayout()->getBlock('head')->addItem('skin_js', 'gw_student/adminhtml/scripts.js');
        $this->getLayout()->getBlock('head')->addItem('skin_css', 'gw_student/adminhtml/styles.css');

        $this->_addLeft($this->getLayout()->createBlock('gwstudent/adminhtml_category_edit_tabs'));
        $this->_addContent($this->getLayout()->createBlock('gwstudent/adminhtml_category_edit'));
        $this->renderLayout();

    }

    public function saveAction()
    {


        $categoryId = $this->getRequest()->getParam('category_id');
        if ($data = $this->getRequest()->getPost()) {

            try {
                $helper = Mage::helper('gwstudent');
                $model = Mage::getModel('gwstudent/category');
                $model->setData($data)->setId($categoryId);

                $model->save();
                $categoryId = $model->getId();

                $categoryStudent = $model->getStudentCollection()->getAllIds();
                if ($selectedStudent = $this->getRequest()->getParam('selected_student', null)) {
                    $selectedStudent = Mage::helper('adminhtml/js')->decodeGridSerializedInput($selectedStudent);
                } else {
                    $selectedStudent = array();
                }

                $setCategory = array_diff($selectedStudent, $categoryStudent);
                $unsetCategory = array_diff($categoryStudent, $selectedStudent);

                foreach($setCategory as $id){
                    Mage::getModel('gwstudent/student')->setId($id)->setCategoryId($categoryId)->save();
                }
                foreach($unsetCategory as $id){
                    Mage::getModel('gwstudent/student')->setId($id)->setCategoryId(0)->save();
                }

                Mage::getSingleton('adminhtml/session')->addSuccess($this->__('Category was saved successfully'));
                Mage::getSingleton('adminhtml/session')->setFormData(false);
                $this->_redirect('*/*/');
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                Mage::getSingleton('adminhtml/session')->setFormData($data);
                $this->_redirect('*/*/edit', array(
                    'category_id' => $id
                ));
            }
            return;
        }
        Mage::getSingleton('adminhtml/session')->addError($this->__('Unable to find item to save'));
        $this->_redirect('*/*/');
    }



    public function deleteAction()
    {
        if ($id = $this->getRequest()->getParam('category_id')) {
            try {


                Mage::getModel('gwstudent/category')->setCategoryId($id)->delete();
                Mage::getSingleton('adminhtml/session')->addSuccess($this->__('Categor was deleted successfully'));
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                $this->_redirect('*/*/edit', array('category_id' => $id));
            }
        }
        $this->_redirect('*/*/');
    }

    public function massDeleteAction()
    {
        $category = $this->getRequest()->getParam('category', null);

        if (is_array($category) && sizeof($category) > 0) {
            try {
                foreach ($category as $id) {
                    Mage::getModel('gwstudent/category')->setCategoryId($id)->delete();
                }
                $this->_getSession()->addSuccess($this->__('Total of %d categories have been deleted', sizeof($category)));
            } catch (Exception $e) {
                $this->_getSession()->addError($e->getMessage());
            }
        } else {
            $this->_getSession()->addError($this->__('Please select category'));
        }
        $this->_redirect('*/*');
    }

    public function studentAction()
    {
        $id = (int)$this->getRequest()->getParam('category_id');
        $model = Mage::getModel('gwstudent/category')->load($id);
        $request = Mage::app()->getRequest();


        Mage::register('current_category', $model);



        if ($request->isAjax()) {

            $this->loadLayout();
            $layout = $this->getLayout();

            $root = $layout->createBlock('core/text_list', 'root', array('output' => 'toHtml'));

            $grid = $layout->createBlock('gwstudent/adminhtml_category_edit_tabs_student');
            $root->append($grid);

            if (!$request->getParam('grid_only')) {
                $serializer = $layout->createBlock('adminhtml/widget_grid_serializer');
                $serializer->initSerializerBlock($grid, 'getSelectedStudent', 'selected_student', 'selected_student');
                $root->append($serializer);
            }

            $this->renderLayout();
        }


    }

}