<?php

class Gw_Student_Adminhtml_StudentController extends Mage_Adminhtml_Controller_Action
{

    public function indexAction()
    {
        $this->loadLayout()->_setActiveMenu('gwstudent');
        $this->_addContent($this->getLayout()->createBlock('gwstudent/adminhtml_student'));
        $this->renderLayout();
    }

    public function newAction()
    {
        $this->_forward('edit');
    }


    public function editAction()
    {


        $id = (int)$this->getRequest()->getParam('id');
        $model = Mage::getModel('gwstudent/student');

        if ($data = Mage::getSingleton('adminhtml/session')->getFormData()) {
            $model->setData($data)->setId($id);
        } else {
            $model->load($id);
        }

        Mage::register('current_student', $model);

        $this->loadLayout()->_setActiveMenu('gwstudent');

        $this->getLayout()->getBlock('head')->addItem('skin_js', 'gw_student/adminhtml/scripts.js');
        $this->getLayout()->getBlock('head')->addItem('skin_css', 'gw_student/adminhtml/styles.css');

        $this->_addLeft($this->getLayout()->createBlock('gwstudent/adminhtml_student_edit_tabs'));
        $this->_addContent($this->getLayout()->createBlock('gwstudent/adminhtml_student_edit'));
        $this->renderLayout();

    }

    public function saveAction()
    {
//        echo '<pre>';
//        var_dump($_POST);
//        echo '</pre>';
//        die;

        $id = $this->getRequest()->getParam('id');
        if ($data = $this->getRequest()->getPost()) {

            try {
                $helper = Mage::helper('gwstudent');
                $model = Mage::getModel('gwstudent/student');

                if (isset($data['photo']['value'])) {
                    $data['photo'] = $data['photo']['value'];
                }
                $model->setData($data)->setId($id);
                if (!$model->getCreated()) {
                    $model->setCreated(now());
                }
                $model->save();
                $id = $model->getId();


                if (isset($_FILES['photo']['name']) && $_FILES['photo']['name'] != '') {


                    $uploader = new Varien_File_Uploader('photo');
                    $uploader->setAllowedExtensions(array('jpg', 'jpeg'));
                    $uploader->setAllowRenameFiles(false);
                    $uploader->setFilesDispersion(false);
                    $uploader->save($helper->getImagePath(), $id . '.jpg');
                } else {
                    if (isset($data['photo']['delete']) && $data['photo']['delete'] == 1) {
                        @unlink($helper->getImagePath($id));
                    }
                }

                Mage::getSingleton('adminhtml/session')->addSuccess($this->__('Student was saved successfully'));
                Mage::getSingleton('adminhtml/session')->setFormData(false);
                $this->_redirect('*/*/');


            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                Mage::getSingleton('adminhtml/session')->setFormData($data);
                $this->_redirect('*/*/edit', array(
                    'id' => $id
                ));
            }
            return;
        }
        Mage::getSingleton('adminhtml/session')->addError($this->__('Unable to find item to save'));
        $this->_redirect('*/*/');
    }


    public function deleteAction()
    {
        if ($id = $this->getRequest()->getParam('id')) {
            try {
                Mage::getModel('gwstudent/student')->setId($id)->delete();
                Mage::getSingleton('adminhtml/session')->addSuccess($this->__('Students was deleted successfully'));
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                $this->_redirect('*/*/edit', array('id' => $id));
            }
        }
        $this->_redirect('*/*/');
    }

    public function massDeleteAction()
    {
        $students = $this->getRequest()->getParam('student', null);

        if (is_array($students) && sizeof($students) > 0) {
            try {
                foreach ($students as $id) {
                    Mage::getModel('gwstudent/student')->setId($id)->delete();
                }
                $this->_getSession()->addSuccess($this->__('Total of %d students have been deleted', sizeof($students)));
            } catch (Exception $e) {
                $this->_getSession()->addError($e->getMessage());
            }
        } else {
            $this->_getSession()->addError($this->__('Please select students'));
        }
        $this->_redirect('*/*');
    }


}


