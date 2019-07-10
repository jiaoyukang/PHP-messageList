/*
Navicat MySQL Data Transfer

Source Server         : 39.104.59.238
Source Server Version : 50722
Source Host           : 39.104.59.238:3306
Source Database       : aaa

Target Server Type    : MYSQL
Target Server Version : 50722
File Encoding         : 65001

Date: 2019-07-10 17:33:51
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for message_list
-- ----------------------------
DROP TABLE IF EXISTS `message_list`;
CREATE TABLE `message_list` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` char(32) DEFAULT '0' COMMENT '订单号',
  `data` varchar(255) DEFAULT '' COMMENT '数据',
  `status` int(10) unsigned DEFAULT '0' COMMENT '0成功 1失败',
  `num` int(10) unsigned DEFAULT '1' COMMENT '发送次数',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `send_time` float(5,2) unsigned DEFAULT '0.00' COMMENT '发送所用时间（秒）',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;
