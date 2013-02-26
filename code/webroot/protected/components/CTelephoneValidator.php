<?php



class CTelephoneValidator extends CValidator {


	public $pattern='/^(([0+]d{2,3}-)?(0d{2,3})-)?(d{7,8})(-(d{3,}))?$/';
	
	public $allowEmpty=true;
	
	protected function validateAttribute($object,$attribute)
	{
		$value=$object->$attribute;
		if($this->allowEmpty && $this->isEmpty($value))
			return;
		if(($value=$this->validateValue($value))!==false)
			$object->$attribute=$value;
		else
		{
			$message=$this->message!==null?$this->message:Yii::t('yii','{attribute} 不是一个有效的电话号码.');
			$this->addError($object,$attribute,$message);
		}
	}
	
	public function validateValue($value)
	{
		if(is_string($value) && strlen($value)<2000)  // make sure the length is limited to avoid DOS attacks
		{
			if(preg_match($this->pattern,$value))
				return $value;
		}
		return false;
	}
	
	public function clientValidateAttribute($object,$attribute)
	{
		$message=$this->message!==null ? $this->message : Yii::t('yii','{attribute} 不是一个有效的电话号码.');
		$message=strtr($message, array(
			'{attribute}'=>$object->getAttributeLabel($attribute),
		));

		$pattern=$this->pattern;

		$js="
if(!value.match($pattern)) {
	messages.push(".CJSON::encode($message).");
}
";

		if($this->allowEmpty)
		{
			$js="
if($.trim(value)!='') {
	$js
}
";
		}

		return $js;
	}
	
}


?>