<?php

class Lopatin_Questions_Block_Adminhtml_Questions extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    protected function _construct()
    {
        parent::_construct();
        $helper = Mage::helper('lpquestions');
        $this->_blockGroup = 'lpquestions';
        $this->_controller = 'adminhtml_questions';

        $this->_headerText = $helper->__('FAQ Management');
        $this->_addButtonLabel = $helper->__('Add Faq');
    }
}