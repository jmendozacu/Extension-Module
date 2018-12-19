<?php

class Gwd_Extension_Block_Extension extends Mage_Core_Block_Template
{

    public function getExtensionCollection()
    {
        $collection = Mage::getModel('gwdextension/extension')->getCollection();
        return $collection;
    }

}