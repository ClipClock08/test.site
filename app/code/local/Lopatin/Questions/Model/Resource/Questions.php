<?php

class Lopatin_Questions_Model_Resource_Questions extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {
        $this->_init('questions/table_question', 'block_id');
    }
}