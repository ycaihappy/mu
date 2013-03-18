/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50516
Source Host           : localhost:3306
Source Database       : mu

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2013-03-16 11:21:39
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `mu_online_support`
-- ----------------------------
DROP TABLE IF EXISTS `mu_online_support`;
CREATE TABLE `mu_online_support` (
  `online_id` int(10) NOT NULL AUTO_INCREMENT,
  `online_ent_id` int(10) NOT NULL DEFAULT '0' COMMENT '所属企业',
  `online_name` varchar(50) NOT NULL,
  `online_type` int(11) NOT NULL DEFAULT '0' COMMENT '目前只支持QQ',
  `online_num` varchar(50) NOT NULL COMMENT '号码',
  `online_added_time` datetime DEFAULT NULL,
  PRIMARY KEY (`online_id`),
  KEY `online_ent_id` (`online_ent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='会员旺铺的在线QQ客服表';

-- ----------------------------
-- Records of mu_online_support
-- ----------------------------
INSERT INTO mu_online_support VALUES ('7', '45', 'aaaa', '1', '123123', '2013-03-15 15:22:01');
INSERT INTO mu_online_support VALUES ('9', '45', 'bbbb', '1', 'bbbb', '2013-03-15 15:31:32');
INSERT INTO mu_online_support VALUES ('14', '45', 'cccc', '1', 'cccc', '2013-03-15 16:35:59');
