<?php

class My_FAQ_Block_Adminhtml_FAQ_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

    public function __construct()
    {
        parent::__construct();

        $this->setDefaultSort('id');
        $this->setId('faq_faq_grid');
        $this->setDefaultDir('asc');
        $this->setSaveParametersInSession(true);
    }

    protected function _getCollectionClass(){
        return 'faq/faq_collection';
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getResourceModel($this->_getCollectionClass());
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn('id', array(
            'header' => $this->__('FAQ ID'),
            'width' => '50px',
            'index' => 'id'
        ));
        $this->addColumn('name', array(
            'header' => $this->__('Name'),
            'index' => 'name',
            'type' => 'text',
        ));
        $this->addColumn('question', array(
            'header' => $this->__('Question'),
            'index' => 'question',
            'type' => 'text',
        ));
        $this->addColumn('answer', array(
            'header' => $this->__('Answer'),
            'index' => 'answer',
            'type' => 'text',
        ));
        $this->addColumn('created', array(
            'header' => $this->__('Created'),
            'index' => 'created',
            'type' => 'date',
        ));
        $this->addColumn('status', array(
            'header' => $this->__('Status'),
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