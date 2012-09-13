/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50516
Source Host           : localhost:3306
Source Database       : jiqiao_dev

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2012-09-13 22:29:02
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `assignments`
-- ----------------------------
DROP TABLE IF EXISTS `assignments`;
CREATE TABLE `assignments` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`),
  CONSTRAINT `assignments_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `items` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of assignments
-- ----------------------------
INSERT INTO `assignments` VALUES ('Authorizer', '4', '', 's:0:\"\";');

-- ----------------------------
-- Table structure for `itemchildren`
-- ----------------------------
DROP TABLE IF EXISTS `itemchildren`;
CREATE TABLE `itemchildren` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `itemchildren_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `items` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `itemchildren_ibfk_2` FOREIGN KEY (`child`) REFERENCES `items` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of itemchildren
-- ----------------------------

-- ----------------------------
-- Table structure for `items`
-- ----------------------------
DROP TABLE IF EXISTS `items`;
CREATE TABLE `items` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of items
-- ----------------------------
INSERT INTO `items` VALUES ('Administrator', '2', null, null, null);
INSERT INTO `items` VALUES ('Authorizer', '2', null, null, null);
INSERT INTO `items` VALUES ('Create Post', '0', null, null, null);
INSERT INTO `items` VALUES ('Create User', '0', null, null, null);
INSERT INTO `items` VALUES ('Delete Post', '0', null, null, null);
INSERT INTO `items` VALUES ('Delete User', '0', null, null, null);
INSERT INTO `items` VALUES ('Edit Post', '0', null, null, null);
INSERT INTO `items` VALUES ('Edit User', '0', null, null, null);
INSERT INTO `items` VALUES ('Post Manager', '1', null, null, null);
INSERT INTO `items` VALUES ('User', '2', null, null, null);
INSERT INTO `items` VALUES ('User Manager', '1', null, null, null);
INSERT INTO `items` VALUES ('View Post', '0', null, null, null);
INSERT INTO `items` VALUES ('View User', '0', null, null, null);

-- ----------------------------
-- Table structure for `tbl_category`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_category`;
CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lft` int(11) NOT NULL,
  `rgt` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_category
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_lookup`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_lookup`;
CREATE TABLE `tbl_lookup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `code` int(11) NOT NULL,
  `type` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `position` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tbl_lookup
-- ----------------------------
INSERT INTO `tbl_lookup` VALUES ('1', 'Industry News', '0', 'PostType', '0');
INSERT INTO `tbl_lookup` VALUES ('2', 'Company News', '1', 'PostType', '1');
INSERT INTO `tbl_lookup` VALUES ('3', 'Technical Documentation', '2', 'PostType', '2');
INSERT INTO `tbl_lookup` VALUES ('4', 'FAQ', '3', 'PostType', '3');
INSERT INTO `tbl_lookup` VALUES ('5', 'Product Related', '4', 'PostType', '4');
INSERT INTO `tbl_lookup` VALUES ('6', 'From Web', '0', 'PostSource', '0');
INSERT INTO `tbl_lookup` VALUES ('7', 'Original', '1', 'PostSource', '1');
INSERT INTO `tbl_lookup` VALUES ('8', 'Draft', '0', 'PostStatus', '0');
INSERT INTO `tbl_lookup` VALUES ('9', 'Audit', '1', 'PostStatus', '1');
INSERT INTO `tbl_lookup` VALUES ('10', 'Published', '2', 'PostStatus', '2');

-- ----------------------------
-- Table structure for `tbl_post`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_post`;
CREATE TABLE `tbl_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '文章ID',
  `type_id` int(11) NOT NULL DEFAULT '0' COMMENT '分类',
  `title` varchar(256) NOT NULL COMMENT '标题',
  `body` text COMMENT '正文',
  `summary` varchar(2000) DEFAULT NULL COMMENT '摘要',
  `source` int(11) DEFAULT '0' COMMENT '来源',
  `hits` int(11) DEFAULT '0' COMMENT '点击数',
  `status` int(11) DEFAULT '0' COMMENT '状态',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `create_user_id` int(11) DEFAULT NULL COMMENT '创建者',
  `update_time` datetime DEFAULT NULL COMMENT '更新时间',
  `update_user_id` int(11) DEFAULT NULL COMMENT '更新者',
  PRIMARY KEY (`id`),
  KEY `FK_type_id` (`type_id`) USING BTREE,
  KEY `FK_post_author` (`create_user_id`),
  CONSTRAINT `tbl_post_ibfk_1` FOREIGN KEY (`create_user_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_post
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_tag`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_tag`;
CREATE TABLE `tbl_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '标签ID',
  `name` varchar(64) NOT NULL COMMENT '名称',
  `frequency` int(11) DEFAULT '0' COMMENT '使用频率',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `create_user_id` int(11) DEFAULT NULL COMMENT '创建者',
  `update_time` datetime DEFAULT NULL COMMENT '更新时间',
  `update_user_id` int(11) DEFAULT NULL COMMENT '更新者',
  PRIMARY KEY (`id`),
  KEY `FK_tag_name` (`name`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_tag
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_user`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `email` varchar(256) NOT NULL COMMENT '邮箱',
  `username` varchar(256) NOT NULL COMMENT '用户名',
  `password` varchar(256) NOT NULL COMMENT '密码',
  `salt` varchar(256) DEFAULT NULL COMMENT 'Salt值',
  `last_login_time` datetime DEFAULT NULL COMMENT '最近一次登录时间',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `create_user_id` int(11) DEFAULT NULL COMMENT '创建者',
  `update_time` datetime DEFAULT NULL COMMENT '更新时间',
  `update_user_id` int(11) DEFAULT NULL COMMENT '更新者',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_user
-- ----------------------------
