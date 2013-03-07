<?php

class PasswordForm extends CFormModel
{
	public $old_pwd;
    public $new_pwd;
    public $new_repwd;


	/**
	 * Declares the validation rules.
	 */
	public function rules()
    {
        return array(
        array('old_pwd','safe'),
        array('new_pwd','safe'),
        array('new_repwd','safe'),
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

	public function save()
	{
        $addsql = "update mu_user set user_pwd=:user_pwd where user_id=:user_id";

        $commd = Yii::app()->db->createCommand($addsql);

        $commd->bindValue(":user_pwd", md5($this->new_pwd), PDO::PARAM_STR);
        $commd->bindValue(":user_id", yii::app()->user->getID(), PDO::PARAM_STR);

        $commd->execute();
	}
}
