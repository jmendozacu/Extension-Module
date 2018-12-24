<?php

class Gwd_Extension_IndexController extends Mage_Core_Controller_Front_Action
{

    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function ajaxAction()
    {


        echo json_encode('ajaxAction');

        if (isset($_POST['ajaxvalue'])){
            $id = $_POST['vals'];
        }

        echo json_encode($id);

        $collection = Mage::getModel('gwdextension/extension')->getCollection();

        $limit = 5;
        $collection->setPageSize($limit);

    }
}