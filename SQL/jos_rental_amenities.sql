/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50133
Source Host           : localhost:3306
Source Database       : nbs_01

Target Server Type    : MYSQL
Target Server Version : 50133
File Encoding         : 65001

Date: 2012-05-03 11:56:21
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `jos_rental_amenities`
-- ----------------------------
DROP TABLE IF EXISTS `jos_rental_amenities`;
CREATE TABLE `jos_rental_amenities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `description` text NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COMMENT='Amenities';

-- ----------------------------
-- Records of jos_rental_amenities
-- ----------------------------
INSERT INTO `jos_rental_amenities` VALUES ('1', 'Business Center', '', '', '1', '1', '', '', '2012-05-03 04:43:51', '42', '2012-05-03 04:46:58', '42', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');
INSERT INTO `jos_rental_amenities` VALUES ('2', 'Controlled Access Gates', '', '', '1', '2', '', '', '2012-05-03 04:47:01', '42', '0000-00-00 00:00:00', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');
INSERT INTO `jos_rental_amenities` VALUES ('3', 'Covered Parking', '', '', '1', '3', '', '', '2012-05-03 04:47:10', '42', '0000-00-00 00:00:00', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');
INSERT INTO `jos_rental_amenities` VALUES ('4', 'Elevator', '', '', '1', '4', '', '', '2012-05-03 04:47:16', '42', '0000-00-00 00:00:00', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');
INSERT INTO `jos_rental_amenities` VALUES ('5', 'Fitness Center', '', '', '1', '5', '', '', '2012-05-03 04:47:21', '42', '0000-00-00 00:00:00', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');
INSERT INTO `jos_rental_amenities` VALUES ('6', 'High Speed Internet', '', '', '1', '6', '', '', '2012-05-03 04:47:26', '42', '0000-00-00 00:00:00', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');
INSERT INTO `jos_rental_amenities` VALUES ('7', 'Laundry Facilities', '', '', '1', '7', '', '', '2012-05-03 04:47:32', '42', '0000-00-00 00:00:00', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');
INSERT INTO `jos_rental_amenities` VALUES ('8', 'Pool/Sauna/Jacuzzi', '', '', '1', '8', '', '', '2012-05-03 04:47:37', '42', '0000-00-00 00:00:00', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');
INSERT INTO `jos_rental_amenities` VALUES ('9', 'Dishwasher', '', '', '1', '9', '', '', '2012-05-03 04:48:32', '42', '0000-00-00 00:00:00', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');
INSERT INTO `jos_rental_amenities` VALUES ('10', 'Fireplace', '', '', '1', '10', '', '', '2012-05-03 04:48:36', '42', '0000-00-00 00:00:00', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');
INSERT INTO `jos_rental_amenities` VALUES ('11', 'Furnished Apartment', '', '', '1', '11', '', '', '2012-05-03 04:48:41', '42', '0000-00-00 00:00:00', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');
INSERT INTO `jos_rental_amenities` VALUES ('12', 'Intrusion Alarms', '', '', '1', '12', '', '', '2012-05-03 04:48:46', '42', '0000-00-00 00:00:00', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');
INSERT INTO `jos_rental_amenities` VALUES ('13', 'Private Patio/Balcony', '', '', '1', '13', '', '', '2012-05-03 04:48:52', '42', '0000-00-00 00:00:00', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');
INSERT INTO `jos_rental_amenities` VALUES ('14', 'Washer/Dryer Included', '', '', '1', '14', '', '', '2012-05-03 04:48:57', '42', '0000-00-00 00:00:00', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');
INSERT INTO `jos_rental_amenities` VALUES ('15', 'Some Paid Utilities', '', '', '1', '15', '', '', '2012-05-03 04:49:04', '42', '0000-00-00 00:00:00', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');
INSERT INTO `jos_rental_amenities` VALUES ('16', 'Smoke Free', '', '', '1', '16', '', '', '2012-05-03 04:49:09', '42', '0000-00-00 00:00:00', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');
