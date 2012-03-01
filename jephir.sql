/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50516
Source Host           : localhost:3306
Source Database       : jephir

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2012-02-29 20:05:05
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `jcf_categories`
-- ----------------------------
DROP TABLE IF EXISTS `jcf_categories`;
CREATE TABLE `jcf_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jcf_categories
-- ----------------------------

-- ----------------------------
-- Table structure for `jcf_pages`
-- ----------------------------
DROP TABLE IF EXISTS `jcf_pages`;
CREATE TABLE `jcf_pages` (
  `site_id` int(11) NOT NULL DEFAULT '0',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `nicename` varchar(255) NOT NULL,
  `order` int(11) DEFAULT NULL,
  `author` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL,
  `category` int(11) NOT NULL,
  `type` varchar(32) NOT NULL,
  `parent` int(11) NOT NULL,
  `content` blob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jcf_pages
-- ----------------------------
INSERT INTO `jcf_pages` VALUES ('1', '1', 'Home', 'home', '1', '1', '2012-02-29 16:38:55', null, '0', 'static', '0', 0x57656C636F6D6520746F206A657068697221205468697320434D532069732063757272656E746C7920696E2076657279206561726C792073746167657320616E6420756E6465722061637469766520646576656C6F706D656E742E20546869732075676C79207468656D6520697320707572656C7920666F7220646576656C6F706D656E7420707572706F7365732C206173206974206D616B65732069742065617369657220746F2073656520746865207061676520656C656D656E74732E);
INSERT INTO `jcf_pages` VALUES ('1', '2', 'About', 'about', '3', '1', '2012-02-29 16:13:56', null, '0', 'static', '0', 0x4D79206E616D652069732E2E2E);
INSERT INTO `jcf_pages` VALUES ('1', '3', 'Contact', 'contact', '4', '1', '2012-02-29 16:13:58', null, '0', 'static', '0', 0x436F6E74616374206D652061742E2E2E);
INSERT INTO `jcf_pages` VALUES ('1', '4', 'Blog', 'blog', '2', '1', '2012-02-29 16:13:50', null, '0', 'blog', '0', 0x424C4F472E424C4F4221);

-- ----------------------------
-- Table structure for `jcf_posts`
-- ----------------------------
DROP TABLE IF EXISTS `jcf_posts`;
CREATE TABLE `jcf_posts` (
  `site_id` int(11) NOT NULL DEFAULT '0',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `nicename` varchar(255) NOT NULL,
  `author` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL,
  `category` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `content` blob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jcf_posts
-- ----------------------------
INSERT INTO `jcf_posts` VALUES ('1', '1', 'Home', 'home', '1', '2012-02-26 18:31:02', null, '0', '0', 0x57656C636F6D6520746F2E2E2E);
INSERT INTO `jcf_posts` VALUES ('1', '2', 'About', 'about', '1', '2012-02-26 18:30:52', null, '0', '0', 0x4D79206E616D652069732E2E2E);
INSERT INTO `jcf_posts` VALUES ('1', '3', 'Contact', 'contact', '1', '2012-02-26 18:30:58', null, '0', '0', 0x436F6E74616374206D652061742E2E2E);
INSERT INTO `jcf_posts` VALUES ('1', '4', 'Blog', 'blog', '1', '2012-02-28 23:11:12', null, '0', '0', 0x424C4F472E424C4F4221);

-- ----------------------------
-- Table structure for `jcf_settings`
-- ----------------------------
DROP TABLE IF EXISTS `jcf_settings`;
CREATE TABLE `jcf_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_id` int(11) NOT NULL DEFAULT '0',
  `label` varchar(64) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jcf_settings
-- ----------------------------
INSERT INTO `jcf_settings` VALUES ('1', '0', 'site_name', 'Jephir :: indev');
INSERT INTO `jcf_settings` VALUES ('2', '0', 'home_page', 'home');
INSERT INTO `jcf_settings` VALUES ('3', '1', 'web_root', '/users/jekotia/jekotia.net/dev/jephir/');
INSERT INTO `jcf_settings` VALUES ('4', '1', 'fs_root', 'C:\\xampp\\htdocs\\users\\jekotia\\jekotia.net\\dev\\jephir\\');
INSERT INTO `jcf_settings` VALUES ('5', '1', 'title_divider', ' &raquo ');

-- ----------------------------
-- Table structure for `jcf_sites`
-- ----------------------------
DROP TABLE IF EXISTS `jcf_sites`;
CREATE TABLE `jcf_sites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jcf_sites
-- ----------------------------
INSERT INTO `jcf_sites` VALUES ('0', 'global');

-- ----------------------------
-- Table structure for `jcf_users`
-- ----------------------------
DROP TABLE IF EXISTS `jcf_users`;
CREATE TABLE `jcf_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `nicename` varchar(30) NOT NULL,
  `password` varchar(64) NOT NULL,
  `salt` varchar(3) NOT NULL,
  `token` varchar(64) DEFAULT NULL,
  `ip` varchar(15) NOT NULL,
  `group` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jcf_users
-- ----------------------------
INSERT INTO `jcf_users` VALUES ('1', 'jekotia', '', '7da00fb86ba55ca01f079fe98dfaa86de7da0ab4e7dcb7cb24e368dea3dff61e', 'b6d', null, '', '0', null, null);
