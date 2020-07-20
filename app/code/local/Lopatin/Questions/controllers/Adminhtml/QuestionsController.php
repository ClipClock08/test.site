<?php

class Lopatin_Questions_Adminhtml_QuestionsController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->loadLayout()->_setActiveMenu('lpquestions');
        $this->_addContent($this->getLayout()->createBlock('lpquestions/adminhtml_questions'));
        $this->renderLayout();
    }

    public function newAction()
    {
        $this->_forward('edit');
    }

    public function editAction()
    {
        $id = $this->getRequest()->getParam('id');
        Mage::register('current_faq', Mage::getModel('questions/questions')->load($id));
        $this->loadLayout()->_setActiveMenu('lpquestions');
        $this->_addContent($this->getLayout()->createBlock('lpquestions/adminhtml_questions_edit'));
        $this->renderLayout();
    }

    public function saveAction()
    {
        if ($data = $this->getRequest()->getPost()) {
            try {
                $model = Mage::getModel('questions/questions');
                $model->setData($data)->setId($this->getRequest()->getParam('id'));
                if (!$model->getCreated()) {
                    $model->setCreated(now());
                }
                $model->save();
                Mage::getSingleton('adminhtml/session')->addSuccess($this->__('Faq was saved successfully'));
                Mage::getSingleton('adminhtml/session')->setFormData(false);
                $this->_redirect('*/*/');
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                Mage::getSingleton('adminhtml/session')->setFormData($data);
                $this->_redirect('*/*/edit', array(
                    'id' => $this->getRequest()->getParam('id')
                ));
            }
            return;
        }
        Mage::getSingleton('adminhtml/session')->addError($this->__('Unable to find item to save'));
        $this->_redirect('*/*/');
    }

    public function deleteAction()
    {
        if ($id = $this->getRequest()->getParam('id')) {
            try {
                Mage::getModel('questions/questions')->setId($id)->delete();
                Mage::getSingleton('adminhtml/session')->addSuccess($this->__('FAQ was deleted successfully'));
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                $this->_redirect('*/*/edit', array('id' => $id));
            }
        }
        $this->_redirect('*/*/');
    }

    public function massDeleteAction()
    {
        $questions = $this->getRequest()->getParam('questions', null);
        if (is_array($questions) && sizeof($questions) > 0) {
            try {
                foreach ($questions as $question) {
                    Mage::getModel('questions/questions')->setId($question)->delete();
                }
                $this->_getSession()->addSuccess($this->__('Total of %d questions have been deleted', sizeof($questions)));
            } catch (Exception $e) {
                $this->_getSession()->addError($this->__('Error text : ' . $e->getMessage()));
            }
        } else {
            $this->_getSession()->addError($this->__('Select record for deleting'));
        }
        $this->_redirect('*/*');
    }
}