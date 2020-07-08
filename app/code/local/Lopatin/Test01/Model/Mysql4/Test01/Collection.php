<?php

class Lopatin_Test01_Model_Mysql4_Test01_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('test01/myfaq');
    }
}