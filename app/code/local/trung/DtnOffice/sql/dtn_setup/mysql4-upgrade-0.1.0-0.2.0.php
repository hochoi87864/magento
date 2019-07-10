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
DROP TABLE IF EXISTS `{$this->getTable('employee')}`;
CREATE TABLE `{$this->getTable('employee')}` (
    `id` int(11) unsigned NOT NULL auto_increment,
    `department_id` int unsigned not null,
    `email` varchar(255) not null,
    `firstname` varchar(255) not null,
    `lastname` varchar(255) not null,
    `working_years` int ,
    `dob` DATETIME,
    `salary` float,
    `note` text,
    PRIMARY KEY (`id`),
     FOREIGN KEY (department_id)  REFERENCES department (id) 
) ENGINE= InnoDB DEFAULT CHARSET=utf8;
");
$installer->endSetup();