# --------------------------------------------------------
# Host:                         127.0.0.1
# Server version:               5.1.28-rc-community
# Server OS:                    Win32
# HeidiSQL version:             6.0.0.3603
# Date/time:                    2013-01-30 22:14:38
# --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

# Dumping database structure for mu
DROP DATABASE IF EXISTS `mu`;
CREATE DATABASE IF NOT EXISTS `mu` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `mu`;


# Dumping structure for table mu.mu_advertisement
DROP TABLE IF EXISTS `mu_advertisement`;
CREATE TABLE IF NOT EXISTS `mu_advertisement` (
  `ad_id` int(11) NOT NULL AUTO_INCREMENT,
  `ad_user_id` int(11) NOT NULL,
  `ad_title` varchar(128) DEFAULT NULL,
  `ad_type` tinyint(4) NOT NULL COMMENT '视频,图片,flash',
  `ad_no` tinyint(4) NOT NULL COMMENT '''广告编号是用于指明位置''',
  `ad_link` varchar(256) DEFAULT NULL,
  `ad_status` tinyint(4) DEFAULT NULL,
  `ad_click_num` int(11) DEFAULT NULL COMMENT '点击量',
  `ad_start_date` datetime DEFAULT NULL COMMENT '''广告的有效开始时间''',
  `ad_end_date` datetime DEFAULT NULL COMMENT '''广告的有效结束时间''',
  `ad_price` decimal(12,0) DEFAULT NULL COMMENT '广告费用',
  `ad_media_src` varchar(128) DEFAULT NULL COMMENT '广告媒体文件',
  `ad_create_time` datetime DEFAULT NULL,
  PRIMARY KEY (`ad_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Data exporting was unselected.


# Dumping structure for table mu.mu_article
DROP TABLE IF EXISTS `mu_article`;
CREATE TABLE IF NOT EXISTS `mu_article` (
  `art_id` int(11) NOT NULL AUTO_INCREMENT,
  `art_title` varchar(128) NOT NULL,
  `art_source` char(128) DEFAULT NULL COMMENT '''文章出处''',
  `art_category_id` int(11) NOT NULL COMMENT '文章分类 行情 新闻 ',
  `art_content` text COMMENT '''文章内容''',
  `art_status` int(11) DEFAULT NULL COMMENT '起草 审核中 发布',
  `art_tags` varchar(45) DEFAULT NULL COMMENT '''文章tags''',
  `art_user_id` tinyint(4) NOT NULL COMMENT '文章发表人',
  `art_check_by` varchar(45) DEFAULT NULL COMMENT '''审核人''',
  `art_post_date` datetime DEFAULT NULL COMMENT '''发布时间''',
  `art_modified_date` datetime DEFAULT NULL COMMENT '''修改时间''',
  `art_recommend` tinyint(4) DEFAULT NULL COMMENT '文章推荐',
  PRIMARY KEY (`art_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Data exporting was unselected.


# Dumping structure for table mu.mu_city
DROP TABLE IF EXISTS `mu_city`;
CREATE TABLE IF NOT EXISTS `mu_city` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(128) NOT NULL,
  `city_parent` int(11) NOT NULL DEFAULT '0',
  `city_level` tinyint(4) DEFAULT NULL,
  `city_order` tinyint(4) DEFAULT '0',
  `city_open` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`city_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='省市联动表';

# Data exporting was unselected.


# Dumping structure for table mu.mu_favorite
DROP TABLE IF EXISTS `mu_favorite`;
CREATE TABLE IF NOT EXISTS `mu_favorite` (
  `favorite_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `favorited_object_id` bigint(20) NOT NULL COMMENT '供求ID 现货ID',
  `favorited_object_type` tinyint(4) NOT NULL COMMENT '1 供求 2现货 ',
  `favorit_user_id` int(11) DEFAULT NULL COMMENT '收藏人',
  `favorite_time` datetime DEFAULT NULL COMMENT '''添加时间''',
  PRIMARY KEY (`favorite_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Data exporting was unselected.


# Dumping structure for table mu.mu_find_passwd
DROP TABLE IF EXISTS `mu_find_passwd`;
CREATE TABLE IF NOT EXISTS `mu_find_passwd` (
  `find_id` bigint(20) NOT NULL,
  `find_user_id` int(11) NOT NULL,
  `find_new_passwd` varchar(45) DEFAULT NULL,
  `find_status` tinyint(4) DEFAULT NULL,
  `find_mobile_no` varchar(45) DEFAULT NULL,
  `find_date` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`find_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='找回密码功能';

# Data exporting was unselected.


# Dumping structure for table mu.mu_friend_link
DROP TABLE IF EXISTS `mu_friend_link`;
CREATE TABLE IF NOT EXISTS `mu_friend_link` (
  `flink_id` int(11) NOT NULL,
  `flink_name` varchar(128) NOT NULL,
  `flink_url` varchar(512) DEFAULT NULL,
  `flink_status` tinyint(4) DEFAULT NULL,
  `flink_create_date` datetime DEFAULT NULL,
  PRIMARY KEY (`flink_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='友情链接';

# Data exporting was unselected.


# Dumping structure for table mu.mu_func
DROP TABLE IF EXISTS `mu_func`;
CREATE TABLE IF NOT EXISTS `mu_func` (
  `func_id` int(11) NOT NULL,
  `func_name` varchar(128) NOT NULL,
  `func_action` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`func_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Data exporting was unselected.


# Dumping structure for table mu.mu_point_rule
DROP TABLE IF EXISTS `mu_point_rule`;
CREATE TABLE IF NOT EXISTS `mu_point_rule` (
  `rule_id` int(11) NOT NULL,
  `func_id` tinyint(4) NOT NULL,
  `action_point` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`rule_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Data exporting was unselected.


# Dumping structure for table mu.mu_product
DROP TABLE IF EXISTS `mu_product`;
CREATE TABLE IF NOT EXISTS `mu_product` (
  `product_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_user_id` int(11) NOT NULL COMMENT '用户ID',
  `product_keyword` varchar(128) DEFAULT NULL COMMENT '用户ID',
  `product_name` varchar(45) NOT NULL,
  `product_quanity` int(11) DEFAULT NULL COMMENT '数量',
  `product_unit` int(11) DEFAULT NULL COMMENT '数量单位:吨,公斤等',
  `product_type_id` int(4) DEFAULT NULL COMMENT '产品分类',
  `product_price` decimal(10,0) DEFAULT NULL COMMENT '0表示电议',
  `product_status` int(4) DEFAULT NULL COMMENT '在售',
  `product_city_id` int(4) DEFAULT NULL COMMENT '在售',
  `product_content` text COMMENT '在售',
  `product_location` varchar(100) DEFAULT NULL COMMENT '''存货地''',
  `product_special` int(1) DEFAULT NULL COMMENT '是否特价',
  `product_join_date` datetime DEFAULT NULL,
  `product_image_src` varchar(128) DEFAULT NULL,
  `product_check_by` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`product_id`),
  KEY `product_user_id` (`product_user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='现货';

# Data exporting was unselected.


# Dumping structure for table mu.mu_recommend
DROP TABLE IF EXISTS `mu_recommend`;
CREATE TABLE IF NOT EXISTS `mu_recommend` (
  `recommend_id` int(11) NOT NULL,
  `recommend_object_id` bigint(20) NOT NULL COMMENT '用户,文章,供求等',
  `recommend_type` tinyint(11) NOT NULL,
  `recommend_position` tinyint(11) NOT NULL,
  `recommend_status` tinyint(4) DEFAULT NULL,
  `recommend_time` datetime DEFAULT NULL,
  PRIMARY KEY (`recommend_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Data exporting was unselected.


# Dumping structure for table mu.mu_right_assignment
DROP TABLE IF EXISTS `mu_right_assignment`;
CREATE TABLE IF NOT EXISTS `mu_right_assignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` int(11) NOT NULL,
  `bizrule` varchar(1024) DEFAULT NULL,
  `data` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`userid`,`itemname`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Data exporting was unselected.


# Dumping structure for table mu.mu_right_item
DROP TABLE IF EXISTS `mu_right_item`;
CREATE TABLE IF NOT EXISTS `mu_right_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` varchar(1024) CHARACTER SET gbk DEFAULT NULL,
  `bizrule` varchar(1024) CHARACTER SET gbk DEFAULT NULL COMMENT 'php script for eval',
  `data` varchar(1024) CHARACTER SET gbk DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Data exporting was unselected.


# Dumping structure for table mu.mu_right_itemchildren
DROP TABLE IF EXISTS `mu_right_itemchildren`;
CREATE TABLE IF NOT EXISTS `mu_right_itemchildren` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Data exporting was unselected.


# Dumping structure for table mu.mu_sms_code
DROP TABLE IF EXISTS `mu_sms_code`;
CREATE TABLE IF NOT EXISTS `mu_sms_code` (
  `sms_id` bigint(20) NOT NULL,
  `mobile_no` varchar(45) DEFAULT NULL,
  `sms_code` varchar(45) DEFAULT NULL,
  `sms_status` tinyint(4) DEFAULT NULL COMMENT '是否验证成功',
  `sms_send_date` datetime DEFAULT NULL,
  PRIMARY KEY (`sms_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='手机验证码';

# Data exporting was unselected.


# Dumping structure for table mu.mu_success_case
DROP TABLE IF EXISTS `mu_success_case`;
CREATE TABLE IF NOT EXISTS `mu_success_case` (
  `case_id` int(11) NOT NULL AUTO_INCREMENT,
  `supply_id` int(11) NOT NULL,
  `supply_user_id` int(11) NOT NULL,
  `purchase_user_id` int(11) NOT NULL,
  `purchase_amount` varchar(32) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `case_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`case_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# Data exporting was unselected.


# Dumping structure for table mu.mu_supply
DROP TABLE IF EXISTS `mu_supply`;
CREATE TABLE IF NOT EXISTS `mu_supply` (
  `supply_id` int(11) NOT NULL AUTO_INCREMENT,
  `supply_name` varchar(218) NOT NULL,
  `supply_user_id` int(11) NOT NULL,
  `supply_type` int(11) NOT NULL COMMENT '供求类型',
  `supply_keyword` varchar(128) DEFAULT NULL COMMENT '供求类型',
  `supply_category_id` int(4) NOT NULL COMMENT '供应产品的品类',
  `supply_contractor` varchar(32) DEFAULT NULL COMMENT '''发布者''',
  `supply_content` text COMMENT '''发布内容''',
  `supply_address` varchar(100) DEFAULT NULL COMMENT '供货地址',
  `supply_city_id` int(4) DEFAULT NULL COMMENT '供货地址',
  `supply_status` int(11) DEFAULT NULL COMMENT '起草 待审核 已发布',
  `supply_phone` char(32) DEFAULT NULL COMMENT '''联系电话''',
  `supply_unit` int(11) DEFAULT NULL COMMENT '''联系电话''',
  `supply_price` decimal(8,0) DEFAULT NULL COMMENT '价钱',
  `supply_valid_date` datetime DEFAULT NULL COMMENT '''0表示长期有效''',
  `supply_check_by` varchar(128) DEFAULT NULL COMMENT '审核人',
  `supply_recommend` tinyint(4) DEFAULT '0' COMMENT '是否推荐',
  `supply_image_src` varchar(218) DEFAULT NULL COMMENT '是否推荐',
  `supply_join_date` datetime DEFAULT NULL COMMENT '''发表日期''',
  PRIMARY KEY (`supply_id`),
  KEY `supply_user_id` (`supply_user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Data exporting was unselected.


# Dumping structure for table mu.mu_term
DROP TABLE IF EXISTS `mu_term`;
CREATE TABLE IF NOT EXISTS `mu_term` (
  `term_id` int(11) NOT NULL AUTO_INCREMENT,
  `term_parent_id` int(4) DEFAULT '0',
  `term_name` varchar(128) NOT NULL,
  `term_slug` varchar(200) DEFAULT NULL COMMENT '''描述''',
  `term_group_id` int(4) NOT NULL COMMENT '比如产品分类 职位 ',
  `term_order` int(4) DEFAULT '0',
  `term_create_time` datetime DEFAULT NULL,
  PRIMARY KEY (`term_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Data exporting was unselected.


# Dumping structure for table mu.mu_term_group
DROP TABLE IF EXISTS `mu_term_group`;
CREATE TABLE IF NOT EXISTS `mu_term_group` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(100) DEFAULT NULL,
  `group_desc` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Data exporting was unselected.


# Dumping structure for table mu.mu_user
DROP TABLE IF EXISTS `mu_user`;
CREATE TABLE IF NOT EXISTS `mu_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `user_pwd` varchar(40) NOT NULL,
  `user_email` char(100) DEFAULT NULL,
  `user_nickname` varchar(20) DEFAULT NULL,
  `user_type` int(4) DEFAULT NULL COMMENT '用户类型',
  `user_mobile_no` varchar(30) DEFAULT NULL,
  `user_first_name` varchar(50) DEFAULT NULL,
  `user_last_name` varchar(50) DEFAULT NULL,
  `user_status` int(4) DEFAULT NULL,
  `user_province_id` int(4) DEFAULT NULL COMMENT '所在省市',
  `user_city_id` int(4) DEFAULT NULL COMMENT '所在城市',
  `user_subscribe` int(4) DEFAULT NULL COMMENT '用户是否订阅钼市网行情',
  `user_point` bigint(20) DEFAULT NULL COMMENT '用户积分',
  `user_join_date` datetime DEFAULT NULL COMMENT '''注册时间''',
  `user_confirm_date` datetime DEFAULT NULL COMMENT '''验证时间''',
  `user_last_login_date` datetime DEFAULT NULL COMMENT '''最近登录时间''',
  PRIMARY KEY (`user_id`),
  KEY `user_type` (`user_type`),
  KEY `user_status` (`user_status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Data exporting was unselected.


# Dumping structure for table mu.mu_user_certificate
DROP TABLE IF EXISTS `mu_user_certificate`;
CREATE TABLE IF NOT EXISTS `mu_user_certificate` (
  `cert_id` int(11) NOT NULL,
  `cert_ent_id` int(11) NOT NULL,
  `cert_title` varchar(128) DEFAULT NULL COMMENT '''资质''',
  `cert_img_src` varchar(128) DEFAULT NULL COMMENT '''图片地址''',
  PRIMARY KEY (`cert_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Data exporting was unselected.


# Dumping structure for table mu.mu_user_enterprise
DROP TABLE IF EXISTS `mu_user_enterprise`;
CREATE TABLE IF NOT EXISTS `mu_user_enterprise` (
  `ent_id` int(11) NOT NULL AUTO_INCREMENT,
  `ent_user_id` int(11) NOT NULL COMMENT '企业对应的网站用户',
  `ent_name` varchar(256) DEFAULT NULL COMMENT '企业对应的网站用户',
  `ent_type` int(4) DEFAULT NULL COMMENT '企业类型，如国有，私营',
  `ent_website` varchar(512) DEFAULT NULL COMMENT '''网站地址''',
  `ent_business_model` int(4) unsigned DEFAULT NULL COMMENT '经营模式，生产，贸易等',
  `ent_zipcode` char(32) DEFAULT NULL COMMENT '''邮编''',
  `ent_introduce` text COMMENT '''企业介绍''',
  `ent_location` varchar(218) DEFAULT NULL COMMENT '''企业详细地址''',
  `ent_city` int(4) DEFAULT NULL COMMENT '所在市地区',
  `ent_status` int(4) NOT NULL DEFAULT '0' COMMENT '企业状态',
  `ent_chief` varchar(128) NOT NULL COMMENT '''负责人''',
  `ent_create_time` datetime NOT NULL COMMENT '添加时间',
  `ent_chief_postion` int(11) DEFAULT NULL COMMENT '负责人职位',
  `ent_business_scope` varchar(512) DEFAULT NULL COMMENT '''经营范围''',
  `ent_registered_capital` decimal(10,0) DEFAULT NULL COMMENT '注册资金',
  `ent_recommend` tinyint(1) DEFAULT NULL COMMENT '是否推荐企业',
  `ent_logo` varchar(128) DEFAULT NULL COMMENT '公司LOGO',
  `ent_update_time` datetime DEFAULT NULL COMMENT '修改时间',
  `ent_check_by` varchar(50) DEFAULT NULL COMMENT '审核人',
  PRIMARY KEY (`ent_id`),
  KEY `ent_user_id` (`ent_user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Data exporting was unselected.
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
