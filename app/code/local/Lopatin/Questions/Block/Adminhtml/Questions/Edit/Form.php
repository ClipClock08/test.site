<?php

class Lopatin_Questions_Block_Adminhtml_Questions_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        $helper = Mage::helper('lpquestions');
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

        $fieldset = $form->addFieldset('faq_form', array('legend' => $helper->__('FAQ information')));

        $fieldset->addField('name', 'text', array(
            'label' => $helper->__('Name'),
            'required' => true,
            'name' => 'name'
        ));

        $fieldset->addField('question', 'text', array(
            'label' => $helper->__('Question'),
            'required' => true,
            'name' => 'question'
        ));


        $fieldset->addField('answer', 'editor', array(
            'label' => $helper->__('Answer'),
            'required' => true,
            'name' => 'answer'
        ));

        $fieldset->addField('faq_date', 'date', array(
            'format' => Mage::app()->getLocale()->getDateFormat(Mage_Core_Model_Locale::FORMAT_TYPE_SHORT),
            'label' => $helper->__('Created'),
            'image' => $this->getSkinUrl('images/grid-cal.gif'),
            'name' => 'faq_date'
        ));

        $fieldset->addField('status', 'select', array(
            'label' => $helper->__('Status'),
            'required' => true,
            'name' => 'status',
            'type' => 'options',
            'options' => Mage::getModel('questions/source_myoptions')->toArray()
        ));

        $form->setUseContainer(true);

        if ($data = Mage::getSingleton('adminhtml/session')->getFormData()) {
            $form->setValues($data);
        } else {
            $form->setValues($model->getData());
        }
        return parent::_prepareForm();
    }
}
