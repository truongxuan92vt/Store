/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : tx_store

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-12-08 09:14:48
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for functions
-- ----------------------------
DROP TABLE IF EXISTS `functions`;
CREATE TABLE `functions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `function_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'fa fa-circle-o',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of functions
-- ----------------------------
INSERT INTO `functions` VALUES ('1', 'Dashboard', '0', '/', 'fa fa-dashboard', '2017-12-06 10:04:31', '2017-12-06 10:04:31');
INSERT INTO `functions` VALUES ('2', 'Admin Management', '0', null, 'fa fa-pie-chart', '2017-12-06 10:05:00', '2017-12-06 10:05:00');
INSERT INTO `functions` VALUES ('3', 'User', '2', null, 'fa fa-circle-o', '2017-12-06 10:19:06', '2017-12-06 10:19:06');
INSERT INTO `functions` VALUES ('4', 'Function', '2', '/admin/function', 'fa fa-circle-o', '2017-12-06 10:19:11', '2017-12-06 10:19:11');
INSERT INTO `functions` VALUES ('5', 'Multi', '0', null, 'fa fa-laptop', '2017-12-06 10:21:42', '2017-12-06 10:21:42');
INSERT INTO `functions` VALUES ('6', 'L1', '5', null, 'fa fa-circle-o', '2017-12-06 10:21:50', '2017-12-06 10:21:50');
INSERT INTO `functions` VALUES ('7', 'L2', '6', null, 'fa fa-circle-o', '2017-12-06 10:21:57', '2017-12-06 10:21:57');
INSERT INTO `functions` VALUES ('8', 'L3', '7', null, 'fa fa-circle-o', '2017-12-07 10:32:59', '2017-12-07 10:32:59');
INSERT INTO `functions` VALUES ('9', 'L1 T', '5', null, 'fa fa-circle-o', '2017-12-07 10:50:01', '2017-12-07 10:50:01');

-- ----------------------------
-- Table structure for function_roles
-- ----------------------------
DROP TABLE IF EXISTS `function_roles`;
CREATE TABLE `function_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `function_id` int(11) DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of function_roles
-- ----------------------------
INSERT INTO `function_roles` VALUES ('1', '1', '1', null, '2017-12-07 11:48:32', null, '2017-12-07 11:48:32');
INSERT INTO `function_roles` VALUES ('2', '1', '2', null, '2017-12-07 11:52:04', null, '2017-12-07 11:52:04');
INSERT INTO `function_roles` VALUES ('3', '1', '3', null, '2017-12-07 11:52:31', null, '2017-12-07 11:52:31');
INSERT INTO `function_roles` VALUES ('4', '1', '4', null, '2017-12-07 11:52:36', null, '2017-12-07 11:52:36');
INSERT INTO `function_roles` VALUES ('5', '1', '5', null, '2017-12-07 11:52:40', null, '2017-12-07 11:52:40');

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'admin', null, '2017-12-07 11:48:12', null, '2017-12-07 11:48:12');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`,`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'xuan', '$2y$10$jNjNRxmoOyX8zOvxwKXqE.zbzABVa7e2BhIeC5ywJfEQKsDk2G8Q6', 'xuan.nguyen@seldatinc.com', 'mB0XH4rOLtY0FbWp5Rjzmq6YdYktFrk6xsnSQrI9ZmBWExWVqfRQXfk94Wlo', '2017-12-05 08:16:45', '2017-12-05 08:16:45');
INSERT INTO `users` VALUES ('2', 'xuan1', '$2y$10$0QmWENBR0fLO0YVx4V9xquAhVzId5m/dgc8n7LgsExP3oHD1oLTsK', 'xuan.nguyen@seldatinc.com', null, '2017-12-07 07:34:32', '2017-12-07 07:34:32');

-- ----------------------------
-- Table structure for user_roles
-- ----------------------------
DROP TABLE IF EXISTS `user_roles`;
CREATE TABLE `user_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user_roles
-- ----------------------------
INSERT INTO `user_roles` VALUES ('1', '1', '1', null, '2017-12-07 11:48:21', null, '2017-12-07 11:48:21');
