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
	public static function getVars($content)
	{
		$matches=array();
		if($content)
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
	public static function sendFindPasswordEmail($toEmail,$newPwd)
	{
		$emailSetting=new SiteEmailSetting();
		$emailSetting->LoadData();
		$result=self::setTemplateVarValue(array($newPwd),false,'findpassword');
		return self::sendEmail($emailSetting->sendorEmail,$result['subject'],$toEmail,$result['content']);
	}
	public static function sendEmail($fromEmail,$subject,$toEmail,$body)
	{
		$message = new YiiMailMessage;
	    $message->From = $fromEmail;    // 送信人  
	    $message->addTo($toEmail);               // 收信人  
	    $message->setSubject($subject);  
	    $message->message->setBody(  
	        $body, // 传递到模板文件中的参数  
	        'text/html',                 // 邮件格式  
	        'utf-8'                      // 邮件编码  
	        );  
	      
	    $result['status']=1;
	    if(Yii::app()->mail->send($message)){  
	        $result['message']='测试邮件发送成功！';
	    } 
	    else {
	    	$result['status']=0;
	    	$result['message']='测试邮件发送失败！请检查邮件配置是否正确';
	    }
	    return $result;
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