<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/19/18
 * Time: 2:39 PM
 */

class Gwd_Extension_Model_Resource_Extension extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('gwdextension/table_extension', 'extension_id');
    }

}