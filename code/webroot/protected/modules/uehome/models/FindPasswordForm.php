<?php
class FindPasswordForm extends CFormModel
{
	public $email;
    public $verifyCode;
	/**
	 * Declares the validation rules.
	 */
	public function rules()
    {
        return array(
            array('email','required','message'=>'email不允许为空'),
            array('email','email','message'=>'email格式不正确'),
            array('verifyCode', 'captcha','message'=>'验证码输入不正确', 'allowEmpty'=>!extension_loaded('gd')),
			array('verifyCode', 'required','message'=>'验证码不能为空')
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
#        $addsql = "update mu_user set user_pwd=:user_pwd where user_id=:user_id and user_pwd=:old_user_pwd";
#
#        $commd = Yii::app()->db->createCommand($addsql);
#
#        $commd->bindValue(":user_pwd", md5($this->new_pwd), PDO::PARAM_STR);
#        $commd->bindValue(":old_user_pwd", md5($this->old_pwd), PDO::PARAM_STR);
#        $commd->bindValue(":user_id", yii::app()->user->getID(), PDO::PARAM_STR);
#
#        $commd->execute();
	}
}
