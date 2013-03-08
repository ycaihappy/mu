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
        array('old_pwd','required','message'=>'旧密码不允许为空'),
        array('new_pwd','required','message'=>'新密码不允许为空'),
        array('new_repwd', 'compare', 'compareAttribute'=>'new_pwd','message'=>'新密码和确认密码必须一致'),
      
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
        $addsql = "update mu_user set user_pwd=:user_pwd where user_id=:user_id and user_pwd=:old_user_pwd";

        $commd = Yii::app()->db->createCommand($addsql);

        $commd->bindValue(":user_pwd", md5($this->new_pwd), PDO::PARAM_STR);
        $commd->bindValue(":old_user_pwd", md5($this->old_pwd), PDO::PARAM_STR);
        $commd->bindValue(":user_id", yii::app()->user->getID(), PDO::PARAM_STR);

        $commd->execute();
	}
}
