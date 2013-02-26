<?php



class MessageForm extends CFormModel {

	public $sub;
	public $content;
	public $fromContact;
	public $fromEmail;
	public $fromCompany;
	public $fromTelephone;
	public $verifyCode;
	
	public function rules()
	{
		$guest=Yii::app()->user->isGuest;
		$rules=array(
			array('sub,content','required'),
			array('sub','length','max'=>'218'),
			array('fromEmail','email'),
			array('fromCompany','length','max'=>128),
			array('fromContact','length','min'=>2),
			array('fromTelephone','CPhoneValidator'),
			array('verifyCode', 'required','message'=>'验证码不能为空'),
			array('verifyCode', 'captcha','message'=>'验证码输入不正确', 'allowEmpty'=>!extension_loaded('gd')), 
		);
		if(!$guest)
		{
			$rules+=array(
				array('fromCompany','required'),
				array('fromEmail','required'),
				array('fromContact','required'),
				array('fromTelephone','required'),
			);
		}
		return $rules;
	}
}


?>