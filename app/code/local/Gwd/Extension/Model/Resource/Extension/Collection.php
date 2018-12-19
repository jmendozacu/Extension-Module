<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/19/18
 * Time: 2:39 PM
 */

class Gwd_Extension_Model_Resource_Extension_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('gwdextension/extension');
    }

}