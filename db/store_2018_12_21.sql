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

 Date: 21/12/2018 10:12:20
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for addresses
-- ----------------------------
DROP TABLE IF EXISTS `addresses`;
CREATE TABLE `addresses`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `country_code` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `state_id` int(11) NULL DEFAULT NULL,
  `city_id` int(11) NULL DEFAULT NULL,
  `city_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `street` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `address_line` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `zip_code` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tax_number` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `type` tinyint(1) NULL DEFAULT NULL,
  `desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `status` char(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'EN',
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for code_details
-- ----------------------------
DROP TABLE IF EXISTS `code_details`;
CREATE TABLE `code_details`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` char(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `group_code` char(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `group_name` char(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `value` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `priority` int(10) NULL DEFAULT 0,
  `desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `status` char(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'EN',
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of code_details
-- ----------------------------
INSERT INTO `code_details` VALUES (1, 'AT', 'Active', 'sts_sys', 'Status System', NULL, 0, NULL, 'EN', '2018-10-24 10:52:04', NULL, '2018-10-24 10:52:04', NULL);
INSERT INTO `code_details` VALUES (2, 'IA', 'Inactive', 'sts_sys', 'Status System', NULL, 0, NULL, 'EN', '2018-10-24 10:52:04', NULL, '2018-10-24 10:52:04', NULL);
INSERT INTO `code_details` VALUES (3, 'EN', 'Enable', 'sts', 'Status', NULL, 0, NULL, 'EN', '2018-10-24 10:52:04', NULL, '2018-10-24 10:52:04', NULL);
INSERT INTO `code_details` VALUES (4, 'DI', 'Disable', 'sts', 'Status', NULL, 0, NULL, 'EN', '2018-10-24 10:52:04', NULL, '2018-10-24 10:52:04', NULL);
INSERT INTO `code_details` VALUES (5, 'kg', 'Kilogram', 'unit_weight', 'Unit Weight', NULL, 0, NULL, 'EN', '2018-10-24 11:00:29', NULL, '2018-10-24 11:00:29', NULL);
INSERT INTO `code_details` VALUES (6, 'g', 'Gram', 'unit_weight', 'Unit Weight', NULL, 0, NULL, 'EN', '2018-10-24 11:04:48', NULL, '2018-10-24 11:04:48', NULL);
INSERT INTO `code_details` VALUES (7, 'km', 'Kilomet', 'unit_lenght', 'Unit Lenght', NULL, 0, NULL, 'EN', '2018-10-24 11:05:16', NULL, '2018-10-24 11:05:16', NULL);
INSERT INTO `code_details` VALUES (8, 'm', 'Meter', 'unit_lenght', 'Unit  Lenght', NULL, 0, NULL, 'EN', '2018-10-24 11:05:43', NULL, '2018-10-24 11:05:43', NULL);
INSERT INTO `code_details` VALUES (9, 'cm', 'Centimeter', 'unit_lenght', 'Unit Lenght', NULL, 0, NULL, 'EN', '2018-10-24 11:06:03', NULL, '2018-10-24 11:06:03', NULL);

-- ----------------------------
-- Table structure for colors
-- ----------------------------
DROP TABLE IF EXISTS `colors`;
CREATE TABLE `colors`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `red` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `green` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `blue` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `hex` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `status` char(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'EN',
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id`(`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of colors
-- ----------------------------
INSERT INTO `colors` VALUES (1, 'red', 'Red', NULL, NULL, NULL, NULL, NULL, 'EN', '2018-11-01 14:13:50', NULL, '2018-11-01 14:13:50', NULL);
INSERT INTO `colors` VALUES (2, 'blue', 'Blue', NULL, NULL, NULL, NULL, NULL, 'EN', '2018-11-01 14:16:15', NULL, '2018-11-01 14:16:15', NULL);
INSERT INTO `colors` VALUES (3, 'white', 'White', NULL, NULL, NULL, NULL, NULL, 'EN', '2018-11-09 14:25:13', NULL, '2018-11-09 14:25:13', NULL);
INSERT INTO `colors` VALUES (4, 'black', 'Black', NULL, NULL, NULL, NULL, NULL, 'EN', '2018-11-09 14:25:26', NULL, '2018-11-09 14:25:26', NULL);

-- ----------------------------
-- Table structure for customer_groups
-- ----------------------------
DROP TABLE IF EXISTS `customer_groups`;
CREATE TABLE `customer_groups`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `priority` int(11) NULL DEFAULT NULL,
  `desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `status` char(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'EN',
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of customer_groups
-- ----------------------------
INSERT INTO `customer_groups` VALUES (1, '', 'Default', 1, 'Khách hàng giá mặc định', 'EN', '2018-10-24 14:21:40', '', '2018-10-24 14:21:40', NULL);

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
) ENGINE = InnoDB AUTO_INCREMENT = 41 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of function_roles
-- ----------------------------
INSERT INTO `function_roles` VALUES (1, 1, 1, 'EN', NULL, '2018-02-23 15:39:26', NULL, '2018-02-23 15:39:26');
INSERT INTO `function_roles` VALUES (28, 1, 6, 'EN', NULL, '2018-06-09 09:07:26', NULL, '2018-06-09 09:07:26');
INSERT INTO `function_roles` VALUES (29, 1, 2, 'EN', NULL, '2018-06-09 09:08:18', NULL, '2018-06-09 09:08:18');
INSERT INTO `function_roles` VALUES (30, 1, 3, 'EN', NULL, '2018-06-09 09:08:33', NULL, '2018-06-09 09:08:33');
INSERT INTO `function_roles` VALUES (31, 1, 4, 'EN', NULL, '2018-06-09 09:08:34', NULL, '2018-06-09 09:08:34');
INSERT INTO `function_roles` VALUES (32, 1, 7, 'EN', NULL, '2018-06-09 09:08:35', NULL, '2018-06-09 09:08:35');
INSERT INTO `function_roles` VALUES (33, 1, 13, 'EN', NULL, '2018-06-09 09:08:37', NULL, '2018-06-09 09:08:37');
INSERT INTO `function_roles` VALUES (34, 1, 12, 'EN', NULL, '2018-06-09 09:08:37', NULL, '2018-06-09 09:08:37');
INSERT INTO `function_roles` VALUES (35, 2, 13, 'EN', NULL, '2018-06-20 09:48:55', NULL, '2018-06-20 09:48:55');
INSERT INTO `function_roles` VALUES (36, 2, 12, 'EN', NULL, '2018-06-20 09:48:55', NULL, '2018-06-20 09:48:55');
INSERT INTO `function_roles` VALUES (37, 1, 14, 'EN', NULL, '2018-06-21 16:30:34', NULL, '2018-06-21 16:30:34');
INSERT INTO `function_roles` VALUES (38, 2, 14, 'EN', NULL, '2018-06-27 13:54:03', NULL, '2018-06-27 13:54:03');
INSERT INTO `function_roles` VALUES (39, 3, 14, 'EN', NULL, '2018-06-28 11:24:04', NULL, '2018-06-28 11:24:04');
INSERT INTO `function_roles` VALUES (40, 3, 12, 'EN', NULL, '2018-06-28 11:24:04', NULL, '2018-06-28 11:24:04');

-- ----------------------------
-- Table structure for functions
-- ----------------------------
DROP TABLE IF EXISTS `functions`;
CREATE TABLE `functions`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
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
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of functions
-- ----------------------------
INSERT INTO `functions` VALUES (1, 'Dashboard', 0, NULL, '/admin', 'fa fa-dashboard', 'EN', '2018-02-06 09:16:07', NULL, '2018-02-06 09:16:07', NULL);
INSERT INTO `functions` VALUES (2, 'Admin Management', 0, NULL, NULL, 'fa fa-pie-chart', 'EN', '2018-02-06 09:16:07', NULL, '2018-02-06 09:16:07', NULL);
INSERT INTO `functions` VALUES (3, 'User', 2, NULL, '/admin/user', 'fa fa-circle-o', 'EN', '2018-02-06 09:16:07', NULL, '2018-02-06 09:16:07', NULL);
INSERT INTO `functions` VALUES (4, 'Function', 2, NULL, '/admin/function', 'fa fa-circle-o', 'EN', '2018-02-06 09:16:07', NULL, '2018-02-06 09:16:07', NULL);
INSERT INTO `functions` VALUES (6, 'Permission', 2, NULL, '/admin/permission', 'fa fa-circle-o', 'EN', '2018-02-06 09:25:28', NULL, '2018-02-06 09:25:28', NULL);
INSERT INTO `functions` VALUES (7, 'Role', 2, NULL, '/admin/role', 'fa fa-circle-o', 'EN', '2018-02-22 17:37:28', NULL, '2018-02-22 17:37:28', NULL);
INSERT INTO `functions` VALUES (12, 'Product Management', 0, NULL, NULL, 'fa fa-circle-o', 'EN', '2018-05-24 14:09:11', NULL, '2018-05-24 14:09:11', NULL);
INSERT INTO `functions` VALUES (13, 'Category', 12, NULL, '/admin/category', 'fa fa-circle-o', 'EN', '2018-05-24 14:09:25', NULL, '2018-05-24 14:09:25', NULL);
INSERT INTO `functions` VALUES (14, 'Product', 12, NULL, '/admin/product', 'fa fa-circle-o', 'EN', '2018-06-21 16:30:16', NULL, '2018-06-21 16:30:16', NULL);

-- ----------------------------
-- Table structure for inventories
-- ----------------------------
DROP TABLE IF EXISTS `inventories`;
CREATE TABLE `inventories`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `product_sku_id` int(11) NOT NULL,
  `quantity` float(11, 0) NOT NULL DEFAULT 0,
  `available` float(11, 0) NOT NULL DEFAULT 0,
  `allocated` float(11, 0) NOT NULL DEFAULT 0,
  `status` char(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'EN',
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id`(`id`, `product_sku_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for manufacturer_addresses
-- ----------------------------
DROP TABLE IF EXISTS `manufacturer_addresses`;
CREATE TABLE `manufacturer_addresses`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `manufacturer_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `status` char(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'EN',
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for manufacturers
-- ----------------------------
DROP TABLE IF EXISTS `manufacturers`;
CREATE TABLE `manufacturers`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `status` char(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'EN',
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for product_attributes
-- ----------------------------
DROP TABLE IF EXISTS `product_attributes`;
CREATE TABLE `product_attributes`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` char(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'EN',
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of product_attributes
-- ----------------------------
INSERT INTO `product_attributes` VALUES (1, 39, 'Thương hiệu', 'Apple', 'EN', '2018-11-09 10:03:02', NULL, '2018-11-09 10:03:02', NULL);
INSERT INTO `product_attributes` VALUES (2, 39, 'Sản xuất tại', 'Trung Quốc', 'EN', '2018-11-09 10:03:02', NULL, '2018-11-09 10:03:02', NULL);
INSERT INTO `product_attributes` VALUES (3, 39, 'Model', 'MMEF2ZA/A', 'EN', '2018-11-09 10:03:02', NULL, '2018-11-09 10:03:02', NULL);
INSERT INTO `product_attributes` VALUES (4, 39, 'Màu/Mẫu', 'Trắng', 'EN', '2018-11-09 10:03:02', NULL, '2018-11-09 10:03:02', NULL);
INSERT INTO `product_attributes` VALUES (5, 39, 'Hỗ trợ đàm thoại', 'Có', 'EN', '2018-11-09 10:03:02', NULL, '2018-11-09 10:03:02', NULL);
INSERT INTO `product_attributes` VALUES (6, 39, 'Loại Jack cắm', 'Không', 'EN', '2018-11-09 10:03:02', NULL, '2018-11-09 10:03:02', NULL);
INSERT INTO `product_attributes` VALUES (7, 39, 'Phụ kiện đi kèm', 'Hộp đựng kiêm ổ sạc.', 'EN', '2018-11-09 10:03:02', NULL, '2018-11-09 10:03:02', NULL);
INSERT INTO `product_attributes` VALUES (9, 40, 'Sản xuất tại', 'Quảng Châu', 'EN', '2018-11-09 14:27:37', NULL, '2018-11-09 14:27:37', NULL);

-- ----------------------------
-- Table structure for product_categories
-- ----------------------------
DROP TABLE IF EXISTS `product_categories`;
CREATE TABLE `product_categories`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NULL DEFAULT 0,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `icon` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `thunbnail` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `priority` int(11) NULL DEFAULT 1000,
  `url_seo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `status` char(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'EN',
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of product_categories
-- ----------------------------
INSERT INTO `product_categories` VALUES (1, 'Điện Thoại - Máy Tính Bảng', 0, NULL, 'Điện thoại', NULL, NULL, 1000, '', 'EN', '2018-06-21 13:42:42', 'xuan', '2018-10-02 14:20:38', 'xuan');
INSERT INTO `product_categories` VALUES (2, 'Tivi - Thiết Bị Nghe Nhìn', 0, NULL, NULL, NULL, NULL, 1000, '', 'EN', '2018-06-20 11:25:57', 'xuan', '2018-10-02 14:21:56', 'xuan');
INSERT INTO `product_categories` VALUES (3, 'Phụ Kiện - Thiết Bị Số', 0, NULL, NULL, NULL, NULL, 1000, '', 'DI', '2018-06-20 15:45:16', 'xuan', '2018-06-27 15:28:11', 'xuan');
INSERT INTO `product_categories` VALUES (4, 'Laptop - Thiết Bị IT', 0, NULL, NULL, NULL, NULL, 1000, '', 'EN', '2018-06-20 16:42:39', 'xuan', '2018-06-20 16:42:39', 'xuan');
INSERT INTO `product_categories` VALUES (5, 'Máy Ảnh - Quay Phim', 0, NULL, NULL, NULL, NULL, 1000, '', 'EN', '2018-06-20 16:42:46', 'xuan', '2018-06-20 16:42:46', 'xuan');
INSERT INTO `product_categories` VALUES (6, 'Điện Gia Dụng - Điện Lạnh', 11, NULL, NULL, 'fa-asterisk', '/upload/category/6_20180809105604.jpg', 1000, '', 'EN', '2018-06-20 17:13:11', 'xuan', '2018-08-09 10:56:28', 'xuan');
INSERT INTO `product_categories` VALUES (7, 'Nhà Cửa Đời Sống', 0, NULL, NULL, NULL, NULL, 1000, '', 'EN', '2018-06-21 13:41:25', 'xuan', '2018-06-21 13:41:25', 'xuan');
INSERT INTO `product_categories` VALUES (8, 'Hàng Tiêu Dùng - Thực phẩm', 0, NULL, NULL, NULL, NULL, 1000, '', 'EN', '2018-06-21 13:41:29', 'xuan', '2018-06-21 13:41:29', 'xuan');
INSERT INTO `product_categories` VALUES (9, 'Đồ Chơi, Mẹ & Bé', 0, NULL, NULL, NULL, NULL, 1000, '', 'EN', '2018-06-21 13:41:32', 'xuan', '2018-06-21 13:41:32', 'xuan');
INSERT INTO `product_categories` VALUES (10, 'Làm Đẹp - Sức Khỏe', 0, NULL, NULL, NULL, NULL, 1000, '', 'EN', '2018-06-21 13:41:35', 'xuan', '2018-06-21 13:41:35', 'xuan');
INSERT INTO `product_categories` VALUES (11, 'Thời Trang - Phụ Kiện', 0, NULL, NULL, NULL, NULL, 1000, '', 'EN', '2018-06-21 13:41:41', 'xuan', '2018-06-21 13:41:41', 'xuan');
INSERT INTO `product_categories` VALUES (12, 'Thể Thao - Dã Ngoại', 1, NULL, NULL, NULL, NULL, 1000, '', 'EN', '2018-06-21 13:41:44', 'xuan', '2018-08-13 13:42:50', 'xuan');
INSERT INTO `product_categories` VALUES (13, 'Xe Máy, Ô tô, Xe Đạp', 2, NULL, NULL, NULL, NULL, 1000, '', 'EN', '2018-06-21 13:41:47', 'xuan', '2018-08-13 13:42:33', 'xuan');
INSERT INTO `product_categories` VALUES (14, 'Sách, VPP & Quà Tặng', 0, NULL, NULL, NULL, NULL, 1000, '', 'EN', '2018-06-21 13:41:49', 'xuan', '2018-06-21 13:41:49', 'xuan');
INSERT INTO `product_categories` VALUES (15, 'Voucher - Dịch Vụ - Thẻ Cào', 0, NULL, NULL, NULL, NULL, 1000, '', 'EN', '2018-06-21 13:41:51', 'xuan', '2018-06-21 13:41:51', 'xuan');
INSERT INTO `product_categories` VALUES (17, 'Test 12356', 1, NULL, 'Test 123', NULL, NULL, 1000, '', 'DI', '2018-06-20 16:42:28', 'xuan', '2018-08-13 13:38:49', 'xuan');
INSERT INTO `product_categories` VALUES (18, 'New', 1, NULL, NULL, NULL, '/upload/category/_20181024144921.jpg', 1000, NULL, 'EN', '2018-10-24 14:49:21', 'xuan', '2018-10-24 14:49:31', 'xuan');

-- ----------------------------
-- Table structure for product_category_banners
-- ----------------------------
DROP TABLE IF EXISTS `product_category_banners`;
CREATE TABLE `product_category_banners`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_category_id` int(11) NULL DEFAULT NULL,
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` char(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'EN',
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id`(`id`, `product_category_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of product_category_banners
-- ----------------------------
INSERT INTO `product_category_banners` VALUES (1, 1, '/upload/category/1_1_20181002142008.jpg', 'EN', '2018-10-02 14:20:09', 'xuan', '2018-10-02 14:20:09', 'xuan');
INSERT INTO `product_category_banners` VALUES (2, 1, '/upload/category/1_1_20181002142038.jpg', 'EN', '2018-10-02 14:20:38', 'xuan', '2018-10-02 14:20:38', 'xuan');
INSERT INTO `product_category_banners` VALUES (3, 1, '/upload/category/1_2_20181002142038.jpg', 'EN', '2018-10-02 14:20:39', 'xuan', '2018-10-02 14:20:39', 'xuan');
INSERT INTO `product_category_banners` VALUES (4, 1, '/upload/category/1_3_20181002142038.jpg', 'EN', '2018-10-02 14:20:39', 'xuan', '2018-10-02 14:20:39', 'xuan');
INSERT INTO `product_category_banners` VALUES (5, 1, '/upload/category/1_4_20181002142038.jpg', 'EN', '2018-10-02 14:20:39', 'xuan', '2018-10-02 14:20:39', 'xuan');
INSERT INTO `product_category_banners` VALUES (6, 2, '/upload/category/2_1_20181002142156.jpg', 'EN', '2018-10-02 14:21:56', 'xuan', '2018-10-02 14:21:56', 'xuan');
INSERT INTO `product_category_banners` VALUES (7, 2, '/upload/category/2_2_20181002142156.jpg', 'EN', '2018-10-02 14:21:56', 'xuan', '2018-10-02 14:21:56', 'xuan');
INSERT INTO `product_category_banners` VALUES (8, 2, '/upload/category/2_3_20181002142156.jpg', 'EN', '2018-10-02 14:21:56', 'xuan', '2018-10-02 14:21:56', 'xuan');
INSERT INTO `product_category_banners` VALUES (9, 2, '/upload/category/2_4_20181002142156.jpg', 'EN', '2018-10-02 14:21:56', 'xuan', '2018-10-02 14:21:56', 'xuan');

-- ----------------------------
-- Table structure for product_colors
-- ----------------------------
DROP TABLE IF EXISTS `product_colors`;
CREATE TABLE `product_colors`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `status` char(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'EN',
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id`(`id`, `product_id`, `color_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 68 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of product_colors
-- ----------------------------
INSERT INTO `product_colors` VALUES (25, 1, 1, 'EN', '2018-11-02 17:00:58', NULL, '2018-11-02 17:00:58', NULL);
INSERT INTO `product_colors` VALUES (26, 1, 2, 'EN', '2018-11-02 17:00:58', NULL, '2018-11-02 17:00:58', NULL);
INSERT INTO `product_colors` VALUES (34, 30, 1, 'EN', '2018-11-07 17:00:45', NULL, '2018-11-07 17:00:45', NULL);
INSERT INTO `product_colors` VALUES (48, 8, 1, 'EN', '2018-11-12 11:25:38', NULL, '2018-11-12 11:25:38', NULL);
INSERT INTO `product_colors` VALUES (65, 40, 3, 'EN', '2018-11-14 15:06:45', NULL, '2018-11-14 15:06:45', NULL);
INSERT INTO `product_colors` VALUES (66, 40, 4, 'EN', '2018-11-14 15:06:45', NULL, '2018-11-14 15:06:45', NULL);
INSERT INTO `product_colors` VALUES (67, 35, 2, 'EN', '2018-12-20 15:54:34', NULL, '2018-12-20 15:54:34', NULL);

-- ----------------------------
-- Table structure for product_descs
-- ----------------------------
DROP TABLE IF EXISTS `product_descs`;
CREATE TABLE `product_descs`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `short_desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `long_desc` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `status` char(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'EN',
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 35 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of product_descs
-- ----------------------------
INSERT INTO `product_descs` VALUES (1, 1, 'Loa', '<p>Load</p>', 'EN', '2018-10-24 14:28:45', NULL, '2018-10-24 14:28:45', NULL);
INSERT INTO `product_descs` VALUES (4, 16, NULL, '<h3 dir=\"ltr\"><strong>Thiết kế ho&agrave;n mỹ</strong></h3>\n<p dir=\"ltr\">Nếu l&agrave; người y&ecirc;u th&iacute;ch c&aacute;c sản phẩm điện thoại th&igrave; hẳn cũng biết kể từ iPhone 6 cho đến tận iPhone 8 Plus kh&ocirc;ng c&oacute; qu&aacute; nhiều thay đổi về thiết kế, c&oacute; chăng th&igrave; đ&oacute; chỉ l&agrave; bộ khung b&ecirc;n ngo&agrave;i chuyển từ nh&ocirc;m nguy&ecirc;n khối sang k&iacute;nh thủy tinh. V&agrave; điều đ&oacute; ho&agrave;n to&agrave;n đ&atilde; ho&agrave;n thay đổi cho đến khi iPhone X xuất hiện.</p>\n<p><img src=\"https://hoanghamobile.com/Content/chan-trang/ip-x/ip-x-11.jpg\" alt=\"\" /></p>\n<p dir=\"ltr\">iPhone X đ&atilde; c&oacute; một diện mạo mới lạ, độc đ&aacute;o v&agrave; đột ph&aacute; hơn rất nhiều so với c&aacute;c thế hệ iPhone tiền nhiệm trước đ&oacute;. M&aacute;y c&oacute; một m&agrave;n h&igrave;nh tỷ lệ 19,5:9 như xu hướng v&agrave; mang đến diện t&iacute;ch hiển thị rất lớn.</p>\n<p dir=\"ltr\">Phần viền &ldquo;d&agrave;y cộm&rdquo; ph&iacute;a trước hay ph&iacute;m cảm ứng đ&atilde; bị loại bỏ ho&agrave;n to&agrave;n tr&ecirc;n iPhone X, v&agrave; cũng nhờ thiết kế bằng k&iacute;nh n&agrave;y m&agrave; iPhone đ&atilde; c&oacute; thể hỗ trợ c&ocirc;ng nghệ sạc kh&ocirc;ng d&acirc;y tốt hơn. V&agrave; điểm nhấn độc đ&aacute;o khiến cho iPhone X dễ nhận biết nhất giữa một rừng smartphone hiện nay đ&oacute; ch&iacute;nh l&agrave; cụm camera được đặt dọc ở g&oacute;c b&ecirc;n tr&aacute;i. C&aacute;c g&oacute;c cạnh của m&aacute;y cũng được bo cong ho&agrave;n hảo mang tới trải nghiệm cầm nắm mềm mại v&agrave; thoải m&aacute;i.</p>\n<h3 dir=\"ltr\"><strong>Notch v&agrave; m&agrave;n h&igrave;nh tai thỏ</strong></h3>\n<p dir=\"ltr\">Ngay từ khi ra mắt, iPhone X với phần Notch ph&iacute;a trước nằm tr&ecirc;n m&agrave;n h&igrave;nh đ&atilde; bị &ldquo;tr&ecirc;u ghẹo&rdquo; rất nhiều v&igrave; n&oacute; c&oacute; thể che khuyến một phần nội dung tr&ecirc;n m&agrave;n h&igrave;nh. Nhưng nhờ c&oacute; đ&oacute; m&agrave; người d&ugrave;ng c&oacute; th&ecirc;m nhiều diện t&iacute;ch hiển thị hơn.</p>\n<p><img src=\"https://hoanghamobile.com/Content/chan-trang/ip-x/ip-x-01.jpg\" alt=\"\" /></p>\n<p dir=\"ltr\">Notch cũng l&agrave; vị tr&iacute; của camera selfie, loa thoại, v&agrave; c&aacute;c cảm biến</p>\n<p dir=\"ltr\">iPhone X c&oacute; một m&agrave;n h&igrave;nh k&iacute;ch thước 5.8 inch Super Retina với độ ph&acirc;n giải1125 x 2436p tr&ecirc;n tấm nền OLED cao cấp cho h&igrave;nh ảnh sắc n&eacute;t v&agrave; ch&acirc;n thật.</p>\n<p dir=\"ltr\">Được biết, tấm nền OLED được trang bị tr&ecirc;n iPhone X đ&atilde; được &ldquo;T&aacute;o khuyết&rdquo; tinh chỉnh lại nhằm thay thế cho tấm nền LCD truyền thống như những chiếc iPhone đ&atilde; ra mắt trước đ&oacute;. Khả năng t&aacute;i tạo m&agrave;u của tấm nền OLED n&agrave;y rất s&acirc;u v&agrave; thực nhất l&agrave; với m&agrave;u đen. Những gam m&agrave;u m&agrave; iPhone X thể hi&ecirc;n được l&agrave; rất xuất sắc so với c&aacute;c đối thủ c&ugrave;ng tầm gi&aacute;.</p>\n<h3 dir=\"ltr\"><strong>Face ID chất lượng</strong></h3>\n<p dir=\"ltr\">iPhone X c&oacute; thể nhận diện khu&ocirc;n mặt của người d&ugrave;ng qua t&iacute;nh năng qu&eacute;t 3D v&agrave; mở kh&oacute;a cực k&igrave; nhanh ch&oacute;ng nhờ cụm camera Truedept</p>\n<p dir=\"ltr\">Kh&aacute; đ&aacute;ng tiếc Touch ID huyền thoại đ&atilde; qu&aacute; quen thuộc trong suốt nhiều năm qua nay đ&atilde; bị loại bỏ tr&ecirc;n iPhone X. Nhưng nhưng chắc chắn rằng với những g&igrave; Apple trang bị cho Face ID th&igrave; người d&ugrave;ng sẽ c&oacute; những trải nghiệm mới lạ v&agrave; tốt nhất khi sử dụng thiết bị.</p>\n<p><img src=\"https://hoanghamobile.com/Content/chan-trang/ip-x/ip-x-02.jpg\" alt=\"\" /></p>\n<h3 dir=\"ltr\"><strong>Tất cả chỉ cần &ldquo;vuốt&rdquo;</strong></h3>\n<p dir=\"ltr\">Giờ đ&acirc;y người d&ugrave;ng sẽ kh&ocirc;ng cần phải lo lắng khi ấn qu&aacute; nhiều sẽ l&agrave;m hỏng ph&iacute;m Home như trước đ&acirc;y nữa v&igrave; Apple đ&atilde; nhường lại vị tr&iacute; đ&oacute; cho m&agrave;n h&igrave;nh. V&agrave; b&acirc;y giờ tất cả c&aacute;c thao t&aacute;c tr&ecirc;n m&aacute;y sẽ chỉ c&oacute; vuốt v&agrave; vuốt m&agrave; th&ocirc;i.</p>\n<h3 dir=\"ltr\"><strong>Camera tốt nhất hiện tại</strong></h3>\n<p dir=\"ltr\">iPhone vẫn c&oacute; cho m&igrave;nh cụm camera k&eacute;p độ ph&acirc;n giải 12 MP nhưng lần n&agrave;y camera tele đ&atilde; được n&acirc;ng khẩu độ l&ecirc;n f/2.4 cao hơn iPhone 7 Plus với khẩu độ chỉ f/2.8.</p>\n<p dir=\"ltr\">Cả hai cảm biến n&agrave;y đều c&oacute; t&iacute;nh năng chống rung quang học (OIS) từ đ&oacute; bạn c&oacute; thể &ldquo;bắt&rdquo; mọi khoảnh khắc m&agrave; bạn muốn.</p>\n<p><img src=\"https://hoanghamobile.com/Content/chan-trang/ip-x/ip-x-20.jpg\" alt=\"\" /></p>\n<p dir=\"ltr\">B&ecirc;n cạnh đ&oacute;, camera selfie c&oacute; độ ph&acirc;n giải 7 MP c&oacute; thể chụp ảnh selfie x&oacute;a ph&ocirc;ng, chụp ảnh g&oacute;c rộng, selfie ngược s&aacute;ng HDR v&agrave; quay phim Full HD.</p>\n<h3 dir=\"ltr\"><strong>Hiệu năng miễn b&agrave;n</strong></h3>\n<p dir=\"ltr\">Chưa bao giờ c&aacute;c sản phẩm của Apple bị đ&aacute;nh gi&aacute; k&eacute;m về hiệu năng v&agrave; đặc biệt l&agrave; iPhone. T&iacute;nh đến thời điểm hiện tại th&igrave; hầu như kh&ocirc;ng c&oacute; chiếc smartphone c&oacute; thể s&aacute;nh ngang được với tốc xử l&yacute; m&agrave; iPhone X mang lại.</p>\n<p dir=\"ltr\">Cung cấp sức mạnh cho iPhone X l&agrave; vi xửl &yacute; Apple A11 Bionic 6 nh&acirc;n, đi k&egrave;m với đ&oacute; l&agrave; dung lượng RAM 3GB, bộ nhớ trong 64GB. Với những th&ocirc;ng số kỹ thuật như n&agrave;y th&igrave; người d&ugrave;ng ho&agrave;n to&agrave;n c&oacute; thể l&agrave;m mọi t&aacute;c vụ, đa nhiệm thoải m&aacute;i v&agrave; lưu trữ dữ liệu tẹt ga m&agrave; kh&ocirc;ng phải bận t&acirc;m điều g&igrave; cả.</p>\n<p><img src=\"https://hoanghamobile.com/Content/chan-trang/ip-x/ip-x-14.jpg\" alt=\"\" /></p>\n<p dir=\"ltr\">Apple cũng đặc biệt nhấn mạnh t&iacute;nh năng tương t&aacute;c thực tế ảo tăng cường AR sẽ đem đến những gi&acirc;y ph&uacute;t giải tr&iacute; tuyệt vời nhất.</p>\n<p dir=\"ltr\">Cuối c&ugrave;ng, thời lượng pin 2716 mAh của iPhone X cũng đủ để đ&aacute;p ứng một ng&agrave;y d&agrave;i sử dụng của bạn với đa t&aacute;c vụ v&agrave; th&acirc;m ch&iacute; con số n&agrave;y c&ograve;n cao hơn cả iPhone 8 Plus với chỉ 2691 mAh.</p>', 'EN', '2018-10-24 15:41:36', 'xuan', '2018-10-24 15:41:36', 'xuan');
INSERT INTO `product_descs` VALUES (5, 17, NULL, '<p>1212</p>', 'EN', '2018-10-24 16:13:29', 'xuan', '2018-10-24 16:13:29', 'xuan');
INSERT INTO `product_descs` VALUES (6, 18, '<p>45888</p>', '<p>78</p>', 'EN', '2018-10-24 16:15:56', 'xuan', '2018-10-24 16:15:56', 'xuan');
INSERT INTO `product_descs` VALUES (14, 26, 'Loại tivi: Internet Tivi cơ bản\r\n\r\nMàn hình: 40 inch\r\n\r\nĐộ phân giải: Full HD\r\n\r\nKết nối: Wifi, HDMI, USB, LAN\r\n\r\nTổng công suất loa: 10 W', '<h2><a href=\"https://tiki.vn/smart-internet-tivi/c4239/sony\">Internet Tivi Sony</a>&nbsp;40 inch KDL-40W650D - H&igrave;nh ảnh ch&acirc;n thực với c&ocirc;ng nghệ&nbsp;X-Reality PRO</h2>\n\n<h3><a href=\"https://tiki.vn/ti-vi/c5015\">Tivi</a>&nbsp;40 inch với thiết kế đẳng cấp</h3>\n\n<p><img alt=\"Internet Tivi Sony 40 inch KDL-40W650D\" src=\"https://tikicdn.com/media/catalog/product/1/_/1.u2470.d20160927.t104050.210569.jpg\" style=\"height:500px; width:750px\" title=\"Internet Tivi Sony 40 inch KDL-40W650D\" /></p>\n\n<p>Internet&nbsp;<a href=\"https://tiki.vn/ti-vi/c5015/sony\">Tivi Sony</a>&nbsp;40 inch KDL-40W650D thiết kế sang trọng v&agrave; đẳng cấp: viền m&agrave;n h&igrave;nh mỏng, ch&acirc;n đế độc đ&aacute;o.&nbsp;K&iacute;ch cỡ 40 inch, bạn c&oacute; thể đặt tại c&aacute;c kh&ocirc;ng gian vừa v&agrave; nhỏ như: ph&ograve;ng kh&aacute;ch, ph&ograve;ng ngủ...</p>\n\n<h3>Khoảng c&aacute;ch xem an to&agrave;n cho mắt l&agrave; từ 2m đến 3m</h3>\n\n<p><img alt=\"Internet Tivi Sony 40 inch  KDL-40W650D \" src=\"https://tikicdn.com/media/catalog/product/s/o/sony-kdl-40w650d-9.u2470.d20160624.t105724.jpg\" style=\"height:283px; width:750px\" title=\"Internet Tivi Sony 40 inch  KDL-40W650D \" /></p>\n\n<p>Để bảo vệ an to&agrave;n cho mắt người nh&igrave;n, bạn n&ecirc;n lựa chọn cho m&igrave;nh khoảng c&aacute;ch xem ph&ugrave; hợp. Đối với tivi 40 inchi th&igrave; khoảng c&aacute;ch xem an to&agrave;n l&agrave; từ khoảng 2m đến 3m.</p>\n\n<h3>C&ocirc;ng nghệ độc quyền X-Reality PRO</h3>\n\n<p><img alt=\"Internet Tivi Sony 40 inch KDL-40W650D\" src=\"https://tikicdn.com/media/catalog/product/2/_/2.u2470.d20160927.t104050.258269.jpg\" style=\"height:500px; width:750px\" title=\"Internet Tivi Sony 40 inch KDL-40W650D\" /></p>\n\n<p>Tivi Full HD h&igrave;nh ảnh sắc n&eacute;t với c&ocirc;ng nghệ độc quyền X-Reality PRO&nbsp;c&oacute; c&ocirc;ng dụng giảm nhiễu, giảm mờ tr&ecirc;n tivi, tăng cường độ chi tiết v&agrave; ch&acirc;n thực của h&igrave;nh ảnh.</p>\n\n<h3>C&ocirc;ng nghệ &acirc;m thanh Dolby Digital kết hợp c&ugrave;ng Clear Phase</h3>\n\n<p><img alt=\"Internet Tivi Sony 40 inch KDL-40W650D\" src=\"https://tikicdn.com/media/catalog/product/3/_/3.u2470.d20160927.t104050.300767.jpg\" style=\"height:500px; width:750px\" title=\"Internet Tivi Sony 40 inch KDL-40W650D\" /></p>\n\n<p>Dolby Digital sẽ gi&uacute;p ph&aacute;t ra những &acirc;m thanh đa chiều, liền mạch v&agrave; lan toả khắp căn ph&ograve;ng sẽ cho bạn trải nghiệm &acirc;m thanh mạnh mẽ v&agrave; b&ugrave;ng nổ. C&ograve;n c&ocirc;ng nghệ Clear Phase mang đến &acirc;m thanh trong, tự nhi&ecirc;n v&agrave; mịn m&agrave;ng hơn.</p>\n\n<h3>Đầu thu DVB-T2</h3>\n\n<p><img alt=\"Internet Tivi Sony 40 inch KDL-40W650D\" src=\"https://tikicdn.com/media/catalog/product/4/_/4.u2470.d20160927.t104050.340329.jpg\" style=\"height:500px; width:750px\" title=\"Internet Tivi Sony 40 inch KDL-40W650D\" /></p>\n\n<p>Với đầu thu DVB-T2 c&oacute; sẵn, tivi c&oacute; thể thu được c&aacute;c k&ecirc;nh truyền h&igrave;nh kỹ thuật số miễn ph&iacute;.</p>\n\n<p>Lưu &yacute;:&nbsp;Số k&ecirc;nh thu được phụ thuộc v&agrave;o vị tr&iacute; địa l&yacute; v&agrave; chất lượng ăng ten của nh&agrave; bạn.</p>\n\n<h3>Giải tr&iacute; đa dạng</h3>\n\n<p><img alt=\"Internet Tivi Sony 40 inch KDL-40W650D\" src=\"https://tikicdn.com/media/catalog/product/5/_/5.u2470.d20160927.t104050.379367.jpg\" style=\"height:500px; width:750px\" title=\"Internet Tivi Sony 40 inch KDL-40W650D\" /></p>\n\n<p>Bạn c&oacute; thể d&ugrave;ng tr&igrave;nh duyệt web để đọc b&aacute;o, hay xem phim bằng FPT Play, YouTube, hay nghe nhạc bằng Zing Mp3... Th&ecirc;m v&agrave;o đ&oacute; l&agrave; kho ứng dụng Opera TV Store với một số ứng dụng kh&aacute;c.</p>\n\n<h3>Kết nối dễ d&agrave;ng</h3>\n\n<p><img alt=\"Internet Tivi Sony 40 inch KDL-40W650D\" src=\"https://tikicdn.com/media/catalog/product/7/_/7.u2470.d20160927.t104050.455262.jpg\" style=\"height:500px; width:750px\" title=\"Internet Tivi Sony 40 inch KDL-40W650D\" /></p>\n\n<p>Internet Tivi Sony 40 inch KDL-40W650D dễ d&agrave;ng kết nối với&nbsp;<a href=\"http://tiki.vn/usb-luu-tru/c1828\">USB</a>&nbsp;qua cổng USB, kết nối với m&aacute;y t&iacute;nh,&nbsp;<a href=\"https://tiki.vn/may-anh/c1801\">m&aacute;y ảnh</a>&hellip; th&ocirc;ng qua cổng HDMI. &nbsp;Ngo&agrave;i ra tivi c&ograve;n c&oacute;&nbsp;Wifi t&iacute;ch hợp sẵn, cổng LAN cắm d&acirc;y mạng phục vụ cho nhu cầu giải tr&iacute; v&agrave; học tập của bạn.</p>\n\n<h3>Chiếu m&agrave;n h&igrave;nh Screen Mirroring</h3>\n\n<p><img alt=\"Internet Tivi Sony 40 inch KDL-40W650D\" src=\"https://tikicdn.com/media/catalog/product/6/_/6.u2470.d20160927.t104050.417030.jpg\" style=\"height:500px; width:750px\" title=\"Internet Tivi Sony 40 inch KDL-40W650D\" /></p>\n\n<p>Chiếu m&agrave;n h&igrave;nh nội dung h&igrave;nh ảnh, video từ&nbsp;<a href=\"https://tiki.vn/dien-thoai-smartphone/c1795\">điện thoại</a>,&nbsp;<a href=\"http://tiki.vn/may-tinh-bang/c1794\">m&aacute;y t&iacute;nh bảng</a>&nbsp;l&ecirc;n tivi để chia sẻ với bạn b&egrave;, người th&acirc;n. B&ecirc;n cạnh đ&oacute;, t&iacute;nh năng chuyển h&igrave;nh từ điện thoại l&ecirc;n Tivi th&ocirc;ng qua ứng dụng Photo Sharing Plus, để bạn c&ugrave;ng bạn b&egrave;, người th&acirc;n xem ảnh tr&ecirc;n m&agrave;n h&igrave;nh rộng. Mỗi một lần kết nối, tivi cho ph&eacute;p tối đa l&agrave; 10 điện thoại.</p>\n\n<h3>Hạn chế ảnh hưởng của bụi bẩn, sấm s&eacute;t, sốc điện v&agrave; độ ẩm</h3>\n\n<p>Nhằm gi&uacute;p tivi c&oacute; tuổi thọ, Sony đ&atilde; trang bị cho Internet Tivi Sony 40 inch KDL-40W650D c&ocirc;ng nghệ Sony X-Protection PRO. Nhờ v&agrave;o đ&oacute;, những yếu tố b&ecirc;n ngo&agrave;i m&ocirc;i trường v&agrave; điều kiện sử dụng như: Sấm s&eacute;t, độ ẩm, sốc điện hay bụi được hạn chế đến mức tối đa ảnh hưởng đến tivi, gi&uacute;p tivi lu&ocirc;n bền bỉ.</p>\n\n<p>Lưu &yacute;: &quot; T&iacute;nh năng n&agrave;y chỉ gi&uacute;p hạn chế sự ảnh hưởng kh&ocirc;ng bảo vệ 100% tivi trước c&aacute;c t&aacute;c nh&acirc;n g&acirc;y hại&quot;.</p>', 'EN', '2018-10-31 14:27:17', 'xuan', '2018-10-31 14:27:17', 'xuan');
INSERT INTO `product_descs` VALUES (18, 30, '123', '<p><strong>Nụ H&ocirc;n Của S&oacute;i (T&aacute;i Bản 2018)</strong></p>\n\n<p>Nếu An Dĩ Phong kh&ocirc;ng t&iacute;nh l&agrave; đ&agrave;n &ocirc;ng, tr&ecirc;n thế giới n&agrave;y kh&ocirc;ng ai d&aacute;m n&oacute;i ch&iacute;nh m&igrave;nh l&agrave; đ&agrave;n &ocirc;ng!</p>\n\n<p>Nếu An Dĩ Phong kh&ocirc;ng t&iacute;nh l&agrave; y&ecirc;u nghiệt, như vậy, tr&ecirc;n thế giới n&agrave;y cũng kh&ocirc;ng hề c&oacute; y&ecirc;u nghiệt...</p>\n\n<p>Hắn l&agrave; một người đ&agrave;n &ocirc;ng như vậy, rong ruổi giang hồ mười lăm năm, ai d&aacute;m c&ugrave;ng hắn một c&acirc;u tr&aacute;i &yacute;, về sau đừng nghĩ mở miệng n&oacute;i chuyện. Hắn ki&ecirc;u ngạo ương ngạnh, ho&agrave;nh h&agrave;nh ngang dọc, hắn c&ocirc; độc, mệt mỏi... nhưng mấy ai biết rằng, trong tim hắn chỉ c&oacute; một b&oacute;ng h&igrave;nh, v&agrave; c&oacute; một người lặng lẽ y&ecirc;u hắn, chờ hắn... ở một nơi rất xa.</p>\n\n<p>H&agrave;i hước, l&atilde;ng mạn, mi&ecirc;u tả t&acirc;m l&yacute; nh&acirc;n vật cực kh&eacute;o, cốt truyện gay cấn, t&aacute;c giả đ&atilde; tạo cho c&acirc;u chuyện t&igrave;nh y&ecirc;u đầy m&agrave;u sắc cổ t&iacute;ch giữa một nữ cảnh s&aacute;t v&agrave; anh ch&agrave;ng lừng lẫy chốn giang hồ sự hấp dẫn đặc biệt. Đan xen v&agrave;o c&acirc;u chuyện t&igrave;nh y&ecirc;u n&agrave;y l&agrave; c&acirc;u chuyện của t&igrave;nh bạn, t&igrave;nh anh em, t&igrave;nh cha con, của nghĩa kh&iacute;, chữ t&iacute;n v&agrave; sức mạnh của những ước mơ. Đ&oacute; ch&iacute;nh l&agrave; những điều tốt đẹp trong cuộc đời n&agrave;y.</p>', 'EN', '2018-11-07 16:31:34', 'xuan', '2018-11-07 16:31:34', 'xuan');
INSERT INTO `product_descs` VALUES (23, 35, '<p>Loại SSD: Giao tiếp Sata III K&iacute;ch thước: 2.5 inch Dung lượng: 500GB Tốc độ đọc: 550MBps Tốc độ ghi: 520MBps Tổng dung lượng đ&atilde; ghi (TBW): 300TB</p>', '<h5>Thiết kế ti&ecirc;n tiến</h5>\r\n<p>Ổ Cứng SSD Sata III 2.5 inch 500GB Samsung 860 Evo MZ-76E500BW&nbsp;được thiết kế đặc biệt cho m&aacute;y t&iacute;nh c&aacute; nh&acirc;n v&agrave; m&aacute;y t&iacute;nh x&aacute;ch tay, với V-NAND mới nhất &ocirc;̉ cứng SSD nhanh v&agrave; đ&aacute;ng tin cậy n&agrave;y c&oacute; nhiều yếu tố h&igrave;nh thức v&agrave; khả năng tương th&iacute;ch tốt hầu hết c&aacute;c loại thiết bị m&aacute;y t&iacute;nh, laptop hiện nay. Đ&aacute;p ứng tốt những nhu cầu cơ bản như: tốc độ khởi động m&aacute;y t&iacute;nh nhanh, truy xuất dữ liệu, h&igrave;nh ảnh dung lượng lớn một c&aacute;ch nhanh ch&oacute;ng, đi k&egrave;m với nhiều c&ocirc;ng nghệ t&iacute;ch hợp của Samsung gi&uacute;p cho ổ cứng của bạn c&oacute; thể hoạt động một c&aacute;ch ổn định v&agrave; bền bỉ nhất.</p>\r\n<p><img style=\"height: 500px; width: 750px;\" src=\"https://vcdn.tikicdn.com/ts/tmp/ff/6b/02/c6ea568d0fec7280d89de53f63b50b2d.jpg\" alt=\"Ổ Cứng SSD Sata III 2.5 inch 500GB Samsung 860 Evo MZ-76E500BW - H&agrave;ng Ch&iacute;nh H&atilde;ng\" /></p>\r\n<h5>Dung lượng lưu trữ 500GB</h5>\r\n<p>Với &ocirc;̉ cứng dung lượng 500GB sẽ đ&aacute;p ứng được nhu cầu lưu trữ của bạn, mọi tập tin video v&agrave; h&igrave;nh ảnh của bạn sẽ được lưu trữ với tốc độ nhanh ch&oacute;ng kh&ocirc;ng ngờ, giúp bạn thoải mái lưu trữ dữ li&ecirc;̣u phục vụ cho c&ocirc;ng việc v&agrave; giải tr&iacute; của m&igrave;nh.</p>\r\n<p><img style=\"height: 500px; width: 750px;\" src=\"https://vcdn.tikicdn.com/ts/tmp/50/7a/ec/1c0c47fe5671c5cee9eda9a47d4aadac.jpg\" alt=\"Ổ Cứng SSD Sata III 2.5 inch 500GB Samsung 860 Evo MZ-76E500BW - H&agrave;ng Ch&iacute;nh H&atilde;ng\" /></p>\r\n<h5>Tốc độ đọc và ghi cực nhanh</h5>\r\n<p>Đạt hiệu suất đọc / ghi đ&aacute;ng kinh ngạc, gi&uacute;p bạn ho&agrave;n th&agrave;nh c&ocirc;ng việc h&agrave;ng ng&agrave;y của bạn nhanh ch&oacute;ng với c&ocirc;ng nghệ Intelligent TurboWrite của Samsung. Với c&ocirc;ng nghệ mới n&agrave;y, hiệu suất Samsung 860 EVO được tăng l&ecirc;n 1.9 lần so với 840 Evo. Ổ cứng SSD Samsung 860 EVO&nbsp;MZ-76E500BW mang đẳng cấp h&agrave;ng đầu về tốc độ đọc (550MB/s) v&agrave; ghi (520Mb/s). Ngo&agrave;i ra, tối ưu h&oacute;a hiệu suất ngẫu nhi&ecirc;n IOPs l&ecirc;n đến 98k.</p>\r\n<p><img style=\"height: 500px; width: 750px;\" src=\"https://vcdn.tikicdn.com/ts/tmp/a9/fa/32/5f2caec67d39a928cdaee180abd238d7.jpg\" alt=\"Ổ Cứng SSD Sata III 2.5 inch 500GB Samsung 860 Evo MZ-76E500BW - H&agrave;ng Ch&iacute;nh H&atilde;ng\" /></p>\r\n<h5>C&ocirc;ng nghệ Samsung 64-Layer 3D V-NAND Technology</h5>\r\n<p>C&ocirc;ng nghệ Samsung 64-Layer 3D V-NAND của Samsung ch&iacute;nh l&agrave; bước đột ph&aacute; về kiến tr&uacute;c bộ nhớ Flash bằng việc l&agrave;m tăng mật độ, hiệu suất, v&agrave; giới hạn về sự chịu đựng của kiến tr&uacute;c NAND phẳng th&ocirc;ng thường hiện nay. C&ocirc;ng nghệ Samsung 3D V-NAND sắp xếp 64 lớp tế b&agrave;o Cell theo chiều dọc l&agrave;m tăng mật độ Cell cao hơn v&agrave; hiệu suất tốt hơn gấp đ&ocirc;i so với c&ocirc;ng nghệ 32-Layer được sử dụng tr&ecirc;n c&aacute;c d&ograve;ng 850.</p>\r\n<h5>Chế độ RAPID Mode</h5>\r\n<p>Phần mềm Magician của Samsung được trang bị chế độ RAPID Mode. Khi được k&iacute;ch hoạt sẽ l&agrave;m tăng hiệu năng của SSD Samsung 860 Evo rất nhiều lần bằng c&aacute;ch sử dụng bộ nhớ RAM PC c&ograve;n trống như một bộ nhớ cache tốc độ cao. Phi&ecirc;n bản mới nhất của Samsung Magician hỗ trợ l&ecirc;n đến 4 GB bộ nhớ Cache tr&ecirc;n một hệ thống 16GB DRAM.</p>\r\n<h5>Độ bền v&agrave; độ tin cậy gấp s&aacute;u lần</h5>\r\n<p>C&oacute; độ bền v&agrave; độ tin cậy gấp s&aacute;u lần v&igrave; được trang bị c&ocirc;ng nghệ Intelligent TurboWrite mới được cải tiến so với thế hệ trước 850 EVO v&agrave; c&oacute; chế độ bảo h&agrave;nh 5 năm tại MemoryZone. Với độ tin cậy cao, ổ cứng SSD Samsung 860 EVO&nbsp;MZ-76E500BW đảm bảo hiệu suất đ&aacute;ng tin cậy l&acirc;u hơn so với thế hệ trước đ&oacute; 850 EVO.</p>\r\n<h5>Cải thiện năng lượng hiệu quả</h5>\r\n<p>L&agrave;m gia tăng tuổi thọ pin l&acirc;u hơn tr&ecirc;n m&aacute;y t&iacute;nh x&aacute;ch tay của bạn với một bộ điều khiển được thiết kế v&agrave; tối ưu h&oacute;a cho c&ocirc;ng nghệ 3D V-NAND, hỗ trợ Device-Sleep cho Windows với mức ti&ecirc;u thụ điện chỉ 2mW. Ổ cứng SSD Samsung 860 EVO&nbsp;MZ-76E500BW ti&ecirc;u thụ năng lượng &iacute;t hơn 25% so với 840 EVO trong c&aacute;c hoạt động ghi nhờ c&ocirc;ng nghệ si&ecirc;u hiệu quả 3D V-NAND, chỉ tốn một nửa năng lượng hơn so với Planar 2D NAND truyền thống.</p>\r\n<h5>M&atilde; h&oacute;a dữ liệu cực an to&agrave;n</h5>\r\n<p>Đi k&egrave;m c&aacute;c c&ocirc;ng cụ m&atilde; h&oacute;a dựa tr&ecirc;n phần cứng mới nhất của Samsung. Chuẩn m&atilde; h&oacute;a AES bằng phần cứng 256-bit kh&ocirc;ng hề ảnh hưởng đến dữ liệu của bạn, ph&ugrave; hợp với TCG Opal 2.0. Dễ d&agrave;ng t&iacute;ch hợp v&agrave;o Windows với Microsoft IEEE1667 để giữ cho dữ liệu của bạn được bảo vệ ở tất cả c&aacute;c lần.</p>\r\n<h5>C&ocirc;ng ngh&ecirc; Dynamic Thermal Guard chống nhiệt</h5>\r\n<p>C&ocirc;ng ngh&ecirc; Dynamic Thermal Guard của ổ cứng SSD Samsung 860 EVO li&ecirc;n tục gi&aacute;m s&aacute;t v&agrave; duy tr&igrave; nhiệt độ l&yacute; tưởng cho ổ đĩa để hoạt động trong điều kiện tối ưu nhất, đảm bảo t&iacute;nh an to&agrave;n của dữ liệu. Dynamic Thermal Guard tự động điều chỉnh hiệu năng ổ cứng để hạ nhiệt độ xuống khi nhiệt độ tăng l&ecirc;n tr&ecirc;n mức cho ph&eacute;p. Điều n&agrave;y bảo vệ dữ liệu của bạn trong khi hoạt động để gi&uacute;p đảm bảo m&aacute;y t&iacute;nh của bạn lu&ocirc;n được an to&agrave;n khỏi bị qu&aacute; n&oacute;ng.</p>\r\n<h5>Dễ d&agrave;ng n&acirc;ng cấp SSD</h5>\r\n<p>Chỉ cần ba bước đơn giản, phần mềm đi k&egrave;m Samsung Data Migration dễ d&agrave;ng cho ph&eacute;p bạn di chuyển tất cả c&aacute;c dữ liệu v&agrave; c&aacute;c ứng dụng từ ổ đĩa HDD hiện tại của bạn sang ổ cứng SSD Samsung 860 Evo MZ-76E500BW. C&aacute;c phần mềm bao gồm Samsung Magician cũng cho ph&eacute;p bạn thiết lập, tối ưu h&oacute;a v&agrave; quản l&yacute; hệ thống của bạn, cho hiệu suất SSD cực cao.</p>', 'EN', '2018-11-08 09:36:28', 'xuan', '2018-11-08 09:36:28', 'xuan');
INSERT INTO `product_descs` VALUES (27, 39, 'Thiết kế thời thượng, nhỏ gọn\r\n\r\nĐeo thoải mái, không đau tai\r\n\r\nChất âm tốt, âm thanh rõ và chi tiết\r\n\r\nSử dụng thông minh với cảm biến tiệm cận\r\n\r\nThời lượng pin tốt', '<h5>Thiết kết thời thượng, nhỏ gọn</h5>\n\n<p><strong>Tai nghe nh&eacute;t tai Apple Airpods</strong>&nbsp;c&oacute; thiết kế giống Earpod nhưng được loại bỏ đi phần d&acirc;y t&iacute;n hiệu n&ecirc;n tr&ocirc;ng rất thời thượng với vỏ nhựa trắng b&oacute;ng bẫy. Phần nh&eacute;t tai c&oacute; thiết kế ho&agrave;n thiện c&ugrave;ng trọng lượng nhẹ vừa đủ để giữ tai nghe chắc chắn tr&ecirc;n tại bạn nhưng vẫn kh&ocirc;ng tạo cảm gi&aacute;c kh&oacute; chịu hay đau tai khi sử dụng.</p>\n\n<p><img alt=\"Tai Nghe Nhét Tai Apple Airpod - Hàng Nhập Khẩu\" src=\"https://tikicdn.com/media/catalog/product/6/1/61pjnh5n05l-_sl1144_.u5367.d20170712.t140754.724037.jpg\" style=\"height:467px; width:700px\" title=\"Tai Nghe Nhét Tai Apple Airpod - Hàng Nhập Khẩu\" /></p>\n\n<h5>Sử dụng th&ocirc;ng minh</h5>\n\n<p>Tai nghe nh&eacute;t tai Apple Airpods được t&iacute;ch hợp cảm biến tiệm cận ở mỗi b&ecirc;n, mang đến khả năng sử dụng linh hoạt v&agrave; th&ocirc;ng minh. Bộ cảm biến n&agrave;y sẽ dựa v&agrave;o những phản ứng kh&aacute;c nhau của người d&ugrave;ng để k&iacute;ch hoạt những t&iacute;nh năng sử dụng tối ưu nhất, như:</p>\n\n<ul>\n	<li>Đang đeo hai tai: th&aacute;o hai tai ra th&igrave; tự động tắt, đeo lại hai tai tự động mở (c&oacute; &acirc;m b&aacute;o nhẹ)</li>\n	<li>Đang đeo hai tai + mở nhạc: th&aacute;o hai tai ra tự động tắt nhạc</li>\n	<li>Đang đeo hai tai + mở nhạc: th&aacute;o một tai ra nhạc sẽ tắt. Đeo lại tai nhạc sẽ mở lại</li>\n	<li>Đang đeo hai tai + đ&agrave;m thoại: th&aacute;o một tai xuống th&igrave; cuộc đ&agrave;m thoại vẫn tiếp tục</li>\n	<li>Đang đeo hai tai + Facetime: bỏ hai tai ra tự động chuyển qua loa ngo&agrave;i</li>\n</ul>\n\n<p><img alt=\"Tai Nghe Nhét Tai Apple Airpod - Hàng Nhập Khẩu\" src=\"https://tikicdn.com/media/catalog/product/d/e/devices_large.u5367.d20170712.t140754.779963.jpg\" style=\"height:467px; width:700px\" title=\"Tai Nghe Nhét Tai Apple Airpod - Hàng Nhập Khẩu\" /></p>\n\n<h5>Thời lượng pin l&acirc;u</h5>\n\n<p>Chỉ với một lần sạc, bạn c&oacute; thể sử dụng tai nghe nh&eacute;t ta Apple Airpods nghe nhạc 5 giờ li&ecirc;n tục hay 2 giờ thoại li&ecirc;n tục. Tai nghe cũng rất dễ được bảo quản v&agrave; sạc pin với ổ sạc ki&ecirc;m hộp đựng đi k&egrave;m hỗ trợ kết nối Lightning. V&agrave; chỉ với 15 ph&uacute;t sạc bằng ổ sạc đi k&egrave;m, bạn c&oacute; thể sử dụng tai nghe để nghe nhạc 3 giờ li&ecirc;n tục.</p>\n\n<h5><img alt=\"Tai Nghe Nhét Tai Apple Airpod - Hàng Nhập Khẩu\" src=\"https://tikicdn.com/media/catalog/product/h/e/hero_fallback_large.u5367.d20170712.t140754.825469.jpg\" style=\"height:467px; width:700px\" title=\"Tai Nghe Nhét Tai Apple Airpod - Hàng Nhập Khẩu\" /></h5>\n\n<h5>Chất &acirc;m tốt, lọc &acirc;m khi đ&agrave;m thoại</h5>\n\n<p>Tai nghe Apple Airpods cho chất &acirc;m tốt, r&otilde; r&agrave;ng v&agrave; chi tiết. B&ecirc;n cạnh đ&oacute;, đối với c&aacute;c cuộc gọi v&agrave; trợ l&yacute; ảo Siri, tai nghe sẽ tự động tập trung v&agrave;o giọng n&oacute;i của bạn, loại bỏ c&aacute;c tập &acirc;m.</p>\n\n<p><img alt=\"Tai Nghe Nhét Tai Apple Airpod - Hàng Nhập Khẩu\" src=\"https://tikicdn.com/media/catalog/product/s/o/sound_large.u5367.d20170712.t140754.863988.jpg\" style=\"height:467px; width:700px\" title=\"Tai Nghe Nhét Tai Apple Airpod - Hàng Nhập Khẩu\" /></p>', 'EN', '2018-11-09 10:03:02', 'xuan', '2018-11-09 10:03:02', 'xuan');
INSERT INTO `product_descs` VALUES (28, 40, 'Thiết kế cá tính hợp thời trang mang hơi hướng phong cách Hàn Quốc\n\nĐế cao su dẻo êm có độ ma sat cao tránh trơn trượt\n\nChất liệu siêu nhẹ siêu bền', '<p>Chất liệu : da PU + vải dệt , đế cao su</p>\n\n<p>Đế cao : 5 cm</p>\n\n<p>Màu sắc : đen , trắng</p>\n\n<p><img alt=\"\" src=\"https://salt.tikicdn.com/ts/tmp/0a/23/5a/b28d8539427d3ac92af0141ee5423e3a.jpg\" style=\"height:1137px; width:750px\" /><img alt=\"\" src=\"https://salt.tikicdn.com/ts/tmp/cb/f2/0e/ffe43b6938dda8c03aeda078ae5ffdfe.jpg\" style=\"height:1204px; width:750px\" /><img alt=\"\" src=\"https://salt.tikicdn.com/ts/tmp/a3/5b/f0/531f2bdfb9c1e974f459e375c28a12d2.jpg\" style=\"height:900px; width:643px\" /><img alt=\"\" src=\"https://salt.tikicdn.com/ts/tmp/e3/6c/9e/8c4c97625e79e75848aacc59c1b63fb8.jpg\" style=\"height:900px; width:643px\" /><img alt=\"\" src=\"https://salt.tikicdn.com/ts/tmp/f0/fe/9b/8dc8e6ab2abc01b8d38a5e269138f0c9.jpg\" style=\"height:900px; width:643px\" /><img alt=\"\" src=\"https://salt.tikicdn.com/ts/tmp/7e/99/d7/5a4f696b77f8ede0411c3661f05959ea.jpg\" style=\"height:900px; width:643px\" /><img alt=\"\" src=\"https://salt.tikicdn.com/ts/tmp/b0/a9/d4/a284fd9e5ee3186ccb1c9bcb36d9f644.jpg\" style=\"height:900px; width:643px\" /><img alt=\"\" src=\"https://salt.tikicdn.com/ts/tmp/bd/37/82/52244bbe55a1dde7ddb89fc66643651f.jpg\" style=\"height:900px; width:643px\" /><img alt=\"\" src=\"https://salt.tikicdn.com/ts/tmp/c1/f5/11/f58c22928b06b42ab44c62dce9b5fd65.jpg\" style=\"height:900px; width:643px\" /><img alt=\"\" src=\"https://salt.tikicdn.com/ts/tmp/13/28/39/d1a40fa8e305a51cf3840d1828c4421f.jpg\" style=\"height:900px; width:643px\" /></p>\n\n<p><img alt=\"\" src=\"https://salt.tikicdn.com/ts/tmp/2f/c4/43/a4d5b9d34015aeb1b9c7fbdb33c7768b.jpg\" style=\"height:750px; width:750px\" /></p>', 'EN', '2018-11-09 14:27:37', 'xuan', '2018-11-12 10:11:21', 'xuan');
INSERT INTO `product_descs` VALUES (29, 9, NULL, '<h5>Thiết kế cấu tr&uacute;c kim loại nguy&ecirc;n khối</h5>\n\n<p><strong>Điện Thoại Asus Zenfone Max Pro M1</strong>&nbsp;sở hữu cấu tr&uacute;c kim loại nguy&ecirc;n khối, kiểu d&aacute;ng hiện đại, mềm mại với c&aacute;c g&oacute;c cạnh bo tr&ograve;n tạo cảm giác c&acirc;̀m tr&ecirc;n tay chắn chắn. Lớp vỏ kim loại cứng c&aacute;p được ho&agrave;n thiện chắc chắn v&agrave; tinh xảo.</p>\n\n<p><img alt=\"Điện Thoại Asus Zenfone Max Pro M1 (4G/64GB) - Hàng Chính Hãng\" src=\"https://vcdn.tikicdn.com/ts/tmp/ae/45/d3/acecaf375887330c37e977375aa2d1b1.jpg\" style=\"height:500px; width:750px\" /></p>\n\n<h5>M&agrave;n h&igrave;nh 5.99 inch với tấm nền IPS LCD</h5>\n\n<p>Sở hữu m&agrave;n h&igrave;nh 5.99 inch với tấm nền IPS LCD, độ ph&acirc;n giải Full HD+ (1080 x 2160 Pixels) với tỷ lệ 18:9 theo xu thế. Diện t&iacute;ch hiển thị được ASUS tối ưu h&oacute;a l&ecirc;n đến 83% mang lại cho người d&ugrave;ng trải nghiệm h&igrave;nh ảnh sắc n&eacute;t tr&ecirc;n một kh&ocirc;ng gian rộng nhưng vẫn đảm bảo k&iacute;ch thước tổng thể của m&aacute;y ở mức gọn g&agrave;ng, dễ d&agrave;ng cầm nắm v&agrave; thao t&aacute;c.</p>\n\n<p><img alt=\"Điện Thoại Asus Zenfone Max Pro M1 (4G/64GB) - Hàng Chính Hãng\" src=\"https://vcdn.tikicdn.com/ts/tmp/d3/0c/da/6888f00c3c5a355bd8d40bb9d35d0f18.jpg\" style=\"height:505px; width:750px\" /></p>\n\n<h5>Chip Qualcomm Snapdragon 636</h5>\n\n<p>Sức mạnh của m&aacute;y cũng được cải thiện đ&aacute;ng kể nhờ con chip Qualcomm Snapdragon 636 8 nh&acirc;n với xung nhịp 1.8 GHz mang lại một hiệu năng ổn định, mượt m&agrave; gi&uacute;p bạn ho&agrave;n th&agrave;nh nhanh ch&oacute;ng c&aacute;c thao t&aacute;c cơ bản hằng ng&agrave;y.</p>\n\n<p><img alt=\"Điện Thoại Asus Zenfone Max Pro M1 (4G/64GB) - Hàng Chính Hãng\" src=\"https://vcdn.tikicdn.com/ts/tmp/7f/a9/5a/7512c0b18b40d9c6c09d11269fd98f54.jpg\" style=\"height:505px; width:750px\" /></p>\n\n<p>B&ecirc;n cạnh đ&oacute;, m&aacute;y c&ograve;n được trang bị 4GB RAM đem lại khả năng chạy đa nhiệm mạnh mẽ hay lưu trữ được nhiều h&igrave;nh ảnh, video v&agrave; dữ liệu c&aacute; nh&acirc;n hơn với bộ nhớ trong 64GB.</p>\n\n<p><img alt=\"Điện Thoại Asus Zenfone Max Pro M1 (4G/64GB) - Hàng Chính Hãng\" src=\"https://vcdn.tikicdn.com/ts/tmp/85/fa/95/d0d6372421f3ab6ff64fe2baade04a0a.jpg\" style=\"height:422px; width:750px\" /></p>\n\n<h5>Camera k&eacute;p chụp ảnh x&oacute;a ph&ocirc;ng</h5>\n\n<p>Được trang bị cụm camera k&eacute;p ở mặt lưng với độ ph&acirc;n giải lần lượt 16 MP v&agrave; 5 MP, hỗ trợ chụp ảnh x&oacute;a ph&ocirc;ng v&agrave; nhiều t&iacute;nh năng kh&aacute;c như&nbsp; HDR, Panorama.</p>\n\n<p><img alt=\"Điện Thoại Asus Zenfone Max Pro M1 (4G/64GB) - Hàng Chính Hãng\" src=\"https://vcdn.tikicdn.com/ts/tmp/e9/78/d6/04e09909dd53109fbc4a67bafb000039.jpg\" style=\"height:505px; width:750px\" /></p>\n\n<p>Camera trước c&oacute; độ ph&acirc;n giải 16MP hỗ trợ t&iacute;nh năng mở kh&oacute;a bằng khu&ocirc;n mặt, được trang bị chế độ l&agrave;m đẹp cũng như đ&egrave;n flash gi&uacute;p bạn chụp ảnh trong mọi điều kiện m&agrave; vẫn c&oacute; được những bức ảnh ưng &yacute;.</p>\n\n<p><img alt=\"Điện Thoại Asus Zenfone Max Pro M1 (4G/64GB) - Hàng Chính Hãng\" src=\"https://vcdn.tikicdn.com/ts/tmp/9c/5c/f8/8b2dc16df800f17a309ee43b0bd47d9c.jpg\" style=\"height:422px; width:750px\" /></p>\n\n<h5>Cảm biến v&acirc;n tay</h5>\n\n<p>Cảm biến v&acirc;n tay đặt ở mặt lưng với vị trị thuận lợi v&agrave; được cắt kim cương s&aacute;ng b&oacute;ng gi&uacute;p bạn mở kh&oacute;a nhanh ch&oacute;ng cũng như tạo điểm nhấn ri&ecirc;ng trong thiết kế của m&aacute;y.</p>\n\n<p><img alt=\"Điện Thoại Asus Zenfone Max Pro M1 (4G/64GB) - Hàng Chính Hãng\" src=\"https://vcdn.tikicdn.com/ts/tmp/8c/8e/5c/25099bc8edaa2248884d504fa0fa3df9.jpg\" style=\"height:505px; width:750px\" /></p>\n\n<h5>Dung lượng pin 5000mAh</h5>\n\n<p>Đ&uacute;ng như c&aacute;i t&ecirc;n &quot;Max Pro&quot; tạo n&ecirc;n điểm nhấn cho sự mạnh mẽ đến từ vi&ecirc;n pin c&oacute; dung lượng 5000mAh hứa hẹn sẽ đ&aacute;p ứng cho bạn một thời gian trải nghiệm bền bỉ trong khoảng 2 ng&agrave;y với c&aacute;c t&aacute;c vụ cơ bản.</p>', 'EN', '2018-11-12 10:10:43', 'xuan', '2018-11-12 10:10:59', 'xuan');
INSERT INTO `product_descs` VALUES (30, 8, NULL, '<h5><span style=\"font-size:24px\"><strong>Thiết kế lạ mắt không nút Home cứng</strong></span></h5>\n\n<p><strong>Điện Thoại iPhone X 64GB</strong> là chiếc điện thoại hoàn toàn mới của Apple vừa mới ra mắt tuần vừa qua. Trên cơ bản, iPhone X vẫn có những tính năng như những dòng iPhone khác nhưng thiết kế bên ngoài lạ mắt hơn, không trang bị nút Home cứng, viền kim loại sang trọng và đặc biệt là cụm camera sau được trang bị theo chiều dọc tạo điểm nhấn cho chiếc điện thoại.</p>\n\n<p><img alt=\"\" src=\"https://vdcn.tikicdn.com/ts/tmp/21/0d/8d/d26083064fb4b7117b8154ad80971982.jpeg\" style=\"height:567px; width:850px\" /></p>\n\n<h5>Màn hình lớn 5.8 inch</h5>\n\n<p>Sở hữu kích thước màn hình lớn 5.8 inch với độ phân giải 1125 x 2436 pixels, mật độ điểm ảnh 458 ppi pixel mang đến khả năng hiển thị màu sắc ấn tượng, sắc nét cho bạn trải nghiệm ở mọi góc nhìn. Màn hình lược bỏ nút Home cứng truyền thống tạo cảm giác lạ mắt và tạo nhiều không gian hơn cho người dùng.</p>\n\n<p><img alt=\"\" src=\"https://vdcn.tikicdn.com/ts/tmp/0f/cd/f6/e0ee869da37d3bfe8a76ead8bbdbed2d.jpeg\" style=\"height:567px; width:850px\" /></p>\n\n<p>Bên cạnh đó, iPhone X vẫn được trang bị công nghệ sạc nhanh và sạc không dây hiện đại mà người dùng mong đợi từ lâu.</p>\n\n<h5>Công nghệ Face ID</h5>\n\n<p>Face ID là công nghệ được phát triển dựa trên Touch ID, sử dụng một loạt cảm biến phía trước, máy ảnh TrueDepth và máy chiếu chấm hồng ngoại để tạo ra bản đồ 3D cực kỳ chi tiết dành cho khuôn mặt của bạn. Máy chiếu chấm hồng ngoại tạo ra 30.000 điểm vô hình trên khuôn mặt mỗi khi bạn nhìn vào điện thoại để đảm bảo độ chính xác khi quét. Công nghệ này sẽ giúp bạn bảo mật thông tin một cách tốt hơn.</p>\n\n<p><img alt=\"\" src=\"https://vdcn.tikicdn.com/ts/tmp/37/06/1e/0f01541c9c74ec3fffe911422e28869c.jpeg\" style=\"height:567px; width:850px\" /></p>\n\n<p>Face ID nhận diện tốt ngay cả khi chủ nhân của máy thay đổi kiểu tóc, đội mũ, đeo kính râm. Bạn không thể đánh lừa tính năng siêu đặc biệt này của Apple bằng những bức ảnh, máy cũng sẽ không nhận diện nếu bạn nhắm mắt.</p>\n\n<h5>Cấu hình mạnh mẽ, mượt mà</h5>\n\n<p>Cũng giống như iPhone 8 và iPhone 8 Plus, iPhone X sử dụng chip A11 Bionic có sức mạnh cao cấp nhất tính đến thời điểm ra mắt. Theo Apple, con chip Apple A11 Bionic này gồm có 6 nhân với 4,3 tỷ bóng bán dẫn, tốc độ xử lý GPU cao hơn 30% so với thế hệ chip A10 và điện năng tiêu thụ giảm một nửa. Về hiệu năng, A11 mạnh hơn 70% ở 4 nhân tiết kiệm điện và 25% ở 2 nhân hiệu năng cao so với A10.</p>\n\n<p><img alt=\"\" src=\"https://vdcn.tikicdn.com/ts/tmp/72/a7/df/74df6331c182d57e75fb205768d6bdca.jpeg\" style=\"height:567px; width:850px\" /></p>\n\n<p>iPhone X trang bị RAM 3GB, bộ nhớ trong 64GB, hỗ trợ AR, có kết nối LTE Advanced, Bluetooth 5.0 và chạy trên hệ điều hành iOS 11 cho khả năng hoạt động mạnh mẽ, đa nhiệm.</p>\n\n<h5>Cặp đôi camera ấn tượng</h5>\n\n<p>iPhone X được trang bị camera kép phía sau bao gồm 1 camera chính với độ phân giải 12MP, khẩu độ f/1.8 và một camera bên cạnh cùng độ phân giải 12MP nhưng với khẩu độ f/2.4 có zoom quang học 2X. Điểm mới là chúng đều được bổ sung tính năng ổn định hình ảnh quang học, chế độ chụp chân dung mới với khả năng chỉnh sáng theo thời gian thực. Ngoài ra điện thoại còn hỗ trợ quay video 4K @60fps, và nâng tiếp video 240fps lên độ phân giải 1080p.</p>\n\n<p><img alt=\"\" src=\"https://vdcn.tikicdn.com/ts/tmp/71/24/d7/77274b5e34c7adc0de89fa41fc93b69e.jpeg\" style=\"height:567px; width:850px\" /></p>\n\n<p>Camera mặt trước giữ độ phân giải 7MP, khẩu độ f/2.2 cùng với các Retina flash phù hợp với ánh sáng xung quanh, mang đến bạn bức ảnh với tông màu da tự nhiên và đẹp mắt. Bạn có thể thỏa sức selfie hoặc video call với bạn bè, người thân một cách nhanh chóng.</p>', 'EN', '2018-11-12 10:13:17', 'xuan', '2018-11-12 10:13:27', 'xuan');
INSERT INTO `product_descs` VALUES (32, 16, NULL, '<h3 dir=\"ltr\"><strong>Thiết kế ho&agrave;n mỹ</strong></h3>\n<p dir=\"ltr\">Nếu l&agrave; người y&ecirc;u th&iacute;ch c&aacute;c sản phẩm điện thoại th&igrave; hẳn cũng biết kể từ iPhone 6 cho đến tận iPhone 8 Plus kh&ocirc;ng c&oacute; qu&aacute; nhiều thay đổi về thiết kế, c&oacute; chăng th&igrave; đ&oacute; chỉ l&agrave; bộ khung b&ecirc;n ngo&agrave;i chuyển từ nh&ocirc;m nguy&ecirc;n khối sang k&iacute;nh thủy tinh. V&agrave; điều đ&oacute; ho&agrave;n to&agrave;n đ&atilde; ho&agrave;n thay đổi cho đến khi iPhone X xuất hiện.</p>\n<p><img src=\"https://hoanghamobile.com/Content/chan-trang/ip-x/ip-x-11.jpg\" alt=\"\" /></p>\n<p dir=\"ltr\">iPhone X đ&atilde; c&oacute; một diện mạo mới lạ, độc đ&aacute;o v&agrave; đột ph&aacute; hơn rất nhiều so với c&aacute;c thế hệ iPhone tiền nhiệm trước đ&oacute;. M&aacute;y c&oacute; một m&agrave;n h&igrave;nh tỷ lệ 19,5:9 như xu hướng v&agrave; mang đến diện t&iacute;ch hiển thị rất lớn.</p>\n<p dir=\"ltr\">Phần viền &ldquo;d&agrave;y cộm&rdquo; ph&iacute;a trước hay ph&iacute;m cảm ứng đ&atilde; bị loại bỏ ho&agrave;n to&agrave;n tr&ecirc;n iPhone X, v&agrave; cũng nhờ thiết kế bằng k&iacute;nh n&agrave;y m&agrave; iPhone đ&atilde; c&oacute; thể hỗ trợ c&ocirc;ng nghệ sạc kh&ocirc;ng d&acirc;y tốt hơn. V&agrave; điểm nhấn độc đ&aacute;o khiến cho iPhone X dễ nhận biết nhất giữa một rừng smartphone hiện nay đ&oacute; ch&iacute;nh l&agrave; cụm camera được đặt dọc ở g&oacute;c b&ecirc;n tr&aacute;i. C&aacute;c g&oacute;c cạnh của m&aacute;y cũng được bo cong ho&agrave;n hảo mang tới trải nghiệm cầm nắm mềm mại v&agrave; thoải m&aacute;i.</p>\n<h3 dir=\"ltr\"><strong>Notch v&agrave; m&agrave;n h&igrave;nh tai thỏ</strong></h3>\n<p dir=\"ltr\">Ngay từ khi ra mắt, iPhone X với phần Notch ph&iacute;a trước nằm tr&ecirc;n m&agrave;n h&igrave;nh đ&atilde; bị &ldquo;tr&ecirc;u ghẹo&rdquo; rất nhiều v&igrave; n&oacute; c&oacute; thể che khuyến một phần nội dung tr&ecirc;n m&agrave;n h&igrave;nh. Nhưng nhờ c&oacute; đ&oacute; m&agrave; người d&ugrave;ng c&oacute; th&ecirc;m nhiều diện t&iacute;ch hiển thị hơn.</p>\n<p><img src=\"https://hoanghamobile.com/Content/chan-trang/ip-x/ip-x-01.jpg\" alt=\"\" /></p>\n<p dir=\"ltr\">Notch cũng l&agrave; vị tr&iacute; của camera selfie, loa thoại, v&agrave; c&aacute;c cảm biến</p>\n<p dir=\"ltr\">iPhone X c&oacute; một m&agrave;n h&igrave;nh k&iacute;ch thước 5.8 inch Super Retina với độ ph&acirc;n giải1125 x 2436p tr&ecirc;n tấm nền OLED cao cấp cho h&igrave;nh ảnh sắc n&eacute;t v&agrave; ch&acirc;n thật.</p>\n<p dir=\"ltr\">Được biết, tấm nền OLED được trang bị tr&ecirc;n iPhone X đ&atilde; được &ldquo;T&aacute;o khuyết&rdquo; tinh chỉnh lại nhằm thay thế cho tấm nền LCD truyền thống như những chiếc iPhone đ&atilde; ra mắt trước đ&oacute;. Khả năng t&aacute;i tạo m&agrave;u của tấm nền OLED n&agrave;y rất s&acirc;u v&agrave; thực nhất l&agrave; với m&agrave;u đen. Những gam m&agrave;u m&agrave; iPhone X thể hi&ecirc;n được l&agrave; rất xuất sắc so với c&aacute;c đối thủ c&ugrave;ng tầm gi&aacute;.</p>\n<h3 dir=\"ltr\"><strong>Face ID chất lượng</strong></h3>\n<p dir=\"ltr\">iPhone X c&oacute; thể nhận diện khu&ocirc;n mặt của người d&ugrave;ng qua t&iacute;nh năng qu&eacute;t 3D v&agrave; mở kh&oacute;a cực k&igrave; nhanh ch&oacute;ng nhờ cụm camera Truedept</p>\n<p dir=\"ltr\">Kh&aacute; đ&aacute;ng tiếc Touch ID huyền thoại đ&atilde; qu&aacute; quen thuộc trong suốt nhiều năm qua nay đ&atilde; bị loại bỏ tr&ecirc;n iPhone X. Nhưng nhưng chắc chắn rằng với những g&igrave; Apple trang bị cho Face ID th&igrave; người d&ugrave;ng sẽ c&oacute; những trải nghiệm mới lạ v&agrave; tốt nhất khi sử dụng thiết bị.</p>\n<p><img src=\"https://hoanghamobile.com/Content/chan-trang/ip-x/ip-x-02.jpg\" alt=\"\" /></p>\n<h3 dir=\"ltr\"><strong>Tất cả chỉ cần &ldquo;vuốt&rdquo;</strong></h3>\n<p dir=\"ltr\">Giờ đ&acirc;y người d&ugrave;ng sẽ kh&ocirc;ng cần phải lo lắng khi ấn qu&aacute; nhiều sẽ l&agrave;m hỏng ph&iacute;m Home như trước đ&acirc;y nữa v&igrave; Apple đ&atilde; nhường lại vị tr&iacute; đ&oacute; cho m&agrave;n h&igrave;nh. V&agrave; b&acirc;y giờ tất cả c&aacute;c thao t&aacute;c tr&ecirc;n m&aacute;y sẽ chỉ c&oacute; vuốt v&agrave; vuốt m&agrave; th&ocirc;i.</p>\n<h3 dir=\"ltr\"><strong>Camera tốt nhất hiện tại</strong></h3>\n<p dir=\"ltr\">iPhone vẫn c&oacute; cho m&igrave;nh cụm camera k&eacute;p độ ph&acirc;n giải 12 MP nhưng lần n&agrave;y camera tele đ&atilde; được n&acirc;ng khẩu độ l&ecirc;n f/2.4 cao hơn iPhone 7 Plus với khẩu độ chỉ f/2.8.</p>\n<p dir=\"ltr\">Cả hai cảm biến n&agrave;y đều c&oacute; t&iacute;nh năng chống rung quang học (OIS) từ đ&oacute; bạn c&oacute; thể &ldquo;bắt&rdquo; mọi khoảnh khắc m&agrave; bạn muốn.</p>\n<p><img src=\"https://hoanghamobile.com/Content/chan-trang/ip-x/ip-x-20.jpg\" alt=\"\" /></p>\n<p dir=\"ltr\">B&ecirc;n cạnh đ&oacute;, camera selfie c&oacute; độ ph&acirc;n giải 7 MP c&oacute; thể chụp ảnh selfie x&oacute;a ph&ocirc;ng, chụp ảnh g&oacute;c rộng, selfie ngược s&aacute;ng HDR v&agrave; quay phim Full HD.</p>\n<h3 dir=\"ltr\"><strong>Hiệu năng miễn b&agrave;n</strong></h3>\n<p dir=\"ltr\">Chưa bao giờ c&aacute;c sản phẩm của Apple bị đ&aacute;nh gi&aacute; k&eacute;m về hiệu năng v&agrave; đặc biệt l&agrave; iPhone. T&iacute;nh đến thời điểm hiện tại th&igrave; hầu như kh&ocirc;ng c&oacute; chiếc smartphone c&oacute; thể s&aacute;nh ngang được với tốc xử l&yacute; m&agrave; iPhone X mang lại.</p>\n<p dir=\"ltr\">Cung cấp sức mạnh cho iPhone X l&agrave; vi xửl &yacute; Apple A11 Bionic 6 nh&acirc;n, đi k&egrave;m với đ&oacute; l&agrave; dung lượng RAM 3GB, bộ nhớ trong 64GB. Với những th&ocirc;ng số kỹ thuật như n&agrave;y th&igrave; người d&ugrave;ng ho&agrave;n to&agrave;n c&oacute; thể l&agrave;m mọi t&aacute;c vụ, đa nhiệm thoải m&aacute;i v&agrave; lưu trữ dữ liệu tẹt ga m&agrave; kh&ocirc;ng phải bận t&acirc;m điều g&igrave; cả.</p>\n<p><img src=\"https://hoanghamobile.com/Content/chan-trang/ip-x/ip-x-14.jpg\" alt=\"\" /></p>\n<p dir=\"ltr\">Apple cũng đặc biệt nhấn mạnh t&iacute;nh năng tương t&aacute;c thực tế ảo tăng cường AR sẽ đem đến những gi&acirc;y ph&uacute;t giải tr&iacute; tuyệt vời nhất.</p>\n<p dir=\"ltr\">Cuối c&ugrave;ng, thời lượng pin 2716 mAh của iPhone X cũng đủ để đ&aacute;p ứng một ng&agrave;y d&agrave;i sử dụng của bạn với đa t&aacute;c vụ v&agrave; th&acirc;m ch&iacute; con số n&agrave;y c&ograve;n cao hơn cả iPhone 8 Plus với chỉ 2691 mAh.</p>', 'EN', '2018-11-12 11:20:41', 'xuan', '2018-11-12 11:23:18', 'xuan');
INSERT INTO `product_descs` VALUES (33, 4, NULL, NULL, 'EN', '2018-11-28 15:05:05', 'xuan', '2018-11-28 15:05:05', 'xuan');
INSERT INTO `product_descs` VALUES (34, 41, '<p>47</p>', '<pre class=\"language-cpp\"><code>public function test(){\r\n\r\n}</code></pre>\r\n<p>14123456</p>', 'EN', '2018-11-28 15:53:07', 'xuan', '2018-11-28 15:53:07', 'xuan');

-- ----------------------------
-- Table structure for product_images
-- ----------------------------
DROP TABLE IF EXISTS `product_images`;
CREATE TABLE `product_images`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `color_id` int(11) NULL DEFAULT NULL,
  `size_id` int(11) NULL DEFAULT NULL,
  `priority` int(11) NULL DEFAULT 0,
  `status` char(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'EN',
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id`(`id`, `product_id`, `color_id`, `size_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 262 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of product_images
-- ----------------------------
INSERT INTO `product_images` VALUES (203, 1, '/upload/item/1_1_20180702165939.jpg', 1, 1, NULL, 'EN', '2018-07-02 16:59:39', 'xuan', '2018-07-02 16:59:39', 'xuan');
INSERT INTO `product_images` VALUES (204, 1, '/upload/item/1_1_20180702170044.jpg', 1, 3, NULL, 'EN', '2018-07-02 17:00:44', 'xuan', '2018-07-02 17:00:44', 'xuan');
INSERT INTO `product_images` VALUES (211, 7, '/upload/item/7_1_20180703204801.jpg', NULL, NULL, NULL, 'EN', '2018-07-03 20:48:02', 'xuan', '2018-07-03 20:48:02', 'xuan');
INSERT INTO `product_images` VALUES (212, 7, '/upload/item/7_2_20180703204802.jpg', NULL, NULL, NULL, 'EN', '2018-07-03 20:48:02', 'xuan', '2018-07-03 20:48:02', 'xuan');
INSERT INTO `product_images` VALUES (213, 7, '/upload/item/7_3_20180703204802.jpg', NULL, NULL, NULL, 'EN', '2018-07-03 20:48:02', 'xuan', '2018-07-03 20:48:02', 'xuan');
INSERT INTO `product_images` VALUES (214, 7, '/upload/item/7_4_20180703204802.jpg', NULL, NULL, NULL, 'EN', '2018-07-03 20:48:02', 'xuan', '2018-07-03 20:48:02', 'xuan');
INSERT INTO `product_images` VALUES (216, 3, '/upload/item/3_2_20180921145151.jpg', NULL, NULL, NULL, 'EN', '2018-09-21 14:51:51', 'xuan', '2018-09-21 14:51:51', 'xuan');
INSERT INTO `product_images` VALUES (217, 3, '/upload/item/3_3_20180921145151.jpg', NULL, NULL, NULL, 'EN', '2018-09-21 14:51:51', 'xuan', '2018-09-21 14:51:51', 'xuan');
INSERT INTO `product_images` VALUES (218, 3, '/upload/item/3_4_20180921145151.jpg', NULL, NULL, NULL, 'EN', '2018-09-21 14:51:51', 'xuan', '2018-09-21 14:51:51', 'xuan');
INSERT INTO `product_images` VALUES (219, 8, '/upload/item/8_1_20181002155452.jpg', 1, 3, 2, 'EN', '2018-10-02 15:54:52', 'xuan', '2018-10-02 15:54:52', 'xuan');
INSERT INTO `product_images` VALUES (220, 8, '/upload/item/8_2_20181002155452.jpg', 1, 3, 1, 'EN', '2018-10-02 15:54:52', 'xuan', '2018-10-02 15:54:52', 'xuan');
INSERT INTO `product_images` VALUES (221, 9, '/upload/item/9_1_20181002160803.jpg', NULL, NULL, NULL, 'EN', '2018-10-02 16:08:03', 'xuan', '2018-10-02 16:08:03', 'xuan');
INSERT INTO `product_images` VALUES (222, 9, '/upload/item/9_2_20181002160803.jpg', NULL, NULL, NULL, 'EN', '2018-10-02 16:08:03', 'xuan', '2018-10-02 16:08:03', 'xuan');
INSERT INTO `product_images` VALUES (229, 18, '/upload/item/18_1_20181024161639.jpg', NULL, NULL, 0, 'EN', '2018-10-24 16:16:39', 'xuan', '2018-10-24 16:16:39', 'xuan');
INSERT INTO `product_images` VALUES (232, 18, '/upload/item/18_4_20181024161639.jpg', NULL, NULL, 0, 'EN', '2018-10-24 16:16:39', 'xuan', '2018-10-24 16:16:39', 'xuan');
INSERT INTO `product_images` VALUES (233, 18, '/upload/item/18_5_20181024161639.jpg', NULL, NULL, 0, 'EN', '2018-10-24 16:16:39', 'xuan', '2018-10-24 16:16:39', 'xuan');
INSERT INTO `product_images` VALUES (234, 18, '/upload/item/18_6_20181024161639.jpg', NULL, NULL, 0, 'EN', '2018-10-24 16:16:39', 'xuan', '2018-10-24 16:16:39', 'xuan');
INSERT INTO `product_images` VALUES (240, 26, '/upload/item/26_0_20181031150208.jpg', NULL, NULL, 1, 'EN', '2018-10-31 15:02:08', NULL, '2018-10-31 15:02:08', NULL);
INSERT INTO `product_images` VALUES (244, 26, '/upload/item/26_1_20181031151609.jpg', NULL, NULL, 2, 'EN', '2018-10-31 15:16:09', NULL, '2018-10-31 15:16:09', NULL);
INSERT INTO `product_images` VALUES (245, 16, '/upload/item/16_0_20181031162641.jpg', NULL, NULL, 0, 'EN', '2018-10-31 16:26:41', NULL, '2018-10-31 16:26:41', NULL);
INSERT INTO `product_images` VALUES (246, 16, '/upload/item/16_1_20181031162641.jpg', NULL, NULL, 0, 'EN', '2018-10-31 16:26:41', NULL, '2018-10-31 16:26:41', NULL);
INSERT INTO `product_images` VALUES (247, 30, '/upload/item/30_0_20181107163134.jpg', NULL, NULL, 3, 'EN', '2018-11-07 16:31:34', NULL, '2018-11-07 16:31:34', NULL);
INSERT INTO `product_images` VALUES (248, 30, '/upload/item/30_1_20181107163134.jpg', NULL, NULL, 2, 'EN', '2018-11-07 16:31:34', NULL, '2018-11-07 16:31:34', NULL);
INSERT INTO `product_images` VALUES (249, 30, '/upload/item/30_2_20181107163134.jpg', NULL, NULL, 1, 'EN', '2018-11-07 16:31:34', NULL, '2018-11-07 16:31:34', NULL);
INSERT INTO `product_images` VALUES (250, 35, '/upload/item/35_0_20181108093628.jpg', NULL, NULL, 0, 'EN', '2018-11-08 09:36:28', NULL, '2018-11-08 09:36:28', NULL);
INSERT INTO `product_images` VALUES (251, 39, '/upload/item/39_0_20181109100302.jpg', NULL, NULL, 0, 'EN', '2018-11-09 10:03:02', NULL, '2018-11-09 10:03:02', NULL);
INSERT INTO `product_images` VALUES (252, 39, '/upload/item/39_1_20181109100302.jpg', NULL, NULL, 0, 'EN', '2018-11-09 10:03:02', NULL, '2018-11-09 10:03:02', NULL);
INSERT INTO `product_images` VALUES (253, 39, '/upload/item/39_2_20181109100302.jpg', NULL, NULL, 0, 'EN', '2018-11-09 10:03:02', NULL, '2018-11-09 10:03:02', NULL);
INSERT INTO `product_images` VALUES (254, 39, '/upload/item/39_3_20181109100302.jpg', NULL, NULL, 0, 'EN', '2018-11-09 10:03:02', NULL, '2018-11-09 10:03:02', NULL);
INSERT INTO `product_images` VALUES (255, 39, '/upload/item/39_4_20181109100302.jpg', NULL, NULL, 0, 'EN', '2018-11-09 10:03:02', NULL, '2018-11-09 10:03:02', NULL);
INSERT INTO `product_images` VALUES (256, 39, '/upload/item/39_5_20181109100302.jpg', NULL, NULL, 0, 'EN', '2018-11-09 10:03:02', NULL, '2018-11-09 10:03:02', NULL);
INSERT INTO `product_images` VALUES (257, 39, '/upload/item/39_6_20181109100302.jpg', NULL, NULL, 0, 'EN', '2018-11-09 10:03:02', NULL, '2018-11-09 10:03:02', NULL);
INSERT INTO `product_images` VALUES (258, 40, '/upload/item/40_0_20181109142737.jpg', 3, 4, 0, 'EN', '2018-11-09 14:27:37', NULL, '2018-11-09 14:27:37', NULL);
INSERT INTO `product_images` VALUES (259, 40, '/upload/item/40_1_20181109142737.jpg', 3, NULL, 0, 'EN', '2018-11-09 14:27:37', NULL, '2018-11-09 14:27:37', NULL);
INSERT INTO `product_images` VALUES (260, 40, '/upload/item/40_2_20181109142737.jpg', 4, NULL, 0, 'EN', '2018-11-09 14:27:37', NULL, '2018-11-09 14:27:37', NULL);
INSERT INTO `product_images` VALUES (261, 40, '/upload/item/40_3_20181109142737.jpg', 4, NULL, 0, 'EN', '2018-11-09 14:27:37', NULL, '2018-11-09 14:27:37', NULL);

-- ----------------------------
-- Table structure for product_infors
-- ----------------------------
DROP TABLE IF EXISTS `product_infors`;
CREATE TABLE `product_infors`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `length` double NULL DEFAULT NULL,
  `width` double NULL DEFAULT NULL,
  `height` double NULL DEFAULT NULL,
  `weight` double NULL DEFAULT NULL,
  `unit_size` char(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `unit_weight` char(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `status` char(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'EN',
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for product_prices
-- ----------------------------
DROP TABLE IF EXISTS `product_prices`;
CREATE TABLE `product_prices`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NULL DEFAULT NULL,
  `size_id` int(11) NULL DEFAULT NULL,
  `customer_group_id` int(11) NOT NULL,
  `qty_from` int(11) NULL DEFAULT 0,
  `qty_to` int(11) NULL DEFAULT 0,
  `import_price` double NULL DEFAULT 0,
  `normal_price` double NULL DEFAULT NULL,
  `price` double NOT NULL DEFAULT 0,
  `desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `status` char(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'EN',
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id`(`id`, `product_id`, `color_id`, `size_id`, `customer_group_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of product_prices
-- ----------------------------
INSERT INTO `product_prices` VALUES (1, 35, 0, 0, 1, 0, 0, 0, NULL, 1923, NULL, 'EN', '2018-11-08 09:36:28', NULL, '2018-11-08 09:36:28', NULL);
INSERT INTO `product_prices` VALUES (3, 39, 0, 0, 1, 0, 0, 4090000, NULL, 4090000, NULL, 'EN', '2018-11-09 10:03:02', NULL, '2018-11-09 10:03:02', NULL);
INSERT INTO `product_prices` VALUES (4, 40, 3, 4, 1, 0, 0, 270000, 295000, 275000, NULL, 'EN', '2018-11-09 14:27:37', NULL, '2018-11-09 14:27:37', NULL);
INSERT INTO `product_prices` VALUES (5, 40, 3, 5, 1, 0, 0, 260000, 295000, 265000, NULL, 'EN', '2018-11-09 14:27:37', NULL, '2018-11-09 14:27:37', NULL);
INSERT INTO `product_prices` VALUES (6, 8, 1, 0, 1, 0, 0, 12000000, 25000000, 20000000, NULL, 'EN', '2018-11-09 15:00:24', NULL, '2018-11-09 15:00:24', NULL);
INSERT INTO `product_prices` VALUES (8, 8, 1, 3, 1, 0, 0, 120000, NULL, 123456, NULL, 'EN', '2018-11-09 16:23:37', NULL, '2018-11-09 16:23:37', NULL);
INSERT INTO `product_prices` VALUES (9, 4, 0, 0, 1, 0, 0, 95000, 115000, 110000, NULL, 'EN', '2018-11-28 15:05:05', NULL, '2018-11-28 15:05:05', NULL);
INSERT INTO `product_prices` VALUES (10, 41, 0, 0, 1, 0, 0, NULL, NULL, 100000, NULL, 'EN', '2018-11-29 10:27:56', NULL, '2018-11-29 10:27:56', NULL);

-- ----------------------------
-- Table structure for product_sizes
-- ----------------------------
DROP TABLE IF EXISTS `product_sizes`;
CREATE TABLE `product_sizes`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `status` char(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'EN',
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id`(`id`, `product_id`, `size_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 90 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of product_sizes
-- ----------------------------
INSERT INTO `product_sizes` VALUES (33, 1, 1, 'EN', '2018-11-02 17:00:58', NULL, '2018-11-02 17:00:58', NULL);
INSERT INTO `product_sizes` VALUES (34, 1, 2, 'EN', '2018-11-02 17:00:58', NULL, '2018-11-02 17:00:58', NULL);
INSERT INTO `product_sizes` VALUES (35, 1, 3, 'EN', '2018-11-02 17:00:58', NULL, '2018-11-02 17:00:58', NULL);
INSERT INTO `product_sizes` VALUES (43, 30, 2, 'EN', '2018-11-07 17:00:45', NULL, '2018-11-07 17:00:45', NULL);
INSERT INTO `product_sizes` VALUES (61, 8, 3, 'EN', '2018-11-12 11:25:38', NULL, '2018-11-12 11:25:38', NULL);
INSERT INTO `product_sizes` VALUES (86, 40, 4, 'EN', '2018-11-14 15:06:45', NULL, '2018-11-14 15:06:45', NULL);
INSERT INTO `product_sizes` VALUES (87, 40, 5, 'EN', '2018-11-14 15:06:45', NULL, '2018-11-14 15:06:45', NULL);
INSERT INTO `product_sizes` VALUES (88, 40, 6, 'EN', '2018-11-14 15:06:45', NULL, '2018-11-14 15:06:45', NULL);
INSERT INTO `product_sizes` VALUES (89, 35, 2, 'EN', '2018-12-20 15:54:34', NULL, '2018-12-20 15:54:34', NULL);

-- ----------------------------
-- Table structure for product_skus
-- ----------------------------
DROP TABLE IF EXISTS `product_skus`;
CREATE TABLE `product_skus`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `size_id` int(11) NULL DEFAULT NULL,
  `color_id` int(11) NULL DEFAULT NULL,
  `sku` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `upc` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `status` char(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'EN',
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `id`(`id`, `product_id`, `size_id`, `color_id`, `sku`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of product_skus
-- ----------------------------
INSERT INTO `product_skus` VALUES (1, 30, 2, 1, '12354', NULL, NULL, 'EN', '2018-11-07 16:31:34', NULL, '2018-11-07 16:31:34', NULL);
INSERT INTO `product_skus` VALUES (6, 35, 2, 2, '2327140276255', NULL, NULL, 'EN', '2018-11-08 09:36:28', NULL, '2018-11-08 09:36:28', NULL);
INSERT INTO `product_skus` VALUES (10, 39, 0, 0, '7046029273509', NULL, NULL, 'EN', '2018-11-09 10:03:02', NULL, '2018-11-09 10:03:02', NULL);
INSERT INTO `product_skus` VALUES (11, 40, 4, 3, '5581946123671', '123457', NULL, 'EN', '2018-11-09 14:27:37', NULL, '2018-11-09 14:27:37', NULL);
INSERT INTO `product_skus` VALUES (12, 40, 5, 3, '5803277079886', '123457', '', 'EN', '2018-11-09 14:27:37', NULL, '2018-11-09 14:27:37', NULL);

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `product_category_id` int(11) NOT NULL,
  `manufacturer_id` int(11) NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `priority` int(10) NULL DEFAULT 0,
  `tag` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `url_seo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `status` char(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'EN',
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id`(`id`, `product_category_id`, `manufacturer_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 42 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (1, NULL, 'Loa Bose SoundLink Revolve - Hãng Phân Phối Chính Thức', NULL, 1, NULL, '/upload/item/1_20180702170428.jpg', NULL, NULL, NULL, 'EN', '2018-06-21 17:28:45', 'xuan', '2018-06-21 17:28:45', 'xuan');
INSERT INTO `products` VALUES (2, NULL, 'Test 4', NULL, 1, NULL, '/upload/item/2_20180702161132.jpg', NULL, NULL, NULL, 'EN', '2018-06-21 17:32:07', 'xuan', '2018-06-23 09:12:35', 'xuan');
INSERT INTO `products` VALUES (3, NULL, 'laptop loại hút Slim USB 2,0 Slot trong External Drives hộp enclosure Case', NULL, 1, NULL, '/upload/item/3_20180921145151.jpg', NULL, NULL, NULL, 'EN', '2018-06-23 09:39:50', 'xuan', '2018-06-23 10:09:29', 'xuan');
INSERT INTO `products` VALUES (4, NULL, 'Huawei Nova 3e', NULL, 1, 0, '/upload/item/4_20180629144558.jpg', NULL, NULL, NULL, 'EN', '2018-06-23 10:11:13', 'xuan', '2018-06-29 14:33:09', 'xuan');
INSERT INTO `products` VALUES (7, NULL, 'New Product', NULL, 2, NULL, '/upload/item/7_20180629173242.jpg', NULL, NULL, NULL, 'EN', '2018-06-29 16:41:54', NULL, '2018-06-29 16:41:54', NULL);
INSERT INTO `products` VALUES (8, NULL, 'Điện Thoại iPhone X 64GB VN/A - Hàng Chính Hãng', NULL, 1, 0, '/upload/item/_20181002155451.jpg', NULL, NULL, NULL, 'EN', '2018-10-02 15:54:52', NULL, '2018-10-02 15:54:52', NULL);
INSERT INTO `products` VALUES (9, NULL, 'Điện Thoại Asus Zenfone Max Pro M1 - Hàng Chính Hãng', NULL, 1, 0, '/upload/item/_20181002160803.jpg', NULL, NULL, NULL, 'EN', '2018-10-02 16:08:03', NULL, '2018-10-02 16:08:03', NULL);
INSERT INTO `products` VALUES (16, NULL, 'IPhone X 256GB', NULL, 2, 0, '/upload/item/_20181024154136.jpg', 0, NULL, NULL, 'EN', '2018-10-24 15:41:36', NULL, '2018-10-24 15:41:36', NULL);
INSERT INTO `products` VALUES (17, NULL, 'Test 4', NULL, 17, NULL, '/upload/item/_20181024161329.jpg', 0, NULL, NULL, 'EN', '2018-10-24 16:13:29', NULL, '2018-10-24 16:13:29', 'xuan');
INSERT INTO `products` VALUES (18, NULL, '121', NULL, 17, 0, '/upload/item/18_20181024162301.jpg', 0, NULL, NULL, 'EN', '2018-10-24 16:15:56', 'xuan', '2018-10-24 16:15:56', 'xuan');
INSERT INTO `products` VALUES (26, NULL, 'Internet Tivi Sony 40 inch KDL-40W650D', NULL, 2, NULL, '/upload/item/_20181031142717.jpg', 0, NULL, NULL, 'EN', '2018-10-31 14:27:17', 'xuan', '2018-10-31 14:27:17', 'xuan');
INSERT INTO `products` VALUES (30, '1231', 'Nụ Hôn Của Sói (Tái Bản 2018)', '123', 14, 0, '/upload/item/_20181107163134.jpg', 12, '123', '123', 'EN', '2018-11-07 16:31:34', 'xuan', '2018-11-07 16:31:34', 'xuan');
INSERT INTO `products` VALUES (35, '2327140276255', 'Ổ Cứng SSD Sata III 2.5 inch 500GB Samsung 860 Evo - Hàng Nhập Khẩu', 'Ổ Cứng SSD Sata III 2.5 inch 500GB Samsung 860 Evo - Hàng Nhập Khẩu', 4, 0, '/upload/item/_20181108093628.jpg', NULL, NULL, NULL, 'EN', '2018-11-08 09:36:28', 'xuan', '2018-11-08 09:36:28', 'xuan');
INSERT INTO `products` VALUES (39, '7046029273509', 'Tai Nghe Nhét Tai Apple Airpods Wireless MMEF2ZA/A - Hàng Chính Hãng', 'Tai Nghe Nhét Tai Apple Airpods Wireless MMEF2ZA/A - Hàng Chính Hãng', 2, 0, '/upload/item/_20181109100302.jpg', NULL, NULL, NULL, 'EN', '2018-11-09 10:03:02', 'xuan', '2018-11-09 10:03:02', 'xuan');
INSERT INTO `products` VALUES (40, '1555720825666', 'Giày thể thao sneaker nữ 9941', 'Giày thể thao sneaker nữ 9941', 11, 0, '/upload/item/_20181109142737.jpg', NULL, NULL, NULL, 'EN', '2018-11-09 14:27:37', 'xuan', '2018-11-09 14:27:37', 'xuan');
INSERT INTO `products` VALUES (41, NULL, 'Test', NULL, 12, 0, '/upload/item/41_20181129102029.jpg', NULL, NULL, NULL, 'EN', '2018-11-28 15:53:07', 'xuan', '2018-11-28 15:53:07', 'xuan');

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `status` char(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'EN',
  `created_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, NULL, 'Admin', NULL, 'EN', 'xuan', '2018-06-12 16:08:26', 'xuan', '2018-06-12 16:08:26');
INSERT INTO `roles` VALUES (2, NULL, 'Sale', NULL, 'EN', 'xuan', '2018-06-09 09:10:20', 'xuan', '2018-10-24 14:00:03');
INSERT INTO `roles` VALUES (3, NULL, 'Staff', NULL, 'EN', 'xuan', '2018-06-09 09:09:57', 'xuan', '2018-06-09 09:09:57');
INSERT INTO `roles` VALUES (4, NULL, 'Guest', NULL, 'DI', 'xuan', '2018-06-09 09:10:05', 'xuan', '2018-10-24 14:00:07');

-- ----------------------------
-- Table structure for size_standards
-- ----------------------------
DROP TABLE IF EXISTS `size_standards`;
CREATE TABLE `size_standards`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gender` char(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `status` char(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'EN',
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id`(`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of size_standards
-- ----------------------------
INSERT INTO `size_standards` VALUES (1, NULL, 'Viet Nam', 'Men', NULL, 'EN', '2018-11-01 14:36:25', NULL, '2018-11-01 14:36:25', NULL);

-- ----------------------------
-- Table structure for sizes
-- ----------------------------
DROP TABLE IF EXISTS `sizes`;
CREATE TABLE `sizes`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `size_standard_id` int(11) NOT NULL,
  `code` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `priority` int(11) NULL DEFAULT 0,
  `desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `status` char(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'EN',
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id`(`id`, `size_standard_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of sizes
-- ----------------------------
INSERT INTO `sizes` VALUES (1, 0, 'M', 'M', 0, NULL, 'EN', '2018-11-01 14:18:26', NULL, '2018-11-01 14:18:26', NULL);
INSERT INTO `sizes` VALUES (2, 0, 'L', 'L', 0, NULL, 'EN', '2018-11-01 14:18:34', NULL, '2018-11-01 14:18:34', NULL);
INSERT INTO `sizes` VALUES (3, 1, 'XL', 'XL', 0, NULL, 'EN', '2018-11-01 14:36:39', NULL, '2018-11-01 14:36:39', NULL);
INSERT INTO `sizes` VALUES (4, 0, '39', '39', 0, NULL, 'EN', '2018-11-09 14:21:35', NULL, '2018-11-09 14:21:35', NULL);
INSERT INTO `sizes` VALUES (5, 0, '40', '40', 0, NULL, 'EN', '2018-11-09 14:21:44', NULL, '2018-11-09 14:21:44', NULL);
INSERT INTO `sizes` VALUES (6, 0, '41', '41', 0, NULL, 'EN', '2018-11-09 14:21:48', NULL, '2018-11-09 14:21:48', NULL);
INSERT INTO `sizes` VALUES (7, 0, '42', '42', 0, NULL, 'EN', '2018-11-09 14:21:54', NULL, '2018-11-09 14:21:54', NULL);

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
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user_roles
-- ----------------------------
INSERT INTO `user_roles` VALUES (1, 1, 1, 'xuan', '2018-06-21 11:40:01', 'xuan', '2018-06-23 08:27:02');

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
  `is_admin` int(10) NOT NULL DEFAULT 0,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`, `username`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'xuan', '$2y$10$fr1Iq7vAGvmQSwvixjPgXeWQnc4K0F6CQRAv1Ls26.t6aUMh4OR02', 'xuan.nguyen@seldatinc.com', 'Xuân', 'Trường', '/upload/user/avatar/xuan_20180623082702.jpg', 'WjcoHXiWdzdJ1QhZCk87Z3x13b8X7fiA0DyleNqr2IoZK7aAU2OPAQG9rHgW', 0, '2018-06-21 11:40:01', 'xuan', '2018-06-23 08:27:02', 'xuan');
INSERT INTO `users` VALUES (2, 'admin', '$2y$10$4vLWscvlqMjBrlkceVm8COznH1nnZNumn7X0a8o70e82SsJpkDP5y', 'admin@yopmail.com', 'Admin', NULL, '/upload/user/avatar/admin_20180702114728.jpg', NULL, 0, '2018-07-02 11:47:10', NULL, '2018-07-02 11:47:10', NULL);
INSERT INTO `users` VALUES (3, 'xuan 2', '$2y$10$1E/EbRwAFLX..jwV5U/0puhPeuH8Udx0nH9u/W1pYNsOqE1iAlxIS', 'xuannt@yopmail.com', 'Trường', 'Nguyễn', '/upload/user/avatar/xuan 2_20180702115308.jpg', NULL, 0, '2018-07-02 11:48:05', NULL, '2018-07-02 11:48:05', NULL);
INSERT INTO `users` VALUES (4, 'xuan 3', '$2y$10$QPuLoKl3H6eSO0sY64I3W.EdYnX9J.4Sxo0XcnmLxhHwEBq6ANDVC', 'truong@yopmail.com', 'Trường Nguyễn', NULL, '/image/avatar.jpeg', NULL, 0, '2018-07-02 11:54:22', NULL, '2018-07-02 11:54:22', NULL);

SET FOREIGN_KEY_CHECKS = 1;
