<?php


class My_Faq_Block_Questions extends Mage_Core_Block_Template
{
    public function getQuestionsCollection()
    {
        $collection = Mage::getModel('faq/faq')->getCollection();
        $collection->setOrder('created', 'DESC');
        return $collection;
    }
}