<?php

class Lopatin_Questions_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $layoutHandles = $this->getLayout()->getUpdate()->getHandles();
        echo '<pre>' . print_r($layoutHandles, true) . '</pre>';
        $this->renderLayout();
    }
}