<?php
class WebUser extends CWebUser
{
	private $_entId;
    public function __get($name)
    {
        if ($this->hasState('__userInfo')) {
            $user=$this->getState('__userInfo',array());
            if (isset($user[$name])) {
                return $user[$name];
            }
        }

        return parent::__get($name);
    }

    public function login($identity, $duration=0) {
        $this->setState('__userInfo', $identity->getUser());
        $this->setState('__entId', $identity->getEntId());
        $this->setState('__userStatus', $identity->getUserStatus());
        parent::login($identity, $duration);
    }
	/**
	 * @param string $value the URL that the user should be redirected to after login.
	 */
	public function setReturnUrl($value)
	{
		if(strpos($value,'/')===0)
			$value=Yii::app()->request->getHostInfo().$value;
		$this->setState('__returnUrl',$value);
	}
	public function getEntId()
	{
		return $this->getState('__entId');
	}
	public function getUserStatus()
	{
		return $this->getState('__userStatus');
	}
	
}

?>