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
	public $entId;
	public $username;
	public $userStatus;//1为正常，2为未通过，3为待审核
	public function authenticate()
	{
		$this->errorCode=self::ERROR_PASSWORD_INVALID;
		$criteria=new CDbCriteria;
		$criteria->select='user_id,user_pwd,user_name,user_status,user_template';  // 只选择 'title' 列
		$criteria->condition='user_name=:username and user_type<>0';
		$criteria->with=array('enterprise'=>array('select'=>'ent_id,ent_status'));
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
				$this->entId=$user->enterprise->ent_id;
				if($user->user_status==1 && $user->enterprise->ent_status==1)
				{
					$this->userStatus=1;
				}
				elseif($user->user_status==33 && $user->enterprise->ent_status==33)
				{
					$this->userStatus=3; 
				}
				else {
					$this->userStatus=2;
				}
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
		return $this->username;
	}
	public function getEntId()
	{
		return $this->entId;
	}
	public function setUser(CActiveRecord $user)
	{
		$this->user=$user->attributes;
	}
	public function getUserStatus()
	{
		return $this->userStatus;
	}
}