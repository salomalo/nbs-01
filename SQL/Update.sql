-- 26/04/2012 - muinx - alter table location (add catid)
ALTER TABLE  `jos_retal_location` ADD  `catid` INT NOT NULL AFTER  `alias`;

-- 27/04/2012 - muinx - alter table arpartment (add images field)
ALTER TABLE  `jos_rental_apartments` ADD  `images` LONGTEXT NOT NULL AFTER  `ordering`;

-- 27/04/2012 - muinx - delete all fields that not neccessary
ALTER TABLE  `jos_retal_apartment_amenities` DROP  `id` ,
DROP  `state` ,
DROP  `ordering` ,
DROP  `metakey` ,
DROP  `metadesc` ,
DROP  `created` ,
DROP  `created_by` ,
DROP  `modified` ,
DROP  `modified_by` ,
DROP  `checked_out` ,
DROP  `checked_out_time` ,
DROP  `publish_up` ,
DROP  `publish_down` ,
DROP  `language` ;

-- 18/05/2012 - muinx - alter table agent
ALTER TABLE  `jos_retal_agents` ADD  `bio` TEXT NOT NULL AFTER  `country`;

-- 30/05/2012 - thaiht - alter table agent
ALTER TABLE  `jos_rental_apartments` ADD  `latitude` VARCHAR(200) NOT NULL AFTER  `country`;
ALTER TABLE  `jos_rental_apartments` ADD  `longitude` VARCHAR(200) NOT NULL AFTER  `country`;

-- 04/06/2012 - muinx - add table renter
DROP TABLE IF EXISTS `jos_rental_renters`;
CREATE TABLE IF NOT EXISTS `jos_rental_renters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `apartment_size` text,
  `neighborhood_ids` text,
  `max_rent` float(11,2) DEFAULT NULL,
  `have_a_pet` tinyint(1) DEFAULT NULL,
  `roommate` tinyint(1) DEFAULT NULL,
  `email_alert` varchar(255) DEFAULT NULL,
  `financial_info` text,
  `more_info` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 12/06/2012 - muinx - update agents table
DROP TABLE IF EXISTS `jos_retal_agents`;
CREATE TABLE IF NOT EXISTS `jos_retal_agents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `phone_area` varchar(255) DEFAULT NULL,
  `phone_prefix` varchar(255) DEFAULT NULL,
  `phone_sufix` varchar(255) DEFAULT NULL,
  `broker_entity_type` tinyint(1) DEFAULT NULL,
  `brocker_entity_info` longtext,
  `months_per_billing_cycle` tinyint(1) DEFAULT NULL,
  `credit_card_type` varchar(255) DEFAULT NULL,
  `credit_card_number` varchar(255) DEFAULT NULL,
  `credit_card_first_name` varchar(255) DEFAULT NULL,
  `credit_card_last_name` varchar(255) DEFAULT NULL,
  `credit_card_month` varchar(255) DEFAULT NULL,
  `credit_card_year` varchar(255) DEFAULT NULL,
  `credit_card_verification_value` varchar(3) DEFAULT NULL,
  `billing_address_address` varchar(255) DEFAULT NULL,
  `billing_address_zip` varchar(255) DEFAULT NULL,
  `neighborhood_ids` text,
  `broker_bio` text,
  `state` tinyint(3) NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `metakey` text NOT NULL,
  `metadesc` text NOT NULL,
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(10) unsigned NOT NULL DEFAULT '0',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `language` char(7) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Set user is agent' AUTO_INCREMENT=2 ;