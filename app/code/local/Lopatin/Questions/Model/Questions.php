<?php

class Lopatin_Questions_Model_Questions extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('questions/questions');

    }
}
