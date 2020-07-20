<?php

class Lopatin_Questions_Block_Adminhtml_Questions_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    protected function _construct()
    {
        $this->_blockGroup = 'lpquestions';
        $this->_controller = 'adminhtml_questions';
    }

    public function getHeaderText()
    {
        $helper = Mage::helper('lpquestions');
        $model = Mage::registry('current_faq');
        if ($model->getId()) {
            return $helper->__("Edit questions item '%s'", $this->escapeHtml($model->getQuestion()));
        } else {
            return $helper->__("Add FAQ item");
        }
    }

}