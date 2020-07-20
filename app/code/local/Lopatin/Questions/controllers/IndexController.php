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

    public function postAction()
    {
        $post = $this->getRequest()->getPost();
        if ($post['name'] && $post['question']) {
            try {
                $collection = Mage::getModel('questions/questions');
                $collection->setName($post['name']);
                $collection->setQuestion($post['question']);
                $collection->setFaqDate(date(now()));
                $collection->setStatus(0);
                $collection->save();
                Mage::getSingleton('core/session')->addSuccess('Your question was submitted and will be responded to as soon as possible. Thank you for contacting us.');
                $this->_redirect('*/*/');
                return;
            } catch (Exception $e) {
                Mage::getSingleton('core/session')->addError('Unable to submit your request. Please, try again later');
                $this->_redirect('*/*/');
                return;
            }
        } else {
            $this->_redirect('*/*/');
        }
    }
}