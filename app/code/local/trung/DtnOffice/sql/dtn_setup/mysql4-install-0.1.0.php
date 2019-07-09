<?php
    $installer = $this;
    $installer->startSetup();
    $installer->run("
    DROP TABLE if EXISTS `{$this->getTable('department')}`;
    create  table `{$this->getTable('department')}`(
    `entity_id` int(11) unsigned not null auto_increment,
    `name` nvarchar(255) not null,
    primary key (`entity_id`)
    )ENGINE=InnoDB DEFAULT CHARSET=utf8;
    INSERT INTO `{$this->getTable('department')}` VALUES (1,'CNTT');
    ");
    $installer->endSetup();
