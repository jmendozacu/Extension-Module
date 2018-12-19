<?php


class Gw_Student_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {

        $this->loadLayout();
        $this->renderLayout();

    }

    public function viewAction()
    {


        $studentId = Mage::app()->getRequest()->getParam('id', 0);
        $students = Mage::getModel('gwstudent/student')->load($studentId);



        if ($students->getId()>0) {
            $this->loadLayout();
            $this->getLayout()->getBlock('student.content')->assign(array(
                "studentsItem" => $students,
            )
            );
            $this->renderLayout();
        } else {
            $this->_forward('noRoute');
        }
    }

}


//    public function indexAction()
//    {
//
//
//
//        $students = Mage::getModel('gwstudent/student')->getCollection()->setOrder('created', 'DESC');
//
//        $viewUrl = Mage::getUrl('students/index/view');
//
//        echo '<h1>Students</h1>';
//
//
//
//
//        foreach ($students as $item) {
////            echo '<pre>';
//////            var_dump($students->getData());
////            var_dump($item->getData());
////            var_dump($item->getData('first_name'));
////            var_dump($item->getFirstName());
////            echo '<pre>';
////            die();
//
//            echo '<h2><a href="' . $viewUrl . '?id=' . $item->getId() . '">' . $item->getFirstName() . '</a></h2>';
//
//        }
//
//
//    }
//
//    public function viewAction()
//    {
//        $studentsId = Mage::app()->getRequest()->getParam('id', 0);
//        $students = Mage::getModel('gwstudent/student')->load($studentsId);
//
//        if ($students->getId() > 0) {
//            echo '<h1>' . $students->getTitle() . '</h1>';
//            echo '<div class="content">' . $students->getContent() . '</div>';
//        } else {
//            $this->_forward('noRoute');
//        }


//    public function indexAction()
//    {
//        $resource = Mage::getSingleton('core/resource');
//        $read = $resource->getConnection('core_read');
//        $table = $resource->getTableName('gwstudent/table_student');
//
//        $select = $read->select()
//            ->from($table, array('id', 'first_name', 'last_name','comment' ,'photo','created'))
//            ->order('created DESC');
//
//        $students = $read->fetchAll($select);
//        Mage::register('students', $students);
//
//        $this->loadLayout();
//        $this->renderLayout();
//    }
//}



