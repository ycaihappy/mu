<?php
class BasicSiteInfo extends CJsonModel {

	public $siteName;
	public $siteMetaTitle;
	public $siteMetaKeyword;
	public $siteMetaDescription;
	public $siteLogo;
	public $siteUrl;
	public $location;
	public $siteIcpCode;
	//-----contact method
	public $companyName;
	public $csHotline1;//customer service hot line
	public $csHotline2;//customer service hot line
	public $csHotline3;//customer service hot line
	public $csHotline4;//customer service hot line
	public $advisoryHotline;//咨询热线
	public $fax;
	public $zipcode;
	public $sellHotline;
	public $qq;
	public $siteMsgNum;
	public $csEmail;
	public $siteDescription;
	public $updateTime;
	public $hotSearchKeywords;
	public $convertCollectionUrl;
	protected $dataPath='data/siteInfo.json';

	public function rules()
	{
		return array(
			array('siteName, siteMetaTitle,siteMetaKeyword,siteMetaDescription, siteLogo, companyName,csEmail', 'required','message'=>'信息不能留空'),
			array('siteName','length','max'=>128),
			array('siteMetaTitle','length','max'=>255),
			array('location','length','max'=>255),
			array('siteMetaDescription','length','max'=>255),
			array('zipcode','length','max'=>10),
			array('hotSearchKeywords','length','max'=>255,'message'=>'不能超过255个字符'),
			array('siteMetaTitle','length','max'=>255),
			array('siteMsgNum,csEmail','email','message'=>'邮箱格式不正确'),
			array('qq','numerical','message'=>'输入了除数字意外的字符'),
			array('csEmail','email','message'=>'邮箱格式不正确'),
			array('convertCollectionUrl','url','message'=>'链接地址不正确：形如：http://forex.money.hexun.com/rest1/RMBQuotePrice/RMBQuotePrice.aspx'),
			array('siteUrl','url','message'=>'链接地址不正确：形如：http://www.mushw.com'),
			array('csHotline1,csHotline2,csHotline3,csHotline4,advisoryHotline,fax,sellHotline','CPhoneValidator'),
			array('updateTime','safe'),
		);
	}
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'csHotline1' => '客户热线',
			'csHotline2' => '客户热线',
			'csHotline3' => '客户热线',
			'csHotline4' => '客户热线',
			'advisoryHotline' => '咨询电话',
		    'fax' => '传真',
			'sellHotline' => '销售热线',
		);
	}
}


?>