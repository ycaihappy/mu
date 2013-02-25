<?php



class CMobileValidator extends CTelephoneValidator {

	public $pattern='/^(([0+]d{2,3}-)?(0d{2,3})-)(d{7,8})(-(d{3,}))?$/';
	
	public $defaultMessage='不是一个有效的手机号码.';
}


?>