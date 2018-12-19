<?php
/** @var Mage_Core_Block_Template $this */
class Gw_Student_Block_Student extends Mage_Core_Block_Template
{

    public function getStudentCollection()
    {

        $studentsCollection = Mage::getModel('gwstudent/student')->getCollection();

        $studentsCollection->setOrder('created', 'DESC');

        return $studentsCollection;
    }
}



