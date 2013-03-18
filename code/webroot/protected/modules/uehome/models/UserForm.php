<?php

class UserForm extends CFormModel
{
    public $user_province_id;
    public $user_city_id;
    public $user_name;
    public $user_sex;
    public $user_email;
    public $user_nickname;
    public $user_mobile_no;
    public $user_first_name;
    public $user_telephone;
    public $user_subscribe;


	/**
	 * Declares the validation rules.
	 */
	public function rules()
    {
        return array(
            #array('district,province,city', 'required'),		
            //array('user_nickname', 'required'),		
            array('user_email', 'required','message'=>'邮箱必须填写！'),	
            array('user_email', 'email','message'=>'邮箱的格式不正确！'),	
            array('user_sex', 'required','message'=>'请选择性别！'),	
            array('user_mobile_no', 'required','message'=>'手机号码必须填写！'),	
            array('user_telephone','CPhoneValidator','message'=>'电话号码格式不正确！'),	
            array('user_mobile_no','CMobileValidator','message'=>'手机号码格式不正确！'),	
            array('user_subscribe', 'safe'),		
            array('user_first_name', 'required','message'=>'姓名必须填写！'),		
            array('user_city_id', 'required','message'=>'请选择所在地区！'),		
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
        $addsql = "update mu_user set 
        user_city_id=:user_city_id,
        user_first_name=:user_first_name,
        user_nickname=:user_nickname,
        user_mobile_no=:user_mobile_no,
        user_email=:user_email,
        user_sex=:user_sex,
        user_telephone=:user_telephone,
        user_subscribe=:user_subscribe,
        user_province_id=:user_province_id
        where user_id=:user_id";

        $commd = Yii::app()->db->createCommand($addsql);

        $commd->bindValue(":user_first_name", $this->user_first_name, PDO::PARAM_STR);
        $commd->bindValue(":user_city_id", $this->user_city_id, PDO::PARAM_STR);
        $commd->bindValue(":user_province_id", $this->user_province_id, PDO::PARAM_STR);
        $commd->bindValue(":user_nickname", $this->user_nickname, PDO::PARAM_STR);
        $commd->bindValue(":user_mobile_no", $this->user_mobile_no, PDO::PARAM_STR);
        $commd->bindValue(":user_telephone", $this->user_telephone, PDO::PARAM_STR);
        $commd->bindValue(":user_email", $this->user_email, PDO::PARAM_STR);
        $commd->bindValue(":user_sex", $this->user_sex, PDO::PARAM_STR);
        $commd->bindValue(":user_subscribe", $this->user_subscribe, PDO::PARAM_STR);
        $commd->bindValue(":user_id", yii::app()->user->getID(), PDO::PARAM_STR);

        return $commd->execute();
	}

	public function register()
	{
        $addsql = "insert into mu_user(user_name,user_mobile_no,user_email)
            values(:user_name,:user_mobile_no,:user_email)";

        $commd = Yii::app()->db->createCommand($addsql);

        $commd->bindValue(":user_name", $this->art_title, PDO::PARAM_STR);
        $commd->bindValue(":user_mobile_no", $this->art_content, PDO::PARAM_STR);
        $commd->bindValue(":user_email", yii::app()->user->getID(), PDO::PARAM_STR);

        $commd->execute();

        echo json_encode(array('status'=>1,'data'=>array()));

	}
	public function attributeNames()
	{
		return array_keys(get_class_vars(get_class($this)));
	}
	public function setAttributes($values,$safeOnly=false){
		parent::setAttributes($values,$safeOnly);
	}
}
