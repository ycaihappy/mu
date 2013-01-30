# --------------------------------------------------------
# Host:                         127.0.0.1
# Server version:               5.1.28-rc-community
# Server OS:                    Win32
# HeidiSQL version:             6.0.0.3603
# Date/time:                    2013-01-30 08:49:21
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

# Dumping data for table mu.mu_advertisement: 1 rows
/*!40000 ALTER TABLE `mu_advertisement` DISABLE KEYS */;
INSERT INTO `mu_advertisement` (`ad_id`, `ad_user_id`, `ad_title`, `ad_type`, `ad_no`, `ad_link`, `ad_status`, `ad_click_num`, `ad_start_date`, `ad_end_date`, `ad_price`, `ad_media_src`, `ad_create_time`) VALUES
	(1, 1, '钼铁推广', 9, 11, 'www.baidu.com', 1, 200, '2013-01-24 23:44:05', '2013-12-24 23:44:07', 20000, NULL, '2013-01-24 23:44:24');
/*!40000 ALTER TABLE `mu_advertisement` ENABLE KEYS */;


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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

# Dumping data for table mu.mu_article: 3 rows
/*!40000 ALTER TABLE `mu_article` DISABLE KEYS */;
INSERT INTO `mu_article` (`art_id`, `art_title`, `art_source`, `art_category_id`, `art_content`, `art_status`, `art_tags`, `art_user_id`, `art_check_by`, `art_post_date`, `art_modified_date`, `art_recommend`) VALUES
	(1, '1月25日中国钼丝市场价格', '百川资讯', 16, '1月25日中国钼丝市场价格', 1, '1月25日中国钼丝市场价格', 0, '得到', '2013-01-26 23:53:30', '2013-01-26 23:53:32', NULL),
	(2, '1月25日中国钼杆市场价格', '百川资讯', 16, '1月25日中国钼杆市场价格', 1, '1月25日中国钼杆市场价格', 0, '得到', '2013-01-26 23:53:30', '2013-01-26 23:53:32', NULL),
	(3, '1月25日中国钼条市场价格', '百川资讯', 16, '1月25日中国钼条市场价格', 1, '1月25日中国钼条市场价格', 0, '得到', '2013-01-26 23:53:30', '2013-01-26 23:53:32', NULL);
/*!40000 ALTER TABLE `mu_article` ENABLE KEYS */;


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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='省市联动表';

# Dumping data for table mu.mu_city: 8 rows
/*!40000 ALTER TABLE `mu_city` DISABLE KEYS */;
INSERT INTO `mu_city` (`city_id`, `city_name`, `city_parent`, `city_level`, `city_order`, `city_open`) VALUES
	(1, '西南', 0, 1, 1, 1),
	(2, '重庆', 1, 2, 1, 1),
	(3, '大足', 2, 3, 1, 1),
	(4, '渝中区', 2, 3, 2, 1),
	(5, '大渡口区', 2, NULL, 2, 1),
	(6, '华北', 0, NULL, 0, 1),
	(7, '河南', 6, NULL, 0, 1),
	(8, '平顶山', 7, NULL, 0, 1);
/*!40000 ALTER TABLE `mu_city` ENABLE KEYS */;


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

# Dumping data for table mu.mu_favorite: 0 rows
/*!40000 ALTER TABLE `mu_favorite` DISABLE KEYS */;
/*!40000 ALTER TABLE `mu_favorite` ENABLE KEYS */;


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

# Dumping data for table mu.mu_find_passwd: 0 rows
/*!40000 ALTER TABLE `mu_find_passwd` DISABLE KEYS */;
/*!40000 ALTER TABLE `mu_find_passwd` ENABLE KEYS */;


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

# Dumping data for table mu.mu_friend_link: 0 rows
/*!40000 ALTER TABLE `mu_friend_link` DISABLE KEYS */;
/*!40000 ALTER TABLE `mu_friend_link` ENABLE KEYS */;


# Dumping structure for table mu.mu_func
DROP TABLE IF EXISTS `mu_func`;
CREATE TABLE IF NOT EXISTS `mu_func` (
  `func_id` int(11) NOT NULL,
  `func_name` varchar(128) NOT NULL,
  `func_action` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`func_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Dumping data for table mu.mu_func: 0 rows
/*!40000 ALTER TABLE `mu_func` DISABLE KEYS */;
/*!40000 ALTER TABLE `mu_func` ENABLE KEYS */;


# Dumping structure for table mu.mu_point_rule
DROP TABLE IF EXISTS `mu_point_rule`;
CREATE TABLE IF NOT EXISTS `mu_point_rule` (
  `rule_id` int(11) NOT NULL,
  `func_id` tinyint(4) NOT NULL,
  `action_point` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`rule_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Dumping data for table mu.mu_point_rule: 0 rows
/*!40000 ALTER TABLE `mu_point_rule` DISABLE KEYS */;
/*!40000 ALTER TABLE `mu_point_rule` ENABLE KEYS */;


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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='现货';

# Dumping data for table mu.mu_product: 4 rows
/*!40000 ALTER TABLE `mu_product` DISABLE KEYS */;
INSERT INTO `mu_product` (`product_id`, `product_user_id`, `product_keyword`, `product_name`, `product_quanity`, `product_unit`, `product_type_id`, `product_price`, `product_status`, `product_city_id`, `product_content`, `product_location`, `product_special`, `product_join_date`, `product_image_src`, `product_check_by`) VALUES
	(1, 1, 'test', '特价钼铁1111', 2000, 3, 23, 23435, 1, 8, 'sdfsdf', '1', 1, '2013-01-21 22:05:09', NULL, NULL),
	(2, 1, 'test', '特价氧化钼', 2000, 3, 22, 23232, 1, 8, 'sdfsdf', '1', 1, '2013-01-21 22:05:09', NULL, NULL),
	(3, 1, 'test', '现货氧化钼', 2000, 3, 23, 23232, 1, 8, 'dsfsdfsdf', '1', 0, '2013-01-21 22:05:09', NULL, NULL),
	(4, 1, 'tes6t', '现货钼铁', 2000, 3, 22, 23435, 2, 8, 'sdfsdfsdfdsf', '1', 0, '2013-01-21 22:05:09', NULL, NULL);
/*!40000 ALTER TABLE `mu_product` ENABLE KEYS */;


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

# Dumping data for table mu.mu_recommend: 0 rows
/*!40000 ALTER TABLE `mu_recommend` DISABLE KEYS */;
/*!40000 ALTER TABLE `mu_recommend` ENABLE KEYS */;


# Dumping structure for table mu.mu_right_assignment
DROP TABLE IF EXISTS `mu_right_assignment`;
CREATE TABLE IF NOT EXISTS `mu_right_assignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` int(11) NOT NULL,
  `bizrule` varchar(1024) DEFAULT NULL,
  `data` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`userid`,`itemname`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Dumping data for table mu.mu_right_assignment: 0 rows
/*!40000 ALTER TABLE `mu_right_assignment` DISABLE KEYS */;
/*!40000 ALTER TABLE `mu_right_assignment` ENABLE KEYS */;


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

# Dumping data for table mu.mu_right_item: 48 rows
/*!40000 ALTER TABLE `mu_right_item` DISABLE KEYS */;
INSERT INTO `mu_right_item` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
	('admin-UserAdmin', 0, NULL, NULL, 'N;'),
	('admin-UserAutoAddNew', 0, NULL, NULL, 'N;'),
	('admin-UserAutoAll', 0, NULL, NULL, 'N;'),
	('admin-UserAutoNew', 0, NULL, NULL, 'N;'),
	('admin-UserCreate', 0, NULL, NULL, 'N;'),
	('admin-UserDelete', 0, NULL, NULL, 'N;'),
	('admin-UserIndex', 0, NULL, NULL, 'N;'),
	('admin-UserScan', 0, NULL, NULL, 'N;'),
	('admin-UserUpdate', 0, NULL, NULL, 'N;'),
	('admin-UserView', 0, NULL, NULL, 'N;'),
	('admin-UserViewOperas', 0, NULL, NULL, 'N;'),
	('admin-UserViewRoles', 0, NULL, NULL, 'N;'),
	('admin-UserViewTasks', 0, NULL, NULL, 'N;'),
	('srbac-AuthitemAdministrating', 1, NULL, NULL, 'N;'),
	('srbac-AuthitemAssign', 0, NULL, NULL, 'N;'),
	('srbac-AuthitemAssignments', 0, NULL, NULL, 'N;'),
	('srbac-AuthitemAuto', 0, NULL, NULL, 'N;'),
	('srbac-AuthitemAutocomplete', 0, NULL, NULL, 'N;'),
	('srbac-AuthitemAutoCreateItems', 0, NULL, NULL, 'N;'),
	('srbac-AuthitemAutoDeleteItems', 0, NULL, NULL, 'N;'),
	('srbac-AuthitemClearObsolete', 0, NULL, NULL, 'N;'),
	('srbac-AuthitemConfirm', 0, NULL, NULL, 'N;'),
	('srbac-AuthitemCreate', 0, NULL, NULL, 'N;'),
	('srbac-AuthitemDelete', 0, NULL, NULL, 'N;'),
	('srbac-AuthitemDeleteObsolete', 0, NULL, NULL, 'N;'),
	('srbac-AuthitemEditAllowed', 0, NULL, NULL, 'N;'),
	('srbac-AuthitemFrontPage', 0, NULL, NULL, 'N;'),
	('srbac-AuthitemGetCleverOpers', 0, NULL, NULL, 'N;'),
	('srbac-AuthitemGetOpers', 0, NULL, NULL, 'N;'),
	('srbac-AuthitemGetRoles', 0, NULL, NULL, 'N;'),
	('srbac-AuthitemGetTasks', 0, NULL, NULL, 'N;'),
	('srbac-AuthitemGetUsers', 0, NULL, NULL, 'N;'),
	('srbac-AuthitemInstall', 0, NULL, NULL, 'N;'),
	('srbac-AuthitemList', 0, NULL, NULL, 'N;'),
	('srbac-AuthitemManage', 0, NULL, NULL, 'N;'),
	('srbac-AuthitemSaveAllowed', 0, NULL, NULL, 'N;'),
	('srbac-AuthitemScan', 0, NULL, NULL, 'N;'),
	('srbac-AuthitemShow', 0, NULL, NULL, 'N;'),
	('srbac-AuthitemShowAssignments', 0, NULL, NULL, 'N;'),
	('srbac-AuthitemUpdate', 0, NULL, NULL, 'N;'),
	('srbac-AuthitemViewing', 1, NULL, NULL, 'N;'),
	('UserAdmin', 0, NULL, NULL, 'N;'),
	('UserCreate', 0, NULL, NULL, 'N;'),
	('UserDelete', 0, NULL, NULL, 'N;'),
	('UserIndex', 0, NULL, NULL, 'N;'),
	('UserUpdate', 0, NULL, NULL, 'N;'),
	('UserView', 0, NULL, NULL, 'N;'),
	('超级管理员', 2, NULL, NULL, NULL);
/*!40000 ALTER TABLE `mu_right_item` ENABLE KEYS */;


# Dumping structure for table mu.mu_right_itemchildren
DROP TABLE IF EXISTS `mu_right_itemchildren`;
CREATE TABLE IF NOT EXISTS `mu_right_itemchildren` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Dumping data for table mu.mu_right_itemchildren: 4 rows
/*!40000 ALTER TABLE `mu_right_itemchildren` DISABLE KEYS */;
INSERT INTO `mu_right_itemchildren` (`parent`, `child`) VALUES
	('srbac-AuthitemAdministrating', 'admin-UserAdmin'),
	('srbac-AuthitemAdministrating', 'admin-UserAutoAddNew'),
	('srbac-AuthitemAdministrating', 'admin-UserAutoAll'),
	('srbac-AuthitemAdministrating', 'admin-UserAutoNew');
/*!40000 ALTER TABLE `mu_right_itemchildren` ENABLE KEYS */;


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

# Dumping data for table mu.mu_sms_code: 0 rows
/*!40000 ALTER TABLE `mu_sms_code` DISABLE KEYS */;
/*!40000 ALTER TABLE `mu_sms_code` ENABLE KEYS */;


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

# Dumping data for table mu.mu_success_case: ~0 rows (approximately)
/*!40000 ALTER TABLE `mu_success_case` DISABLE KEYS */;
/*!40000 ALTER TABLE `mu_success_case` ENABLE KEYS */;


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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

# Dumping data for table mu.mu_supply: 2 rows
/*!40000 ALTER TABLE `mu_supply` DISABLE KEYS */;
INSERT INTO `mu_supply` (`supply_id`, `supply_name`, `supply_user_id`, `supply_type`, `supply_keyword`, `supply_category_id`, `supply_contractor`, `supply_content`, `supply_address`, `supply_city_id`, `supply_status`, `supply_phone`, `supply_unit`, `supply_price`, `supply_valid_date`, `supply_check_by`, `supply_recommend`, `supply_image_src`, `supply_join_date`) VALUES
	(1, '供应钼铁矿', 1, 18, '供应钼铁矿', 23, NULL, '但是发生大法发撒旦发生大法斯蒂芬', '', 8, 1, '1233444545', NULL, 23232, '2013-01-29 23:02:30', 'xiaofuqian', 0, NULL, '2013-01-29 23:02:53'),
	(2, '求购钼铁矿', 1, 19, '求购钼铁矿', 22, NULL, '求购一批刚出炉的包子', NULL, 8, 1, '1233444545', NULL, 23232, '2013-01-29 23:02:30', NULL, 0, NULL, '2013-01-29 23:02:53');
/*!40000 ALTER TABLE `mu_supply` ENABLE KEYS */;


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
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

# Dumping data for table mu.mu_term: 23 rows
/*!40000 ALTER TABLE `mu_term` DISABLE KEYS */;
INSERT INTO `mu_term` (`term_id`, `term_parent_id`, `term_name`, `term_slug`, `term_group_id`, `term_order`, `term_create_time`) VALUES
	(1, 0, '有效', 'sdfsdfasdfasdf', 1, 0, '2013-01-20 10:27:00'),
	(2, 0, '无效', NULL, 1, 0, '2013-01-20 17:56:41'),
	(3, 0, '吨', NULL, 2, 0, '2013-01-22 22:31:17'),
	(4, 0, '国有企业', NULL, 4, 0, '2013-01-23 20:59:01'),
	(5, 0, '中外合资', NULL, 4, 0, '2013-01-23 20:59:00'),
	(6, 0, '采矿型', NULL, 5, 0, '2013-01-23 20:58:59'),
	(7, 0, '贸易型', NULL, 5, 0, '2013-01-23 20:58:57'),
	(8, 0, '董事长', NULL, 3, 0, '2013-01-23 21:02:36'),
	(9, 0, '图片', NULL, 6, 0, '2013-01-24 22:29:45'),
	(10, 0, 'flash', NULL, 6, 0, '2013-01-24 22:30:00'),
	(11, 0, '首页底部', NULL, 7, 0, '2013-01-24 22:30:22'),
	(12, 0, '首页幻灯片下方', NULL, 7, 0, '2013-01-26 23:42:01'),
	(13, 0, '供应信息', NULL, 8, 0, '2013-01-24 22:46:11'),
	(14, 0, '采购信息', NULL, 8, 0, '2013-01-24 22:46:22'),
	(15, 0, '首页特价信息', NULL, 9, 0, '2013-01-26 23:42:04'),
	(16, 0, '行情', NULL, 10, 0, '2013-01-26 23:41:46'),
	(17, 0, '新闻', NULL, 10, 0, '2013-01-26 23:41:59'),
	(18, 0, '供应', NULL, 11, 0, '2013-01-27 14:37:56'),
	(19, 0, '求购', NULL, 11, 0, '2013-01-27 14:37:54'),
	(20, 0, '未审核', NULL, 1, 0, '2013-01-27 15:09:39'),
	(21, 0, '千克', 'test kg', 2, 0, NULL),
	(22, 0, '钼铁', NULL, 12, 0, '2013-01-29 03:04:41'),
	(23, 0, '氧化钼', NULL, 12, 0, '2013-01-29 03:05:05');
/*!40000 ALTER TABLE `mu_term` ENABLE KEYS */;


# Dumping structure for table mu.mu_term_group
DROP TABLE IF EXISTS `mu_term_group`;
CREATE TABLE IF NOT EXISTS `mu_term_group` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(100) DEFAULT NULL,
  `group_desc` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

# Dumping data for table mu.mu_term_group: 12 rows
/*!40000 ALTER TABLE `mu_term_group` DISABLE KEYS */;
INSERT INTO `mu_term_group` (`group_id`, `group_name`, `group_desc`) VALUES
	(1, '状态', NULL),
	(2, '重量单位', NULL),
	(3, '职位', NULL),
	(4, '企业类型', NULL),
	(5, '经营模式', NULL),
	(6, '广告媒体类型', NULL),
	(7, '广告位置', NULL),
	(8, '推荐信息类型', NULL),
	(9, '推荐位置', NULL),
	(10, '文章类型', NULL),
	(11, '供求类型', NULL),
	(12, '钼分类', NULL);
/*!40000 ALTER TABLE `mu_term_group` ENABLE KEYS */;


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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

# Dumping data for table mu.mu_user: 1 rows
/*!40000 ALTER TABLE `mu_user` DISABLE KEYS */;
INSERT INTO `mu_user` (`user_id`, `user_name`, `user_pwd`, `user_email`, `user_nickname`, `user_type`, `user_mobile_no`, `user_first_name`, `user_last_name`, `user_status`, `user_province_id`, `user_city_id`, `user_subscribe`, `user_point`, `user_join_date`, `user_confirm_date`, `user_last_login_date`) VALUES
	(1, 'xiaofuqian', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `mu_user` ENABLE KEYS */;


# Dumping structure for table mu.mu_user_certificate
DROP TABLE IF EXISTS `mu_user_certificate`;
CREATE TABLE IF NOT EXISTS `mu_user_certificate` (
  `cert_id` int(11) NOT NULL,
  `cert_ent_id` int(11) NOT NULL,
  `cert_title` varchar(128) DEFAULT NULL COMMENT '''资质''',
  `cert_img_src` varchar(128) DEFAULT NULL COMMENT '''图片地址''',
  PRIMARY KEY (`cert_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Dumping data for table mu.mu_user_certificate: 0 rows
/*!40000 ALTER TABLE `mu_user_certificate` DISABLE KEYS */;
/*!40000 ALTER TABLE `mu_user_certificate` ENABLE KEYS */;


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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

# Dumping data for table mu.mu_user_enterprise: 1 rows
/*!40000 ALTER TABLE `mu_user_enterprise` DISABLE KEYS */;
INSERT INTO `mu_user_enterprise` (`ent_id`, `ent_user_id`, `ent_name`, `ent_type`, `ent_website`, `ent_business_model`, `ent_zipcode`, `ent_introduce`, `ent_location`, `ent_city`, `ent_status`, `ent_chief`, `ent_create_time`, `ent_chief_postion`, `ent_business_scope`, `ent_registered_capital`, `ent_recommend`, `ent_logo`, `ent_update_time`, `ent_check_by`) VALUES
	(2, 1, '平顶山钼铁集团', 4, NULL, 6, NULL, NULL, NULL, 4, 1, '肖富乾', '2012-12-02 00:00:00', 8, NULL, 2000, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `mu_user_enterprise` ENABLE KEYS */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
