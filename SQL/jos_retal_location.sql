/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50516
Source Host           : localhost:3306
Source Database       : nbs_01

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2012-04-26 11:25:04
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `jos_retal_location`
-- ----------------------------
DROP TABLE IF EXISTS `jos_retal_location`;
CREATE TABLE `jos_retal_location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `catid` int(11) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COMMENT='Location';

-- ----------------------------
-- Records of jos_retal_location
-- ----------------------------
INSERT INTO `jos_retal_location` VALUES ('1', 'Bedford Park', '', '8', '1', '1', '', '', '2012-04-26 04:15:35', '42', '0000-00-00 00:00:00', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');
INSERT INTO `jos_retal_location` VALUES ('2', 'Bronx', '', '8', '1', '2', '', '', '2012-04-26 04:16:02', '42', '0000-00-00 00:00:00', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');
INSERT INTO `jos_retal_location` VALUES ('3', 'Castle Hill', '', '8', '1', '3', '', '', '2012-04-26 04:16:17', '42', '0000-00-00 00:00:00', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');
INSERT INTO `jos_retal_location` VALUES ('4', 'Concourse', '', '8', '1', '4', '', '', '2012-04-26 04:16:27', '42', '0000-00-00 00:00:00', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');
INSERT INTO `jos_retal_location` VALUES ('5', 'East Tremont', '', '8', '1', '5', '', '', '2012-04-26 04:16:35', '42', '0000-00-00 00:00:00', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');
INSERT INTO `jos_retal_location` VALUES ('6', 'Fairmont Claremont Village', '', '8', '1', '6', '', '', '2012-04-26 04:16:42', '42', '0000-00-00 00:00:00', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');
INSERT INTO `jos_retal_location` VALUES ('7', 'Fordham', '', '8', '1', '7', '', '', '2012-04-26 04:16:51', '42', '0000-00-00 00:00:00', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');
INSERT INTO `jos_retal_location` VALUES ('8', 'Marble Hill', '', '8', '1', '8', '', '', '2012-04-26 04:16:58', '42', '0000-00-00 00:00:00', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');
INSERT INTO `jos_retal_location` VALUES ('9', 'Morrisania', '', '8', '1', '9', '', '', '2012-04-26 04:17:07', '42', '0000-00-00 00:00:00', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');
INSERT INTO `jos_retal_location` VALUES ('10', 'Moshulu Parkway', '', '8', '1', '10', '', '', '2012-04-26 04:17:15', '42', '0000-00-00 00:00:00', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');
INSERT INTO `jos_retal_location` VALUES ('11', 'Mott Haven', '', '8', '1', '11', '', '', '2012-04-26 04:17:23', '42', '0000-00-00 00:00:00', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');
INSERT INTO `jos_retal_location` VALUES ('12', 'Parkchester', '', '8', '1', '12', '', '', '2012-04-26 04:17:31', '42', '0000-00-00 00:00:00', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');
INSERT INTO `jos_retal_location` VALUES ('13', 'Pelham Bay', '', '8', '1', '13', '', '', '2012-04-26 04:17:46', '42', '0000-00-00 00:00:00', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');
INSERT INTO `jos_retal_location` VALUES ('14', 'Pelham Parkway', '', '8', '1', '14', '', '', '2012-04-26 04:17:48', '42', '0000-00-00 00:00:00', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');
INSERT INTO `jos_retal_location` VALUES ('15', 'Riverdale', '', '8', '1', '15', '', '', '2012-04-26 04:17:59', '42', '0000-00-00 00:00:00', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');
INSERT INTO `jos_retal_location` VALUES ('16', 'Wakefield', '', '8', '1', '16', '', '', '2012-04-26 04:18:07', '42', '0000-00-00 00:00:00', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');
INSERT INTO `jos_retal_location` VALUES ('17', 'Woodlawn', '', '8', '1', '17', '', '', '2012-04-26 04:18:17', '42', '0000-00-00 00:00:00', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');
