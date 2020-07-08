<?php

class Lopatin_Test_FooController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        echo 'i`m foo';
    }

    public function addAction()
    {
        echo 'i`m add';
    }

    public function saveAction()
    {
        echo '<dl>';
        foreach($this->getRequest()->getParams() as $key=>$value) {
            echo '<dt><strong>Param:</strong>'.$key.'</dt>';
            echo '<dt><strong>Value: </strong>'.$value.'</dt>';
        }
        echo '</dl>';
        $base_path = Mage::getBaseDir('base');
        var_dump($base_path);

        $etc_path = Mage::getBaseDir('etc');
        var_dump($etc_path);
    }
}