<?php

class Lopatin_Questions_Block_Questions extends Mage_Core_Block_Template
{
    public function getQuestionsCollection()
    {
        return $questions = Mage::getModel('questions/questions')->getCollection()->setOrder('faq_date', 'DESC');
    }
}