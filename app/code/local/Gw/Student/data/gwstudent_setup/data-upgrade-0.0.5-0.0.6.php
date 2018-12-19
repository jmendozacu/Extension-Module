<?php


$studentCollection = Mage::getModel('gwstudent/student')->getCollection();
foreach ($studentCollection as $student) {
    try {
        $student
            ->setLink($student->getFirstName())
            ->save();
    } catch (Exception $e) {
        Mage::log('error', null, 'testlog.txt');
    }
}