<?php

class My_FAQ_Model_Resource_FAQ extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {
        $this->_init('myfaq/table_myfaq', 'id');
    }
}
