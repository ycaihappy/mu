<?php
class BasicSiteInfo extends CFormModel {

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
	private $dataPath='data/siteInfo.json';

	public function rules()
	{
		return array(
			array('siteName, siteTitle, siteLogo, companyName,csEmail', 'required'),
			array('siteName','length','max'=>128),
			array('siteSubtitle','length','max'=>128),
			array('updateTime','safe'),
		);
	}
}


?>