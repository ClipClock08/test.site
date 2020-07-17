<?php

class Lopatin_Questions_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function viewAction()
    {
        $questionID = Mage::app()->getRequest()->getParam('id', 0);
        $question = Mage::getModel('questions/questions')->load($questionID);

        if ($question->getBlockID() > 0) {
            $this->loadLayout();
            $this->getLayout()->getBlock('questions.content')->assign(array(
                "questionItem" => $question,
            ));
            $this->renderLayout();
        } else {
            $this->_forward('noRoute');
        }

    }
}