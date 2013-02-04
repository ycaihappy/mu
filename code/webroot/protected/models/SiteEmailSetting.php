<?php
class SiteEmailSetting extends CJsonModel {

	public $sendMethod;
	public $smtpServer;
	public $smtpPort;
	public $smtpRequireAuth;
	public $sendorEmail;
	public $sendorName;
	public $smtpUsername;
	public $smtpAuthMethod;
	public $smtpPassword;
	public $testEmail;
	protected $dataPath='data/smtpsetting.json';
	
	public function rules(){
		
		return array(
			array('smtpServer,smtpPort,sendorEmail,sendorName','required'),
			array('sendorEmail','email','message'=>'发送邮箱格式不正确'),
			array('smtpPort','numerical','message'=>'端口必须是数字'),
		);
		
	}
	
}


?>