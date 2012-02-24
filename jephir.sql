SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS `jcf_options`;
CREATE TABLE `jcf_options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(64) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `jcf_posts`;
CREATE TABLE `jcf_posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `site_id` int(11) NOT NULL,
  `post_author` int(11) NOT NULL,
  `post_date` datetime NOT NULL,
  `post_modified` datetime DEFAULT NULL,
  `post_category` int(11) NOT NULL,
  `post_type` int(11) NOT NULL,
  `post_parent` int(11) NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;