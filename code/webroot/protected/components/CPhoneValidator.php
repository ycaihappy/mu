<?php



class CPhoneValidator extends CTelephoneValidator {

	public $pattern='/((\d{11})|^((\d{7,8})|(\d{4}|\d{3})-(\d{7,8})|(\d{4}|\d{3})-(\d{7,8})-(\d{4}|\d{3}|\d{2}|\d{1})|(\d{7,8})-(\d{4}|\d{3}|\d{2}|\d{1}))$)/';
	
	public $defaultMessage='不是一个有效的电话号码.';
}


?>