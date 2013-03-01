<?php



class CMessageHelper  {

	
	public static function getTemplateContentVar($templateMnemonic,$isSms=false)
	{
		$model=MessageTemplate::model()->find('msg_template_mnemonic=:mnemonic',array(':mnemonic'=>$templateMnemonic));
		$contentVars=array();
		if($model)
		{
			$contentVars=self::getVars($model->msg_template_content);
		}
		return $contentVars;
	}
	public static function getVars($cotent)
	{
		$matches=array();
		if($cotent)
		{
			preg_match_all('/\{\$([\w]+)\}/', $content, $matches);
		}
		return $matches;
	}
	public static function setTemplateVarValue($values,$isSms=false,$templateMnemonic='')
	{
		$result=array();
		$model=new MessageTemplate();
		if($templateMnemonic)
		{
			$model=MessageTemplate::model()->find('msg_template_mnemonic=:mnemonic',array(':mnemonic'=>$templateMnemonic));
		    if($model)
		    {
		    	if(!$isSms)
		    	{//设置邮件标题
		    		$subjectVars=self::getVars($model->msg_template_title);
		    		$emailSubject=str_ireplace($subjectVars[0],$values,$model->msg_template_title);
		    		$result['subject']=$emailSubject;
		    	}
		    	$contentVars=self::getVars($model->msg_template_content);
		    	$messageContent=str_ireplace($contentVars[0],$values,$model->msg_template_content);
		    	$result['content']=$messageContent;
		    }
		}
		return $result;
	}
	public static function sendRegisterMobileVerifyCode($mobileNo,$verifyCode)
	{
		$smsSetting= new SiteEmailSetting ();
		$smsSetting = $smsSetting->LoadData ();
		$template=$smsSetting->registeTemplate;
		$uid=$smsSetting->uid;
		$pwd=$smsSetting->pwd;
		$smsContent=self::setTemplateVarValue(array($verifyCode),true,$template);
		$result=self::sendSms($mobileNo, $smsContent[0], $uid, $pwd);
		return $result;
	}
	public static function sendRegisterEmail($toEmail)
	{
		
	}
	public static function setPriceSms($mobileNos)
	{
		
	}
	public static function sendSms($mobno,$content,$uid,$pwd)
	{
		$client = new SoapClient("http://service2.winic.org:8003/Service.asmx?WSDL");
		$param = array('uid' => $smsSetting->uid,'pwd' => $smsSetting->pwd,'tos' => $mobno,'msg' => $content,'otime'=>'');
		$result = $client->__soapCall('SendMessages',array('parameters' => $param));
		return $result=='000'?true:false;
	}
}


?>