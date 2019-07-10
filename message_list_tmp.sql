/*
Navicat MySQL Data Transfer

Source Server         : 39.104.59.238
Source Server Version : 50722
Source Host           : 39.104.59.238:3306
Source Database       : aaa

Target Server Type    : MYSQL
Target Server Version : 50722
File Encoding         : 65001

Date: 2019-07-10 17:33:58
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for message_list_tmp
-- ----------------------------
DROP TABLE IF EXISTS `message_list_tmp`;
CREATE TABLE `message_list_tmp` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `business_type` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '业务类型',
  `data` varchar(255) NOT NULL DEFAULT '' COMMENT '数据',
  `status` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '0排队中 1发送中 2发送成功 3发送失败',
  `num` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '发送次数',
  `create_time` datetime DEFAULT CURRENT_TIMESTAMP,
  `send_time` datetime DEFAULT CURRENT_TIMESTAMP COMMENT '发送时间',
  `order_id` char(32) DEFAULT '' COMMENT '订单号',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8 COMMENT='消息队列demo';
