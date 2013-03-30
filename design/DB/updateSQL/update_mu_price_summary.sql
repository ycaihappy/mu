USE mu;
ALTER TABLE `mu_price_summary`  ADD COLUMN `sum_alias_date` DATE NULL DEFAULT NULL COMMENT '年与日的替代字段' AFTER `sum_add_date`,  ADD INDEX `sum_year` (`sum_year`),  ADD INDEX `sum_alias_date` (`sum_alias_date`);
delete from mu_price_summary where sum_month=2 and sum_day=29;
update mu_price_summary set sum_alias_date=concat(sum_year,'-',LPAD(sum_month,2,'0'),'-',LPAD(sum_day,2,'0'));