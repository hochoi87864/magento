<?php
$installer = $this;

$installer->startSetup();

$installer->run("
 
DROP TABLE IF EXISTS `{$this->getTable('department')}`;
CREATE TABLE `{$this->getTable('department')}` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `{$this->getTable('department')}` VALUES (1,'CNTT');
");

$installer->endSetup();
