<?php

class My_Faq_Model_Resource_Mfaq extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {
        // TODO: Implement _construct() method.
        $this->_init('faq/mfaq', 'block_id');
    }
}
