<?php

class My_FAQ_Block_Adminhtml_FAQ_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

    protected function _prepareCollection()
    {
        $collection = Mage::getModel("myfaq/faq")->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $helper = Mage::helper('myfaq');
        $this->addColumn('id', array(
            'header' => $helper->__('FAQ ID'),
            'width' => '50px',
            'index' => 'id'
        ));
        $this->addColumn('name', array(
            'header' => $helper->__('Name'),
            'index' => 'name',
            'type' => 'text',
        ));
        $this->addColumn('question', array(
            'header' => $helper->__('Question'),
            'index' => 'question',
            'type' => 'text',
        ));
        $this->addColumn('answer', array(
            'header' => $helper->__('Answer'),
            'index' => 'answer',
            'type' => 'text',
        ));
        $this->addColumn('created', array(
            'header' => $helper->__('Created'),
            'index' => 'created',
            'type' => 'date',
        ));
        $this->addColumn('status', array(
            'header' => $helper->__('Status'),
            'index' => 'status',
            'type' => 'text',
        ));
        return parent::_prepareColumns();
    }


    public function getRowUrl($model)
    {
        return $this->getUrl('*/*/edit', array(
            'id' => $model->getId(),
        ));
    }


    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('id');
        $this->getMassactionBlock()->setFormFieldName('faq');
        $this->getMassactionBlock()->addItem('delete', array(
            'label' => $this->__('Delete'),
            'url' => $this->getUrl('*/*/massDelete'),
        ));
        return $this;
    }
}