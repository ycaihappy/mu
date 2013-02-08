<?php

class UserForm extends CFormModel
{
	public $district;
    public $province;
    public $city;


	/**
	 * Declares the validation rules.
	 */
	public function rules()
    {
        return array(
            array('district,province,city', 'required'),		
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

	public function draft()
	{
        $addsql = "insert into mu_user(user_name,user_mobile_no,user_email)
            values(:user_name,:user_mobile_no,:user_email)";

        $commd = Yii::app()->db->createCommand($addsql);

        $commd->bindValue(":user_name", $this->art_title, PDO::PARAM_STR);
        $commd->bindValue(":user_mobile_no", $this->art_content, PDO::PARAM_STR);
        $commd->bindValue(":user_email", yii::app()->user->getID(), PDO::PARAM_STR);

        $commd->execute();
	}
}
