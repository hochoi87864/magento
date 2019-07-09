<?php
$installer = $this;

$installer->startSetup();

$installer->run("
    DROP TABLE IF EXISTS {$this->getTable('fivetable_upgrade')};
    CREATE TABLE `{$this->getTable('fivetable_upgrade')}` (
    `id` int(11) unsigned NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  `test` int(11),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `{$this->getTable('fivetable_upgrade')}` VALUES (1,'Magento Course 1',9);
    ");

$installer->endSetup();