<?php

class Gwd_Extension_Model_Resource_Extension extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {
        $this->_init('gwdextension/table_extension', 'extension_id');
    }
}