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
			array('content','required','message'=>'内容不能为空'),
			array('sub','required','message'=>'标题不能为空'),
			array('sub','length','max'=>'218'),
			array('fromEmail','email'),
			array('fromCompany','length','max'=>128),
			array('fromContact','length','min'=>2),
			array('fromTelephone','CPhoneValidator'),
			array('verifyCode', 'required','message'=>'验证码不能为空'),
			array('verifyCode', 'captcha','message'=>'验证码输入不正确', 'allowEmpty'=>!extension_loaded('gd')), 
		);
		if($guest)
		{
			$rules=array_merge($rules,array(
				array('fromCompany','required','message'=>'企业名称不能为空'),
				array('fromContact','required','message'=>'联系人不能为空'),
				array('fromTelephone','required','message'=>'联系电话不能为空'),
			));
		}
		return $rules;
	}
}


?>