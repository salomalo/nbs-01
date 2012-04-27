-- 26/04/2012 - muinx - alter table location (add catid)
ALTER TABLE  `jos_retal_location` ADD  `catid` INT NOT NULL AFTER  `alias`

-- 27/04/2012 - muinx - alter table arpartment (add images field)
ALTER TABLE  `jos_rental_apartments` ADD  `images` LONGTEXT NOT NULL AFTER  `ordering`

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