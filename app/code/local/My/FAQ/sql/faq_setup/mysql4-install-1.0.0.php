<?php
$installer = $this;
$installer->startSetup();
$installer->run("-- DROP TABLE IF EXISTS {$this->getTable('my_faq')};
    CREATE TABLE {$this->getTable('my_faq')} (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT, 
    `name` VARCHAR(255) NOT NULL,
    `question` VARCHAR(255) NOT NULL,
    `answer` TEXT NOT NULL, 
    `faq_date` DATETIME,
    `status` ENUM('processing','canceled','approved') DEFAULT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;"
);
$installer->endSetup();