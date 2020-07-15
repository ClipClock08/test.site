<?php

class My_FAQ_OtherController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        echo 'Other action';
        $i = 2;
        echo $i;

    }

    public function addAction()
    {
        echo 'add Action';
    }

    public function deleteAction()
    {
        echo 'delete Action';
    }

    public function getConfigAction()
    {
        Mage::app()->getConfig()->saveConfig('faq/test/module_status','1');
        $inputVal1 = Mage::getStoreConfig('faq/test/module_status');
        $inputVal2 = Mage::getStoreConfig('faq/test/module_text');
        var_dump($inputVal1);
        var_dump($inputVal2);
        die('Test');
    }

}