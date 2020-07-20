<?php

class Lopatin_Questions_Block_Questions extends Mage_Core_Block_Template
{
    /* public function getQuestionsCollection()
     {
         return $questions = Mage::getModel('questions/questions')->getCollection()
             ->addFieldToFilter('status', 1)->setOrder('faq_date', 'DESC')->setPageSize(5);
     }*/

    public function __construct()
    {
        parent::__construct();
        $collection = Mage::getModel('questions/questions')->getCollection()->addFieldToFilter('status', 1)->setOrder('faq_date', 'DESC');
        $this->setCollection($collection);
    }

    protected function _prepareLayout()
    {
        parent::_prepareLayout();

        $pager = $this->getLayout()->createBlock('page/html_pager', 'custom.pager');
        $pager->setAvailableLimit(array(5 => 5, 10 => 10, 20 => 20, 'all' => 'all'));
        $pager->setCollection($this->getCollection());
        $this->setChild('pager', $pager);
        $this->getCollection()->load();
        return $this;
    }

    public function getPagerHtml()
    {
        return $this->getChildHtml('pager');
    }
}