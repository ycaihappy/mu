<?php
class BasicSiteInfo extends CJsonModel {

	public $siteName;
	public $siteTitle;
	public $siteSubtitle;
	public $siteLogo;
	public $siteUrl;
	public $siteIcpCode;
	//-----contact method
	public $companyName;
	public $csHotline;//customer service hot line
	public $sellHotline;
	public $qq;
	public $siteMsgNum;
	public $csEmail;
	public $siteDescription;
	public $updateTime;
	protected $dataPath='data/siteInfo.json';

	public function rules()
	{
		return array(
			array('siteName, siteTitle, siteLogo, companyName,csEmail', 'required'),
			array('siteName','length','max'=>128),
			array('siteSubtitle','length','max'=>128),
			array('siteMsgNum','email','message'=>'邮箱格式不正确'),
			array('qq','numerical','message'=>'输入了除数字意外的字符'),
			array('csEmail','email','message'=>'邮箱格式不正确'),
			array('siteUrl','url','message'=>'链接地址不正确：形如：http://www.mushw.com'),
			array('updateTime','safe'),
		);
	}
}


?>