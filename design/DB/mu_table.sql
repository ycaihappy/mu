SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `mu` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `mu` ;

-- -----------------------------------------------------
-- Table `mu`.`mu_advertisement`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mu`.`mu_advertisement` (
  `ad_id` INT NOT NULL ,
  `ad_user_id` INT NULL ,
  `ad_type` TINYINT NULL COMMENT '视频,图片,flash' ,
  `ad_no` VARCHAR(128) NULL COMMENT '\'广告编号是用于指明位置\'' ,
  `ad_link` VARCHAR(256) NULL ,
  `ad_status` TINYINT NULL ,
  `ad_click_num` INT NULL COMMENT '点击量' ,
  `ad_start_date` DATETIME NULL COMMENT '\'广告的有效开始时间\'' ,
  `ad_end_date` DATETIME NULL COMMENT '\'广告的有效结束时间\'' ,
  `ad_price` DECIMAL(12) NULL COMMENT '广告费用' ,
  `ad_create_time` DATETIME NULL ,
  PRIMARY KEY (`ad_id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `mu`.`mu_term`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mu`.`mu_term` (
  `term_id` INT NOT NULL ,
  `term_parent_id` TINYINT NULL ,
  `term_name` VARCHAR(128) NULL ,
  `term_slug` VARCHAR(200) NULL COMMENT '\'描述\'' ,
  `term_group_id` TINYINT NULL COMMENT '比如产品分类 职位 ' ,
  `term_order` TINYINT NULL ,
  `term_create_time` DATETIME NULL ,
  PRIMARY KEY (`term_id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `mu`.`mu_term_group`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mu`.`mu_term_group` (
  `group_id` INT NOT NULL ,
  `group_name` VARCHAR(100) NULL ,
  `group_desc` VARCHAR(128) NULL DEFAULT NULL ,
  PRIMARY KEY (`group_id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `mu`.`mu_favorite`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mu`.`mu_favorite` (
  `favorite_id` BIGINT NOT NULL ,
  `favorited_object_id` BIGINT NULL COMMENT '供求ID 现货ID' ,
  `favorited_object_type` TINYINT NULL COMMENT '1 供求 2现货 ' ,
  `favorit_user_id` INT NULL COMMENT '收藏人' ,
  `favorite_time` DATETIME NULL COMMENT '\'添加时间\'' ,
  PRIMARY KEY (`favorite_id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `mu`.`mu_friend_link`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mu`.`mu_friend_link` (
  `flink_id` INT NOT NULL ,
  `flink_name` VARCHAR(128) NOT NULL ,
  `flink_url` VARCHAR(512) NULL ,
  `flink_status` TINYINT NULL ,
  `flink_create_date` DATETIME NULL ,
  PRIMARY KEY (`flink_id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci
COMMENT = '友情链接';


-- -----------------------------------------------------
-- Table `mu`.`mu_user_certificate`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mu`.`mu_user_certificate` (
  `cert_id` INT NOT NULL ,
  `cert_ent_id` INT NOT NULL ,
  `cert_title` VARCHAR(128) NULL COMMENT '\'资质\'' ,
  `cert_img_src` VARCHAR(128) NULL COMMENT '\'图片地址\'' ,
  PRIMARY KEY (`cert_id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `mu`.`mu_user_enterprise`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mu`.`mu_user_enterprise` (
  `ent_id` INT NOT NULL ,
  `ent_user_id` INT NULL COMMENT '企业对应的网站用户' ,
  `ent_website` VARCHAR(512) NULL COMMENT '\'网站地址\'' ,
  `ent_zipcode` CHAR(32) NULL COMMENT '\'邮编\'' ,
  `ent_introduce` TEXT NULL COMMENT '\'企业介绍\'' ,
  `ent_location` VARCHAR(218) NULL COMMENT '\'企业详细地址\'' ,
  `ent_chief` VARCHAR(128) NULL COMMENT '\'负责人\'' ,
  `ent_chief_postion` INT NULL COMMENT '负责人职位' ,
  `ent_business_scope` VARCHAR(512) NULL COMMENT '\'经营范围\'' ,
  `ent_registered_capital` DECIMAL NULL COMMENT '注册资金' ,
  `ent_recommend` TINYINT(1) NULL COMMENT '是否推荐企业' ,
  `ent_name` VARCHAR(218) NULL ,
  PRIMARY KEY (`ent_id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `mu`.`mu_article`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mu`.`mu_article` (
  `art_id` INT NOT NULL ,
  `art_title` VARCHAR(128) NOT NULL ,
  `art_source` CHAR(128) NULL COMMENT '\'文章出处\'' ,
  `art_category_id` INT NULL COMMENT '文章分类 行情 新闻 ' ,
  `art_content` TEXT NULL COMMENT '\'文章内容\'' ,
  `art_status` INT NULL COMMENT '起草 审核中 发布' ,
  `art_tags` VARCHAR(45) NULL COMMENT '\'文章tags\'' ,
  `art_user_id` TINYINT NULL COMMENT '文章发表人' ,
  `art_check_by` VARCHAR(45) NULL COMMENT '\'审核人\'' ,
  `art_post_date` DATETIME NULL COMMENT '\'发布时间\'' ,
  `art_modified_date` DATETIME NULL COMMENT '\'修改时间\'' ,
  `art_recommend` TINYINT NULL COMMENT '文章推荐' ,
  PRIMARY KEY (`art_id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `mu`.`mu_recommend`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mu`.`mu_recommend` (
  `recommend_id` INT NOT NULL ,
  `recommend_object_id` BIGINT NOT NULL COMMENT '用户,文章,供求等' ,
  `recommend_type` INT NOT NULL ,
  `recommend_position` INT NOT NULL ,
  `recommend_time` DATETIME NULL ,
  PRIMARY KEY (`recommend_id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `mu`.`mu_point_rule`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mu`.`mu_point_rule` (
  `rule_id` INT NOT NULL ,
  `func_id` TINYINT NOT NULL ,
  `action_point` TINYINT NOT NULL ,
  PRIMARY KEY (`rule_id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `mu`.`mu_city`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mu`.`mu_city` (
  `city_id` INT NOT NULL ,
  `city_name` VARCHAR(128) NOT NULL ,
  `city_parent` INT NOT NULL ,
  `city_level` TINYINT NULL DEFAULT NULL ,
  `city_order` TINYINT NULL DEFAULT NULL ,
  `city_open` VARCHAR(45) NULL ,
  PRIMARY KEY (`city_id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci
COMMENT = '省市联动表';


-- -----------------------------------------------------
-- Table `mu`.`mu_success_case`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mu`.`mu_success_case` (
  `case_id` INT NOT NULL ,
  `supply_id` INT NULL DEFAULT NULL ,
  `supply_user_id` INT NULL DEFAULT NULL ,
  `purchase_user_id` INT NULL DEFAULT NULL ,
  `purchase_amount` VARCHAR(32) NULL DEFAULT NULL ,
  `create_time` DATETIME NULL DEFAULT NULL ,
  `case_status` INT NULL DEFAULT NULL ,
  PRIMARY KEY (`case_id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `mu`.`mu_supply`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mu`.`mu_supply` (
  `supply_join_date` DATETIME NULL COMMENT '\'发表日期\'' ,
  `supply_id` INT NOT NULL ,
  `supply_user_id` INT NOT NULL ,
  `supply_type` INT NULL COMMENT '供求类型' ,
  `supply_contractor` VARCHAR(32) NULL COMMENT '\'发布者\'' ,
  `supply_content` VARCHAR(128) NULL COMMENT '\'发布内容\'' ,
  `supply_address` VARCHAR(100) NULL COMMENT '供货地址' ,
  `supply_status` INT NULL COMMENT '起草 待审核 已发布' ,
  `supply_phone` CHAR(32) NULL COMMENT '\'联系电话\'' ,
  `supply_price` DECIMAL(8) NULL COMMENT '价钱' ,
  `supply_valid_date` DATETIME NULL COMMENT '\'0表示长期有效\'' ,
  `supply_check_by` INT NULL COMMENT '审核人' ,
  `supply_recommend` TINYINT NULL COMMENT '是否推荐' ,
  PRIMARY KEY (`supply_id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `mu`.`mu_func`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mu`.`mu_func` (
  `func_id` INT NOT NULL ,
  `func_name` VARCHAR(128) NOT NULL ,
  `func_action` VARCHAR(1024) NULL DEFAULT NULL ,
  PRIMARY KEY (`func_id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `mu`.`mu_user`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mu`.`mu_user` (
  `user_id` INT NOT NULL ,
  `user_name` VARCHAR(50) NOT NULL ,
  `user_pwd` VARCHAR(40) NOT NULL ,
  `user_email` CHAR(100) NULL ,
  `user_nickname` VARCHAR(20) NULL ,
  `user_type` TINYINT NULL COMMENT '用户类型' ,
  `user_mobile_no` VARCHAR(30) NULL ,
  `user_first_name` VARCHAR(50) NULL ,
  `user_last_name` VARCHAR(50) NULL ,
  `user_status` TINYINT NULL ,
  `user_province_id` TINYINT NULL COMMENT '所在省市' ,
  `user_city_id` TINYINT NULL COMMENT '所在城市' ,
  `user_subscribe` TINYINT NULL COMMENT '用户是否订阅钼市网行情' ,
  `user_point` BIGINT NULL COMMENT '用户积分' ,
  `user_join_date` DATETIME NULL COMMENT '\'注册时间\'' ,
  `user_confirm_date` DATETIME NULL COMMENT '\'验证时间\'' ,
  `user_last_login_date` DATETIME NULL COMMENT '\'最近登录时间\'' ,
  PRIMARY KEY (`user_id`) ,
  INDEX `user_type` (`user_type` ASC) ,
  INDEX `user_status` (`user_status` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `mu`.`mu_product`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mu`.`mu_product` (
  `product_id` BIGINT NOT NULL ,
  `product_user_id` INT NULL COMMENT '用户ID' ,
  `product_name` VARCHAR(45) NULL COMMENT '产品名称' ,
  `product_quanity` INT NULL COMMENT '数量' ,
  `product_unit` VARCHAR(45) NULL COMMENT '数量单位:吨,公斤等' ,
  `product_type_id` TINYINT NULL COMMENT '产品分类' ,
  `product_price` DECIMAL NULL COMMENT '0表示电议' ,
  `product_status` TINYINT NULL COMMENT '在售' ,
  `product_location` VARCHAR(100) NULL COMMENT '\'存货地\'' ,
  `product_details` VARCHAR(45) NULL COMMENT '产品详细说明' ,
  `product_special` TINYINT(1) NULL COMMENT '是否特价' ,
  `product_join_date` DATETIME NULL ,
  PRIMARY KEY (`product_id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci
COMMENT = '现货';


-- -----------------------------------------------------
-- Table `mu`.`mu_sms_code`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mu`.`mu_sms_code` (
  `sms_id` BIGINT NOT NULL ,
  `mobile_no` VARCHAR(45) NULL ,
  `sms_code` VARCHAR(45) NULL ,
  `sms_status` TINYINT NULL COMMENT '是否验证成功' ,
  `sms_send_date` DATETIME NULL ,
  PRIMARY KEY (`sms_id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci
COMMENT = '手机验证码';


-- -----------------------------------------------------
-- Table `mu`.`mu_find_passwd`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mu`.`mu_find_passwd` (
  `find_id` BIGINT NOT NULL ,
  `find_user_id` INT NULL ,
  `find_new_passwd` VARCHAR(45) NULL ,
  `find_status` TINYINT NULL ,
  `find_mobile_no` VARCHAR(45) NULL ,
  `find_date` TINYINT NULL ,
  PRIMARY KEY (`find_id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci
COMMENT = '找回密码功能';


-- -----------------------------------------------------
-- Table `mu`.`mu_right_item`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mu`.`mu_right_item` (
  `name` VARCHAR(64) NOT NULL ,
  `type` INT NOT NULL ,
  `description` VARCHAR(1024) NULL ,
  `bizrule` VARCHAR(1024) NULL COMMENT 'php script for eval' ,
  `data` VARCHAR(1024) NULL ,
  PRIMARY KEY (`name`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mu`.`mu_right_assignment`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mu`.`mu_right_assignment` (
  `itemname` VARCHAR(64) NOT NULL ,
  `userid` INT NOT NULL ,
  `bizrule` VARCHAR(1024) NULL ,
  `data` VARCHAR(1024) NULL ,
  PRIMARY KEY (`itemname`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mu`.`mu_right_itemchildren`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mu`.`mu_right_itemchildren` (
  `parent` VARCHAR(64) NOT NULL ,
  `child` VARCHAR(64) NOT NULL ,
  PRIMARY KEY (`parent`, `child`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mu`.`mu_file`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mu`.`mu_file` (
  `file_id` INT NOT NULL ,
  `file_title` VARCHAR(45) NULL ,
  `file_type_id` TINYINT NULL COMMENT '1图片 2文件' ,
  `file_content` VARCHAR(255) NULL ,
  `file_url` VARCHAR(255) NULL ,
  `file_create_time` DATETIME NULL ,
  PRIMARY KEY (`file_id`) )
ENGINE = InnoDB;

USE `mu` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
