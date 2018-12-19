<?php
class Gw_OrderExport_Model_Observer
{
    public function sendOrderEmails(Varien_Event_Observer $event){

        $order = $event->getOrder();

        $emailTemplate  = Mage::getModel('core/email_template');

        $emailTemplate->loadDefault('custom_order_tpl');
        $emailTemplate->setTemplateSubject('Your order was successful');

        $emailTemplate->setSenderEmail('example@hmail.com');
        $emailTemplate->setSenderName('sendertest');//отправитель

        $config = Mage::getStoreConfig('tab1/general/text_field');
        $emailTemplateVariables['order_id'] = $order->getIncrementId();;
        /** @var Mage_Core_Model_Email_Template $emailTemplate  */
        try {
            $emailTemplate->send($config, 'test', $emailTemplateVariables);
        }catch (Exception $e) {
            echo $e->getMessage();
        }





//        $orderIds = $observer->getData('order_ids');
//        // Transactional Email Template's ID
//        $templateId = 1;
//
//        // Set sender information
//        $senderName = Mage::getStoreConfig('trans_email/ident_support/name');
//        $senderEmail = Mage::getStoreConfig('trans_email/ident_support/email');
//        $sender = array('name' => $senderName,
//            'email' => $senderEmail);
//
//        // Set recepient information
//        $recepientEmail = 'dimapetrenko.in@gmail.com';
//        $recepientName = 'John Doe';
//
////        // Get Store ID
//        $store = Mage::app()->getStore()->getId();
//
//        // Set variables that can be used in email template
//        $vars = array('customerName' => 'customer@example.com',
//            'customerEmail' => 'Mr. Nil Cust');
//
//        $translate  = Mage::getSingleton('core/translate');
//
//        // Send Transactional Email
//        Mage::getModel('core/email_template')
//            ->sendTransactional($templateId, $sender, $recepientEmail, $recepientName, $vars, $store, $orderIds);
//
//        $translate->setTranslateInline(true);

    }
}