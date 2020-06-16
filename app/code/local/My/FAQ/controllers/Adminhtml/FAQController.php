<?php

class My_FAQ_Adminhtml_FAQController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->loadLayout();

        $this->_setActiveMenu('myfaq');

        $contentBlock = $this->getLayout()->createBlock('my_faq_block/adminhtml_faq');

        $this->_addContent($contentBlock);

        $this->renderLayout();
    }

    public function newAction()
    {
        $this->_forward('edit');
    }

    public function editAction()
    {

        $id = (int)$this->getRequest()->getParam('id');

        $model = Mage::getModel('myfaq/faq')->load($id);

        Mage::register('current_faq', $model);

        $this->loadLayout()->_setActiveMenu('myfaq');

        $layout = $this->getLayout()->createBlock('my_faq_block/adminhtml_articles_edit');

        $this->_addContent($layout);

        $this->renderLayout();
    }

    public function saveAction()
    {

        if ($data = $this->getRequest()->getPost()) {
            try {
                $helper = Mage::helper('myfaq');

                $model = Mage::getModel('myfaq/faq');

                $model->setData($data)->setId($this->getRequest()->getParam('id'));


                if (!$model->getCreated()) {
                    $model->setCreated(now());
                }

                $model->save();

                Mage::getSingleton('adminhtml/session')->addSuccess($this->__('FAQ was saved successfully'));
                Mage::getSingleton('adminhtml/session')->setFormData(false);

                $this->_redirect('*/*/');
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                Mage::getSingleton('adminhtml/session')->setFormData($data);
                $this->_redirect('*/*/edit', [
                    'id' => $this->getRequest()->getParam('id')
                ]);
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
                Mage::getModel('myfaq/faq')->setId($id)->delete();
                Mage::getSingleton('adminhtml/session')->addSuccess($this->__('FAQ post was deleted successfully'));
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                $this->_redirect('*/*/edit', array('id' => $id));
            }
        }
        $this->_redirect('*/*/');
    }

    public function massDeleteAction()
    {

        $faq = $this->getRequest()->getParam('faq', null);

        if (is_array($faq) && sizeof($faq) > 0) {
            try {
                foreach ($faq as $id) {
                    Mage::getModel('myfaq/faq')->setId($id)->delete();
                }
                $this->_getSession()->addSuccess($this->__('Total of %d FAQs have been deleted', sizeof($faq)));
            } catch (Exception $e) {
                $this->_getSession()->addError($e->getMessage());
            }
        } else {
            $this->_getSession()->addError($this->__('Please select faq'));
        }
        $this->_redirect('*/*');
    }
}
