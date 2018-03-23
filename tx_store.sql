/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100130
 Source Host           : localhost:3306
 Source Schema         : tx_store

 Target Server Type    : MySQL
 Target Server Version : 100130
 File Encoding         : 65001

 Date: 23/03/2018 14:44:23
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for code_details
-- ----------------------------
DROP TABLE IF EXISTS `code_details`;
CREATE TABLE `code_details`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cm_code` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `cm_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of code_details
-- ----------------------------
INSERT INTO `code_details` VALUES (1, 'AT', 'Active', '2018-02-06 09:17:07', NULL, '2018-02-06 09:17:07', NULL);
INSERT INTO `code_details` VALUES (2, 'IA', 'Inactive', '2018-02-06 09:18:17', NULL, '2018-02-06 09:18:17', NULL);
INSERT INTO `code_details` VALUES (3, 'EN', 'Enable', '2018-02-06 09:18:24', NULL, '2018-02-06 09:18:24', NULL);
INSERT INTO `code_details` VALUES (4, 'DI', 'Disable', '2018-02-06 09:18:34', NULL, '2018-02-06 09:18:34', NULL);

-- ----------------------------
-- Table structure for function_roles
-- ----------------------------
DROP TABLE IF EXISTS `function_roles`;
CREATE TABLE `function_roles`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NULL DEFAULT NULL,
  `function_id` int(11) NULL DEFAULT NULL,
  `status` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'EN',
  `created_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of function_roles
-- ----------------------------
INSERT INTO `function_roles` VALUES (1, 1, 1, 'EN', NULL, '2018-02-23 15:39:26', NULL, '2018-02-23 15:39:26');
INSERT INTO `function_roles` VALUES (2, 1, 3, 'EN', NULL, '2018-02-23 15:39:34', NULL, '2018-02-23 15:39:34');
INSERT INTO `function_roles` VALUES (3, 1, 4, 'EN', NULL, '2018-02-23 15:39:34', NULL, '2018-02-23 15:39:34');
INSERT INTO `function_roles` VALUES (4, 1, 6, 'EN', NULL, '2018-02-23 15:39:34', NULL, '2018-02-23 15:39:34');
INSERT INTO `function_roles` VALUES (5, 1, 9, 'EN', NULL, '2018-02-23 15:39:41', NULL, '2018-02-23 15:39:41');
INSERT INTO `function_roles` VALUES (7, 1, 2, 'EN', NULL, '2018-02-23 15:46:36', NULL, '2018-02-23 15:46:36');
INSERT INTO `function_roles` VALUES (8, 1, 8, 'EN', NULL, '2018-02-23 15:46:42', NULL, '2018-02-23 15:46:42');
INSERT INTO `function_roles` VALUES (9, 1, 5, 'EN', NULL, '2018-02-23 15:46:42', NULL, '2018-02-23 15:46:42');
INSERT INTO `function_roles` VALUES (10, 2, 9, 'EN', NULL, '2018-02-23 15:47:47', NULL, '2018-02-23 15:47:47');
INSERT INTO `function_roles` VALUES (11, 2, 8, 'EN', NULL, '2018-02-23 15:47:47', NULL, '2018-02-23 15:47:47');
INSERT INTO `function_roles` VALUES (12, 2, 5, 'EN', NULL, '2018-02-23 15:47:47', NULL, '2018-02-23 15:47:47');
INSERT INTO `function_roles` VALUES (13, 1, 7, 'EN', NULL, '2018-02-23 15:55:37', NULL, '2018-02-23 15:55:37');
INSERT INTO `function_roles` VALUES (14, 1, 10, 'EN', NULL, '2018-02-23 16:51:16', NULL, '2018-02-23 16:51:16');
INSERT INTO `function_roles` VALUES (15, 1, 11, 'EN', NULL, '2018-02-23 16:51:16', NULL, '2018-02-23 16:51:16');
INSERT INTO `function_roles` VALUES (16, 2, 10, 'EN', NULL, '2018-02-26 09:57:32', NULL, '2018-02-26 09:57:32');
INSERT INTO `function_roles` VALUES (17, 2, 1, 'EN', NULL, '2018-02-26 09:59:13', NULL, '2018-02-26 09:59:13');
INSERT INTO `function_roles` VALUES (18, 2, 7, 'EN', NULL, '2018-03-23 09:25:58', NULL, '2018-03-23 09:25:58');

-- ----------------------------
-- Table structure for functions
-- ----------------------------
DROP TABLE IF EXISTS `functions`;
CREATE TABLE `functions`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `function_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `controller` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `icon` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT 'fa fa-circle-o',
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of functions
-- ----------------------------
INSERT INTO `functions` VALUES (1, 'Dashboard', 0, NULL, '/admin', 'fa fa-dashboard', 'EN', '2018-02-06 09:16:07', NULL, '2018-02-06 09:16:07', NULL);
INSERT INTO `functions` VALUES (2, 'Admin Management', 0, NULL, NULL, 'fa fa-pie-chart', 'EN', '2018-02-06 09:16:07', NULL, '2018-02-06 09:16:07', NULL);
INSERT INTO `functions` VALUES (3, 'User', 2, NULL, '/admin/user', 'fa fa-circle-o', 'EN', '2018-02-06 09:16:07', NULL, '2018-02-06 09:16:07', NULL);
INSERT INTO `functions` VALUES (4, 'Function', 2, NULL, '/admin/function', 'fa fa-circle-o', 'EN', '2018-02-06 09:16:07', NULL, '2018-02-06 09:16:07', NULL);
INSERT INTO `functions` VALUES (5, 'Multi', 0, NULL, NULL, 'fa fa-laptop', 'EN', '2018-02-06 09:16:07', NULL, '2018-02-06 09:16:07', NULL);
INSERT INTO `functions` VALUES (6, 'Permission', 2, NULL, '/admin/permission', 'fa fa-circle-o', 'EN', '2018-02-06 09:25:28', NULL, '2018-02-06 09:25:28', NULL);
INSERT INTO `functions` VALUES (7, 'Role', 2, NULL, '/admin/role', 'fa fa-circle-o', 'EN', '2018-02-22 17:37:28', NULL, '2018-02-22 17:37:28', NULL);
INSERT INTO `functions` VALUES (8, 'T2', 5, NULL, NULL, 'fa fa-circle-o', 'EN', '2018-02-22 17:37:36', NULL, '2018-02-22 17:37:36', NULL);
INSERT INTO `functions` VALUES (9, 'E', 8, NULL, NULL, 'fa fa-circle-o', 'EN', '2018-02-22 17:37:42', NULL, '2018-02-22 17:37:42', NULL);
INSERT INTO `functions` VALUES (10, 'E2', 8, NULL, NULL, 'fa fa-circle-o', 'EN', '2018-02-22 17:38:12', NULL, '2018-02-22 17:38:12', NULL);
INSERT INTO `functions` VALUES (11, 'E3', 8, NULL, NULL, 'fa fa-circle-o', 'EN', '2018-02-22 17:38:19', NULL, '2018-02-22 17:38:19', NULL);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` char(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT 'EN',
  `created_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'admin', 'EN', 'xuan', '2017-12-07 11:48:12', 'xuan', '2017-12-07 11:48:12');
INSERT INTO `roles` VALUES (2, 'sale', 'EN', 'xuan', '2018-03-23 11:34:13', 'xuan', '2018-03-23 11:34:13');
INSERT INTO `roles` VALUES (3, 'Role Test', 'DI', 'xuan', '2018-03-23 11:34:03', 'xuan', '2018-03-23 11:34:03');

-- ----------------------------
-- Table structure for user_roles
-- ----------------------------
DROP TABLE IF EXISTS `user_roles`;
CREATE TABLE `user_roles`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NULL DEFAULT NULL,
  `role_id` int(11) NULL DEFAULT NULL,
  `created_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user_roles
-- ----------------------------
INSERT INTO `user_roles` VALUES (1, 1, 1, NULL, '2017-12-07 11:48:21', NULL, '2017-12-07 11:48:21');
INSERT INTO `user_roles` VALUES (2, 29, 1, NULL, '2018-03-16 15:52:48', NULL, '2018-03-16 15:52:48');
INSERT INTO `user_roles` VALUES (3, 2, 2, NULL, '2018-03-16 16:08:00', NULL, '2018-03-16 16:08:00');
INSERT INTO `user_roles` VALUES (4, 30, 2, NULL, '2018-03-16 16:08:05', NULL, '2018-03-16 16:08:05');
INSERT INTO `user_roles` VALUES (5, 31, 1, NULL, '2018-03-16 16:13:52', NULL, '2018-03-16 16:13:52');
INSERT INTO `user_roles` VALUES (6, 30, 2, NULL, '2018-03-16 16:36:57', NULL, '2018-03-16 16:36:57');
INSERT INTO `user_roles` VALUES (7, 30, 2, NULL, '2018-03-16 16:37:10', NULL, '2018-03-16 16:37:10');
INSERT INTO `user_roles` VALUES (8, 30, 2, NULL, '2018-03-16 16:37:44', NULL, '2018-03-16 16:37:44');
INSERT INTO `user_roles` VALUES (9, 30, 2, NULL, '2018-03-16 16:39:27', NULL, '2018-03-16 16:39:27');
INSERT INTO `user_roles` VALUES (10, 30, 1, NULL, '2018-03-16 17:47:09', NULL, '2018-03-16 17:47:09');
INSERT INTO `user_roles` VALUES (11, 32, 1, NULL, '2018-03-22 14:49:52', NULL, '2018-03-22 14:49:52');
INSERT INTO `user_roles` VALUES (13, 33, 2, 'xuan', '2018-03-23 09:33:33', 'xuan', '2018-03-23 09:33:33');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `first_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `remember_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`, `username`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 34 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'xuan', '$2y$10$YySGgd2mUYQP71H7.5Lhz.mRsE0v1pUKT77aUmpkBaXluN6cgxABO', 'xuan.nguyen@seldatinc.com', 'Xuân', 'Trường', '1517561720.jfif', 'JeaA39Jsx1GxfzAOJ0bJJHSvuPIQQ5gNweuJjpxGkHLWcFomErbtRtplWOX3', '2018-03-16 16:12:50', 'xuan', '2018-03-16 16:12:50', 'xuan');
INSERT INTO `users` VALUES (2, 'xuan1', '$2y$10$SLaES/BeotMt9388N27h9Olmj8K5djKUlJJ7YPfuI4gz55wYNtSvO', 'xuan.nguyen@seldatinc.com', 'Truong', 'Nguyen', '1517557517.jfif', NULL, '2018-03-16 16:08:00', 'xuan', '2018-03-16 16:08:00', 'xuan');
INSERT INTO `users` VALUES (29, 'T1', '$2y$10$YySGgd2mUYQP71H7.5Lhz.mRsE0v1pUKT77aUmpkBaXluN6cgxABO', 'T1', 'T1234', NULL, '1517557164.jfif', 'zJ5c0i5o8PDv6wvQVafB4W1j9pY0Zk9Wv4oKwA2HRGqWbCv7482Lcxmpv585', '2018-03-16 16:09:39', 'xuan', '2018-03-16 16:09:39', 'xuan');
INSERT INTO `users` VALUES (30, 'truongxuan', '$2y$10$3PVJaxZXXfvIzpYV3eW6Fe1srjOwpOFwp2L6IhgxwHE72AUzr48ry', '234', 'Truong Xuan', 'Nguyen', '1517562261.jfif', 'm7ND2Yqs3SQbsMQTZddCpOjkdRq49DNwf1RPppETZrrYJsoDyJBYWlieaXwr', '2018-03-16 17:47:09', 'xuan', '2018-03-16 17:47:09', 'xuan');
INSERT INTO `users` VALUES (31, '123', '$2y$10$HMBIi9gOuYfrwz/a6VTHcORHnfjJ/OsDFFL0t8bzMfW5LWQq/WdmW', '123', '123', '123', 'avatar.jpeg', 'iq1gVriq402m02jOdWgZ1L2uDszfzbcNnUZLUgy2o0EIaq9UuzwaWpH6wNbG', '2018-03-16 16:13:51', 'xuan', '2018-03-16 16:13:51', 'xuan');
INSERT INTO `users` VALUES (32, 'test123', '$2y$10$EWW8VWhbiwt.OJGBvdtpGeynWX2120BKMjkoLNa3otXLEoiM8669u', '123', 't', '2', 'avatar.jpeg', NULL, '2018-03-22 16:42:32', 'test123', '2018-03-22 16:42:32', 'test123');
INSERT INTO `users` VALUES (33, 'te', '$2y$10$c0yBmlXtwnlmmFpi.Jb3fOHGrNWqJNSW76z7fG6a4SA5ILyzLah2y', '1212', 'te', 'te', 'avatar.jpeg', NULL, '2018-03-23 09:33:33', 'xuan', '2018-03-23 09:33:33', 'xuan');

SET FOREIGN_KEY_CHECKS = 1;
