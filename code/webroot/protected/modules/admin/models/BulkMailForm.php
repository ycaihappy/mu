<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class BulkMailForm extends CFormModel
{
	public $province;
	
	//public $entBusinessModel;
	
	public $userGroup;
	
	public $sendType;
	
	public $mailSubject;
	
	public $mailContent;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			array('sendType', 'required','message'=>'发送方式必须选择'),
			array('mailContent', 'required','message'=>'邮件内容不能为空'),
			array('mailSubject,province,userGroup', 'safe'),
		);
	}

	

}
