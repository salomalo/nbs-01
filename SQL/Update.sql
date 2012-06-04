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