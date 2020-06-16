<?php
class My_FAQ_Model_FAQ extends Mage_Core_Model_Abstract{
    public function __construct()
    {
        parent::_construct();
        $this->_init('myfaq/faq');
    }
}
