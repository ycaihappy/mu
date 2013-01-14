<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
    public $user;
	public $_id;
	public $username;
	public function authenticate()
	{   
        $this->errorCode=self::ERROR_PASSWORD_INVALID;
        $criteria=new CDbCriteria;
		$criteria->select='user_id,user_pwd,user_name';  // 只选择 'title' 列
		$criteria->condition='user_name=:username';
		$criteria->params=array(':username'=>$this->username);
        $user=User::model()->find($criteria);
		if ($user)
        {
        	$encrypted_passwd=trim($user->user_pwd);
        	$inputpassword = trim(md5($this->password));
			if($inputpassword===$encrypted_passwd)
			{
				$this->errorCode=self::ERROR_NONE;
            	$this->setUser($user);
				$this->_id=$user->user_id;
				$this->username=$user->user_name;
			}
			else
			{
				$this->errorCode=self::ERROR_PASSWORD_INVALID;

			}
        }
        else
        {
        	$this->errorCode=self::ERROR_USERNAME_INVALID;
        }

        unset($user);
        return !$this->errorCode;

	}
    public function getUser()
    {
        return $this->user;
    }

    public function getId()
        {
                return $this->_id;
        }

    public function getUserName()
        {
                return $this->user_name;
        }

    public function setUser(CActiveRecord $user)
    {
        $this->user=$user->attributes;
    }
}