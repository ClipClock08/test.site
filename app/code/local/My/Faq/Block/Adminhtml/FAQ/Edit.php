<?php
class My_FAQ_Block_Adminhtml_FAQ_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{

    protected function _prepareLayout()
    {
        parent::_prepareLayout();
        if (Mage::getSingleton('cms/wysiwyg_config')->isEnabled()) {
            $this->getLayout()->getBlock('head')->setCanLoadTinyMce(true);
        }
    }

    protected function _construct()
    {
        $this->_blockGroup = 'my_faq_block';
        $this->_controller = 'adminhtml_faq';
    }

    public function getHeaderText()
    {
        $helper = Mage::helper('myfaq');
        $model = Mage::registry('current_faq');
        if ($model->getId()) {
            return $helper->__("Edit FAQ item '%s'", $this->escapeHtml($model->getTitle()));
        } else {
            return $helper->__("Add FAQ item");
        }
    }
}