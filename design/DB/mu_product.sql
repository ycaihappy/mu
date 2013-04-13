/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50516
Source Host           : localhost:3306
Source Database       : mu_product

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2013-04-13 22:16:37
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `mu_advertisement`
-- ----------------------------
DROP TABLE IF EXISTS `mu_advertisement`;
CREATE TABLE `mu_advertisement` (
  `ad_id` int(11) NOT NULL AUTO_INCREMENT,
  `ad_user_id` int(11) NOT NULL DEFAULT '0',
  `ad_title` varchar(128) DEFAULT NULL,
  `ad_type` int(4) NOT NULL COMMENT '视频,图片,flash',
  `ad_no` int(4) NOT NULL COMMENT '''广告编号是用于指明位置''',
  `ad_link` varchar(256) DEFAULT NULL,
  `ad_status` int(4) DEFAULT NULL,
  `ad_click_num` int(11) DEFAULT '0' COMMENT '点击量',
  `ad_start_date` datetime DEFAULT NULL COMMENT '''广告的有效开始时间''',
  `ad_end_date` datetime DEFAULT NULL COMMENT '''广告的有效结束时间''',
  `ad_price` decimal(12,0) DEFAULT NULL COMMENT '广告费用',
  `ad_media_src` varchar(128) DEFAULT NULL COMMENT '广告媒体文件',
  `ad_create_time` datetime DEFAULT NULL,
  PRIMARY KEY (`ad_id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mu_advertisement
-- ----------------------------
INSERT INTO mu_advertisement VALUES ('9', '0', '首页底部宣传广告', '9', '11', 'www.mushuw.com', '1', '0', '2013-03-18 00:04:00', '2013-09-30 00:04:16', '1', 'advertisement_0_1363534975_5821.png', '2013-03-17 23:42:55');
INSERT INTO mu_advertisement VALUES ('10', '0', '首部底部宣传广告2', '9', '122', 'www.mushuw.com', '1', '0', '2013-03-18 00:04:10', '2013-09-30 00:04:16', '1', 'advertisement_0_1363535099_5945.png', '2013-03-17 23:44:59');
INSERT INTO mu_advertisement VALUES ('11', '0', '首页幻灯片1', '9', '121', 'www.mushuw.com', '1', '0', '2013-03-18 00:04:11', '2013-09-30 00:04:16', '1', 'advertisement_0_1363535239_6084.png', '2013-03-17 23:47:19');
INSERT INTO mu_advertisement VALUES ('12', '0', '首页幻灯片2', '9', '121', 'www.mushuw.com', '1', '0', '2013-03-18 00:04:12', '2013-09-30 00:04:16', '1', 'advertisement_0_1363535279_6124.png', '2013-03-17 23:47:59');
INSERT INTO mu_advertisement VALUES ('13', '0', '首页幻灯片3', '9', '121', 'www.mushuw.com', '1', '0', '2013-03-18 00:04:13', '2013-09-30 00:04:16', '1', 'advertisement_0_1363535279_6124.png', '2013-03-17 23:47:59');
INSERT INTO mu_advertisement VALUES ('14', '0', '首页幻灯片4', '9', '121', 'www.mushuw.com', '1', '0', '2013-03-18 00:04:14', '2013-09-30 00:04:16', '1', 'advertisement_0_1363535279_6124.png', '2013-03-17 23:47:59');
INSERT INTO mu_advertisement VALUES ('16', '0', '新闻详情页面底部广告', '9', '123', 'www.mushuw.com', '1', '0', '2013-03-01 00:00:00', '2013-09-29 00:00:00', '0', 'advertisement_0_1363538747_9580.gif', '2013-03-18 00:45:47');
INSERT INTO mu_advertisement VALUES ('17', '0', '会员登录主体广告', '9', '127', 'www.mushw.com', '1', '0', '2013-03-01 00:00:00', '2014-01-31 00:00:00', '0', 'advertisement_0_1363618749_9308.png', '2013-03-18 22:59:09');
INSERT INTO mu_advertisement VALUES ('18', '0', '新闻中心中部横幅', '9', '128', 'www.mushw.com', '1', '0', '2013-03-04 00:00:00', '2014-04-30 00:00:00', '0', 'advertisement_0_1363619000_9558.gif', '2013-03-18 23:03:20');
INSERT INTO mu_advertisement VALUES ('19', '0', '新闻中心幻灯片上', '9', '129', 'www.mushw.com', '1', '0', '2013-03-01 00:00:00', '2013-12-29 00:00:00', '0', 'advertisement_0_1363619119_9677.jpg', '2013-03-18 23:05:19');
INSERT INTO mu_advertisement VALUES ('20', '0', '行情中心头部横幅', '9', '130', 'www.mushw.com', '1', '0', '2013-03-04 00:00:00', '2014-01-31 00:00:00', '0', 'advertisement_0_1363619219_9775.gif', '2013-03-18 23:06:59');
INSERT INTO mu_advertisement VALUES ('21', '0', '行情中心中部横幅', '9', '131', 'www.mushw.com', '1', '0', '2013-03-01 00:00:00', '2014-02-28 00:00:00', '0', 'advertisement_0_1363619329_9886.gif', '2013-03-18 23:08:49');
INSERT INTO mu_advertisement VALUES ('22', '0', '行情中心左侧底部', '9', '132', 'www.mushw.com', '1', '0', '2013-03-13 00:00:00', '2013-12-31 00:00:00', '0', 'advertisement_0_1363619374_9931.png', '2013-03-18 23:09:34');
INSERT INTO mu_advertisement VALUES ('23', '0', '钼服务主体广告', '9', '133', 'www.mushw.com', '1', '0', '2013-03-01 00:00:00', '2014-01-31 00:00:00', '0', 'advertisement_0_1363619490_47.jpg', '2013-03-18 23:11:30');
INSERT INTO mu_advertisement VALUES ('24', '0', '钼百科头部横幅', '9', '136', 'www.mushuw.com', '1', '0', '2013-03-01 00:00:00', '2014-03-31 00:00:00', '1', 'advertisement_0_1363704744_5009.gif', '2013-03-19 22:26:08');
INSERT INTO mu_advertisement VALUES ('25', '0', '钼百科幻灯片1', '9', '137', 'www.mushuw.com', '1', '0', '2013-03-01 00:00:00', '2014-03-31 00:00:00', '1', 'advertisement_0_1363703208_3478.gif', '2013-03-19 22:26:48');
INSERT INTO mu_advertisement VALUES ('26', '0', '钼百科幻灯片2', '9', '137', 'www.mushuw.com', '1', '0', '2013-03-01 00:00:00', '2014-01-31 00:00:00', '0', 'advertisement_0_1363703240_3510.gif', '2013-03-19 22:27:20');
INSERT INTO mu_advertisement VALUES ('27', '0', '钼百科幻灯片3', '9', '137', 'www.mushuw.com', '1', '0', '2013-03-01 00:00:00', '2013-12-31 00:00:00', '1', 'advertisement_0_1363703266_3536.gif', '2013-03-19 22:27:46');
INSERT INTO mu_advertisement VALUES ('28', '0', '钼百科幻灯片4', '9', '137', 'www.mushuw.com', '1', '0', '2013-03-08 00:00:00', '2013-12-31 00:00:00', '0', 'advertisement_0_1363703300_3570.gif', '2013-03-19 22:28:20');
INSERT INTO mu_advertisement VALUES ('29', '0', '钼百科中部横幅', '9', '138', 'www.mushuw.com', '1', '0', '2013-03-01 00:00:00', '2014-01-30 00:00:00', '0', 'advertisement_0_1363703424_3694.jpg', '2013-03-19 22:30:24');
INSERT INTO mu_advertisement VALUES ('30', '0', '服务详情页头部横幅', '9', '139', 'www.mushuw.com', '1', '0', '2013-03-01 00:00:00', '2013-09-29 00:00:00', '0', 'advertisement_0_1363703504_3773.jpg', '2013-03-19 22:31:44');
INSERT INTO mu_advertisement VALUES ('31', '0', '钼百科头部左侧', '9', '140', 'www.mushuw.com', '1', '0', '2013-03-01 00:00:00', '2013-11-30 00:00:00', '0', 'advertisement_0_1363703571_3840.gif', '2013-03-19 22:32:51');
INSERT INTO mu_advertisement VALUES ('32', '0', '钼百科中部左侧小图', '9', '141', 'www.mushuw.com', '1', '0', '2013-03-01 00:00:00', '2014-04-30 00:00:00', '0', 'advertisement_0_1363704213_4479.gif', '2013-03-19 22:43:33');
INSERT INTO mu_advertisement VALUES ('33', '0', '钼百科头部中间小横幅', '9', '142', 'www.mushuw.com', '1', '0', '2013-03-01 00:00:00', '2013-12-31 00:00:00', '1', 'advertisement_0_1363705230_5493.gif', '2013-03-19 23:00:30');
INSERT INTO mu_advertisement VALUES ('34', '0', '首页分类下方', '9', '144', 'www.mushw.com', '1', '0', '2013-03-01 00:00:00', '2014-02-28 00:00:00', '1', 'advertisement_0_1363878923_5148.jpg', '2013-03-21 23:15:23');
INSERT INTO mu_advertisement VALUES ('35', '0', '供求首页左侧中部', '9', '145', 'www.mushw.com', '1', '0', '2013-03-09 00:00:00', '2013-12-29 00:00:00', '1', 'advertisement_0_1363878985_8653.png', '2013-03-21 23:16:25');
INSERT INTO mu_advertisement VALUES ('36', '0', '现货列表右侧中部', '9', '146', 'www.mushw.com', '1', '0', '2013-03-02 00:00:00', '2014-01-31 00:00:00', '1', 'advertisement_0_1363879124_8791.png', '2013-03-21 23:18:44');

-- ----------------------------
-- Table structure for `mu_article`
-- ----------------------------
DROP TABLE IF EXISTS `mu_article`;
CREATE TABLE `mu_article` (
  `art_id` int(11) NOT NULL AUTO_INCREMENT,
  `art_title` varchar(128) NOT NULL,
  `art_source` char(128) DEFAULT NULL COMMENT '''文章出处''',
  `art_click_count` int(11) DEFAULT '0' COMMENT '文章点击数',
  `art_category_id` int(11) NOT NULL COMMENT '文章分类 行情 新闻 ',
  `art_subcategory_id` int(11) DEFAULT NULL,
  `art_summary` varchar(255) DEFAULT NULL COMMENT '文章简介',
  `art_content` longtext COMMENT '''文章内容''',
  `art_status` int(11) DEFAULT NULL COMMENT '起草 审核中 发布',
  `art_tags` varchar(45) DEFAULT NULL COMMENT '''文章tags''',
  `art_user_id` tinyint(4) NOT NULL COMMENT '文章发表人',
  `art_check_by` varchar(45) DEFAULT NULL COMMENT '''审核人''',
  `art_post_date` datetime DEFAULT NULL COMMENT '''发布时间''',
  `art_img` varchar(218) DEFAULT NULL COMMENT '附带图片',
  `art_modified_date` datetime DEFAULT NULL COMMENT '''修改时间''',
  `art_recommend` tinyint(4) DEFAULT NULL COMMENT '文章推荐',
  PRIMARY KEY (`art_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1202 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mu_article
-- ----------------------------

-- ----------------------------
-- Table structure for `mu_city`
-- ----------------------------
DROP TABLE IF EXISTS `mu_city`;
CREATE TABLE `mu_city` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(128) NOT NULL,
  `city_parent` int(11) DEFAULT '0',
  `city_level` tinyint(4) DEFAULT NULL,
  `city_order` tinyint(4) DEFAULT '0',
  `city_open` tinyint(4) DEFAULT '1',
  `city_mu` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`city_id`)
) ENGINE=MyISAM AUTO_INCREMENT=381 DEFAULT CHARSET=utf8 COMMENT='省市联动表';

-- ----------------------------
-- Records of mu_city
-- ----------------------------
INSERT INTO mu_city VALUES ('1', '北京市', '0', '2', '0', '1', '0');
INSERT INTO mu_city VALUES ('2', '天津市', '0', '2', '0', '1', '0');
INSERT INTO mu_city VALUES ('3', '河北省', '0', '2', '0', '1', '1');
INSERT INTO mu_city VALUES ('4', '山西省', '0', '2', '0', '1', '0');
INSERT INTO mu_city VALUES ('5', '内蒙古自治区', '0', '2', '0', '1', '1');
INSERT INTO mu_city VALUES ('6', '辽宁省', '0', '2', '0', '1', '1');
INSERT INTO mu_city VALUES ('7', '吉林省', '0', '2', '0', '1', '1');
INSERT INTO mu_city VALUES ('8', '黑龙江省', '0', '2', '0', '1', '0');
INSERT INTO mu_city VALUES ('9', '上海市', '0', '2', '0', '1', '0');
INSERT INTO mu_city VALUES ('10', '江苏省', '0', '2', '0', '1', '0');
INSERT INTO mu_city VALUES ('11', '浙江省', '0', '2', '0', '1', '0');
INSERT INTO mu_city VALUES ('12', '安徽省', '0', '2', '0', '1', '0');
INSERT INTO mu_city VALUES ('13', '福建省', '0', '2', '0', '1', '0');
INSERT INTO mu_city VALUES ('14', '江西省', '0', '2', '0', '1', '1');
INSERT INTO mu_city VALUES ('15', '山东省', '0', '2', '0', '1', '1');
INSERT INTO mu_city VALUES ('16', '河南省', '0', '2', '0', '1', '1');
INSERT INTO mu_city VALUES ('17', '湖北省', '0', '2', '0', '1', '0');
INSERT INTO mu_city VALUES ('18', '湖南省', '0', '2', '0', '1', '0');
INSERT INTO mu_city VALUES ('19', '广东省', '0', '2', '0', '1', '0');
INSERT INTO mu_city VALUES ('20', '广西壮族自治区', '0', '2', '0', '1', '0');
INSERT INTO mu_city VALUES ('21', '海南省', '0', '2', '0', '1', '0');
INSERT INTO mu_city VALUES ('22', '重庆市', '0', '2', '0', '1', '0');
INSERT INTO mu_city VALUES ('23', '四川省', '0', '2', '0', '1', '0');
INSERT INTO mu_city VALUES ('24', '贵州省', '0', '2', '0', '1', '0');
INSERT INTO mu_city VALUES ('25', '云南省', '0', '2', '0', '1', '0');
INSERT INTO mu_city VALUES ('26', '西藏自治区', '0', '2', '0', '1', '0');
INSERT INTO mu_city VALUES ('27', '陕西省', '0', '2', '0', '1', '1');
INSERT INTO mu_city VALUES ('28', '甘肃省', '0', '2', '0', '1', '0');
INSERT INTO mu_city VALUES ('29', '青海省', '0', '2', '0', '1', '0');
INSERT INTO mu_city VALUES ('30', '宁夏回族自治区', '0', '2', '0', '1', '0');
INSERT INTO mu_city VALUES ('31', '新疆维吾尔自治区', '0', '2', '0', '1', '0');
INSERT INTO mu_city VALUES ('32', '香港特别行政区', '0', '2', '0', '1', '0');
INSERT INTO mu_city VALUES ('33', '澳门特别行政区', '0', '2', '0', '1', '0');
INSERT INTO mu_city VALUES ('34', '台湾省', '0', '2', '0', '1', '0');
INSERT INTO mu_city VALUES ('35', '北京市', '1', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('37', '天津市', '2', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('38', '石家庄市', '3', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('39', '唐山市', '3', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('40', '秦皇岛市', '3', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('41', '邯郸市', '3', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('42', '邢台市', '3', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('43', '保定市', '3', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('44', '张家口市', '3', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('45', '承德市', '3', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('46', '沧州市', '3', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('47', '廊坊市', '3', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('48', '衡水市', '3', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('49', '太原市', '4', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('50', '大同市', '4', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('51', '阳泉市', '4', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('52', '长治市', '4', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('53', '晋城市', '4', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('54', '朔州市', '4', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('55', '晋中市', '4', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('56', '运城市', '4', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('57', '忻州市', '4', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('58', '临汾市', '4', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('59', '吕梁市', '4', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('60', '呼和浩特市', '5', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('61', '包头市', '5', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('62', '乌海市', '5', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('63', '赤峰市', '5', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('64', '通辽市', '5', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('65', '鄂尔多斯市', '5', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('66', '呼伦贝尔市', '5', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('67', '巴彦淖尔市', '5', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('68', '乌兰察布市', '5', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('69', '兴安盟', '5', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('70', '锡林郭勒盟', '5', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('71', '阿拉善盟', '5', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('72', '沈阳市', '6', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('73', '大连市', '6', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('74', '鞍山市', '6', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('75', '抚顺市', '6', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('76', '本溪市', '6', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('77', '丹东市', '6', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('78', '锦州市', '6', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('79', '营口市', '6', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('80', '阜新市', '6', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('81', '辽阳市', '6', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('82', '盘锦市', '6', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('83', '铁岭市', '6', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('84', '朝阳市', '6', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('85', '葫芦岛市', '6', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('86', '长春市', '7', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('87', '吉林市', '7', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('88', '四平市', '7', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('89', '辽源市', '7', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('90', '通化市', '7', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('91', '白山市', '7', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('92', '松原市', '7', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('93', '白城市', '7', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('94', '延边朝鲜族自治州', '7', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('95', '哈尔滨市', '8', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('96', '齐齐哈尔市', '8', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('97', '鸡西市', '8', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('98', '鹤岗市', '8', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('99', '双鸭山市', '8', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('100', '大庆市', '8', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('101', '伊春市', '8', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('102', '佳木斯市', '8', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('103', '七台河市', '8', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('104', '牡丹江市', '8', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('105', '黑河市', '8', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('106', '绥化市', '8', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('107', '大兴安岭地区', '8', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('108', '上海市', '9', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('109', '南京市', '10', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('110', '无锡市', '10', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('111', '徐州市', '10', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('112', '常州市', '10', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('113', '苏州市', '10', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('114', '南通市', '10', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('115', '连云港市', '10', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('116', '淮安市', '10', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('117', '盐城市', '10', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('118', '扬州市', '10', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('119', '镇江市', '10', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('120', '泰州市', '10', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('121', '宿迁市', '10', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('122', '杭州市', '11', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('123', '宁波市', '11', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('124', '温州市', '11', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('125', '嘉兴市', '11', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('126', '湖州市', '11', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('127', '绍兴市', '11', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('128', '金华市', '11', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('129', '衢州市', '11', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('130', '舟山市', '11', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('131', '台州市', '11', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('132', '丽水市', '11', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('133', '合肥市', '12', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('134', '芜湖市', '12', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('135', '蚌埠市', '12', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('136', '淮南市', '12', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('137', '马鞍山市', '12', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('138', '淮北市', '12', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('139', '铜陵市', '12', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('140', '安庆市', '12', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('141', '黄山市', '12', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('142', '滁州市', '12', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('143', '阜阳市', '12', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('144', '宿州市', '12', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('145', '巢湖市', '12', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('146', '六安市', '12', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('147', '亳州市', '12', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('148', '池州市', '12', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('149', '宣城市', '12', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('150', '福州市', '13', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('151', '厦门市', '13', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('152', '莆田市', '13', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('153', '三明市', '13', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('154', '泉州市', '13', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('155', '漳州市', '13', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('156', '南平市', '13', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('157', '龙岩市', '13', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('158', '宁德市', '13', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('159', '南昌市', '14', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('160', '景德镇市', '14', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('161', '萍乡市', '14', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('162', '九江市', '14', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('163', '新余市', '14', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('164', '鹰潭市', '14', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('165', '赣州市', '14', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('166', '吉安市', '14', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('167', '宜春市', '14', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('168', '抚州市', '14', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('169', '上饶市', '14', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('170', '济南市', '15', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('171', '青岛市', '15', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('172', '淄博市', '15', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('173', '枣庄市', '15', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('174', '东营市', '15', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('175', '烟台市', '15', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('176', '潍坊市', '15', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('177', '济宁市', '15', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('178', '泰安市', '15', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('179', '威海市', '15', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('180', '日照市', '15', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('181', '莱芜市', '15', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('182', '临沂市', '15', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('183', '德州市', '15', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('184', '聊城市', '15', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('185', '滨州市', '15', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('186', '荷泽市', '15', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('187', '郑州市', '16', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('188', '开封市', '16', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('189', '洛阳市', '16', '3', '0', '1', '1');
INSERT INTO mu_city VALUES ('190', '平顶山市', '16', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('191', '安阳市', '16', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('192', '鹤壁市', '16', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('193', '新乡市', '16', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('194', '焦作市', '16', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('195', '濮阳市', '16', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('196', '许昌市', '16', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('197', '漯河市', '16', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('198', '三门峡市', '16', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('199', '南阳市', '16', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('200', '商丘市', '16', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('201', '信阳市', '16', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('202', '周口市', '16', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('203', '驻马店市', '16', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('204', '武汉市', '17', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('205', '黄石市', '17', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('206', '十堰市', '17', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('207', '宜昌市', '17', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('208', '襄樊市', '17', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('209', '鄂州市', '17', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('210', '荆门市', '17', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('211', '孝感市', '17', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('212', '荆州市', '17', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('213', '黄冈市', '17', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('214', '咸宁市', '17', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('215', '随州市', '17', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('216', '恩施土家族苗族自治州', '17', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('217', '神农架', '17', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('218', '长沙市', '18', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('219', '株洲市', '18', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('220', '湘潭市', '18', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('221', '衡阳市', '18', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('222', '邵阳市', '18', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('223', '岳阳市', '18', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('224', '常德市', '18', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('225', '张家界市', '18', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('226', '益阳市', '18', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('227', '郴州市', '18', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('228', '永州市', '18', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('229', '怀化市', '18', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('230', '娄底市', '18', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('231', '湘西土家族苗族自治州', '18', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('232', '广州市', '19', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('233', '韶关市', '19', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('234', '深圳市', '19', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('235', '珠海市', '19', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('236', '汕头市', '19', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('237', '佛山市', '19', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('238', '江门市', '19', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('239', '湛江市', '19', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('240', '茂名市', '19', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('241', '肇庆市', '19', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('242', '惠州市', '19', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('243', '梅州市', '19', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('244', '汕尾市', '19', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('245', '河源市', '19', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('246', '阳江市', '19', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('247', '清远市', '19', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('248', '东莞市', '19', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('249', '中山市', '19', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('250', '潮州市', '19', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('251', '揭阳市', '19', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('252', '云浮市', '19', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('253', '南宁市', '20', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('254', '柳州市', '20', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('255', '桂林市', '20', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('256', '梧州市', '20', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('257', '北海市', '20', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('258', '防城港市', '20', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('259', '钦州市', '20', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('260', '贵港市', '20', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('261', '玉林市', '20', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('262', '百色市', '20', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('263', '贺州市', '20', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('264', '河池市', '20', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('265', '来宾市', '20', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('266', '崇左市', '20', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('267', '海口市', '21', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('268', '三亚市', '21', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('269', '重庆市', '22', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('270', '成都市', '23', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('271', '自贡市', '23', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('272', '攀枝花市', '23', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('273', '泸州市', '23', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('274', '德阳市', '23', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('275', '绵阳市', '23', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('276', '广元市', '23', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('277', '遂宁市', '23', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('278', '内江市', '23', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('279', '乐山市', '23', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('280', '南充市', '23', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('281', '眉山市', '23', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('282', '宜宾市', '23', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('283', '广安市', '23', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('284', '达州市', '23', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('285', '雅安市', '23', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('286', '巴中市', '23', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('287', '资阳市', '23', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('288', '阿坝藏族羌族自治州', '23', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('289', '甘孜藏族自治州', '23', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('290', '凉山彝族自治州', '23', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('291', '贵阳市', '24', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('292', '六盘水市', '24', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('293', '遵义市', '24', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('294', '安顺市', '24', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('295', '铜仁地区', '24', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('296', '黔西南布依族苗族自治州', '24', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('297', '毕节地区', '24', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('298', '黔东南苗族侗族自治州', '24', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('299', '黔南布依族苗族自治州', '24', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('300', '昆明市', '25', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('301', '曲靖市', '25', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('302', '玉溪市', '25', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('303', '保山市', '25', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('304', '昭通市', '25', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('305', '丽江市', '25', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('306', '思茅市', '25', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('307', '临沧市', '25', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('308', '楚雄彝族自治州', '25', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('309', '红河哈尼族彝族自治州', '25', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('310', '文山壮族苗族自治州', '25', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('311', '西双版纳傣族自治州', '25', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('312', '大理白族自治州', '25', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('313', '德宏傣族景颇族自治州', '25', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('314', '怒江傈僳族自治州', '25', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('315', '迪庆藏族自治州', '25', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('316', '拉萨市', '26', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('317', '昌都地区', '26', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('318', '山南地区', '26', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('319', '日喀则地区', '26', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('320', '那曲地区', '26', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('321', '阿里地区', '26', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('322', '林芝地区', '26', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('323', '西安市', '27', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('324', '铜川市', '27', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('325', '宝鸡市', '27', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('326', '咸阳市', '27', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('327', '渭南市', '27', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('328', '延安市', '27', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('329', '汉中市', '27', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('330', '榆林市', '27', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('331', '安康市', '27', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('332', '商洛市', '27', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('333', '兰州市', '28', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('334', '嘉峪关市', '28', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('335', '金昌市', '28', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('336', '白银市', '28', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('337', '天水市', '28', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('338', '武威市', '28', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('339', '张掖市', '28', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('340', '平凉市', '28', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('341', '酒泉市', '28', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('342', '庆阳市', '28', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('343', '定西市', '28', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('344', '陇南市', '28', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('345', '临夏回族自治州', '28', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('346', '甘南藏族自治州', '28', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('347', '西宁市', '29', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('348', '海东地区', '29', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('349', '海北藏族自治州', '29', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('350', '黄南藏族自治州', '29', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('351', '海南藏族自治州', '29', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('352', '果洛藏族自治州', '29', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('353', '玉树藏族自治州', '29', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('354', '海西蒙古族藏族自治州', '29', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('355', '银川市', '30', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('356', '石嘴山市', '30', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('357', '吴忠市', '30', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('358', '固原市', '30', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('359', '中卫市', '30', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('360', '乌鲁木齐市', '31', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('361', '克拉玛依市', '31', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('362', '吐鲁番地区', '31', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('363', '哈密地区', '31', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('364', '昌吉回族自治州', '31', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('365', '博尔塔拉蒙古自治州', '31', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('366', '巴音郭楞蒙古自治州', '31', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('367', '阿克苏地区', '31', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('368', '克孜勒苏柯尔克孜自治州', '31', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('369', '喀什地区', '31', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('370', '和田地区', '31', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('371', '伊犁哈萨克自治州', '31', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('372', '塔城地区', '31', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('373', '阿勒泰地区', '31', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('374', '石河子市', '31', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('375', '阿拉尔市', '31', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('376', '图木舒克市', '31', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('377', '五家渠市', '31', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('378', '香港特别行政区', '32', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('379', '澳门特别行政区', '33', '3', '0', '1', '0');
INSERT INTO mu_city VALUES ('380', '台湾省', '34', '3', '0', '1', '0');

-- ----------------------------
-- Table structure for `mu_favorite`
-- ----------------------------
DROP TABLE IF EXISTS `mu_favorite`;
CREATE TABLE `mu_favorite` (
  `favorite_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `favorited_object_id` bigint(20) NOT NULL COMMENT '供求ID 现货ID',
  `favorited_object_type` tinyint(4) NOT NULL COMMENT '1 供求 2现货 ',
  `favorit_user_id` int(11) DEFAULT NULL COMMENT '收藏人',
  `favorite_time` datetime DEFAULT NULL COMMENT '''添加时间''',
  PRIMARY KEY (`favorite_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mu_favorite
-- ----------------------------

-- ----------------------------
-- Table structure for `mu_file`
-- ----------------------------
DROP TABLE IF EXISTS `mu_file`;
CREATE TABLE `mu_file` (
  `file_id` int(11) NOT NULL AUTO_INCREMENT,
  `file_title` varchar(45) DEFAULT NULL,
  `file_type_id` tinyint(4) DEFAULT NULL COMMENT '1图片 2文件',
  `file_content` varchar(255) DEFAULT NULL,
  `file_url` varchar(255) DEFAULT NULL,
  `file_user_id` int(11) NOT NULL,
  `file_create_time` datetime DEFAULT NULL,
  PRIMARY KEY (`file_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mu_file
-- ----------------------------
INSERT INTO mu_file VALUES ('3', 'asdfasdfsd', '69', 'fasdfasdf', 'uploads/4d26f7fb63c6328e4c69b422d8c1a56f.jpg', '1', '2013-03-07 22:59:51');

-- ----------------------------
-- Table structure for `mu_find_passwd`
-- ----------------------------
DROP TABLE IF EXISTS `mu_find_passwd`;
CREATE TABLE `mu_find_passwd` (
  `find_id` bigint(20) NOT NULL,
  `find_user_id` int(11) NOT NULL,
  `find_new_passwd` varchar(45) DEFAULT NULL,
  `find_status` tinyint(4) DEFAULT NULL,
  `find_mobile_no` varchar(45) DEFAULT NULL,
  `find_date` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`find_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='找回密码功能';

-- ----------------------------
-- Records of mu_find_passwd
-- ----------------------------

-- ----------------------------
-- Table structure for `mu_friend_link`
-- ----------------------------
DROP TABLE IF EXISTS `mu_friend_link`;
CREATE TABLE `mu_friend_link` (
  `flink_id` int(11) NOT NULL AUTO_INCREMENT,
  `flink_name` varchar(128) NOT NULL,
  `flink_user_id` int(11) NOT NULL,
  `flink_url` varchar(512) DEFAULT NULL,
  `flink_order` tinyint(4) DEFAULT '0',
  `flink_status` tinyint(4) DEFAULT NULL,
  `flink_create_date` datetime DEFAULT NULL,
  PRIMARY KEY (`flink_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='友情链接';

-- ----------------------------
-- Records of mu_friend_link
-- ----------------------------
INSERT INTO mu_friend_link VALUES ('1', '百度科技', '3', 'http://www.baidu.com', '0', '1', '2013-02-25 00:17:38');
INSERT INTO mu_friend_link VALUES ('2', 'google科技', '3', 'http://www.google.com', '0', '1', '2013-02-25 00:17:38');
INSERT INTO mu_friend_link VALUES ('4', '中国钢铁网', '0', 'http://www.steelcn.com', '0', '1', '2013-03-05 23:32:44');
INSERT INTO mu_friend_link VALUES ('5', 'youtube', '3', 'http://www.youtube.com', '0', '1', '2013-03-14 10:05:00');
INSERT INTO mu_friend_link VALUES ('6', '钼都贸易网', '0', 'www.molychina.com', '0', '1', '2013-03-17 21:48:21');
INSERT INTO mu_friend_link VALUES ('7', '钼网站', '0', 'www.molyworld.com', '0', '1', '2013-03-17 21:49:19');

-- ----------------------------
-- Table structure for `mu_func`
-- ----------------------------
DROP TABLE IF EXISTS `mu_func`;
CREATE TABLE `mu_func` (
  `func_id` int(11) NOT NULL,
  `func_name` varchar(128) NOT NULL,
  `func_action` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`func_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mu_func
-- ----------------------------

-- ----------------------------
-- Table structure for `mu_image_library`
-- ----------------------------
DROP TABLE IF EXISTS `mu_image_library`;
CREATE TABLE `mu_image_library` (
  `image_id` int(10) NOT NULL AUTO_INCREMENT,
  `image_title` varchar(128) NOT NULL,
  `image_thumb_src` varchar(256) NOT NULL,
  `image_src` varchar(256) NOT NULL DEFAULT '0',
  `image_status` int(11) NOT NULL DEFAULT '0' COMMENT '是否启用',
  `image_used_type` int(11) NOT NULL DEFAULT '0' COMMENT '图片被使用的分类',
  `image_added_by` int(11) NOT NULL DEFAULT '0' COMMENT '图片添加人',
  `image_added_time` datetime NOT NULL COMMENT '图片添加时间',
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COMMENT='图片库';

-- ----------------------------
-- Records of mu_image_library
-- ----------------------------
INSERT INTO mu_image_library VALUES ('24', '钼板坯', '83_1363284790_6493.jpg', '83_1363284790_6493.jpg', '1', '83', '1', '2013-03-08 00:11:47');
INSERT INTO mu_image_library VALUES ('25', '钼精矿', '31_1363284778_6481.png', '31_1363284778_6481.png', '1', '31', '1', '2013-03-08 00:18:35');
INSERT INTO mu_image_library VALUES ('26', '钼铁', '57_1363284765_6468.jpg', '57_1363284765_6468.jpg', '1', '57', '1', '2013-03-08 00:19:22');
INSERT INTO mu_image_library VALUES ('27', '氧化钼', '72_1363284747_6450.jpg', '72_1363284747_6450.jpg', '1', '72', '1', '2013-03-08 00:19:53');
INSERT INTO mu_image_library VALUES ('28', '钼酸', '89_1363284724_6427.jpg', '89_1363284724_6427.jpg', '1', '89', '1', '2013-03-08 00:23:49');
INSERT INTO mu_image_library VALUES ('29', '钼酸钠', '78_1363284812_6515.jpg', '78_1363284812_6515.jpg', '1', '78', '1', '2013-03-15 02:13:32');
INSERT INTO mu_image_library VALUES ('30', '钼酸钡', '32_1363284838_6541.jpg', '32_1363284838_6541.jpg', '1', '32', '1', '2013-03-15 02:13:58');
INSERT INTO mu_image_library VALUES ('31', '高纯三氧化钼', '79_1363284864_6567.jpg', '79_1363284864_6567.jpg', '1', '79', '1', '2013-03-15 02:14:24');
INSERT INTO mu_image_library VALUES ('32', '四钼酸铵', '80_1363284889_6592.jpg', '80_1363284889_6592.jpg', '1', '80', '1', '2013-03-15 02:14:49');
INSERT INTO mu_image_library VALUES ('33', '八钼酸按', '77_1363284917_6619.JPG', '77_1363284917_6619.JPG', '1', '77', '1', '2013-03-15 02:15:17');
INSERT INTO mu_image_library VALUES ('34', '二钼酸铵', '75_1363284937_6639.jpg', '75_1363284937_6639.jpg', '1', '75', '1', '2013-03-15 02:15:37');
INSERT INTO mu_image_library VALUES ('35', '杆料', '85_1363284957_6659.jpg', '85_1363284957_6659.jpg', '1', '85', '1', '2013-03-15 02:15:57');
INSERT INTO mu_image_library VALUES ('36', '钼丝', '86_1363284972_6673.jpg', '86_1363284972_6673.jpg', '1', '86', '1', '2013-03-15 02:16:12');
INSERT INTO mu_image_library VALUES ('37', '废钼', '87_1363284997_6699.jpg', '87_1363284997_6699.jpg', '1', '87', '1', '2013-03-15 02:16:37');
INSERT INTO mu_image_library VALUES ('38', '钼异型', '88_1363285022_6724.jpg', '88_1363285022_6724.jpg', '1', '88', '1', '2013-03-15 02:17:02');
INSERT INTO mu_image_library VALUES ('39', '钼条', '84_1363285049_6751.jpg', '84_1363285049_6751.jpg', '1', '84', '1', '2013-03-15 02:17:29');
INSERT INTO mu_image_library VALUES ('40', '钼粉', '82_1363285074_6776.jpg', '82_1363285074_6776.jpg', '1', '82', '1', '2013-03-15 02:17:54');

-- ----------------------------
-- Table structure for `mu_message`
-- ----------------------------
DROP TABLE IF EXISTS `mu_message`;
CREATE TABLE `mu_message` (
  `msg_id` int(10) NOT NULL AUTO_INCREMENT,
  `msg_to_user_id` int(10) DEFAULT '0',
  `msg_from_info` text,
  `msg_from_user_id` int(10) DEFAULT '0',
  `msg_subject` varchar(218) DEFAULT NULL,
  `msg_content` text,
  `msg_type` int(11) DEFAULT NULL COMMENT '评论，回复，留言',
  `msg_date` datetime DEFAULT NULL,
  PRIMARY KEY (`msg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='站内信箱';

-- ----------------------------
-- Records of mu_message
-- ----------------------------
INSERT INTO mu_message VALUES ('1', '3', '0', '3', 'ssdfasdf', 'asfasdfasdf', null, null);
INSERT INTO mu_message VALUES ('2', '3', '企业名称:asdfasdf<br>联系人:asdfasdfasdf <br>发件人:xiaofuqian@live.cn<br>电话号码:023-4336763<br>', '0', 'asdf', 'asdfasdfasdfasdf', null, null);
INSERT INTO mu_message VALUES ('3', '3', null, '101', '测试站内信', '测试站内信测试站内信测试站内信测试站内信测试站内信测试站内信测试站内信测试站内信测试站内信测试站内信测试站内信测试站内信', null, '2013-03-16 21:45:14');
INSERT INTO mu_message VALUES ('4', '3', null, '101', '测试站内信', '测试站内信测试站内信测试站内信测试站内信', null, '2013-03-16 21:45:33');

-- ----------------------------
-- Table structure for `mu_message_template`
-- ----------------------------
DROP TABLE IF EXISTS `mu_message_template`;
CREATE TABLE `mu_message_template` (
  `msg_template_id` int(10) NOT NULL AUTO_INCREMENT,
  `msg_template_name` varchar(128) NOT NULL COMMENT '邮件的名称，供管理只用',
  `msg_template_mnemonic` varchar(128) NOT NULL COMMENT '模板助记符',
  `msg_template_type` int(11) NOT NULL,
  `msg_template_title` varchar(255) DEFAULT NULL COMMENT '邮件标题，短信不用标题',
  `msg_template_content` text COMMENT '信息模板内容，短信注意文字数量',
  `msg_template_added_date` datetime DEFAULT NULL COMMENT '模板添加时间',
  `msg_template_update_date` datetime DEFAULT NULL COMMENT '模板修改时间',
  PRIMARY KEY (`msg_template_id`),
  UNIQUE KEY `msg_template_mnemonic` (`msg_template_mnemonic`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='短信或者邮件的模板';

-- ----------------------------
-- Records of mu_message_template
-- ----------------------------
INSERT INTO mu_message_template VALUES ('1', '金牌会员行情模板', 'goldMemberPrice', '38', '', '<p>\r\n	当前行情如下：{$price}</p>\r\n', '2013-02-28 11:06:44', '2013-02-28 14:33:49');
INSERT INTO mu_message_template VALUES ('2', '注册手机验证码模板', 'registerMobileVerify', '38', '', '<p>\r\n	当前的验证码为：{$verifyCode}</p>\r\n', '2013-02-28 14:27:47', null);
INSERT INTO mu_message_template VALUES ('3', '忘记密码邮件', 'findpassword', '39', '您的新密码', '钼市网为您产生的新密码为：{$password}。', '2013-03-16 00:41:18', null);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='会员旺铺的在线QQ客服表';

-- ----------------------------
-- Records of mu_online_support
-- ----------------------------
INSERT INTO mu_online_support VALUES ('1', '45', '肖富乾', '0', '623774807', '2013-03-15 21:51:31');
INSERT INTO mu_online_support VALUES ('2', '111', '测试2', '1', '531961818', '2013-03-16 21:53:10');
INSERT INTO mu_online_support VALUES ('3', '111', '测试3', '1', '531961818', '2013-03-16 21:54:10');

-- ----------------------------
-- Table structure for `mu_point_rule`
-- ----------------------------
DROP TABLE IF EXISTS `mu_point_rule`;
CREATE TABLE `mu_point_rule` (
  `rule_id` int(11) NOT NULL,
  `func_id` tinyint(4) NOT NULL,
  `action_point` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`rule_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mu_point_rule
-- ----------------------------

-- ----------------------------
-- Table structure for `mu_price_summary`
-- ----------------------------
DROP TABLE IF EXISTS `mu_price_summary`;
CREATE TABLE `mu_price_summary` (
  `sum_id` int(11) NOT NULL AUTO_INCREMENT,
  `sum_unit` int(4) DEFAULT NULL COMMENT '计量单位，吨',
  `sum_price` decimal(15,2) DEFAULT NULL COMMENT '汇总价钱',
  `sum_year` varchar(45) DEFAULT NULL,
  `sum_month` varchar(45) DEFAULT NULL,
  `sum_day` varchar(45) DEFAULT NULL,
  `sum_product_type` int(4) DEFAULT NULL COMMENT '产品类型: 钼铁，钼精矿，三氧化钼',
  `sum_product_zone` int(4) DEFAULT NULL COMMENT '产品地区',
  `sum_add_date` datetime DEFAULT NULL,
  `sum_alias_date` date DEFAULT NULL,
  PRIMARY KEY (`sum_id`)
) ENGINE=MyISAM AUTO_INCREMENT=119886 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mu_price_summary
-- ----------------------------

-- ----------------------------
-- Table structure for `mu_product`
-- ----------------------------
DROP TABLE IF EXISTS `mu_product`;
CREATE TABLE `mu_product` (
  `product_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `last_modified` timestamp NULL DEFAULT NULL,
  `product_user_id` int(11) NOT NULL COMMENT '用户ID',
  `product_keyword` varchar(128) DEFAULT NULL COMMENT '用户ID',
  `product_name` varchar(45) NOT NULL,
  `product_quanity` int(11) DEFAULT NULL COMMENT '数量',
  `product_unit` int(11) DEFAULT NULL COMMENT '数量单位:吨,公斤等',
  `product_type_id` int(4) DEFAULT NULL COMMENT '产品分类',
  `product_price` decimal(10,0) DEFAULT NULL COMMENT '0表示电议',
  `product_mu_content` varchar(50) DEFAULT NULL COMMENT '钼的品质：指百分比含量',
  `product_status` int(4) DEFAULT NULL COMMENT '在售',
  `product_water_content` varchar(50) DEFAULT NULL COMMENT '含水量',
  `product_city_id` int(4) DEFAULT NULL COMMENT '在售',
  `product_content` text COMMENT '在售',
  `product_location` varchar(100) DEFAULT NULL COMMENT '''存货地''',
  `product_special` int(1) DEFAULT '0' COMMENT '是否特价',
  `product_join_date` datetime DEFAULT NULL,
  `product_image_src` varchar(128) DEFAULT NULL,
  `product_check_by` varchar(128) DEFAULT NULL,
  `product_view_count` int(11) DEFAULT '0' COMMENT '浏览量',
  PRIMARY KEY (`product_id`),
  KEY `product_user_id` (`product_user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=213 DEFAULT CHARSET=utf8 COMMENT='现货';

-- ----------------------------
-- Records of mu_product
-- ----------------------------

-- ----------------------------
-- Table structure for `mu_recommend`
-- ----------------------------
DROP TABLE IF EXISTS `mu_recommend`;
CREATE TABLE `mu_recommend` (
  `recommend_id` int(11) NOT NULL AUTO_INCREMENT,
  `recommend_object_id` bigint(20) NOT NULL COMMENT '用户,文章,供求等',
  `recommend_type` int(11) NOT NULL,
  `recommend_position` int(11) NOT NULL,
  `recommend_status` int(4) DEFAULT NULL,
  `recommend_time` datetime DEFAULT NULL,
  PRIMARY KEY (`recommend_id`)
) ENGINE=MyISAM AUTO_INCREMENT=129 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mu_recommend
-- ----------------------------

-- ----------------------------
-- Table structure for `mu_relative_re_price`
-- ----------------------------
DROP TABLE IF EXISTS `mu_relative_re_price`;
CREATE TABLE `mu_relative_re_price` (
  `re_id` int(4) NOT NULL AUTO_INCREMENT,
  `re_type` int(4) NOT NULL DEFAULT '134',
  `re_name` varchar(50) NOT NULL,
  `re_fallup` int(4) DEFAULT NULL COMMENT '表示，涨，跌，平',
  `re_margin` int(4) DEFAULT NULL COMMENT '涨跌幅度',
  `re_market` varchar(128) DEFAULT NULL COMMENT '所属市场',
  `re_price` decimal(10,0) DEFAULT NULL COMMENT '今日价',
  `re_status` int(11) DEFAULT '1' COMMENT '显示状态',
  `re_added_time` datetime DEFAULT NULL COMMENT '添加时间',
  `re_updated_time` datetime DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`re_id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COMMENT='相关稀土矿价格表';

-- ----------------------------
-- Records of mu_relative_re_price
-- ----------------------------

-- ----------------------------
-- Table structure for `mu_right_assignment`
-- ----------------------------
DROP TABLE IF EXISTS `mu_right_assignment`;
CREATE TABLE `mu_right_assignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` int(11) NOT NULL,
  `bizrule` varchar(1024) DEFAULT NULL,
  `data` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`userid`,`itemname`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mu_right_assignment
-- ----------------------------
INSERT INTO mu_right_assignment VALUES ('productAdmin', '2', null, 'N;');
INSERT INTO mu_right_assignment VALUES ('superAdmin', '1', null, 'N;');

-- ----------------------------
-- Table structure for `mu_right_item`
-- ----------------------------
DROP TABLE IF EXISTS `mu_right_item`;
CREATE TABLE `mu_right_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `zh_name` varchar(128) DEFAULT NULL COMMENT '权限项目中文名称',
  `description` varchar(1024) CHARACTER SET gbk DEFAULT NULL,
  `bizrule` varchar(1024) CHARACTER SET gbk DEFAULT NULL COMMENT 'php script for eval',
  `data` varchar(1024) CHARACTER SET gbk DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mu_right_item
-- ----------------------------
INSERT INTO mu_right_item VALUES ('admin-AdvertisementRecommendManageAdvertisement', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-AdvertisementRecommendUpdateAdvertisement', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-AdvertisementRecommendManageRecommend', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-AdvertisementRecommendChangePosition', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-AdvertisementRecommendChangeInfoType', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-AdvertisementRecommendChangeInfoStatus', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-ArticleManageNews', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-ArticleManagePrice', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-ArticleUpdateArticle', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-ArticleChangeNewsStatus', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-ArticleChangePriceStatus', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-ProductManageProduct', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-ProductUpdateProduct', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-ProductChangeProductStatus', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-ProductChangeSpecialStatus', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-ProductManageSpecial', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-ProductManageSupply', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-ProductManageBuy', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-ProductUpdateSupply', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-ProductManageEnterprise', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-ProductChangeEnterpriseStatus', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-ProductUpdateEnterprise', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-SitePage', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-SiteIndex', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-SiteError', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-SiteLogin', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-SiteLogout', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-SiteUpdateCity', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-SiteManageCity', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-SiteUpdateTerm', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-SiteManageTerm', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-SiteManageBasicSiteInfo', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-SiteManageSiteEmailSetting', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-UserCreate', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-UserUpdate', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-UserDelete', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-UserGenerateNewRightOpers', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-UserGenerateAllRightOpers', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-UserManageAdminUser', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-UserManageUser', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-UserUpdateUser', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-UserUpdateAdminUser', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-UserAssign', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-UserManageAuthItem', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-UserGetAuthItem', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-UserDeleteAuthItem', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('superAdmin', '2', '超级管理员', '', '', 's:0:\"\";');
INSERT INTO mu_right_item VALUES ('userManage', '1', '会员管理', '', '', 's:0:\"\";');
INSERT INTO mu_right_item VALUES ('adminManage', '1', '管理员管理', '', '', 's:0:\"\";');
INSERT INTO mu_right_item VALUES ('rolesManage', '1', '角色任务管理', '', '', 's:0:\"\";');
INSERT INTO mu_right_item VALUES ('operatorsManage', '1', '功能管理', '', '', 's:0:\"\";');
INSERT INTO mu_right_item VALUES ('siteSetting', '1', '网站基本信息设置', '', '', 's:0:\"\";');
INSERT INTO mu_right_item VALUES ('cityManage', '1', '地区管理', '', '', 's:0:\"\";');
INSERT INTO mu_right_item VALUES ('basicTypeManage', '1', '网站基本类别管理', '', '', 's:0:\"\";');
INSERT INTO mu_right_item VALUES ('smtpSetting', '1', '邮件设置', '', '', 's:0:\"\";');
INSERT INTO mu_right_item VALUES ('specialManage', '1', '特价管理', '', '', 's:0:\"\";');
INSERT INTO mu_right_item VALUES ('productManage', '1', '现货管理', '', '', 's:0:\"\";');
INSERT INTO mu_right_item VALUES ('supplyManage', '1', '供应管理', '', '', 's:0:\"\";');
INSERT INTO mu_right_item VALUES ('buyManage', '1', '求购管理', '', '', 's:0:\"\";');
INSERT INTO mu_right_item VALUES ('enterpriseManage', '1', '企业库管理', '', '', 's:0:\"\";');
INSERT INTO mu_right_item VALUES ('newsManage', '1', '新闻管理', '', '', 's:0:\"\";');
INSERT INTO mu_right_item VALUES ('priceManage', '1', '行情管理', '', '', 's:0:\"\";');
INSERT INTO mu_right_item VALUES ('advertisementManage', '1', '广告管理', '', '', 's:0:\"\";');
INSERT INTO mu_right_item VALUES ('recommendManage', '1', '推荐管理', '', '', 's:0:\"\";');
INSERT INTO mu_right_item VALUES ('siteIndex', '1', '管理后台首页', '', '', 's:0:\"\";');
INSERT INTO mu_right_item VALUES ('productAdmin', '2', '信息管理员', '', '', 's:0:\"\";');
INSERT INTO mu_right_item VALUES ('admin-ProductChangeSupplyStatus', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-ProductChangeBuyStatus', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-SiteSendTestEmail', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-SiteSaveTermGroup', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-SiteManageTermGroup', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-SiteManageSMSSetting', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('smsSetting', '1', '短信设置', '', '', 's:0:\"\";');
INSERT INTO mu_right_item VALUES ('admin-ArticleManageImageLibary', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-ArticleUpdateImageLibary', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-ArticleBatchUpdateImageTitle', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-ArticleBatchUploadImage', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-ArticleManagePriceSummary', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-ArticleChangeImageLibaryStatus', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-ArticleUpdatePriceSummary', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-ArticleDeletePriceSummary', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-UserChangeUserTemplateStatus', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('manageUserTemplate', '1', '旺铺模板管理', '', '', 's:0:\"\";');
INSERT INTO mu_right_item VALUES ('admin-UserManageUserTemplate', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-UserDeleteUserTemplate', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-UserUpdateUserTemplate', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-SystemManageMessageTemplate', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-SystemSaveMessageTemplate', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('messageTemplateManage', '1', '邮件模板管理', '', '', 's:0:\"\";');
INSERT INTO mu_right_item VALUES ('admin-AdvertisementRecommendRecommendInfo', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-UserManageFLink', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('flinkMange', '1', '友情链接管理', '', '', 's:0:\"\";');
INSERT INTO mu_right_item VALUES ('admin-UserUpdateFLink', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-SiteManageFLink', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-SiteUpdateFLink', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-SiteChangeFLinkStatus', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-UserChangeFLinkStatus', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-AdvertisementRecommendChangeAdvertisementStatus', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-ArticleDeleteImageLibary', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-SiteFrontPage', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-UserChangeUserStatus', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-ProductGetChildrenTerm', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-UserGetCity', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-ProductGetCity', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-SystemManageRelativeRePrice', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-SystemUpdateRelativeRePrice', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-SiteManageSiteDescription', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-AdvertisementRecommendDeleteRecommend', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-UserManageImageLibary', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-UserUpdateUserGroup', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-UserChangeUserGroupStatus', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-UserManageUserGroup', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-ArticleDeleteArticle', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-ProductDeleteProduct', '0', null, null, null, 'N;');
INSERT INTO mu_right_item VALUES ('admin-ProductDeleteSupply', '0', null, null, null, 'N;');

-- ----------------------------
-- Table structure for `mu_right_itemchildren`
-- ----------------------------
DROP TABLE IF EXISTS `mu_right_itemchildren`;
CREATE TABLE `mu_right_itemchildren` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mu_right_itemchildren
-- ----------------------------
INSERT INTO mu_right_itemchildren VALUES ('adminManage', 'admin-UserAssign');
INSERT INTO mu_right_itemchildren VALUES ('adminManage', 'admin-UserManageAdminUser');
INSERT INTO mu_right_itemchildren VALUES ('adminManage', 'admin-UserUpdateAdminUser');
INSERT INTO mu_right_itemchildren VALUES ('advertisementManage', 'admin-AdvertisementRecommendChangeAdvertisementStatus');
INSERT INTO mu_right_itemchildren VALUES ('advertisementManage', 'admin-AdvertisementRecommendManageAdvertisement');
INSERT INTO mu_right_itemchildren VALUES ('advertisementManage', 'admin-AdvertisementRecommendUpdateAdvertisement');
INSERT INTO mu_right_itemchildren VALUES ('basicTypeManage', 'admin-SiteManageTerm');
INSERT INTO mu_right_itemchildren VALUES ('basicTypeManage', 'admin-SiteManageTermGroup');
INSERT INTO mu_right_itemchildren VALUES ('basicTypeManage', 'admin-SiteSaveTermGroup');
INSERT INTO mu_right_itemchildren VALUES ('basicTypeManage', 'admin-SiteUpdateTerm');
INSERT INTO mu_right_itemchildren VALUES ('buyManage', 'admin-ProductChangeBuyStatus');
INSERT INTO mu_right_itemchildren VALUES ('buyManage', 'admin-ProductManageBuy');
INSERT INTO mu_right_itemchildren VALUES ('buyManage', 'admin-ProductUpdateSupply');
INSERT INTO mu_right_itemchildren VALUES ('cityManage', 'admin-SiteManageCity');
INSERT INTO mu_right_itemchildren VALUES ('cityManage', 'admin-SiteUpdateCity');
INSERT INTO mu_right_itemchildren VALUES ('enterpriseManage', 'admin-ProductChangeEnterpriseStatus');
INSERT INTO mu_right_itemchildren VALUES ('enterpriseManage', 'admin-ProductManageEnterprise');
INSERT INTO mu_right_itemchildren VALUES ('enterpriseManage', 'admin-ProductUpdateEnterprise');
INSERT INTO mu_right_itemchildren VALUES ('flinkMange', 'admin-UserChangeFLinkStatus');
INSERT INTO mu_right_itemchildren VALUES ('flinkMange', 'admin-UserManageFLink');
INSERT INTO mu_right_itemchildren VALUES ('flinkMange', 'admin-UserUpdateFLink');
INSERT INTO mu_right_itemchildren VALUES ('manageUserTemplate', 'admin-UserChangeUserTemplateStatus');
INSERT INTO mu_right_itemchildren VALUES ('manageUserTemplate', 'admin-UserDeleteUserTemplate');
INSERT INTO mu_right_itemchildren VALUES ('manageUserTemplate', 'admin-UserManageUserTemplate');
INSERT INTO mu_right_itemchildren VALUES ('manageUserTemplate', 'admin-UserUpdateUserTemplate');
INSERT INTO mu_right_itemchildren VALUES ('messageTemplateManage', 'admin-SystemManageMessageTemplate');
INSERT INTO mu_right_itemchildren VALUES ('messageTemplateManage', 'admin-SystemSaveMessageTemplate');
INSERT INTO mu_right_itemchildren VALUES ('newsManage', 'admin-AdvertisementRecommendRecommendInfo');
INSERT INTO mu_right_itemchildren VALUES ('newsManage', 'admin-ArticleBatchUpdateImageTitle');
INSERT INTO mu_right_itemchildren VALUES ('newsManage', 'admin-ArticleBatchUploadImage');
INSERT INTO mu_right_itemchildren VALUES ('newsManage', 'admin-ArticleChangeImageLibaryStatus');
INSERT INTO mu_right_itemchildren VALUES ('newsManage', 'admin-ArticleChangeNewsStatus');
INSERT INTO mu_right_itemchildren VALUES ('newsManage', 'admin-ArticleDeleteArticle');
INSERT INTO mu_right_itemchildren VALUES ('newsManage', 'admin-ArticleDeleteImageLibary');
INSERT INTO mu_right_itemchildren VALUES ('newsManage', 'admin-ArticleManageImageLibary');
INSERT INTO mu_right_itemchildren VALUES ('newsManage', 'admin-ArticleManageNews');
INSERT INTO mu_right_itemchildren VALUES ('newsManage', 'admin-ArticleUpdateArticle');
INSERT INTO mu_right_itemchildren VALUES ('newsManage', 'admin-ArticleUpdateImageLibary');
INSERT INTO mu_right_itemchildren VALUES ('operatorsManage', 'admin-UserGenerateAllRightOpers');
INSERT INTO mu_right_itemchildren VALUES ('operatorsManage', 'admin-UserGenerateNewRightOpers');
INSERT INTO mu_right_itemchildren VALUES ('priceManage', 'admin-ArticleChangePriceStatus');
INSERT INTO mu_right_itemchildren VALUES ('priceManage', 'admin-ArticleDeletePriceSummary');
INSERT INTO mu_right_itemchildren VALUES ('priceManage', 'admin-ArticleManagePrice');
INSERT INTO mu_right_itemchildren VALUES ('priceManage', 'admin-ArticleManagePriceSummary');
INSERT INTO mu_right_itemchildren VALUES ('priceManage', 'admin-ArticleUpdateArticle');
INSERT INTO mu_right_itemchildren VALUES ('priceManage', 'admin-ArticleUpdatePriceSummary');
INSERT INTO mu_right_itemchildren VALUES ('productAdmin', 'buyManage');
INSERT INTO mu_right_itemchildren VALUES ('productAdmin', 'enterpriseManage');
INSERT INTO mu_right_itemchildren VALUES ('productAdmin', 'newsManage');
INSERT INTO mu_right_itemchildren VALUES ('productAdmin', 'priceManage');
INSERT INTO mu_right_itemchildren VALUES ('productAdmin', 'productManage');
INSERT INTO mu_right_itemchildren VALUES ('productAdmin', 'siteIndex');
INSERT INTO mu_right_itemchildren VALUES ('productAdmin', 'specialManage');
INSERT INTO mu_right_itemchildren VALUES ('productAdmin', 'supplyManage');
INSERT INTO mu_right_itemchildren VALUES ('productManage', 'admin-ProductChangeProductStatus');
INSERT INTO mu_right_itemchildren VALUES ('productManage', 'admin-ProductDeleteProduct');
INSERT INTO mu_right_itemchildren VALUES ('productManage', 'admin-ProductGetCity');
INSERT INTO mu_right_itemchildren VALUES ('productManage', 'admin-ProductManageProduct');
INSERT INTO mu_right_itemchildren VALUES ('productManage', 'admin-ProductUpdateProduct');
INSERT INTO mu_right_itemchildren VALUES ('recommendManage', 'admin-AdvertisementRecommendChangeInfoStatus');
INSERT INTO mu_right_itemchildren VALUES ('recommendManage', 'admin-AdvertisementRecommendChangeInfoType');
INSERT INTO mu_right_itemchildren VALUES ('recommendManage', 'admin-AdvertisementRecommendChangePosition');
INSERT INTO mu_right_itemchildren VALUES ('recommendManage', 'admin-AdvertisementRecommendDeleteRecommend');
INSERT INTO mu_right_itemchildren VALUES ('recommendManage', 'admin-AdvertisementRecommendManageRecommend');
INSERT INTO mu_right_itemchildren VALUES ('rolesManage', 'admin-UserCreate');
INSERT INTO mu_right_itemchildren VALUES ('rolesManage', 'admin-UserDelete');
INSERT INTO mu_right_itemchildren VALUES ('rolesManage', 'admin-UserDeleteAuthItem');
INSERT INTO mu_right_itemchildren VALUES ('rolesManage', 'admin-UserGetAuthItem');
INSERT INTO mu_right_itemchildren VALUES ('rolesManage', 'admin-UserManageAuthItem');
INSERT INTO mu_right_itemchildren VALUES ('rolesManage', 'admin-UserUpdate');
INSERT INTO mu_right_itemchildren VALUES ('siteIndex', 'admin-SiteError');
INSERT INTO mu_right_itemchildren VALUES ('siteIndex', 'admin-SiteIndex');
INSERT INTO mu_right_itemchildren VALUES ('siteIndex', 'admin-SiteLogin');
INSERT INTO mu_right_itemchildren VALUES ('siteIndex', 'admin-SiteLogout');
INSERT INTO mu_right_itemchildren VALUES ('siteIndex', 'admin-SitePage');
INSERT INTO mu_right_itemchildren VALUES ('siteIndex', 'admin-SystemManageRelativeRePrice');
INSERT INTO mu_right_itemchildren VALUES ('siteIndex', 'admin-SystemUpdateRelativeRePrice');
INSERT INTO mu_right_itemchildren VALUES ('siteSetting', 'admin-SiteChangeFLinkStatus');
INSERT INTO mu_right_itemchildren VALUES ('siteSetting', 'admin-SiteFrontPage');
INSERT INTO mu_right_itemchildren VALUES ('siteSetting', 'admin-SiteManageBasicSiteInfo');
INSERT INTO mu_right_itemchildren VALUES ('siteSetting', 'admin-SiteManageFLink');
INSERT INTO mu_right_itemchildren VALUES ('siteSetting', 'admin-SiteManageSiteDescription');
INSERT INTO mu_right_itemchildren VALUES ('siteSetting', 'admin-SiteUpdateFLink');
INSERT INTO mu_right_itemchildren VALUES ('smsSetting', 'admin-SiteManageSMSSetting');
INSERT INTO mu_right_itemchildren VALUES ('smtpSetting', 'admin-SiteManageSiteEmailSetting');
INSERT INTO mu_right_itemchildren VALUES ('smtpSetting', 'admin-SiteSendTestEmail');
INSERT INTO mu_right_itemchildren VALUES ('specialManage', 'admin-ProductChangeSpecialStatus');
INSERT INTO mu_right_itemchildren VALUES ('specialManage', 'admin-ProductManageSpecial');
INSERT INTO mu_right_itemchildren VALUES ('specialManage', 'admin-ProductUpdateProduct');
INSERT INTO mu_right_itemchildren VALUES ('superAdmin', 'adminManage');
INSERT INTO mu_right_itemchildren VALUES ('superAdmin', 'advertisementManage');
INSERT INTO mu_right_itemchildren VALUES ('superAdmin', 'basicTypeManage');
INSERT INTO mu_right_itemchildren VALUES ('superAdmin', 'buyManage');
INSERT INTO mu_right_itemchildren VALUES ('superAdmin', 'cityManage');
INSERT INTO mu_right_itemchildren VALUES ('superAdmin', 'enterpriseManage');
INSERT INTO mu_right_itemchildren VALUES ('superAdmin', 'flinkMange');
INSERT INTO mu_right_itemchildren VALUES ('superAdmin', 'manageUserTemplate');
INSERT INTO mu_right_itemchildren VALUES ('superAdmin', 'messageTemplateManage');
INSERT INTO mu_right_itemchildren VALUES ('superAdmin', 'newsManage');
INSERT INTO mu_right_itemchildren VALUES ('superAdmin', 'operatorsManage');
INSERT INTO mu_right_itemchildren VALUES ('superAdmin', 'priceManage');
INSERT INTO mu_right_itemchildren VALUES ('superAdmin', 'productManage');
INSERT INTO mu_right_itemchildren VALUES ('superAdmin', 'recommendManage');
INSERT INTO mu_right_itemchildren VALUES ('superAdmin', 'rolesManage');
INSERT INTO mu_right_itemchildren VALUES ('superAdmin', 'siteIndex');
INSERT INTO mu_right_itemchildren VALUES ('superAdmin', 'siteSetting');
INSERT INTO mu_right_itemchildren VALUES ('superAdmin', 'smsSetting');
INSERT INTO mu_right_itemchildren VALUES ('superAdmin', 'smtpSetting');
INSERT INTO mu_right_itemchildren VALUES ('superAdmin', 'specialManage');
INSERT INTO mu_right_itemchildren VALUES ('superAdmin', 'supplyManage');
INSERT INTO mu_right_itemchildren VALUES ('superAdmin', 'userManage');
INSERT INTO mu_right_itemchildren VALUES ('supplyManage', 'admin-ProductChangeSupplyStatus');
INSERT INTO mu_right_itemchildren VALUES ('supplyManage', 'admin-ProductDeleteSupply');
INSERT INTO mu_right_itemchildren VALUES ('supplyManage', 'admin-ProductManageSupply');
INSERT INTO mu_right_itemchildren VALUES ('supplyManage', 'admin-ProductUpdateSupply');
INSERT INTO mu_right_itemchildren VALUES ('userManage', 'admin-ProductGetChildrenTerm');
INSERT INTO mu_right_itemchildren VALUES ('userManage', 'admin-UserAssign');
INSERT INTO mu_right_itemchildren VALUES ('userManage', 'admin-UserChangeUserGroupStatus');
INSERT INTO mu_right_itemchildren VALUES ('userManage', 'admin-UserChangeUserStatus');
INSERT INTO mu_right_itemchildren VALUES ('userManage', 'admin-UserGetCity');
INSERT INTO mu_right_itemchildren VALUES ('userManage', 'admin-UserManageUser');
INSERT INTO mu_right_itemchildren VALUES ('userManage', 'admin-UserManageUserGroup');
INSERT INTO mu_right_itemchildren VALUES ('userManage', 'admin-UserUpdateUser');
INSERT INTO mu_right_itemchildren VALUES ('userManage', 'admin-UserUpdateUserGroup');

-- ----------------------------
-- Table structure for `mu_sms_code`
-- ----------------------------
DROP TABLE IF EXISTS `mu_sms_code`;
CREATE TABLE `mu_sms_code` (
  `sms_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `mobile_no` varchar(45) DEFAULT NULL,
  `sms_code` varchar(45) DEFAULT NULL,
  `sms_status` tinyint(4) DEFAULT NULL COMMENT '是否验证成功',
  `sms_send_date` datetime DEFAULT NULL,
  PRIMARY KEY (`sms_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COMMENT='手机验证码';

-- ----------------------------
-- Records of mu_sms_code
-- ----------------------------
INSERT INTO mu_sms_code VALUES ('1', '15015088124', '123456', '1', '2013-03-08 22:37:32');
INSERT INTO mu_sms_code VALUES ('2', '13640654432', '123456', '1', '2013-03-08 23:04:25');
INSERT INTO mu_sms_code VALUES ('3', '15015088124', '123456', '1', '2013-03-17 21:09:36');
INSERT INTO mu_sms_code VALUES ('4', '15015088124', '123456', '1', '2013-03-17 21:16:18');
INSERT INTO mu_sms_code VALUES ('5', '15015088124', '123456', '1', '2013-03-17 21:50:06');
INSERT INTO mu_sms_code VALUES ('6', '13803799005', '123456', '1', '2013-03-17 21:58:18');
INSERT INTO mu_sms_code VALUES ('7', '13700792898', '123456', '1', '2013-03-17 22:05:12');
INSERT INTO mu_sms_code VALUES ('8', '13838832500', '123456', '1', '2013-03-17 22:10:21');
INSERT INTO mu_sms_code VALUES ('9', '13837967256', '123456', '1', '2013-03-17 22:16:08');
INSERT INTO mu_sms_code VALUES ('10', '13604299999', '123456', '1', '2013-03-17 22:23:10');
INSERT INTO mu_sms_code VALUES ('11', '13332188282', '123456', '1', '2013-03-17 22:32:19');
INSERT INTO mu_sms_code VALUES ('12', '13803888338', '123456', '1', '2013-03-17 22:38:40');
INSERT INTO mu_sms_code VALUES ('13', '13592090678', '123456', '1', '2013-03-17 22:46:46');
INSERT INTO mu_sms_code VALUES ('14', '13305110692', '123456', '1', '2013-03-19 23:16:06');
INSERT INTO mu_sms_code VALUES ('15', '13910599929', '123456', '1', '2013-03-19 23:32:59');

-- ----------------------------
-- Table structure for `mu_store_front_setting`
-- ----------------------------
DROP TABLE IF EXISTS `mu_store_front_setting`;
CREATE TABLE `mu_store_front_setting` (
  `setting_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL DEFAULT '0',
  `setting_config_data` text,
  PRIMARY KEY (`setting_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户旺铺配置';

-- ----------------------------
-- Records of mu_store_front_setting
-- ----------------------------

-- ----------------------------
-- Table structure for `mu_success_case`
-- ----------------------------
DROP TABLE IF EXISTS `mu_success_case`;
CREATE TABLE `mu_success_case` (
  `case_id` int(11) NOT NULL AUTO_INCREMENT,
  `supply_id` int(11) NOT NULL,
  `purchase_user_id` int(11) NOT NULL,
  `purchase_amount` varchar(32) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `case_status` int(11) DEFAULT NULL,
  `case_recommend` tinyint(4) NOT NULL,
  PRIMARY KEY (`case_id`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mu_success_case
-- ----------------------------
INSERT INTO mu_success_case VALUES ('1', '35', '48', '89', '2013-01-31 00:00:00', '20', '0');
INSERT INTO mu_success_case VALUES ('2', '89', '46', '73', '2013-01-31 00:00:00', '2', '0');
INSERT INTO mu_success_case VALUES ('3', '80', '29', '106', '2013-01-31 00:00:00', '1', '0');
INSERT INTO mu_success_case VALUES ('4', '40', '93', '148', '2013-01-31 00:00:00', '20', '1');
INSERT INTO mu_success_case VALUES ('5', '85', '74', '215', '2013-01-31 00:00:00', '2', '0');
INSERT INTO mu_success_case VALUES ('6', '48', '88', '516', '2013-01-31 00:00:00', '20', '0');
INSERT INTO mu_success_case VALUES ('7', '86', '16', '434', '2013-01-31 00:00:00', '1', '1');
INSERT INTO mu_success_case VALUES ('8', '43', '33', '343', '2013-01-31 00:00:00', '1', '0');
INSERT INTO mu_success_case VALUES ('9', '69', '50', '409', '2013-01-31 00:00:00', '2', '0');
INSERT INTO mu_success_case VALUES ('10', '36', '65', '465', '2013-01-31 00:00:00', '2', '1');
INSERT INTO mu_success_case VALUES ('11', '53', '97', '287', '2013-01-31 00:00:00', '2', '0');
INSERT INTO mu_success_case VALUES ('12', '65', '6', '688', '2013-01-31 00:00:00', '2', '0');
INSERT INTO mu_success_case VALUES ('13', '41', '90', '316', '2013-01-31 00:00:00', '20', '0');
INSERT INTO mu_success_case VALUES ('14', '51', '44', '977', '2013-01-31 00:00:00', '1', '1');
INSERT INTO mu_success_case VALUES ('15', '54', '94', '1396', '2013-01-31 00:00:00', '1', '1');
INSERT INTO mu_success_case VALUES ('16', '46', '92', '1269', '2013-01-31 00:00:00', '20', '0');
INSERT INTO mu_success_case VALUES ('17', '75', '25', '623', '2013-01-31 00:00:00', '2', '0');
INSERT INTO mu_success_case VALUES ('18', '65', '44', '113', '2013-01-31 00:00:00', '2', '0');
INSERT INTO mu_success_case VALUES ('19', '56', '47', '136', '2013-01-31 00:00:00', '1', '1');
INSERT INTO mu_success_case VALUES ('20', '84', '19', '1296', '2013-01-31 00:00:00', '2', '0');
INSERT INTO mu_success_case VALUES ('21', '87', '28', '1605', '2013-01-31 00:00:00', '1', '1');
INSERT INTO mu_success_case VALUES ('22', '82', '90', '1161', '2013-01-31 00:00:00', '1', '1');
INSERT INTO mu_success_case VALUES ('23', '48', '61', '1417', '2013-01-31 00:00:00', '20', '0');
INSERT INTO mu_success_case VALUES ('24', '54', '98', '1301', '2013-01-31 00:00:00', '2', '1');
INSERT INTO mu_success_case VALUES ('25', '36', '76', '796', '2013-01-31 00:00:00', '20', '1');
INSERT INTO mu_success_case VALUES ('26', '78', '76', '514', '2013-01-31 00:00:00', '1', '0');
INSERT INTO mu_success_case VALUES ('27', '73', '66', '1353', '2013-01-31 00:00:00', '1', '1');
INSERT INTO mu_success_case VALUES ('28', '61', '89', '385', '2013-01-31 00:00:00', '1', '1');
INSERT INTO mu_success_case VALUES ('29', '50', '4', '2053', '2013-01-31 00:00:00', '1', '0');
INSERT INTO mu_success_case VALUES ('30', '54', '26', '546', '2013-01-31 00:00:00', '2', '0');
INSERT INTO mu_success_case VALUES ('31', '52', '32', '1644', '2013-01-31 00:00:00', '20', '1');
INSERT INTO mu_success_case VALUES ('32', '83', '46', '1913', '2013-01-31 00:00:00', '20', '1');
INSERT INTO mu_success_case VALUES ('33', '53', '30', '1366', '2013-01-31 00:00:00', '20', '1');
INSERT INTO mu_success_case VALUES ('34', '49', '15', '2973', '2013-01-31 00:00:00', '2', '1');
INSERT INTO mu_success_case VALUES ('35', '55', '37', '2559', '2013-01-31 00:00:00', '1', '0');
INSERT INTO mu_success_case VALUES ('36', '82', '69', '810', '2013-01-31 00:00:00', '2', '1');
INSERT INTO mu_success_case VALUES ('37', '94', '10', '2221', '2013-01-31 00:00:00', '1', '1');
INSERT INTO mu_success_case VALUES ('38', '85', '4', '621', '2013-01-31 00:00:00', '2', '0');
INSERT INTO mu_success_case VALUES ('39', '76', '52', '2318', '2013-01-31 00:00:00', '20', '0');
INSERT INTO mu_success_case VALUES ('40', '65', '45', '2651', '2013-01-31 00:00:00', '2', '1');
INSERT INTO mu_success_case VALUES ('41', '34', '36', '124', '2013-01-31 00:00:00', '20', '1');
INSERT INTO mu_success_case VALUES ('42', '88', '84', '3478', '2013-01-31 00:00:00', '2', '1');
INSERT INTO mu_success_case VALUES ('43', '61', '54', '245', '2013-01-31 00:00:00', '1', '1');
INSERT INTO mu_success_case VALUES ('44', '31', '10', '142', '2013-01-31 00:00:00', '2', '0');
INSERT INTO mu_success_case VALUES ('45', '31', '33', '4272', '2013-01-31 00:00:00', '1', '1');
INSERT INTO mu_success_case VALUES ('46', '76', '37', '2385', '2013-01-31 00:00:00', '20', '1');
INSERT INTO mu_success_case VALUES ('47', '47', '11', '3164', '2013-01-31 00:00:00', '1', '1');
INSERT INTO mu_success_case VALUES ('48', '96', '50', '4257', '2013-01-31 00:00:00', '2', '1');
INSERT INTO mu_success_case VALUES ('49', '53', '2', '1314', '2013-01-31 00:00:00', '20', '0');
INSERT INTO mu_success_case VALUES ('50', '88', '48', '3742', '2013-01-31 00:00:00', '2', '0');
INSERT INTO mu_success_case VALUES ('51', '65', '86', '904', '2013-01-31 00:00:00', '20', '0');
INSERT INTO mu_success_case VALUES ('52', '36', '56', '2134', '2013-01-31 00:00:00', '2', '0');
INSERT INTO mu_success_case VALUES ('53', '59', '27', '3889', '2013-01-31 00:00:00', '20', '1');
INSERT INTO mu_success_case VALUES ('54', '77', '34', '527', '2013-01-31 00:00:00', '1', '1');
INSERT INTO mu_success_case VALUES ('55', '97', '30', '5324', '2013-01-31 00:00:00', '2', '0');
INSERT INTO mu_success_case VALUES ('56', '95', '22', '2517', '2013-01-31 00:00:00', '20', '0');
INSERT INTO mu_success_case VALUES ('57', '42', '95', '4280', '2013-01-31 00:00:00', '1', '1');
INSERT INTO mu_success_case VALUES ('58', '46', '87', '1550', '2013-01-31 00:00:00', '20', '1');
INSERT INTO mu_success_case VALUES ('59', '50', '98', '1080', '2013-01-31 00:00:00', '2', '1');
INSERT INTO mu_success_case VALUES ('60', '87', '82', '3836', '2013-01-31 00:00:00', '20', '1');
INSERT INTO mu_success_case VALUES ('61', '89', '81', '2522', '2013-01-31 00:00:00', '20', '1');
INSERT INTO mu_success_case VALUES ('62', '98', '21', '5084', '2013-01-31 00:00:00', '1', '0');
INSERT INTO mu_success_case VALUES ('63', '85', '31', '3127', '2013-01-31 00:00:00', '20', '1');
INSERT INTO mu_success_case VALUES ('64', '50', '38', '3711', '2013-01-31 00:00:00', '20', '1');
INSERT INTO mu_success_case VALUES ('65', '35', '85', '447', '2013-01-31 00:00:00', '1', '1');
INSERT INTO mu_success_case VALUES ('66', '66', '12', '1919', '2013-01-31 00:00:00', '20', '1');
INSERT INTO mu_success_case VALUES ('67', '77', '63', '5623', '2013-01-31 00:00:00', '20', '1');
INSERT INTO mu_success_case VALUES ('68', '73', '10', '5524', '2013-01-31 00:00:00', '20', '0');
INSERT INTO mu_success_case VALUES ('69', '41', '85', '5590', '2013-01-31 00:00:00', '20', '1');
INSERT INTO mu_success_case VALUES ('70', '97', '68', '3244', '2013-01-31 00:00:00', '2', '1');
INSERT INTO mu_success_case VALUES ('71', '75', '47', '1227', '2013-01-31 00:00:00', '1', '0');
INSERT INTO mu_success_case VALUES ('72', '34', '18', '6064', '2013-01-31 00:00:00', '2', '1');
INSERT INTO mu_success_case VALUES ('73', '31', '78', '589', '2013-01-31 00:00:00', '1', '1');
INSERT INTO mu_success_case VALUES ('74', '49', '22', '6703', '2013-01-31 00:00:00', '1', '1');
INSERT INTO mu_success_case VALUES ('75', '57', '78', '4572', '2013-01-31 00:00:00', '20', '1');
INSERT INTO mu_success_case VALUES ('76', '71', '71', '291', '2013-01-31 00:00:00', '20', '0');
INSERT INTO mu_success_case VALUES ('77', '92', '28', '6241', '2013-01-31 00:00:00', '2', '0');
INSERT INTO mu_success_case VALUES ('78', '71', '97', '5278', '2013-01-31 00:00:00', '2', '0');
INSERT INTO mu_success_case VALUES ('79', '72', '43', '3869', '2013-01-31 00:00:00', '20', '0');
INSERT INTO mu_success_case VALUES ('80', '75', '67', '633', '2013-01-31 00:00:00', '1', '1');
INSERT INTO mu_success_case VALUES ('81', '33', '57', '2048', '2013-01-31 00:00:00', '2', '1');
INSERT INTO mu_success_case VALUES ('82', '32', '42', '703', '2013-01-31 00:00:00', '1', '1');
INSERT INTO mu_success_case VALUES ('83', '93', '97', '7033', '2013-01-31 00:00:00', '1', '0');
INSERT INTO mu_success_case VALUES ('84', '81', '77', '1382', '2013-01-31 00:00:00', '1', '1');
INSERT INTO mu_success_case VALUES ('85', '63', '14', '253', '2013-01-31 00:00:00', '20', '0');
INSERT INTO mu_success_case VALUES ('86', '39', '58', '6877', '2013-01-31 00:00:00', '20', '0');
INSERT INTO mu_success_case VALUES ('87', '35', '1', '8197', '2013-01-31 00:00:00', '2', '1');
INSERT INTO mu_success_case VALUES ('88', '35', '46', '591', '2013-01-31 00:00:00', '1', '0');
INSERT INTO mu_success_case VALUES ('89', '35', '42', '1351', '2013-01-31 00:00:00', '2', '0');
INSERT INTO mu_success_case VALUES ('90', '42', '38', '1509', '2013-01-31 00:00:00', '20', '0');
INSERT INTO mu_success_case VALUES ('91', '99', '93', '8798', '2013-01-31 00:00:00', '2', '1');
INSERT INTO mu_success_case VALUES ('92', '43', '46', '3626', '2013-01-31 00:00:00', '1', '1');
INSERT INTO mu_success_case VALUES ('93', '35', '17', '5787', '2013-01-31 00:00:00', '2', '0');
INSERT INTO mu_success_case VALUES ('94', '73', '61', '3486', '2013-01-31 00:00:00', '20', '1');
INSERT INTO mu_success_case VALUES ('95', '92', '1', '1633', '2013-01-31 00:00:00', '20', '0');
INSERT INTO mu_success_case VALUES ('96', '60', '46', '1167', '2013-01-31 00:00:00', '1', '0');
INSERT INTO mu_success_case VALUES ('97', '68', '37', '7702', '2013-01-31 00:00:00', '1', '1');
INSERT INTO mu_success_case VALUES ('98', '79', '52', '6467', '2013-01-31 00:00:00', '20', '1');
INSERT INTO mu_success_case VALUES ('99', '33', '48', '7973', '2013-01-31 00:00:00', '1', '0');

-- ----------------------------
-- Table structure for `mu_supply`
-- ----------------------------
DROP TABLE IF EXISTS `mu_supply`;
CREATE TABLE `mu_supply` (
  `supply_id` int(11) NOT NULL AUTO_INCREMENT,
  `supply_name` varchar(218) NOT NULL,
  `supply_user_id` int(11) NOT NULL,
  `supply_type` int(11) NOT NULL COMMENT '供求类型',
  `supply_keyword` varchar(128) DEFAULT NULL COMMENT '供求类型',
  `supply_category_id` int(4) DEFAULT NULL COMMENT '供应产品的品类',
  `supply_mu_content` varchar(50) DEFAULT NULL COMMENT '钼的品质，钼的百分比含量',
  `supply_water_content` varchar(50) DEFAULT NULL COMMENT '水分的百分比含量',
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
  `supply_view_count` int(11) DEFAULT '0' COMMENT '浏览量',
  `supply_join_date` datetime DEFAULT NULL COMMENT '''发表日期''',
  PRIMARY KEY (`supply_id`),
  KEY `supply_user_id` (`supply_user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=210 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mu_supply
-- ----------------------------

-- ----------------------------
-- Table structure for `mu_term`
-- ----------------------------
DROP TABLE IF EXISTS `mu_term`;
CREATE TABLE `mu_term` (
  `term_id` int(11) NOT NULL AUTO_INCREMENT,
  `term_parent_id` int(4) DEFAULT '0',
  `term_name` varchar(128) NOT NULL,
  `term_slug` varchar(200) DEFAULT NULL COMMENT '''描述''',
  `term_group_id` int(4) NOT NULL COMMENT '比如产品分类 职位 ',
  `term_order` int(4) DEFAULT '0',
  `term_create_time` datetime DEFAULT NULL,
  PRIMARY KEY (`term_id`)
) ENGINE=MyISAM AUTO_INCREMENT=152 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mu_term
-- ----------------------------
INSERT INTO mu_term VALUES ('1', '0', '有效', null, '1', '0', '2013-01-20 10:27:00');
INSERT INTO mu_term VALUES ('2', '0', '无效', null, '1', '0', '2013-01-20 17:56:41');
INSERT INTO mu_term VALUES ('3', '0', '吨', null, '2', '0', '2013-01-22 22:31:17');
INSERT INTO mu_term VALUES ('4', '0', '国有企业', null, '4', '0', '2013-01-23 20:59:01');
INSERT INTO mu_term VALUES ('5', '0', '中外合资', null, '4', '0', '2013-01-23 20:59:00');
INSERT INTO mu_term VALUES ('6', '0', '采矿型', null, '5', '0', '2013-01-23 20:58:59');
INSERT INTO mu_term VALUES ('7', '0', '贸易型', null, '5', '0', '2013-01-23 20:58:57');
INSERT INTO mu_term VALUES ('8', '0', '董事长', null, '3', '0', '2013-01-23 21:02:36');
INSERT INTO mu_term VALUES ('9', '0', '图片', null, '6', '0', '2013-01-24 22:29:45');
INSERT INTO mu_term VALUES ('10', '0', 'flash', null, '6', '0', '2013-01-24 22:30:00');
INSERT INTO mu_term VALUES ('11', '0', '首页底部广告1', null, '7', '0', '2013-01-24 22:30:22');
INSERT INTO mu_term VALUES ('12', '0', '首页幻灯片下方', null, '7', '0', '2013-01-26 23:42:01');
INSERT INTO mu_term VALUES ('13', '0', '供应信息', null, '8', '0', '2013-01-24 22:46:11');
INSERT INTO mu_term VALUES ('14', '0', '采购信息', null, '8', '0', '2013-01-24 22:46:22');
INSERT INTO mu_term VALUES ('15', '0', '首页特价信息', null, '9', '0', '2013-01-26 23:42:04');
INSERT INTO mu_term VALUES ('16', '0', '行情', null, '10', '0', '2013-01-26 23:41:46');
INSERT INTO mu_term VALUES ('17', '0', '新闻', null, '10', '0', '2013-01-26 23:41:59');
INSERT INTO mu_term VALUES ('18', '0', '供应', null, '11', '0', '2013-01-27 14:37:56');
INSERT INTO mu_term VALUES ('19', '0', '求购', null, '11', '0', '2013-01-27 14:37:54');
INSERT INTO mu_term VALUES ('20', '0', '钼百科', '', '10', '0', '2013-01-28 00:49:38');
INSERT INTO mu_term VALUES ('21', '0', '供求信息', null, '12', '0', null);
INSERT INTO mu_term VALUES ('22', '0', '现货特价信息', null, '12', '0', null);
INSERT INTO mu_term VALUES ('23', '0', '文章信息', null, '12', '0', null);
INSERT INTO mu_term VALUES ('24', '0', '企业信息', null, '12', '0', null);
INSERT INTO mu_term VALUES ('25', '0', '首页flash左1', null, '13', '0', '2013-01-31 23:55:27');
INSERT INTO mu_term VALUES ('26', '0', '首页flash下1', null, '13', '0', '2013-01-31 23:56:02');
INSERT INTO mu_term VALUES ('27', '0', '首页中2', null, '13', '0', '2013-02-01 00:00:27');
INSERT INTO mu_term VALUES ('28', '0', '钼初级', '', '14', '0', null);
INSERT INTO mu_term VALUES ('29', '0', '钼化工', '', '14', '0', null);
INSERT INTO mu_term VALUES ('30', '0', '钼制品', '', '14', '0', null);
INSERT INTO mu_term VALUES ('31', '28', '钼精矿', '', '14', '0', null);
INSERT INTO mu_term VALUES ('32', '29', '钼酸钡', '', '14', '0', null);
INSERT INTO mu_term VALUES ('33', '0', '待审', null, '1', '0', '2013-02-21 10:37:05');
INSERT INTO mu_term VALUES ('34', '17', '国际新闻', '', '10', '0', null);
INSERT INTO mu_term VALUES ('35', '17', '国内新闻', '', '10', '0', null);
INSERT INTO mu_term VALUES ('36', '16', '国内行情', '', '10', '0', null);
INSERT INTO mu_term VALUES ('37', '16', '国际行情', '', '10', '0', null);
INSERT INTO mu_term VALUES ('38', '0', '短信息模板', '', '15', '0', null);
INSERT INTO mu_term VALUES ('39', '0', '邮件模板', '', '15', '0', null);
INSERT INTO mu_term VALUES ('40', '17', '本网视点', null, '10', '0', null);
INSERT INTO mu_term VALUES ('41', '17', '热点新闻', null, '10', '0', null);
INSERT INTO mu_term VALUES ('42', '17', '行业动态', null, '10', '0', null);
INSERT INTO mu_term VALUES ('43', '17', '财经', null, '10', '0', null);
INSERT INTO mu_term VALUES ('44', '17', '股票', null, '10', '0', null);
INSERT INTO mu_term VALUES ('45', '0', '新闻首页-幻灯片', '', '13', '0', null);
INSERT INTO mu_term VALUES ('46', '0', '新闻首页--头条', '', '13', '0', null);
INSERT INTO mu_term VALUES ('47', '17', '区域新闻', '', '10', '0', null);
INSERT INTO mu_term VALUES ('48', '17', '分析评论', '', '10', '0', null);
INSERT INTO mu_term VALUES ('49', '0', '钼含量0.02', '', '16', '0', null);
INSERT INTO mu_term VALUES ('50', '0', '钼含量50', '', '16', '0', null);
INSERT INTO mu_term VALUES ('51', '0', '含水量30%', '', '17', '0', null);
INSERT INTO mu_term VALUES ('52', '0', '含水量80', '', '17', '0', null);
INSERT INTO mu_term VALUES ('53', '0', '现货首页--左侧栏', '', '13', '0', null);
INSERT INTO mu_term VALUES ('54', '0', '首页中部--现货推荐', '', '13', '0', null);
INSERT INTO mu_term VALUES ('55', '0', '供求首页--左下推荐供应商', '', '13', '0', null);
INSERT INTO mu_term VALUES ('56', '0', '钼终极', '', '14', '0', null);
INSERT INTO mu_term VALUES ('57', '56', '钼铁', '', '14', '0', null);
INSERT INTO mu_term VALUES ('58', '16', '当日报价', '', '10', '0', null);
INSERT INTO mu_term VALUES ('59', '16', '价格汇总', '', '10', '0', null);
INSERT INTO mu_term VALUES ('60', '16', '市场评论', '', '10', '0', null);
INSERT INTO mu_term VALUES ('61', '16', '预测分析', '', '10', '0', null);
INSERT INTO mu_term VALUES ('62', '16', '钼走势', '', '10', '0', null);
INSERT INTO mu_term VALUES ('63', '20', '国际标准', '', '10', '0', null);
INSERT INTO mu_term VALUES ('64', '20', '国内标准', '', '10', '0', null);
INSERT INTO mu_term VALUES ('65', '20', '生产工艺', '', '10', '0', null);
INSERT INTO mu_term VALUES ('66', '20', '钼用途', '', '10', '0', null);
INSERT INTO mu_term VALUES ('67', '20', '钼产品', '', '10', '0', null);
INSERT INTO mu_term VALUES ('68', '20', '钼化工', '', '10', '0', null);
INSERT INTO mu_term VALUES ('69', '0', '企业资质', '', '18', '0', null);
INSERT INTO mu_term VALUES ('70', '0', '营业执照', '', '18', '0', null);
INSERT INTO mu_term VALUES ('71', '0', '钼中级', '', '14', '0', null);
INSERT INTO mu_term VALUES ('72', '71', '氧化钼', '', '14', '0', null);
INSERT INTO mu_term VALUES ('73', '71', '钼酸', '', '14', '0', null);
INSERT INTO mu_term VALUES ('74', '29', '四钼酸铵', '', '14', '0', null);
INSERT INTO mu_term VALUES ('75', '29', '二钼酸铵', '', '14', '0', null);
INSERT INTO mu_term VALUES ('76', '29', '七钼酸铵', '', '14', '0', null);
INSERT INTO mu_term VALUES ('77', '29', '八钼酸铵', '', '14', '0', null);
INSERT INTO mu_term VALUES ('78', '29', '钼酸钠', '', '14', '0', null);
INSERT INTO mu_term VALUES ('79', '29', '高纯三氧化钼', '', '14', '0', null);
INSERT INTO mu_term VALUES ('80', '30', '四钼酸铵', '', '14', '0', null);
INSERT INTO mu_term VALUES ('81', '30', '高纯三氧化钼', '', '14', '0', null);
INSERT INTO mu_term VALUES ('82', '30', '钼粉', '', '14', '0', null);
INSERT INTO mu_term VALUES ('83', '30', '钼板坯', '', '14', '0', null);
INSERT INTO mu_term VALUES ('84', '30', '钼条', '', '14', '0', null);
INSERT INTO mu_term VALUES ('85', '30', '杆    料', '', '14', '0', null);
INSERT INTO mu_term VALUES ('86', '30', '钼　丝', '', '14', '0', null);
INSERT INTO mu_term VALUES ('87', '30', '废　钼', '', '14', '0', null);
INSERT INTO mu_term VALUES ('88', '30', '钼异型', '', '14', '0', null);
INSERT INTO mu_term VALUES ('89', '29', '钼酸', '', '14', '0', null);
INSERT INTO mu_term VALUES ('90', '0', '总经理', '', '3', '0', null);
INSERT INTO mu_term VALUES ('91', '0', '副总经理', '', '3', '0', null);
INSERT INTO mu_term VALUES ('92', '0', '业务经理', '', '3', '0', null);
INSERT INTO mu_term VALUES ('93', '0', '销售总监', '', '3', '0', null);
INSERT INTO mu_term VALUES ('94', '0', '涨', '', '19', '0', null);
INSERT INTO mu_term VALUES ('95', '0', '跌', '', '19', '0', null);
INSERT INTO mu_term VALUES ('96', '0', '平', '', '19', '0', null);
INSERT INTO mu_term VALUES ('98', '0', '展会', '', '10', '0', null);
INSERT INTO mu_term VALUES ('99', '98', '国际展会', '', '10', '0', null);
INSERT INTO mu_term VALUES ('100', '98', '国内展会', '', '10', '0', null);
INSERT INTO mu_term VALUES ('101', '16', '原料行情', '', '10', '0', null);
INSERT INTO mu_term VALUES ('102', '0', '展会列表页面', '', '13', '0', null);
INSERT INTO mu_term VALUES ('103', '0', '服务', '', '10', '0', null);
INSERT INTO mu_term VALUES ('104', '103', '仓储金融', '', '10', '0', null);
INSERT INTO mu_term VALUES ('105', '103', '仓单质押（现货通）', '', '10', '0', null);
INSERT INTO mu_term VALUES ('106', '103', '动产质押逐笔控制', '', '10', '0', null);
INSERT INTO mu_term VALUES ('107', '103', '动产质押总量控制', '', '10', '0', null);
INSERT INTO mu_term VALUES ('108', '103', '配送', '', '10', '0', null);
INSERT INTO mu_term VALUES ('109', '103', '前置现货通', '', '10', '0', null);
INSERT INTO mu_term VALUES ('110', '103', '质检', '', '10', '0', null);
INSERT INTO mu_term VALUES ('111', '0', '首页--底部--市场动态', '', '13', '0', null);
INSERT INTO mu_term VALUES ('112', '0', '首页--底部--钼工艺', '', '13', '0', null);
INSERT INTO mu_term VALUES ('113', '0', '首页--底部--钼新闻', '', '13', '0', null);
INSERT INTO mu_term VALUES ('114', '0', '首页--底部--钼百科', '', '13', '0', null);
INSERT INTO mu_term VALUES ('115', '0', '首页--底部--钼标准', '', '13', '0', null);
INSERT INTO mu_term VALUES ('116', '0', '首页--底部--钼市展会', '', '13', '0', null);
INSERT INTO mu_term VALUES ('117', '0', '首页--中部--滚动产品', '', '13', '0', null);
INSERT INTO mu_term VALUES ('118', '0', '民营企业', '', '4', '0', null);
INSERT INTO mu_term VALUES ('119', '0', '首页--中右--推荐企业', '', '13', '0', null);
INSERT INTO mu_term VALUES ('120', '0', '加工型', '', '5', '0', null);
INSERT INTO mu_term VALUES ('121', '0', '首页幻灯片广告', '', '7', '0', null);
INSERT INTO mu_term VALUES ('122', '0', '首页底部广告2', null, '7', '0', '2013-01-24 22:30:22');
INSERT INTO mu_term VALUES ('123', '0', '新闻详情--底部--广告', '', '7', '0', null);
INSERT INTO mu_term VALUES ('124', '0', '业务', '', '3', '0', null);
INSERT INTO mu_term VALUES ('125', '0', '销售', '', '3', '0', null);
INSERT INTO mu_term VALUES ('126', '0', '供销经', '', '3', '0', null);
INSERT INTO mu_term VALUES ('127', '0', '会员登录页--主体广告', '', '7', '0', null);
INSERT INTO mu_term VALUES ('128', '0', '新闻中心--中部--广告', '', '7', '0', null);
INSERT INTO mu_term VALUES ('129', '0', '新闻中心--幻灯片上', '', '7', '0', null);
INSERT INTO mu_term VALUES ('130', '0', '行情中心--头部--横幅', '', '7', '0', null);
INSERT INTO mu_term VALUES ('131', '0', '行情中心--中部--横幅', '', '7', '0', null);
INSERT INTO mu_term VALUES ('132', '0', '行情中心--左侧底', '', '7', '0', null);
INSERT INTO mu_term VALUES ('133', '0', '钼服务--头部--主体广告', '', '7', '0', null);
INSERT INTO mu_term VALUES ('134', '0', '稀土', '', '20', '0', null);
INSERT INTO mu_term VALUES ('135', '0', '黄金', '', '20', '0', null);
INSERT INTO mu_term VALUES ('136', '0', '钼百科--顶部--横幅', '', '7', '0', null);
INSERT INTO mu_term VALUES ('137', '0', '钼百科--顶部--幻灯片', '', '7', '0', null);
INSERT INTO mu_term VALUES ('138', '0', '钼百科--中部--横幅', '', '7', '0', null);
INSERT INTO mu_term VALUES ('139', '0', '服务详情页--头部--横幅', '', '7', '0', null);
INSERT INTO mu_term VALUES ('140', '0', '钼百科--头部--左侧', '', '7', '0', null);
INSERT INTO mu_term VALUES ('141', '0', '钼百科--中部--左侧小图', '', '7', '0', null);
INSERT INTO mu_term VALUES ('142', '0', '钼百科头部--中间--小横幅', '', '7', '0', null);
INSERT INTO mu_term VALUES ('143', '0', '生产型', '', '5', '0', null);
INSERT INTO mu_term VALUES ('144', '0', '首页--分类--下方', '', '7', '0', null);
INSERT INTO mu_term VALUES ('145', '0', '供求首页--左侧--中部', '', '7', '0', null);
INSERT INTO mu_term VALUES ('146', '0', '供求列表--右侧--中部', '', '7', '0', null);
INSERT INTO mu_term VALUES ('147', '0', '删除', '', '1', '0', null);
INSERT INTO mu_term VALUES ('148', '0', '现货', '', '20', '0', null);
INSERT INTO mu_term VALUES ('149', '0', '市场', '', '20', '0', null);

-- ----------------------------
-- Table structure for `mu_term_group`
-- ----------------------------
DROP TABLE IF EXISTS `mu_term_group`;
CREATE TABLE `mu_term_group` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(100) DEFAULT NULL,
  `group_desc` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mu_term_group
-- ----------------------------
INSERT INTO mu_term_group VALUES ('1', '状态', null);
INSERT INTO mu_term_group VALUES ('2', '重量单位', null);
INSERT INTO mu_term_group VALUES ('3', '职位', null);
INSERT INTO mu_term_group VALUES ('4', '企业类型', null);
INSERT INTO mu_term_group VALUES ('5', '经营模式', null);
INSERT INTO mu_term_group VALUES ('6', '广告媒体类型', null);
INSERT INTO mu_term_group VALUES ('7', '广告位置', null);
INSERT INTO mu_term_group VALUES ('8', '推荐信息类型', null);
INSERT INTO mu_term_group VALUES ('9', '推荐位置', null);
INSERT INTO mu_term_group VALUES ('10', '文章类型', null);
INSERT INTO mu_term_group VALUES ('11', '供求类型', null);
INSERT INTO mu_term_group VALUES ('12', '推荐信息类型', null);
INSERT INTO mu_term_group VALUES ('13', '推荐模块', null);
INSERT INTO mu_term_group VALUES ('14', '钼分类', '');
INSERT INTO mu_term_group VALUES ('15', '邮件模板类型', '');
INSERT INTO mu_term_group VALUES ('16', '钼品质', '');
INSERT INTO mu_term_group VALUES ('17', '含水量', '');
INSERT INTO mu_term_group VALUES ('18', '企业资质图片类型', '');
INSERT INTO mu_term_group VALUES ('19', '稀土涨跌标识', '');
INSERT INTO mu_term_group VALUES ('20', '稀土价格类型', '稀土价格表中数据类型');

-- ----------------------------
-- Table structure for `mu_user`
-- ----------------------------
DROP TABLE IF EXISTS `mu_user`;
CREATE TABLE `mu_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `user_sex` int(11) NOT NULL DEFAULT '1' COMMENT '性别',
  `user_pwd` varchar(40) NOT NULL,
  `user_email` char(100) DEFAULT NULL,
  `user_nickname` varchar(20) DEFAULT NULL,
  `user_type` int(4) NOT NULL DEFAULT '2' COMMENT '用户类型',
  `user_mobile_no` varchar(30) DEFAULT NULL,
  `user_telephone` varchar(30) DEFAULT NULL COMMENT '联系电话',
  `user_first_name` varchar(50) DEFAULT NULL,
  `user_last_name` varchar(50) DEFAULT NULL,
  `user_status` int(4) DEFAULT NULL,
  `user_province_id` int(4) DEFAULT NULL COMMENT '所在省市',
  `user_city_id` int(4) DEFAULT NULL COMMENT '所在城市',
  `user_subscribe` int(4) DEFAULT NULL COMMENT '用户是否订阅钼市网行情',
  `user_point` bigint(20) DEFAULT NULL COMMENT '用户积分',
  `user_template` varchar(128) DEFAULT NULL COMMENT '会员选择的模板',
  `user_open_template` tinyint(4) DEFAULT '0' COMMENT '是否开启会员模板',
  `user_join_date` datetime DEFAULT NULL COMMENT '''注册时间''',
  `user_confirm_date` datetime DEFAULT NULL COMMENT '''验证时间''',
  `user_last_login_date` datetime DEFAULT NULL COMMENT '''最近登录时间''',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`),
  KEY `user_email` (`user_email`)
) ENGINE=MyISAM AUTO_INCREMENT=114 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mu_user
-- ----------------------------
INSERT INTO mu_user VALUES ('1', 'ueelife', '0', 'e10adc3949ba59abbe56e057f20f883e', 'xiaofuqian@live.cn', 'xiaofuqian', '0', '15015088124', '023-3423223', '肖富乾', null, '1', '2', '37', '1', null, null, '0', '2013-02-06 20:53:48', null, null);
INSERT INTO mu_user VALUES ('2', 'ueelife1', '0', 'e10adc3949ba59abbe56e057f20f883e', 'xiao2008abc1@163.com', 'adada', '0', '', null, 'xiaofuqian', null, '1', null, '0', '1', null, null, '0', '2013-02-06 20:53:49', null, null);
INSERT INTO mu_user VALUES ('3', 'ueelife2', '0', 'e10adc3949ba59abbe56e057f20f883e', 'xiao2008abc@163.com', 'nike', '1', '15015088124', '023-43367621', '肖富乾', null, '1', '2', '37', '1', null, 'default', '1', '2013-02-06 20:53:51', '2013-02-24 23:37:47', '2013-02-24 23:37:45');
INSERT INTO mu_user VALUES ('101', 'xiaofuqian', '1', 'e10adc3949ba59abbe56e057f20f883e', 'xiao2008abc2@163.com', 'hellyboy', '3', '15015088124', '023-34543456', '肖富乾', null, '1', '16', '190', '1', null, 'default', '1', '2013-03-08 00:00:00', null, null);
INSERT INTO mu_user VALUES ('102', 'lylcmy', '1', 'e10adc3949ba59abbe56e057f20f883e', 'test@163.com', 'lylcmy', '1', '15015088124', '0379-66819819', '段玉贤', null, '1', '16', '189', '1', null, 'default', '1', '2013-03-17 00:00:00', null, null);
INSERT INTO mu_user VALUES ('103', 'lygkmucl', '1', 'e10adc3949ba59abbe56e057f20f883e', 'lygkmucl@163.com', 'lygkmucl', '1', '13903883580', '0379-65576588', '李跃庆', null, '1', '16', '189', '1', null, 'default', '1', '2013-03-17 00:00:00', null, null);
INSERT INTO mu_user VALUES ('104', 'lydcmw', '1', 'e10adc3949ba59abbe56e057f20f883e', 'lydcmw@163.com', 'lydcmw', '1', '13803799005', '0379-66870938', '许明臣', null, '1', '16', '189', '1', null, 'default', '1', '2013-03-17 00:00:00', null, null);
INSERT INTO mu_user VALUES ('105', 'lymdky', '1', 'e10adc3949ba59abbe56e057f20f883e', 'lymdky@163.com', 'lymdky', '1', '13700792898', '0379-66832369', '刘明建', null, '1', '16', '189', '1', null, 'default', '1', '2013-03-17 00:00:00', null, null);
INSERT INTO mu_user VALUES ('106', 'lcxrdky', '1', 'e10adc3949ba59abbe56e057f20f883e', 'lcxrdky@163.com', 'lcxrdky', '1', '13838832500', '0379-66649028', '徐辉', null, '1', '16', '189', '1', null, 'default', '1', '2013-03-17 00:00:00', null, null);
INSERT INTO mu_user VALUES ('107', 'lymdwmkj', '1', 'e10adc3949ba59abbe56e057f20f883e', 'lymdwmkj@163.com', 'lymdwmkj', '2', '13837967256', '0379-66677780', '梁卫松', null, '1', '16', '189', '1', null, 'temp2', '1', '2013-03-17 00:00:00', null, null);
INSERT INTO mu_user VALUES ('108', 'hldhdmy', '1', 'e10adc3949ba59abbe56e057f20f883e', 'hldhdmy@163.com', 'hldhdmy', '2', '13604299999', '0429-2226666', '谭久昌', null, '1', '6', '85', '1', null, 'temp2', '1', '2013-03-17 00:00:00', null, null);
INSERT INTO mu_user VALUES ('109', 'jzxhlmy', '1', 'e10adc3949ba59abbe56e057f20f883e', 'jzxhlmy@163.com', 'jzxhlmy', '1', '13332188282', '13332188282', '董晓军', null, '1', '16', '189', '1', null, 'default', '1', '2013-03-17 00:00:00', null, null);
INSERT INTO mu_user VALUES ('110', 'sxktzmy', '1', 'e10adc3949ba59abbe56e057f20f883e', 'sxktzmy@163.com', 'sxktzmy', '2', '13803888338', '0379-66555888', '赵维根', null, '1', '16', '189', '0', null, 'temp2', '1', '2013-03-17 00:00:00', null, null);
INSERT INTO mu_user VALUES ('111', 'lcxhfky', '1', 'e10adc3949ba59abbe56e057f20f883e', 'lcxhfky@163.com', 'lcxhfky', '2', '13592090678', '0379-66763555', '杨植森', null, '1', '16', '189', '0', null, 'temp2', '1', '2013-03-17 00:00:00', null, null);
INSERT INTO mu_user VALUES ('112', 'jsffwmzpgf', '1', 'e10adc3949ba59abbe56e057f20f883e', '623774807@qq.com', 'jsffwmzpgf', '2', '13305110692', '0515-88109819', '陈康荣', null, '1', '10', '117', '1', null, 'default', '1', '2013-03-19 00:00:00', null, null);
INSERT INTO mu_user VALUES ('113', 'hldmdsy', '1', 'e10adc3949ba59abbe56e057f20f883e', 'hldmdsy@163.com', 'hldmdsy', '2', '13910599929', '0429-5698300', '徐海照', null, '1', '6', '85', '1', null, 'default', '1', '2013-03-19 00:00:00', null, null);

-- ----------------------------
-- Table structure for `mu_user_article`
-- ----------------------------
DROP TABLE IF EXISTS `mu_user_article`;
CREATE TABLE `mu_user_article` (
  `art_id` int(10) NOT NULL AUTO_INCREMENT,
  `art_user_id` int(10) NOT NULL DEFAULT '0',
  `art_title` varchar(218) NOT NULL DEFAULT '' COMMENT '新闻动态标题',
  `art_subtitle` varchar(218) DEFAULT '' COMMENT '新闻动态副标题',
  `art_tags` varchar(218) DEFAULT '' COMMENT '新闻动态副标题',
  `art_intro` varchar(512) DEFAULT '' COMMENT '新闻简介',
  `art_click_count` int(11) DEFAULT '0' COMMENT '新闻点击数',
  `art_content` mediumtext COMMENT '新闻内容',
  `art_added_date` datetime DEFAULT NULL COMMENT '新闻发布时间',
  `art_updated_date` datetime DEFAULT NULL COMMENT '新闻更新时间',
  PRIMARY KEY (`art_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='用户企业动态';

-- ----------------------------
-- Records of mu_user_article
-- ----------------------------
INSERT INTO mu_user_article VALUES ('1', '3', '测试标题1', '', '', '测试新闻内容测试新闻内容测试新闻内容测试新闻内容测试新闻内容测试新闻内容测试新闻内容测试新闻内容测试\r\n', '1', '<p>&#12288;&#12288;中新社北京2月25日电 (张蔚然 常胜)中国外交部发言人华春莹25日对日本首相安倍晋三近日涉钓鱼岛言论作出反驳，称其逻辑荒谬，“不管日方如何狡辩，都掩盖不了其非法侵占中国领土的事实”。</p>\r\n\r\n<div id=\"hzh_div\" class=\"otherContent_01\" style=\"width: 200px; height: 300px; margin: 10px 20px 10px 0px; float: left; display: none; overflow: hidden; clear: both; padding: 4px; border: 1px solid rgb(205, 205, 205);\"><iframe scrolling=\"no\" width=\"200\" height=\"300\" frameborder=\"0\" id=\"ifm_hzh_div\" src=\"http://d4.sina.com.cn/sina/ae/2009/guonei_leftbutton.html\"></iframe></div><p>&#12288;&#12288;有记者提问，日本首相安倍晋三22日在美国“战略与国际问题研究中心”发表演讲称，历史和国际法均可证明“尖阁列岛”是日本领土，事实上，在1895到1971年间，没有一个国家对此提出质疑。中方对此有何评论？</p>\r\n\r\n<p>&#12288;&#12288;“上述言论的逻辑是荒谬的。就像一个人偷了别人的东西，在口袋里捂了一段时间，就能改变其偷窃并非法占据他人财产的实质吗？”华春莹反问道。</p>\r\n\r\n<p>&#12288;&#12288;她指出，不管日方如何狡辩，都掩盖不了其非法侵占中国领土的事实。</p>\r\n\r\n<p>&#12288;&#12288;华春莹表示，钓鱼岛是中国的固有领土，从15世纪到1895年的近500年间，没有任何国家挑战中国对钓鱼岛的主权。二战结束后，日本未按《开罗宣言》和《波茨坦公告》有关规定，履行作为战败国应尽的国际义务，将其窃取的钓鱼岛归还中国。日本迄今对钓鱼岛采取的一切行动都基于对中国领土的非法窃取和侵占，都是非法和无效的。</p>\r\n\r\n<p>&#12288;&#12288;“我们敦促日方端正态度，正视历史和现实，为妥善处理钓鱼岛问题、改善中日关系作出切实努力。”华春莹说。(完)</p>\r\n\r\n<p align=\"right\">(原标题：中方驳安倍涉钓言论：“偷”不能改变非法占据实质)</p><div style=\"font-size: 0px; height: 0px; clear: both;\"></div>\r\n<!-- publish_helper_end -->', '2013-02-25 11:51:08', '2013-02-25 11:51:10');
INSERT INTO mu_user_article VALUES ('2', '3', '测试标题2', '', '', '测试新闻内容测试新闻内容测试新闻内容测试新闻内容测试新闻内容测试新闻内容测试新闻内容测试新闻内容测试\r\n', '1', '测试新闻内容测试新闻内容测', '2013-02-25 11:51:08', '2013-02-25 11:51:10');
INSERT INTO mu_user_article VALUES ('3', '3', '测试标题', '', '', '测试新闻内容测试新闻内容测试新闻内容测试新闻内容测试新闻内容测试新闻内容测试新闻内容测试新闻内容测试\r\n', '1', '测试新闻内容测试新闻内容测', '2013-02-25 11:51:08', '2013-02-25 11:51:10');
INSERT INTO mu_user_article VALUES ('4', '3', '测试标题3', '', '', '测试新闻内容测试新闻内容测试新闻内容测试新闻内容测试新闻内容测试新闻内容测试新闻内容测试新闻内容测试\r\n', '1', '测试新闻内容测试新闻内容测', '2013-02-25 11:51:08', '2013-02-25 11:51:10');
INSERT INTO mu_user_article VALUES ('5', '3', '测试标题', '', '', '测试新闻内容测试新闻内容测试新闻内容测试新闻内容测试新闻内容测试新闻内容测试新闻内容测试新闻内容测试\r\n', '1', '测试新闻内容测试新闻内容测', '2013-02-25 11:51:08', '2013-02-25 11:51:10');
INSERT INTO mu_user_article VALUES ('6', '3', '测试标题', '', '', '测试新闻内容测试新闻内容测试新闻内容测试新闻内容测试新闻内容测试新闻内容测试新闻内容测试新闻内容测试\r\n', '1', '测试新闻内容测试新闻内容测', '2013-02-25 11:51:08', '2013-02-25 11:51:10');
INSERT INTO mu_user_article VALUES ('7', '3', '测试标题', '', '', '测试新闻内容测试新闻内容测试新闻内容测试新闻内容测试新闻内容测试新闻内容测试新闻内容测试新闻内容测试\r\n', '1', '测试新闻内容测试新闻内容测', '2013-02-25 11:51:08', '2013-02-25 11:51:10');
INSERT INTO mu_user_article VALUES ('8', '3', '测试标题', '', '', '测试新闻内容测试新闻内容测试新闻内容测试新闻内容测试新闻内容测试新闻内容测试新闻内容测试新闻内容测试\r\n', '1', '测试新闻内容测试新闻内容测', '2013-02-25 11:51:08', '2013-02-25 11:51:10');
INSERT INTO mu_user_article VALUES ('9', '3', '测试标题', '', '', '测试新闻内容测试新闻内容测试新闻内容测试新闻内容测试新闻内容测试新闻内容测试新闻内容测试新闻内容测试\r\n', '1', '测试新闻内容测试新闻内容测', '2013-02-25 11:51:08', '2013-02-25 11:51:10');
INSERT INTO mu_user_article VALUES ('10', '3', '测试标题', '', '', '测试新闻内容测试新闻内容测试新闻内容测试新闻内容测试新闻内容测试新闻内容测试新闻内容测试新闻内容测试\r\n', '1', '测试新闻内容测试新闻内容测', '2013-02-25 11:51:08', '2013-02-25 11:51:10');
INSERT INTO mu_user_article VALUES ('11', '3', '测试标题', '', '', '测试新闻内容测试新闻内容测试新闻内容测试新闻内容测试新闻内容测试新闻内容测试新闻内容测试新闻内容测试\r\n', '1', '测试新闻内容测试新闻内容测', '2013-02-25 11:51:08', '2013-02-25 11:51:10');
INSERT INTO mu_user_article VALUES ('12', '3', '测试标题', '', '', '测试新闻内容测试新闻内容测试新闻内容测试新闻内容测试新闻内容测试新闻内容测试新闻内容测试新闻内容测试\r\n', '1', '测试新闻内容测试新闻内容测', '2013-02-25 11:51:08', '2013-02-25 11:51:10');
INSERT INTO mu_user_article VALUES ('13', '3', 'asdfasdfa', '', '', '', '0', '<p>\r\n	sdfasdfasdfasdfasdasdfasdfasdfasdfasdfasdfasd</p>\r\n', null, null);
INSERT INTO mu_user_article VALUES ('14', '1', 'asdfasdfasd', '', '', '', '0', '<p>\r\n	asfafasdfasdfasdfasdfasdfadsf</p>\r\n', null, null);

-- ----------------------------
-- Table structure for `mu_user_certificate`
-- ----------------------------
DROP TABLE IF EXISTS `mu_user_certificate`;
CREATE TABLE `mu_user_certificate` (
  `cert_id` int(11) NOT NULL,
  `cert_ent_id` int(11) NOT NULL,
  `cert_title` varchar(128) DEFAULT NULL COMMENT '''资质''',
  `cert_img_src` varchar(128) DEFAULT NULL COMMENT '''图片地址''',
  PRIMARY KEY (`cert_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mu_user_certificate
-- ----------------------------

-- ----------------------------
-- Table structure for `mu_user_enterprise`
-- ----------------------------
DROP TABLE IF EXISTS `mu_user_enterprise`;
CREATE TABLE `mu_user_enterprise` (
  `ent_id` int(11) NOT NULL AUTO_INCREMENT,
  `ent_user_id` int(11) NOT NULL COMMENT '企业对应的网站用户',
  `ent_name` varchar(256) DEFAULT NULL COMMENT '企业对应的网站用户',
  `ent_type` int(4) DEFAULT NULL COMMENT '企业类型，如国有，私营',
  `ent_website` varchar(512) DEFAULT NULL COMMENT '''网站地址''',
  `ent_business_model` int(4) unsigned DEFAULT NULL COMMENT '经营模式，生产，贸易等',
  `ent_tax` varchar(30) DEFAULT NULL COMMENT '传真',
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
  `ent_image` varchar(128) DEFAULT NULL COMMENT '公司形象图',
  `ent_update_time` datetime DEFAULT NULL COMMENT '修改时间',
  `ent_check_by` varchar(50) DEFAULT NULL COMMENT '审核人',
  PRIMARY KEY (`ent_id`),
  KEY `ent_user_id` (`ent_user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=124 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mu_user_enterprise
-- ----------------------------
INSERT INTO mu_user_enterprise VALUES ('45', '3', '镇江市金广铁合金有限公司(钼贸易型企业)', '5', 'http://www.mushw.com', '6', null, '51800', '<p>\r\n	企业是从事生产、流通、服务等经济活动，以生产或服务满足社会需要，实行自主经营、独立核算、依法设立的一种盈利性的经济组织。企业主要指独立的盈利性组织。在中国计划经济时期，“企业”是与“事业单位”平行使用的常用词语。《辞海》1979年版中，“企业”的解释为：“从事生产、流通或服务活动的独立核算经济单位”；“事业单位”的解释为：“受国家机关领导，不实行经济核算的单位”。在20世纪后期中国大陆改革开放与现代化建设及信息技术领域新概念大量涌入的背景下，“企业”一词的用法有所变化，并不限于商业性或盈利组织111</p>', '深圳', '189', '1', '李总', '2013-01-31 00:00:00', '8', '网络，安全，建站', '500', '1', 'image', null, '2013-01-31 00:00:00', 'ueelife');
INSERT INTO mu_user_enterprise VALUES ('111', '101', '平顶山矿业集团', '4', '', '6', null, '', '平顶山矿业集团', '河南省平顶山市多少好', '41', '1', 'hellyboy', '2013-03-08 22:39:09', '8', '钼铁', '1000', null, null, null, null, 'ueelife');
INSERT INTO mu_user_enterprise VALUES ('112', '102', '洛阳栾川钼业集团股份有限公司', '118', '', '6', null, '', '<span style=\"font-family:arial, 宋体, sans-serif;font-size: 14px; line-height: 25px; text-indent: 30px;\">洛阳栾川钼业集团股份有限公司简称洛钼集团，是以钼钨的采、选、冶、深加工为主，集科研、生产、贸易为一体的海外上市公司，证券代码：3993，中文名称：中国钼业，公司市值居世界矿业前30位。是河南省百强企业和洛阳市16家重点企业之一。下属4个分公司、5个子公司、5个控股公司、2个参股公司。</span>', '洛阳市栾川县', '189', '1', 'lylcmy', '2013-03-17 21:11:00', null, '钼酸钠', '1000', null, null, null, null, 'ueelife');
INSERT INTO mu_user_enterprise VALUES ('113', '103', '洛阳高科钼钨材料有限公司 ', '118', '', '6', null, '', '<span style=\"font-family:宋体, arial, helvetica;color:#333333;line-height: 22px; text-indent: 24px; -webkit-text-size-adjust: none;\">洛阳高科钼钨材料有限公司是目前亚洲最大的钼深加工制品研发、生产企业，地处洛阳市高新区，占地157亩，翠绿满园，四季有花，环境优美，现有职工246人，注册资金5.3亿元。 洛阳高科钼钨材料有限公司是洛钼集团于2005年元月收购原破产企业国营七四四厂基础上成立的全资子公司，公司刚成立时荒草没人，垃圾遍地，车间油污横流，满目凄凉。经过三年的艰苦创业，实施5项重大技改，创造了5项国际国内第一，获国家专利4项、国家科技一等奖一项，研发新产品6种，产值突破3.5亿元，高科公司先后被评为国家高技术产业化示范工程、河南省高新技术企业、洛阳市高成长性高新技术企业、洛阳市园林单位等。公司钼钨材料科研中心，已通过国家认可委员会CANS国家实验室认证和河南省计量院计量认证，即将成为国内最具权威的难熔金属材料科研中心和国家级实验室。 目前我公司的主导产品有：钼条、钼板、钼丝、钼片、超长喷涂钼丝、轧制钼板、钨条、钨丝、钼钨异型制品、覆铝合金等。 5项重大技改即：300T/年稀土钼粉生产线；160T/年25kg大单重钼丝生产线；1000T/年烧结制品生产线；国内一流的国家级钼钨材料实验室；300m3/h液氨制氢工程。</span>', '洛阳市栾川县', '189', '1', 'lygkmucl', '2013-03-17 21:51:40', null, '钼钨', '500', null, null, null, null, 'ueelife');
INSERT INTO mu_user_enterprise VALUES ('114', '104', '洛阳大川钼钨有限责任公司', '118', '', '6', null, '', '<span style=\"font-family:宋体, Arial, Helvetica, sans-serif;color:#333333;line-height: 24px;\">洛阳大川钼钨科技有限责任公司，位于风光秀丽、人杰地灵、钼金属储量有亚洲第一之称的钼都之乡－－洛阳栾川。企业占地面积60000平方米，拥有资产9600万元，员工230人，是洛钼集团、北京工业大学和国投创业投资公司三家联合组建的高新企业。　　公司汇集了一批高层次、高素质的专业人才，拥有先进的生产设备，运用了适合国情的经营管理办法，齐全的检测设备、雄厚的技术力量，建立了完整的ISO9001、ISO14001、GBL28001整合型管理体系。产品质量在国内处于领先地位，是中国生产钼钨产品的重点企业之一。　　公司的主要产品有：工业钼酸铵、高纯三氧化钼、稀土高温钼粉、纯钼粉等深加工钼制品，目前公司已完成国家高性能稀土钼钨材料高技术产业化示范工程，形成年产钼酸铵1800吨、稀土钼粉等制品650吨的生产能力。　　公司以争创“一流质量、一流管理、一流服务”为目标、以“提供优质产品、满足顾客需求和期望”为宗旨，愿与国内朋友真诚合作、互利互惠、共同发展。</span>', '洛阳市', '189', '1', 'lydcmw', '2013-03-17 21:59:24', null, '钼钨', '15750', null, null, null, null, 'ueelife');
INSERT INTO mu_user_enterprise VALUES ('115', '105', '洛阳钼都矿冶有限公司', '118', '', '6', null, '471500', '<span style=\"font-family:宋体, arial, helvetica, sans-serif;color:#333333;line-height: 22px; text-indent: 24px; -webkit-text-size-adjust: none;\">主要经营：矿产品等产品。作为经营矿产品的企业，我们始终坚持诚信和让利于客户，坚持用自己的服务去打动客户。</span><br style=\"color: rgb(51, 51, 51); font-family: 宋体, arial, helvetica, sans-serif; line-height: 22px; text-indent: 24px; -webkit-text-size-adjust: none;\" /><span style=\"font-family:宋体, arial, helvetica, sans-serif;color:#333333;line-height: 22px; text-indent: 24px; -webkit-text-size-adjust: none;\">&nbsp;&nbsp;我们公司是在洛阳市，如果有洛阳市的朋友欢迎来我公司参观指导工作，具体的地址是：河南省栾川县君山路南483号。</span><br style=\"color: rgb(51, 51, 51); font-family: 宋体, arial, helvetica, sans-serif; line-height: 22px; text-indent: 24px; -webkit-text-size-adjust: none;\" /><span style=\"font-family:宋体, arial, helvetica, sans-serif;color:#333333;line-height: 22px; text-indent: 24px; -webkit-text-size-adjust: none;\">&nbsp;&nbsp;您如果对我们的产品感兴趣的话，也可以直接在线提交采购信息我们会及时跟您联系。</span>', '河南省栾川县君山路南483号', '189', '1', 'lymdky', '2013-03-17 22:06:04', null, '冶金矿产 非金属矿产', '1000', null, null, null, null, 'ueelife');
INSERT INTO mu_user_enterprise VALUES ('116', '106', '栾川县瑞达矿业有限公司', '118', '', '7', null, '471500', '<span style=\"font-family:宋体, arial, helvetica, sans-serif;color:#333333;line-height: 22px; text-indent: 24px; -webkit-text-size-adjust: none;\">主要经营：等产品。作为经营的企业，我们始终坚持诚信和让利于客户，坚持用自己的服务去打动客户。</span><br style=\"color: rgb(51, 51, 51); font-family: 宋体, arial, helvetica, sans-serif; line-height: 22px; text-indent: 24px; -webkit-text-size-adjust: none;\" /><span style=\"font-family:宋体, arial, helvetica, sans-serif;color:#333333;line-height: 22px; text-indent: 24px; -webkit-text-size-adjust: none;\">&nbsp;&nbsp;我们公司是在，如果有的朋友欢迎来我公司参观指导工作，具体的地址是：河南省洛阳市栾川县陶湾镇张盘村。</span><br style=\"color: rgb(51, 51, 51); font-family: 宋体, arial, helvetica, sans-serif; line-height: 22px; text-indent: 24px; -webkit-text-size-adjust: none;\" /><span style=\"font-family:宋体, arial, helvetica, sans-serif;color:#333333;line-height: 22px; text-indent: 24px; -webkit-text-size-adjust: none;\">&nbsp;&nbsp;您如果对我们的产品感兴趣的话，也可以直接在线提交采购信息我们会及时跟您联系。</span>', '河南省洛阳市栾川县陶湾镇张盘村', '189', '1', 'lcxrdky', '2013-03-17 22:11:48', null, '二手设备转让 其他二手设备转让', '100', null, null, null, null, 'ueelife');
INSERT INTO mu_user_enterprise VALUES ('117', '107', '洛阳钼都钨钼科技有限公司', '5', '', '7', null, '', '<span style=\"font-family:宋体, arial, helvetica, sans-serif;color:#333333;line-height: 22px; text-indent: 24px; -webkit-text-size-adjust: none;\">本公司主要经营钨钼系列产品,亚硫酸钠系列产品，钨钼精矿等。本公司秉承“顾客至上，锐意进取”的经营理念，坚持“客户第一”的原则为广大客户提供优质的服务。欢迎广大客户惠顾！</span>', '洛阳市合峪镇前村村', '189', '1', 'lymdwmkj', '2013-03-17 22:17:48', null, '二手设备转让 其他二手设备转让', '100', null, null, null, null, 'ueelife');
INSERT INTO mu_user_enterprise VALUES ('118', '108', '葫芦岛宏达钼业有限公司', '118', '', '120', null, '', '<span style=\"font-family:宋体, arial, helvetica, sans-serif;color:#333333;line-height: 22px; text-indent: 24px; -webkit-text-size-adjust: none;\">氧化钼，钼精，钼铁，有色金属销售</span>', '渤海街南段１６－１３－１４－１５', '85', '1', 'hldhdmy', '2013-03-17 22:24:33', null, '氧化钼，钼精，钼铁，有色金属销售', '100', null, null, null, null, 'ueelife');
INSERT INTO mu_user_enterprise VALUES ('119', '109', '锦州新华龙钼业股份有限公司', '118', '', '6', null, '', '<span style=\"font-family:arial, 宋体, sans-serif;font-size: 14px; line-height: 24px; text-indent: 30px;\">锦州新华龙是国内钼行业产品生产骨干企业之一，国家一类出口免检企业，经过多年的发展，已经成为集采 矿、选矿、冶炼、加工、贸易于一体的专业化公司。公司创建于2003年6月，下辖3个全资子公司和2个控股公司，企业公司资产超10亿元，总部坐落在辽宁沿海经济战略带重点发展区域——国家级锦州经济技术开发区。　 公司连续多年实施技改项目，建成工艺和技术完善成熟的回转窑，完全替代了原有落后的反射炉。同时建成与之匹配的环保项目亚硫酸钠工程，达到了绿色环保要求。企业自主设计新建的现代化钼铁冶炼自动化生产线，其技术装备水平和生产能力居国内领先地位。公司先后从美国、日本引进国际先进水平的焙烧、自动化冶炼、环保等技术和检测设备，严格规范原辅料和产品质检制度，全面通过了质量、环境、职业健康安全管理三体系的认证和监督审核。公司生产的主要产品性能均达到国内先进水平，并销往全国各大钢厂，出口到世界数十个国家和地区，钼铁生产量与销售量稳居中国钼业第一方阵，深加工产品——钼酸铵和高纯氧化钼的产量和质量居行业内前列。公司积极组织实施名牌产品和商标战略，全力打造新华龙品牌，被国家农业部授予 “全面质量管理达标验收合格单位”、辽宁省“诚信示范企业”、“守合同重信用企业”、“民营百强企业”和“名牌产品”、“著名商标”等称号，连续多年成为锦州市“工业十强企业”，是注册地重点骨干纳税企业。</span>', '锦州经济技术开发区', '189', '1', 'jzxhlmy', '2013-03-17 22:34:12', null, '钼精矿、钼铁、钼酸铵、高纯氧化钼、钼粉、钼板、钼棒、钼顶头', '10000', null, null, null, null, 'ueelife');
INSERT INTO mu_user_enterprise VALUES ('120', '110', '嵩县开拓者钼业有限公司', '118', '', '7', null, '', '<p style=\"margin: 5px 0px 0px; padding: 0px; border: none; width: 650px; text-indent: 25px; line-height: 24px; color: rgb(109, 109, 109); font-family: 宋体;\">洛阳嵩县开拓者钼业有限公司是一家科技型的钼加工企业，主要产品有99.9%<strong>高纯二硫化钼</strong>、99.5%<strong>高纯二硫化钼</strong>、99%<strong>高纯二硫化钼</strong>、98.5%<strong>二硫化钼</strong>、98%<strong>二硫化钼</strong>、<strong>高纯超细三氧化钼</strong>、<strong>炼钢钼粉</strong>、<strong>金属钼粉</strong>等<strong>钼</strong>系列制品。</p><p style=\"margin: 5px 0px 0px; padding: 0px; border: none; width: 650px; text-indent: 25px; line-height: 24px; color: rgb(109, 109, 109); font-family: 宋体;\">公司占地面积148亩，建筑面积33000平方米，按照现代化的花园式工厂设计，厂区依山傍水，紧邻洛栾快速通道，四周群峰迭峦、风景秀丽，距中国最美的地方之一白云山45公里、与国家AAAA级景区天池山遥相呼应。公司现有员工100余人，70％具有大专以上学历，其中硕士1人、博士、博士后各1人，其他专业技术人员近30人。该项目与国家级研究院强强联手，共同研发国际上先进的钼真空冶炼技术及装备，并获得国家发明专利；开创了钼业绿色冶炼的先河，开拓了发展循环经济的新途径，开辟了钼工业可持续发展之路。</p><p style=\"margin: 5px 0px 0px; padding: 0px; border: none; width: 650px; text-indent: 25px; line-height: 24px; color: rgb(109, 109, 109); font-family: 宋体;\">公司以“创新进取、追求卓越”为己任、以“做世界钼真空冶炼先进技术的开拓者”为战略；集科学研究、新产品开发、生产销售为一体，通过了ISO9001质量管理体系、 ISO14001环境管理体系认证、GB/T28001 职业健康安全管理体系认证和瑞奇认证；自主研发与科研院所相结合，依靠科技创新建设绿色环保钼产业链条、从而跨入钼产业多元化发展道路，跻身国内国际市场，把开拓者钼业品牌打造成为闪耀在世界东方的璀璨明珠。</p>', '河南省洛阳市嵩县德亭镇酒店村', '189', '1', 'sxktzmy', '2013-03-17 22:40:19', null, '高纯二硫化钼、99.5%高纯二硫化钼、99%高纯二硫化钼、98.5%二硫化钼、98%二硫化钼、高纯超细三氧化钼、炼钢钼粉、金属钼粉', '500', null, null, null, null, 'ueelife');
INSERT INTO mu_user_enterprise VALUES ('121', '111', '栾川县宏发矿业有限公司', '118', '', '6', null, '', '<span style=\"font-family:宋体, arial, helvetica, sans-serif;color:#333333;line-height: 22px; text-indent: 24px; -webkit-text-size-adjust: none;\">主要经营：钼矿浮选,钼焙砂加工销售等产品。作为经营钼矿浮选,钼焙砂加工销售的企业，我们始终坚持诚信和让利于客户，坚持用自己的服务去打动客户。</span><br style=\"color: rgb(51, 51, 51); font-family: 宋体, arial, helvetica, sans-serif; line-height: 22px; text-indent: 24px; -webkit-text-size-adjust: none;\" /><span style=\"font-family:宋体, arial, helvetica, sans-serif;color:#333333;line-height: 22px; text-indent: 24px; -webkit-text-size-adjust: none;\">&nbsp;&nbsp;我们公司是在，如果有的朋友欢迎来我公司参观指导工作，具体的地址是：栾川县栾川乡方村村。</span><br style=\"color: rgb(51, 51, 51); font-family: 宋体, arial, helvetica, sans-serif; line-height: 22px; text-indent: 24px; -webkit-text-size-adjust: none;\" /><span style=\"font-family:宋体, arial, helvetica, sans-serif;color:#333333;line-height: 22px; text-indent: 24px; -webkit-text-size-adjust: none;\">&nbsp;&nbsp;您如果对我们的产品感兴趣的话，也可以直接在线提交采购信息我们会及时跟您联系。</span>', '栾川县栾川乡方村村', '189', '1', 'lcxhfky', '2013-03-17 22:47:57', null, '钼矿浮选 钼焙砂加工销售', '1000', null, null, null, null, 'ueelife');
INSERT INTO mu_user_enterprise VALUES ('122', '112', '江苏峰峰钨钼制品股份有限公司 ', '118', '', '143', null, '', '江苏峰峰钨钼制品股份有限公司是国家中型企业，公司具有从事技术开发和生产管理的各类人才，工艺装备精良先进 \r\n，主要产品有钼酸铵、钼条、钼锭、钨条等七个品种十四个规格，产品执行国家标准 ，已获ISO9002国际质量体系认证 ，与日本 \r\n、美国、英国、秘鲁、加拿大、香港等十多个国家和地区建立了长期的合作贸易关系。\r\n								', ' 江苏省东台市台城北郊', '117', '1', '陈康荣', '2013-03-19 23:18:44', null, '钼酸铵 钼条 三氧化钼 钨条 钼锭 钼粉', '1000', null, null, null, null, 'ueelife');
INSERT INTO mu_user_enterprise VALUES ('123', '113', '葫芦岛钼都实业有限公司', '118', '', '0', null, '', '主要经营：等产品。作为经营的企业，我们始终坚持诚信和让利于客户，坚持用自己的服务去打动客户。<br />&nbsp;&nbsp;我们公司是在葫芦岛市，如果有葫芦岛市的朋友欢迎来我公司参观指导工作，具体的地址是：兴城市曹庄镇上坡村。<br />&nbsp;&nbsp;您如果对我们的产品感兴趣的话，也可以直接在线提交采购信息我们会及时跟您联系。', '辽宁省 葫芦岛市  兴城市曹庄镇上坡村', '85', '1', '徐海照', '2013-03-19 23:34:44', null, '其他二手设备转让', '100', null, null, null, null, 'ueelife');

-- ----------------------------
-- Table structure for `mu_user_group`
-- ----------------------------
DROP TABLE IF EXISTS `mu_user_group`;
CREATE TABLE `mu_user_group` (
  `group_id` int(10) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(50) NOT NULL COMMENT '分组名称',
  `group_description` text COMMENT '分组名称',
  `group_logo` varchar(128) NOT NULL COMMENT '分组名称',
  `group_status` int(11) NOT NULL DEFAULT '1' COMMENT '分组名称',
  `group_added_time` datetime NOT NULL COMMENT '分组名称',
  `group_updated_time` datetime NOT NULL COMMENT '分组名称',
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='会员组';

-- ----------------------------
-- Records of mu_user_group
-- ----------------------------
INSERT INTO mu_user_group VALUES ('1', '金牌会员', '', 'ug_1364304095_1583.gif', '1', '2013-03-17 17:02:29', '2013-03-26 21:21:35');
INSERT INTO mu_user_group VALUES ('2', '银牌会员', '', 'ug_1364304132_2345.gif', '1', '2013-03-17 17:11:15', '2013-03-26 21:22:12');
INSERT INTO mu_user_group VALUES ('3', '铜牌会员', '', 'ug_1364304149_2362.gif', '1', '2013-03-26 21:22:29', '2013-03-26 21:22:29');

-- ----------------------------
-- Table structure for `mu_user_template`
-- ----------------------------
DROP TABLE IF EXISTS `mu_user_template`;
CREATE TABLE `mu_user_template` (
  `temp_id` int(10) NOT NULL AUTO_INCREMENT,
  `temp_name` varchar(128) NOT NULL DEFAULT '未指定',
  `temp_status` int(11) NOT NULL DEFAULT '2',
  `temp_order` int(11) NOT NULL DEFAULT '0',
  `temp_dir` varchar(128) NOT NULL DEFAULT 'default',
  `temp_amount` int(11) NOT NULL DEFAULT '0' COMMENT '模板被使用的次数',
  `temp_added_date` datetime DEFAULT NULL,
  `temp_updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`temp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='会员的旺铺模板';

-- ----------------------------
-- Records of mu_user_template
-- ----------------------------
INSERT INTO mu_user_template VALUES ('2', 'default', '1', '0', 'default', '0', '2013-02-24 11:38:33', '2013-03-17 10:54:56');
INSERT INTO mu_user_template VALUES ('3', 'temp2', '1', '0', 'temp2', '0', '2013-03-14 09:13:01', null);
INSERT INTO mu_user_template VALUES ('4', 'temp3', '1', '0', 'temp3', '0', '2013-03-14 09:13:13', null);

-- ----------------------------
-- View structure for `mu_view_recommend`
-- ----------------------------
DROP VIEW IF EXISTS `mu_view_recommend`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`127.0.0.1` SQL SECURITY DEFINER VIEW `mu_view_recommend` AS select `re`.`recommend_id` AS `recommend_id`,`ar`.`art_title` AS `name`,`re`.`recommend_object_id` AS `recommend_object_id`,`re`.`recommend_type` AS `recommend_type`,`re`.`recommend_position` AS `recommend_position`,`re`.`recommend_status` AS `recommend_status`,`re`.`recommend_time` AS `recommend_time` from (`mu_article` `ar` join `mu_recommend` `re` on((`ar`.`art_id` = `re`.`recommend_object_id`))) where (`re`.`recommend_type` = 23) union all select `re`.`recommend_id` AS `recommend_id`,`su`.`supply_name` AS `name`,`re`.`recommend_object_id` AS `recommend_object_id`,`re`.`recommend_type` AS `recommend_type`,`re`.`recommend_position` AS `recommend_position`,`re`.`recommend_status` AS `recommend_status`,`re`.`recommend_time` AS `recommend_time` from (`mu_supply` `su` join `mu_recommend` `re` on((`su`.`supply_id` = `re`.`recommend_object_id`))) where (`re`.`recommend_type` = 21) union all select `re`.`recommend_id` AS `recommend_id`,`pr`.`product_name` AS `name`,`re`.`recommend_object_id` AS `recommend_object_id`,`re`.`recommend_type` AS `recommend_type`,`re`.`recommend_position` AS `recommend_position`,`re`.`recommend_status` AS `recommend_status`,`re`.`recommend_time` AS `recommend_time` from (`mu_product` `pr` join `mu_recommend` `re` on((`pr`.`product_id` = `re`.`recommend_object_id`))) where (`re`.`recommend_type` = 22) union all select `re`.`recommend_id` AS `recommend_id`,`ue`.`ent_name` AS `name`,`re`.`recommend_object_id` AS `recommend_object_id`,`re`.`recommend_type` AS `recommend_type`,`re`.`recommend_position` AS `recommend_position`,`re`.`recommend_status` AS `recommend_status`,`re`.`recommend_time` AS `recommend_time` from (`mu_user_enterprise` `ue` join `mu_recommend` `re` on((`ue`.`ent_id` = `re`.`recommend_object_id`))) where (`re`.`recommend_type` = 24);
