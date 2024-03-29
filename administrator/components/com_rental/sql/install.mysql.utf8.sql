
CREATE TABLE IF NOT EXISTS `#__rental_apartments` (
  `id` INTEGER NOT NULL AUTO_INCREMENT,
  `price` FLOAT(11,2)  NOT NULL ,
  `agent_id` INT(11)  NOT NULL ,
  `country` VARCHAR(255)  NOT NULL ,
  `location_id` INT(11)  NOT NULL ,
  `portal_code` VARCHAR(255)  NOT NULL ,
  `city` VARCHAR(255)  NOT NULL ,
  `address_2` VARCHAR(255)  NOT NULL ,
  `description` TEXT NOT NULL ,
  `address` VARCHAR(255)  NOT NULL ,
  `available_on` DATE NOT NULL ,
  `pets` VARCHAR(255)  NOT NULL ,
  `listed_for` VARCHAR(255)  NOT NULL ,
  `square_ft` FLOAT(11,2)  NOT NULL ,
  `bathrooms` FLOAT(11,2)  NOT NULL ,
  `bedrooms` FLOAT(11,2)  NOT NULL ,
  `alias` VARCHAR(255)  NOT NULL ,
  `title` VARCHAR(255)  NOT NULL ,
  `state` TINYINT(3) NOT NULL DEFAULT '0',
  `ordering` INTEGER NOT NULL DEFAULT '0',
  `metakey` TEXT NOT NULL,
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
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Store apartments';

CREATE TABLE IF NOT EXISTS `#__rental_amenities` (
  `id` INTEGER NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255)  NOT NULL ,
  `alias` VARCHAR(255)  NOT NULL ,
  `description` TEXT NOT NULL ,
  `state` TINYINT(3) NOT NULL DEFAULT '0',
  `ordering` INTEGER NOT NULL DEFAULT '0',
  `metakey` TEXT NOT NULL,
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
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Amenities';

CREATE TABLE IF NOT EXISTS `#__retal_apartment_amenities` (
  `id` INTEGER NOT NULL AUTO_INCREMENT,
  `apartment_id` INT(11)  NOT NULL ,
  `amenities_id` INT(11)  NOT NULL ,
  `state` TINYINT(3) NOT NULL DEFAULT '0',
  `ordering` INTEGER NOT NULL DEFAULT '0',
  `metakey` TEXT NOT NULL,
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
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Relationship between apartment and amenities';

CREATE TABLE IF NOT EXISTS `#__retal_apartment_images` (
  `id` INTEGER NOT NULL AUTO_INCREMENT,
  `apartment_id` INT(11)  NOT NULL ,
  `images` VARCHAR(255)  NOT NULL ,
  `alias` VARCHAR(255)  NOT NULL ,
  `title` VARCHAR(255)  NOT NULL ,
  `type` INT(1)  NOT NULL  COMMENT '',
  `state` TINYINT(3) NOT NULL DEFAULT '0',
  `ordering` INTEGER NOT NULL DEFAULT '0',
  `metakey` TEXT NOT NULL,
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
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Apartment Images';

CREATE TABLE IF NOT EXISTS `#__retal_user_favourite_apartments` (
  `id` INTEGER NOT NULL AUTO_INCREMENT,
  `apartment_id` INT(11)  NOT NULL ,
  `user_id` INT(11)  NOT NULL ,
  `state` TINYINT(3) NOT NULL DEFAULT '0',
  `ordering` INTEGER NOT NULL DEFAULT '0',
  `metakey` TEXT NOT NULL,
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
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='User favourite apartments';

CREATE TABLE IF NOT EXISTS `#__retal_user_saved_search` (
  `id` INTEGER NOT NULL AUTO_INCREMENT,
  `user_id` INT(11)  NOT NULL ,
  `search_phrase` MEDIUMTEXT NOT NULL ,
  `state` TINYINT(3) NOT NULL DEFAULT '0',
  `ordering` INTEGER NOT NULL DEFAULT '0',
  `metakey` TEXT NOT NULL,
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
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='User saved search';

CREATE TABLE IF NOT EXISTS `#__retal_agents` (
  `id` INTEGER NOT NULL AUTO_INCREMENT,
  `user_id` INT(11)  NOT NULL ,
  `first_name` VARCHAR(255)  NOT NULL ,
  `last_name` VARCHAR(255)  NOT NULL ,
  `address` VARCHAR(255)  NOT NULL ,
  `address_2` VARCHAR(255)  NOT NULL ,
  `portal_code` VARCHAR(255)  NOT NULL ,
  `city` VARCHAR(255)  NOT NULL ,
  `country` VARCHAR(255)  NOT NULL ,
  `state` TINYINT(3) NOT NULL DEFAULT '0',
  `ordering` INTEGER NOT NULL DEFAULT '0',
  `metakey` TEXT NOT NULL,
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
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Set user is agent';

CREATE TABLE IF NOT EXISTS `#__retal_user_reviews` (
  `id` INTEGER NOT NULL AUTO_INCREMENT,
  `user_id` INT(11)  NOT NULL ,
  `agent_id` INT(11)  NOT NULL ,
  `review` TEXT NOT NULL ,
  `reliability_vote` INT(11)  NOT NULL ,
  `honesty_vote` INT(11)  NOT NULL ,
  `listing_quality` INT NOT NULL ,
  `used_rent` TINYINT(1)  NOT NULL ,
  `state` TINYINT(3) NOT NULL DEFAULT '0',
  `ordering` INTEGER NOT NULL DEFAULT '0',
  `metakey` TEXT NOT NULL,
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
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Write review about agent';

CREATE TABLE IF NOT EXISTS `#__retal_location` (
  `id` INTEGER NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255)  NOT NULL ,
  `alias` VARCHAR(255)  NOT NULL ,
  `state` TINYINT(3) NOT NULL DEFAULT '0',
  `ordering` INTEGER NOT NULL DEFAULT '0',
  `metakey` TEXT NOT NULL,
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
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Location';
