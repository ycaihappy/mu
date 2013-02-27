<?php

class UserForm extends CFormModel
{
    public $user_province_id;
    public $user_city_id;
    public $user_name;
    public $user_email;
    public $user_nickname;
    public $user_mobile_no;
    public $user_subscribe;


	/**
	 * Declares the validation rules.
	 */
	public function rules()
    {
        return array(
            #array('district,province,city', 'required'),		
            array('user_nickname', 'required'),		
            array('user_email', 'required'),		
            array('user_mobile_no', 'required'),		
            array('user_subscribe', 'required'),		
            array('user_name', 'required'),		
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
        $addsql = "update mu_user set user_name=:user_name,user_nickname=:user_nickname,user_mobile_no=:user_mobile_no,user_email=:user_email,user_subscribe=:user_subscribe where user_id=:user_id";

        $commd = Yii::app()->db->createCommand($addsql);

        $commd->bindValue(":user_name", $this->user_name, PDO::PARAM_STR);
        $commd->bindValue(":user_nickname", $this->user_nickname, PDO::PARAM_STR);
        $commd->bindValue(":user_mobile_no", $this->user_mobile_no, PDO::PARAM_STR);
        $commd->bindValue(":user_email", $this->user_email, PDO::PARAM_STR);
        $commd->bindValue(":user_subscribe", $this->user_subscribe, PDO::PARAM_STR);
        $commd->bindValue(":user_id", yii::app()->user->getID(), PDO::PARAM_STR);

        $commd->execute();
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
}
