<?php

class Lopatin_Questions_Model_Source_Myoptions
{

    const APPROVE = 1;
    const PROCESSING = 0;
    const CANCELED = 2;

    public function toOptionArray()
    {
        return array(
            array('value' => self::APPROVE, 'label' => Mage::helper('lpquestions')->__('approved')),
            array('value' => self::PROCESSING, 'label' => Mage::helper('lpquestions')->__('processing')),
            array('value' => self::CANCELED, 'label' => Mage::helper('lpquestions')->__('canceled'))
        );
    }

    public function toArray()
    {
        return array(
            self::APPROVE => Mage::helper('lpquestions')->__('approved'),
            self::PROCESSING => Mage::helper('lpquestions')->__('processing'),
            self::CANCELED => Mage::helper('lpquestions')->__('canceled'),
        );
    }
}