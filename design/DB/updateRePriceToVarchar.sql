USE `mu`;
ALTER TABLE `mu_relative_re_price`  CHANGE COLUMN `re_price` `re_price` VARCHAR(128) NULL DEFAULT NULL COMMENT '今日价' AFTER `re_market`;