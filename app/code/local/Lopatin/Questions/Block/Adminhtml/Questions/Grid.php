<?php

class Lopatin_Questions_Block_Adminhtml_Questions_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    protected function _prepareCollection()
    {
        $collection = Mage::getModel('questions/questions')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $helper = Mage::helper('lpquestions');

        $this->addColumn('block_id', array(
            'header' => $helper->__('FAQ ID'),
            'index' => 'block_id'
        ));

        $this->addColumn('name', array(
            'header' => $helper->__('Name'),
            'index' => 'name',
            'type' => 'text'
        ));

        $this->addColumn('question', array(
            'header' => $helper->__('Question'),
            'index' => 'question',
            'type' => 'text'
        ));

        $this->addColumn('answer', array(
            'header' => $helper->__('Answer'),
            'index' => 'answer',
            'type' => 'text'
        ));

        $this->addColumn('faq_date', array(
            'header' => $helper->__('Created'),
            'index' => 'faq_date',
            'type' => 'date'
        ));

        $this->addColumn('status', array(
            'header' => $helper->__('Status'),
            'index' => 'status',
        ));

        return parent::_prepareColumns();
    }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('block_id');
        $this->getMassactionBlock()->setFormFieldName('questions');

        $this->getMassactionBlock()->addItem('delete', array(
            'label' => $this->__('Delete'),
            'url' => $this->getUrl('*/*/massDelete')
        ));
        return $this;
    }
}