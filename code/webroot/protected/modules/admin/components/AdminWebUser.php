<?php
class AdminWebUser extends CWebUser
{
	public $loginUrl=array('/admin/site/login');
    public function __get($name)
    {
        if ($this->hasState('__adminInfo')) {
            $user=$this->getState('__adminInfo',array());
            if (isset($user[$name])) {
                return $user[$name];
            }
        }

        return parent::__get($name);
    }

    public function login($identity, $duration=0) {
        $this->setState('__adminInfo', $identity->getUser());
        parent::login($identity, $duration);
    }
}

?>