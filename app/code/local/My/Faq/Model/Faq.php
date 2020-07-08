<?php

class My_Faq_Model_Faq extends Mage_Core_Model_Abstract
{

    const STATUS_APPROVED       = 1;
    const STATUS_PENDING        = 2;
    const STATUS_NOT_APPROVED   = 3;

    public function _construct()
    {
        parent::_construct();
        $this->_init('faq/faq');
    }
}
