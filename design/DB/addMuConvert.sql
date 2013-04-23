CREATE TABLE `mu_convert` (
	`co_id` INT(10) NOT NULL AUTO_INCREMENT,
	`co_name` VARCHAR(50) NULL DEFAULT 'USD',
	`co_unit` FLOAT NULL DEFAULT '0.00',
	`co_cur_price` FLOAT NULL DEFAULT '0.00',
	`co_sell_price` FLOAT NULL DEFAULT '0.00',
	`co_cur_rate_buy_price` FLOAT NULL DEFAULT '0.00',
	`co_cur_cash_buy_price` FLOAT NULL DEFAULT '0.00',
	`co_added_time` DATETIME NULL,
	PRIMARY KEY (`co_id`)
)
COMMENT='Õ‚ª„≈∆º€'
COLLATE='utf8_general_ci'
ENGINE=InnoDB
ROW_FORMAT=DEFAULT;
