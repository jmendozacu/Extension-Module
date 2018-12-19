<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/19/18
 * Time: 2:39 PM
 */

class Gwd_Extension_Model_Extension extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('gwdexsention/extension');
    }

}