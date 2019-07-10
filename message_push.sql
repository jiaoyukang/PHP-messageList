/*
Navicat MySQL Data Transfer

Source Server         : 39.104.59.238
Source Server Version : 50722
Source Host           : 39.104.59.238:3306
Source Database       : aaa

Target Server Type    : MYSQL
Target Server Version : 50722
File Encoding         : 65001

Date: 2019-07-10 17:34:08
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for message_push
-- ----------------------------
DROP TABLE IF EXISTS `message_push`;
CREATE TABLE `message_push` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` char(32) NOT NULL DEFAULT '0' COMMENT '订单id',
  `data` varchar(255) DEFAULT '' COMMENT '发送的数据',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8 COMMENT='消息接收表';
