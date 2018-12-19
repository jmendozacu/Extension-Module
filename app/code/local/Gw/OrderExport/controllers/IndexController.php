<?php

class Gw_OrderExport_IndexController extends Mage_Core_Controller_Front_Action
{

    public function indexAction()
    {

        $this->loadLayout();
        $this->renderLayout();

    }

    public function ajaxAction()
    {


        // $_POST['test'] == Mage::app()->getRequest()->getParam('test')

        $id = $_POST['value'];

//        $id = Mage::app()->getRequest()->getParam('value1');
        $products = Mage::getModel('catalog/product')->load($id);


        echo json_encode($products->getPrice());

//
//        echo json_encode('hjj');

    }
}



































//$mail = mail("dimapetrenko.in@gmail.com","Hello","Text12121212");
//        if($mail = true)
//            echo "message Sended";




/**
 *
 *         $session =



Mage::dispatchEvent('init_from_order_session_quote_initialized',
array('session_quote' => $session));

 *
 *
 */

//
//        try{
//
//            $customerid = ('15');
//            $orderid = ('123');
////            $myconfig = $this->auth = array('user' => 'username', 'password' => 'password', 'type' => 'basic');
//            $client = new Varien_Http_Client('http://www.example.com/');
//
//            $client->setMethod(Varien_Http_Client::POST);
//            $client->setParameterPost('senddata1', $customerid);
//            $client->setParameterPost('senddata2', $orderid);
//
//            try{
//                $response = $client->request();
//                if ($response->isSuccessful()) {
//                    echo $response->getBody();
//                }
//            } catch (Exception $e) {
//            }
//        } catch (Exception $e){
//            $e->getMessage();
//        }

//        $data = [
//            'login' => 'login',
//            'password' => 'pass',
//        ];
//        $client = new Zend_Http_Client('http://www.example.com/');
//        $client->setMethod(Zend_Http_Client::POST);
//        $client->setParameterPost($data);
//        $json = $client->request()->getBody();