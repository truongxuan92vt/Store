/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : tx_store

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-02-02 14:37:03
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
  `controller` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'fa fa-circle-o',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of functions
-- ----------------------------
INSERT INTO `functions` VALUES ('1', 'Dashboard', '0', null, '/admin', 'fa fa-dashboard', '2017-12-06 10:04:31', '2017-12-06 10:04:31');
INSERT INTO `functions` VALUES ('2', 'Admin Management', '0', null, null, 'fa fa-pie-chart', '2017-12-06 10:05:00', '2017-12-06 10:05:00');
INSERT INTO `functions` VALUES ('3', 'User', '2', null, '/admin/user', 'fa fa-circle-o', '2017-12-06 10:19:06', '2017-12-06 10:19:06');
INSERT INTO `functions` VALUES ('4', 'Function', '2', null, '/admin/function', 'fa fa-circle-o', '2017-12-06 10:19:11', '2017-12-06 10:19:11');
INSERT INTO `functions` VALUES ('5', 'Multi', '0', null, null, 'fa fa-laptop', '2017-12-06 10:21:42', '2017-12-06 10:21:42');

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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of function_roles
-- ----------------------------
INSERT INTO `function_roles` VALUES ('1', '1', '1', null, '2017-12-07 11:48:32', null, '2017-12-07 11:48:32');
INSERT INTO `function_roles` VALUES ('2', '1', '2', null, '2017-12-07 11:52:04', null, '2017-12-07 11:52:04');
INSERT INTO `function_roles` VALUES ('3', '1', '3', null, '2017-12-07 11:52:31', null, '2017-12-07 11:52:31');
INSERT INTO `function_roles` VALUES ('4', '1', '4', null, '2017-12-07 11:52:36', null, '2017-12-07 11:52:36');
INSERT INTO `function_roles` VALUES ('5', '1', '5', null, '2017-12-07 11:52:40', null, '2017-12-07 11:52:40');
INSERT INTO `function_roles` VALUES ('6', '1', '6', null, '2017-12-28 14:46:54', null, '2017-12-28 14:46:54');
INSERT INTO `function_roles` VALUES ('7', '1', '7', null, '2017-12-28 14:46:55', null, '2017-12-28 14:46:55');
INSERT INTO `function_roles` VALUES ('8', '1', '8', null, '2017-12-28 14:46:57', null, '2017-12-28 14:46:57');
INSERT INTO `function_roles` VALUES ('9', '1', '9', null, '2017-12-28 14:46:58', null, '2017-12-28 14:46:58');
INSERT INTO `function_roles` VALUES ('10', '1', '10', null, '2017-12-28 14:46:59', null, '2017-12-28 14:46:59');
INSERT INTO `function_roles` VALUES ('11', '1', '11', null, '2017-12-28 14:47:00', null, '2017-12-28 14:47:00');
INSERT INTO `function_roles` VALUES ('12', '1', '12', null, '2017-12-28 14:47:01', null, '2017-12-28 14:47:01');
INSERT INTO `function_roles` VALUES ('13', '1', '13', null, '2017-12-28 14:47:29', null, '2017-12-28 14:47:29');
INSERT INTO `function_roles` VALUES ('14', '1', '14', null, '2017-12-28 14:47:30', null, '2017-12-28 14:47:30');
INSERT INTO `function_roles` VALUES ('15', '1', '15', null, '2017-12-28 14:47:31', null, '2017-12-28 14:47:31');
INSERT INTO `function_roles` VALUES ('16', '1', '16', null, '2017-12-28 14:47:33', null, '2017-12-28 14:47:33');
INSERT INTO `function_roles` VALUES ('17', '1', '17', null, '2017-12-28 14:47:37', null, '2017-12-28 14:47:37');
INSERT INTO `function_roles` VALUES ('18', '1', '18', null, '2017-12-28 14:47:43', null, '2017-12-28 14:47:43');

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
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`,`username`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'xuan', '$2y$10$jNjNRxmoOyX8zOvxwKXqE.zbzABVa7e2BhIeC5ywJfEQKsDk2G8Q6', 'xuan.nguyen@seldatinc.com', 'Truong', 'Xuan', '1517556971.jfif', 'plxrKZtFX0rYOh7FqY00DXCLnY7ZmOJL8xZ0ynCEHWb0qxTeHEeJ7jd6Oa3G', '2018-02-02 14:36:11', 'xuan', '2018-02-02 14:36:11', 'xuan');
INSERT INTO `users` VALUES ('2', 'xuan1', '$2y$10$0QmWENBR0fLO0YVx4V9xquAhVzId5m/dgc8n7LgsExP3oHD1oLTsK', 'xuan.nguyen@seldatinc.com', 'Xuan', 'Nguyen', null, null, '2017-12-07 07:34:32', null, '2017-12-07 07:34:32', null);
INSERT INTO `users` VALUES ('29', 'T1', null, 'T1', 'T1234', null, '1517556727.jfif', null, '2018-02-02 14:32:07', 'xuan', '2018-02-02 14:32:07', 'xuan');

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
