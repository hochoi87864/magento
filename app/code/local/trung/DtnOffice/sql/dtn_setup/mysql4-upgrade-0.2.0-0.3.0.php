<?php


$installer = $this;

$installer->startSetup();

$installer->run("
    ALTER TABLE employee add create_at datetime;
    ALTER TABLE employee add update_at datetime;
");
$installer->endSetup();