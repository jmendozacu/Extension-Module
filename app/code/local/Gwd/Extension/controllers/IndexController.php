<?php

class Gwd_Extension_IndexController extends Mage_Core_Controller_Front_Action
{

    public function indexAction()
    {

        $this->loadLayout();
        $this->renderLayout();

        $collection = Mage::getModel('gwdextension/extension')->getCollection();


//        foreach ($collection as $value){
//            echo '<h1>'.$value. '</h1>>';
//        }
    }

}