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
}