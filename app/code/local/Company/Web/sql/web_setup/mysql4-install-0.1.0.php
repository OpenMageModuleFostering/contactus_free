<?php

$installer = $this;

$installer->startSetup();

$installer->run("

-- DROP TABLE IF EXISTS {$this->getTable('web')};
CREATE TABLE {$this->getTable('web')} (
  `web_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `smtp_server` varchar(255) NOT NULL DEFAULT '',
  `smtp_port` int(100) NOT NULL,
  `smtp_user` varchar(255) NOT NULL,
  `smtp_pass` varchar(255) NOT NULL,
  `success_msg` varchar(255) NOT NULL,
  `err_msg` varchar(255) NOT NULL,
  `to_address` varchar(200) NOT NULL,
  `from_address` varchar(200) NOT NULL,
  `bcc_address` varchar(200) NOT NULL,
  `email_sub` varchar(200) NOT NULL,
  `name_val` varchar(255) NOT NULL,
  `name_err` varchar(200) NOT NULL,
  `sur_val` varchar(255) NOT NULL,
  `sur_err` varchar(200) NOT NULL,
  `cont_val` varchar(255) NOT NULL,
  `err_cont` varchar(200) NOT NULL,
  `msg_val` varchar(255) NOT NULL,
  `msg_err` varchar(200) NOT NULL,
  `email_val` varchar(255) NOT NULL,
  `email_err_val` varchar(200) NOT NULL,
  `en_recaptcha` varchar(255) NOT NULL,
  `pub_key` varchar(255) NOT NULL,
  `pr_key` varchar(255) NOT NULL,
  `recaptcha_theme` varchar(255) NOT NULL,
  `incorrect_captcha` varchar(200) NOT NULL,
  `created_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`web_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

    ");

$installer->endSetup();  