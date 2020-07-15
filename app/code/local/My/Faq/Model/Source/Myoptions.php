<?php

class My_Faq_Model_Source_Myoptions
{


    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return array(
            array('value' => 0, 'label' => Mage::helper('adminhtml')->__('First option')),
            array('value' => 1, 'label' => Mage::helper('adminhtml')->__('Second option')),
            array('value' => 2, 'label' => Mage::helper('adminhtml')->__('Third option')),
            array('value' => 3, 'label' => Mage::helper('adminhtml')->__('Fourth option')),
            array('value' => 4, 'label' => Mage::helper('adminhtml')->__('Fifth option'))
        );
    }

}
