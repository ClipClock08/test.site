<?php
class My_FAQ_Block_Adminhtml_FAQ_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{

    protected function _prepareForm()
    {
        $helper = Mage::helper('myfaq');
        $model = Mage::registry('current_faq');
        $form = new Varien_Data_Form(array(
            'id' => 'edit_form',
            'action' => $this->getUrl('*/*/save', array(
                'id' => $this->getRequest()->getParam('id')
            )),
            'method' => 'post',
            'enctype' => 'multipart/form-data'
        ));
        $this->setForm($form);
        $fieldset = $form->addFieldset('myfaq_form', array('legend' => $helper->__('FAQ Information')));
        $fieldset->addField('title', 'text', array(
            'label' => $helper->__('Title'),
            'required' => true,
            'name' => 'title',
        ));

        $fieldset->addField('header_h1', 'text', array(
            'label' => $helper->__('Header H1'),
            'required' => true,
            'name' => 'header_h1',
        ));
        $fieldset->addField('meta_tag_keywords', 'text', array(
            'label' => $helper->__('Keywords (SEO)'),
            'required' => true,
            'name' => 'meta_tag_keywords',
        ));
        $fieldset->addField('meta_tag_description', 'text', array(
            'label' => $helper->__('Description (SEO)'),
            'required' => true,
            'name' => 'meta_tag_description',
        ));
        $fieldset->addField('preview', 'editor', array(
            'label' => $helper->__('Preview'),
            'required' => true,
            'name' => 'preview',
        ));
        $fieldset->addField('content', 'editor', array(
            'label' => $helper->__('Content'),
            'wysiwyg' => true,
            'required' => true,
            'config' => Mage::getSingleton('cms/wysiwyg_config'),
            'name' => 'content',
        ));
        $fieldset->addField('created', 'date', array(
            'format' => Mage::app()->getLocale()->getDateFormat(Mage_Core_Model_Locale::FORMAT_TYPE_SHORT),
            'image' => $this->getSkinUrl('images/grid-cal.gif'),
            'label' => $helper->__('Created'),
            'name' => 'created'
        ));
        $form->setUseContainer(true);
        if($data = Mage::getSingleton('adminhtml/session')->getFormData()){
            $form->setValues($data);
        } else {
            $form->setValues($model->getData());
        }
        return parent::_prepareForm();
    }
}
