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
			array('sendMethod,smtpServer,smtpPort,sendorEmail,sendorName,smtpUsername,smtpPassword','required'),
			array('sendorEmail','email'),
			array('$smtpPort','number'),
		);
		
	}
	
}


?>