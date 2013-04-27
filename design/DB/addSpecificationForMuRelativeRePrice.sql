ALTER TABLE `mu_relative_re_price`
	ADD COLUMN `re_specification` VARCHAR(50) NULL COMMENT '贵重金属规格' AFTER `re_type`;