<?php

class EnterpriseForm extends CFormModel
{
	public $ent_name;
	public $ent_type;
	public $ent_city;
	public $ent_business_scope;
	public $ent_business_model;
	public $ent_zipcode;
	public $ent_website;
	public $ent_location;
	public $ent_introduce;
	public $ent_registered_capital;
	public $ent_chief;
	public $ent_logo;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
    {
        return array(
        array('ent_logo', 'file', 'allowEmpty'=>true,
            'types'=>'jpg, jpeg, gif, png',
            'maxSize'=>1024 * 1024 * 1, // 1MB
            'tooLarge'=>'上传文件超过 1MB，无法上传。',
        ),
            array('ent_name', 'required','message'=>'企业名称必须填写！'),	
            array('ent_business_model', 'required','message'=>'经营类别必须选择！'),	
            array('ent_business_scope', 'required','message'=>'经营范围必须填写！'),	
            array('ent_type', 'required','message'=>'经营类别必须选择！'),	
            array('ent_city', 'required','message'=>'经营地区必须选择！'),
            array('ent_location', 'required','message'=>'详细地址必须填写！'),	
            #array('ent_zipcode', 'numerical','message'=>'邮编必须是数字串'),
            array('ent_registered_capital', 'numerical', 'integerOnly'=>true,'message'=>'注册资金必须是数字串'),
            array('ent_registered_capital', 'required','message'=>'注册资金不允许为空'),
            #array('ent_website', 'url', 'message'=>'必须是正常的url!'),		
            array('ent_name,ent_logo,ent_business_scope,ent_registered_capital,ent_zipcode,ent_website,ent_location,ent_introduce,ent_chief', 'safe'),		
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
		);
	}

	public function update()
	{
        $addsql = "update mu_user_enterprise set ent_logo=:ent_logo,ent_name=:ent_name,ent_type=:ent_type,ent_business_model=:ent_business_model,
            ent_city=:ent_city,ent_business_scope=:ent_business_scope,ent_zipcode=:ent_zipcode,ent_website=:ent_website,ent_location=:ent_location,
            ent_introduce=:ent_introduce,ent_registered_capital=:ent_registered_capital,ent_chief=:ent_chief
            where ent_user_id=:ent_user_id";


        $commd = Yii::app()->db->createCommand($addsql);

        $commd->bindValue(":ent_name", $this->ent_name, PDO::PARAM_STR);
        $commd->bindValue(":ent_logo", $this->ent_logo, PDO::PARAM_STR);
        $commd->bindValue(":ent_type", $this->ent_type, PDO::PARAM_STR);
        $commd->bindValue(":ent_city", $this->ent_city, PDO::PARAM_STR);
        $commd->bindValue(":ent_business_scope", $this->ent_business_scope, PDO::PARAM_STR);
        $commd->bindValue(":ent_business_model", $this->ent_business_model, PDO::PARAM_STR);
        $commd->bindValue(":ent_zipcode", $this->ent_zipcode, PDO::PARAM_STR);
        $commd->bindValue(":ent_website", $this->ent_website, PDO::PARAM_STR);
        $commd->bindValue(":ent_location", $this->ent_location, PDO::PARAM_STR);
        $commd->bindValue(":ent_introduce", $this->ent_introduce, PDO::PARAM_STR);
        $commd->bindValue(":ent_registered_capital", $this->ent_registered_capital, PDO::PARAM_STR);
        $commd->bindValue(":ent_chief", $this->ent_chief, PDO::PARAM_STR);
        $commd->bindValue(":ent_user_id", yii::app()->user->getId(), PDO::PARAM_STR);
        $commd->execute();
	}
}
