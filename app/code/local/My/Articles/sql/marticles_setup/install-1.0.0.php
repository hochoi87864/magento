<?php
$installer = $this;
$installer->startSetup();
$installer->run("CREATE TABLE my_articles (
      `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
      `title` VARCHAR(255) NOT NULL,
      `header_h1` VARCHAR(255) NOT NULL,
      `meta_tag_keywords` VARCHAR(255) NOT NULL,
      `meta_tag_description` VARCHAR(255) NOT NULL,
      `image` VARCHAR(255) NOT NULL,
      `preview` TEXT NOT NULL,
      `content` TEXT NOT NULL,
      `created` DATETIME,
      PRIMARY KEY (`id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
$installer->endSetup();