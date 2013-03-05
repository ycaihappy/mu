<?php



class CMobileValidator extends CTelephoneValidator {

	public $pattern='/^13[0-9]{1}[0-9]{8}$|15[0189]{1}[0-9]{8}$|189[0-9]{8}$/';
	
	public $defaultMessage='不是一个有效的手机号码.';
}


?>