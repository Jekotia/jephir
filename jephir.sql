/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50516
Source Host           : localhost:3306
Source Database       : jephir

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2012-02-26 21:06:58
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
-- Table structure for `jcf_options`
-- ----------------------------
DROP TABLE IF EXISTS `jcf_options`;
CREATE TABLE `jcf_options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(64) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jcf_options
-- ----------------------------

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
  `type` varchar(32) NOT NULL,
  `parent` int(11) NOT NULL,
  `content` blob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jcf_posts
-- ----------------------------

-- ----------------------------
-- Table structure for `jcf_sites`
-- ----------------------------
DROP TABLE IF EXISTS `jcf_sites`;
CREATE TABLE `jcf_sites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jcf_sites
-- ----------------------------

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
  `token_ip` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jcf_users
-- ----------------------------
