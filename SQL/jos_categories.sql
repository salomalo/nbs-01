/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50516
Source Host           : localhost:3306
Source Database       : nbs_01

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2012-04-26 11:00:24
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `jos_categories`
-- ----------------------------
DROP TABLE IF EXISTS `jos_categories`;
CREATE TABLE `jos_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `asset_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'FK to the #__assets table.',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  `lft` int(11) NOT NULL DEFAULT '0',
  `rgt` int(11) NOT NULL DEFAULT '0',
  `level` int(10) unsigned NOT NULL DEFAULT '0',
  `path` varchar(255) NOT NULL DEFAULT '',
  `extension` varchar(50) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `note` varchar(255) NOT NULL DEFAULT '',
  `description` mediumtext NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `access` int(10) unsigned NOT NULL DEFAULT '0',
  `params` text NOT NULL,
  `metadesc` varchar(1024) NOT NULL COMMENT 'The meta description for the page.',
  `metakey` varchar(1024) NOT NULL COMMENT 'The meta keywords for the page.',
  `metadata` varchar(2048) NOT NULL COMMENT 'JSON encoded metadata properties.',
  `created_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `created_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `modified_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `hits` int(10) unsigned NOT NULL DEFAULT '0',
  `language` char(7) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cat_idx` (`extension`,`published`,`access`),
  KEY `idx_access` (`access`),
  KEY `idx_checkout` (`checked_out`),
  KEY `idx_path` (`path`),
  KEY `idx_left_right` (`lft`,`rgt`),
  KEY `idx_alias` (`alias`),
  KEY `idx_language` (`language`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jos_categories
-- ----------------------------
INSERT INTO `jos_categories` VALUES ('1', '0', '0', '0', '75', '0', '', 'system', 'ROOT', 'root', '', '', '1', '0', '0000-00-00 00:00:00', '1', '{}', '', '', '', '0', '2009-10-18 16:07:09', '0', '0000-00-00 00:00:00', '0', '*');
INSERT INTO `jos_categories` VALUES ('2', '27', '1', '1', '2', '1', 'uncategorised', 'com_content', 'Uncategorised', 'uncategorised', '', '', '1', '0', '0000-00-00 00:00:00', '1', '{\"target\":\"\",\"image\":\"\"}', '', '', '{\"page_title\":\"\",\"author\":\"\",\"robots\":\"\"}', '42', '2010-06-28 13:26:37', '0', '0000-00-00 00:00:00', '0', '*');
INSERT INTO `jos_categories` VALUES ('3', '28', '1', '3', '4', '1', 'uncategorised', 'com_banners', 'Uncategorised', 'uncategorised', '', '', '1', '0', '0000-00-00 00:00:00', '1', '{\"target\":\"\",\"image\":\"\",\"foobar\":\"\"}', '', '', '{\"page_title\":\"\",\"author\":\"\",\"robots\":\"\"}', '42', '2010-06-28 13:27:35', '0', '0000-00-00 00:00:00', '0', '*');
INSERT INTO `jos_categories` VALUES ('4', '29', '1', '5', '6', '1', 'uncategorised', 'com_contact', 'Uncategorised', 'uncategorised', '', '', '1', '0', '0000-00-00 00:00:00', '1', '{\"target\":\"\",\"image\":\"\"}', '', '', '{\"page_title\":\"\",\"author\":\"\",\"robots\":\"\"}', '42', '2010-06-28 13:27:57', '0', '0000-00-00 00:00:00', '0', '*');
INSERT INTO `jos_categories` VALUES ('5', '30', '1', '7', '8', '1', 'uncategorised', 'com_newsfeeds', 'Uncategorised', 'uncategorised', '', '', '1', '0', '0000-00-00 00:00:00', '1', '{\"target\":\"\",\"image\":\"\"}', '', '', '{\"page_title\":\"\",\"author\":\"\",\"robots\":\"\"}', '42', '2010-06-28 13:28:15', '0', '0000-00-00 00:00:00', '0', '*');
INSERT INTO `jos_categories` VALUES ('6', '31', '1', '9', '10', '1', 'uncategorised', 'com_weblinks', 'Uncategorised', 'uncategorised', '', '', '1', '0', '0000-00-00 00:00:00', '1', '{\"target\":\"\",\"image\":\"\"}', '', '', '{\"page_title\":\"\",\"author\":\"\",\"robots\":\"\"}', '42', '2010-06-28 13:28:33', '0', '0000-00-00 00:00:00', '0', '*');
INSERT INTO `jos_categories` VALUES ('7', '32', '1', '11', '12', '1', 'uncategorised', 'com_users.notes', 'Uncategorised', 'uncategorised', '', '', '1', '0', '0000-00-00 00:00:00', '1', '{\"target\":\"\",\"image\":\"\"}', '', '', '{\"page_title\":\"\",\"author\":\"\",\"robots\":\"\"}', '42', '2010-06-28 13:28:33', '0', '0000-00-00 00:00:00', '0', '*');
INSERT INTO `jos_categories` VALUES ('8', '35', '1', '13', '22', '1', 'bronx', 'com_rental', 'Bronx', 'bronx', '', '', '1', '0', '0000-00-00 00:00:00', '1', '{\"category_layout\":\"\",\"image\":\"\"}', '', '', '{\"author\":\"\",\"robots\":\"\"}', '42', '2012-04-26 03:52:22', '0', '0000-00-00 00:00:00', '0', '*');
INSERT INTO `jos_categories` VALUES ('9', '36', '1', '23', '38', '1', 'brooklyn', 'com_rental', 'Brooklyn', 'brooklyn', '', '', '1', '0', '0000-00-00 00:00:00', '1', '{\"category_layout\":\"\",\"image\":\"\"}', '', '', '{\"author\":\"\",\"robots\":\"\"}', '42', '2012-04-26 03:52:30', '0', '0000-00-00 00:00:00', '0', '*');
INSERT INTO `jos_categories` VALUES ('10', '37', '1', '39', '58', '1', 'manhattan', 'com_rental', 'Manhattan', 'manhattan', '', '', '1', '0', '0000-00-00 00:00:00', '1', '{\"category_layout\":\"\",\"image\":\"\"}', '', '', '{\"author\":\"\",\"robots\":\"\"}', '42', '2012-04-26 03:52:42', '0', '0000-00-00 00:00:00', '0', '*');
INSERT INTO `jos_categories` VALUES ('11', '38', '1', '59', '72', '1', 'queens', 'com_rental', 'Queens', 'queens', '', '', '1', '0', '0000-00-00 00:00:00', '1', '{\"category_layout\":\"\",\"image\":\"\"}', '', '', '{\"author\":\"\",\"robots\":\"\"}', '42', '2012-04-26 03:52:50', '0', '0000-00-00 00:00:00', '0', '*');
INSERT INTO `jos_categories` VALUES ('12', '39', '1', '73', '74', '1', 'staten-island', 'com_rental', 'Staten Island', 'staten-island', '', '', '1', '0', '0000-00-00 00:00:00', '1', '{\"category_layout\":\"\",\"image\":\"\"}', '', '', '{\"author\":\"\",\"robots\":\"\"}', '42', '2012-04-26 03:53:19', '0', '0000-00-00 00:00:00', '0', '*');
INSERT INTO `jos_categories` VALUES ('13', '40', '8', '14', '15', '2', 'bronx/north-west', 'com_rental', 'North West', 'north-west', '', '', '1', '0', '0000-00-00 00:00:00', '1', '{\"category_layout\":\"\",\"image\":\"\"}', '', '', '{\"author\":\"\",\"robots\":\"\"}', '42', '2012-04-26 03:53:56', '0', '0000-00-00 00:00:00', '0', '*');
INSERT INTO `jos_categories` VALUES ('14', '41', '8', '16', '17', '2', 'bronx/north-east', 'com_rental', 'North East', 'north-east', '', '', '1', '0', '0000-00-00 00:00:00', '1', '{\"category_layout\":\"\",\"image\":\"\"}', '', '', '{\"author\":\"\",\"robots\":\"\"}', '42', '2012-04-26 03:54:08', '0', '0000-00-00 00:00:00', '0', '*');
INSERT INTO `jos_categories` VALUES ('15', '42', '8', '18', '19', '2', 'bronx/south-east', 'com_rental', 'South East', 'south-east', '', '', '1', '0', '0000-00-00 00:00:00', '1', '{\"category_layout\":\"\",\"image\":\"\"}', '', '', '{\"author\":\"\",\"robots\":\"\"}', '42', '2012-04-26 03:54:19', '0', '0000-00-00 00:00:00', '0', '*');
INSERT INTO `jos_categories` VALUES ('16', '43', '8', '20', '21', '2', 'bronx/south-west', 'com_rental', 'South West', 'south-west', '', '', '1', '0', '0000-00-00 00:00:00', '1', '{\"category_layout\":\"\",\"image\":\"\"}', '', '', '{\"author\":\"\",\"robots\":\"\"}', '42', '2012-04-26 03:54:31', '0', '0000-00-00 00:00:00', '0', '*');
INSERT INTO `jos_categories` VALUES ('17', '44', '9', '24', '25', '2', 'brooklyn/upper-west', 'com_rental', 'Upper West', 'upper-west', '', '', '1', '0', '0000-00-00 00:00:00', '1', '{\"category_layout\":\"\",\"image\":\"\"}', '', '', '{\"author\":\"\",\"robots\":\"\"}', '42', '2012-04-26 03:54:47', '0', '0000-00-00 00:00:00', '0', '*');
INSERT INTO `jos_categories` VALUES ('18', '45', '9', '26', '27', '2', 'brooklyn/west', 'com_rental', 'West', 'west', '', '', '1', '0', '0000-00-00 00:00:00', '1', '{\"category_layout\":\"\",\"image\":\"\"}', '', '', '{\"author\":\"\",\"robots\":\"\"}', '42', '2012-04-26 03:55:00', '0', '0000-00-00 00:00:00', '0', '*');
INSERT INTO `jos_categories` VALUES ('19', '46', '9', '28', '29', '2', 'brooklyn/upper-east', 'com_rental', 'Upper East', 'upper-east', '', '', '1', '0', '0000-00-00 00:00:00', '1', '{\"category_layout\":\"\",\"image\":\"\"}', '', '', '{\"author\":\"\",\"robots\":\"\"}', '42', '2012-04-26 03:55:12', '0', '0000-00-00 00:00:00', '0', '*');
INSERT INTO `jos_categories` VALUES ('20', '47', '9', '30', '31', '2', 'brooklyn/east', 'com_rental', 'East', 'east', '', '', '1', '0', '0000-00-00 00:00:00', '1', '{\"category_layout\":\"\",\"image\":\"\"}', '', '', '{\"author\":\"\",\"robots\":\"\"}', '42', '2012-04-26 03:55:27', '0', '0000-00-00 00:00:00', '0', '*');
INSERT INTO `jos_categories` VALUES ('21', '48', '9', '32', '33', '2', 'brooklyn/central-east', 'com_rental', 'Central East', 'central-east', '', '', '1', '0', '0000-00-00 00:00:00', '1', '{\"category_layout\":\"\",\"image\":\"\"}', '', '', '{\"author\":\"\",\"robots\":\"\"}', '42', '2012-04-26 03:55:38', '0', '0000-00-00 00:00:00', '0', '*');
INSERT INTO `jos_categories` VALUES ('22', '49', '9', '34', '35', '2', 'brooklyn/south-west', 'com_rental', 'South West', 'south-west', '', '', '1', '0', '0000-00-00 00:00:00', '1', '{\"category_layout\":\"\",\"image\":\"\"}', '', '', '{\"author\":\"\",\"robots\":\"\"}', '42', '2012-04-26 03:55:51', '0', '0000-00-00 00:00:00', '0', '*');
INSERT INTO `jos_categories` VALUES ('23', '50', '9', '36', '37', '2', 'brooklyn/south-east', 'com_rental', 'South East', 'south-east', '', '', '1', '0', '0000-00-00 00:00:00', '1', '{\"category_layout\":\"\",\"image\":\"\"}', '', '', '{\"author\":\"\",\"robots\":\"\"}', '42', '2012-04-26 03:56:00', '0', '0000-00-00 00:00:00', '0', '*');
INSERT INTO `jos_categories` VALUES ('24', '51', '10', '40', '41', '2', 'manhattan/upper-west', 'com_rental', 'Upper (West)', 'upper-west', '', '', '1', '0', '0000-00-00 00:00:00', '1', '{\"category_layout\":\"\",\"image\":\"\"}', '', '', '{\"author\":\"\",\"robots\":\"\"}', '42', '2012-04-26 03:56:21', '0', '0000-00-00 00:00:00', '0', '*');
INSERT INTO `jos_categories` VALUES ('25', '52', '10', '42', '43', '2', 'manhattan/upper-east', 'com_rental', 'Upper (East)', 'upper-east', '', '', '1', '0', '0000-00-00 00:00:00', '1', '{\"category_layout\":\"\",\"image\":\"\"}', '', '', '{\"author\":\"\",\"robots\":\"\"}', '42', '2012-04-26 03:56:43', '0', '0000-00-00 00:00:00', '0', '*');
INSERT INTO `jos_categories` VALUES ('26', '53', '10', '44', '45', '2', 'manhattan/uptown-west', 'com_rental', 'Uptown (West)', 'uptown-west', '', '', '1', '0', '0000-00-00 00:00:00', '1', '{\"category_layout\":\"\",\"image\":\"\"}', '', '', '{\"author\":\"\",\"robots\":\"\"}', '42', '2012-04-26 03:56:53', '0', '0000-00-00 00:00:00', '0', '*');
INSERT INTO `jos_categories` VALUES ('27', '54', '10', '46', '47', '2', 'manhattan/uptown-east', 'com_rental', 'Uptown (East)', 'uptown-east', '', '', '1', '0', '0000-00-00 00:00:00', '1', '{\"category_layout\":\"\",\"image\":\"\"}', '', '', '{\"author\":\"\",\"robots\":\"\"}', '42', '2012-04-26 03:57:03', '0', '0000-00-00 00:00:00', '0', '*');
INSERT INTO `jos_categories` VALUES ('28', '55', '10', '48', '49', '2', 'manhattan/midtown-west', 'com_rental', 'Midtown (West)', 'midtown-west', '', '', '1', '0', '0000-00-00 00:00:00', '1', '{\"category_layout\":\"\",\"image\":\"\"}', '', '', '{\"author\":\"\",\"robots\":\"\"}', '42', '2012-04-26 03:57:16', '0', '0000-00-00 00:00:00', '0', '*');
INSERT INTO `jos_categories` VALUES ('29', '56', '10', '50', '51', '2', 'manhattan/midtown-east', 'com_rental', 'Midtown (East)', 'midtown-east', '', '', '1', '0', '0000-00-00 00:00:00', '1', '{\"category_layout\":\"\",\"image\":\"\"}', '', '', '{\"author\":\"\",\"robots\":\"\"}', '42', '2012-04-26 03:57:24', '0', '0000-00-00 00:00:00', '0', '*');
INSERT INTO `jos_categories` VALUES ('30', '57', '10', '52', '53', '2', 'manhattan/downtown-west', 'com_rental', 'Downtown (West)', 'downtown-west', '', '', '1', '0', '0000-00-00 00:00:00', '1', '{\"category_layout\":\"\",\"image\":\"\"}', '', '', '{\"author\":\"\",\"robots\":\"\"}', '42', '2012-04-26 03:57:35', '0', '0000-00-00 00:00:00', '0', '*');
INSERT INTO `jos_categories` VALUES ('31', '58', '10', '54', '55', '2', 'manhattan/downtown-east', 'com_rental', 'Downtown (East)', 'downtown-east', '', '', '1', '0', '0000-00-00 00:00:00', '1', '{\"category_layout\":\"\",\"image\":\"\"}', '', '', '{\"author\":\"\",\"robots\":\"\"}', '42', '2012-04-26 03:57:46', '0', '0000-00-00 00:00:00', '0', '*');
INSERT INTO `jos_categories` VALUES ('32', '59', '10', '56', '57', '2', 'manhattan/downtown-south', 'com_rental', 'Downtown (South)', 'downtown-south', '', '', '1', '0', '0000-00-00 00:00:00', '1', '{\"category_layout\":\"\",\"image\":\"\"}', '', '', '{\"author\":\"\",\"robots\":\"\"}', '42', '2012-04-26 03:58:00', '0', '0000-00-00 00:00:00', '0', '*');
INSERT INTO `jos_categories` VALUES ('33', '60', '11', '60', '61', '2', 'queens/north-central', 'com_rental', 'North Central', 'north-central', '', '', '1', '0', '0000-00-00 00:00:00', '1', '{\"category_layout\":\"\",\"image\":\"\"}', '', '', '{\"author\":\"\",\"robots\":\"\"}', '42', '2012-04-26 03:58:18', '0', '0000-00-00 00:00:00', '0', '*');
INSERT INTO `jos_categories` VALUES ('34', '61', '11', '62', '63', '2', 'queens/west', 'com_rental', 'West', 'west', '', '', '1', '0', '0000-00-00 00:00:00', '1', '{\"category_layout\":\"\",\"image\":\"\"}', '', '', '{\"author\":\"\",\"robots\":\"\"}', '42', '2012-04-26 03:58:31', '0', '0000-00-00 00:00:00', '0', '*');
INSERT INTO `jos_categories` VALUES ('35', '62', '11', '64', '65', '2', 'queens/south-west', 'com_rental', 'South West', 'south-west', '', '', '1', '0', '0000-00-00 00:00:00', '1', '{\"category_layout\":\"\",\"image\":\"\"}', '', '', '{\"author\":\"\",\"robots\":\"\"}', '42', '2012-04-26 03:58:44', '0', '0000-00-00 00:00:00', '0', '*');
INSERT INTO `jos_categories` VALUES ('36', '63', '11', '66', '67', '2', 'queens/south-east', 'com_rental', 'South East', 'south-east', '', '', '1', '0', '0000-00-00 00:00:00', '1', '{\"category_layout\":\"\",\"image\":\"\"}', '', '', '{\"author\":\"\",\"robots\":\"\"}', '42', '2012-04-26 03:58:55', '0', '0000-00-00 00:00:00', '0', '*');
INSERT INTO `jos_categories` VALUES ('37', '64', '11', '68', '69', '2', 'queens/north-east', 'com_rental', 'North East', 'north-east', '', '', '1', '0', '0000-00-00 00:00:00', '1', '{\"category_layout\":\"\",\"image\":\"\"}', '', '', '{\"author\":\"\",\"robots\":\"\"}', '42', '2012-04-26 03:59:10', '0', '0000-00-00 00:00:00', '0', '*');
INSERT INTO `jos_categories` VALUES ('38', '65', '11', '70', '71', '2', 'queens/beaches', 'com_rental', 'Beaches', 'beaches', '', '', '1', '0', '0000-00-00 00:00:00', '1', '{\"category_layout\":\"\",\"image\":\"\"}', '', '', '{\"author\":\"\",\"robots\":\"\"}', '42', '2012-04-26 03:59:23', '0', '0000-00-00 00:00:00', '0', '*');
