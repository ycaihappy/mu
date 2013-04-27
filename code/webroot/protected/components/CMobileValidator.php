<?php



class CMobileValidator extends CTelephoneValidator {

	public $pattern='/^13[0-9]{1}[0-9]{8}$|15[015689]{1}[0-9]{8}$|18[0-9]{9}$/';
	
	public $defaultMessage='不是一个有效的手机号码.';
}


?>
