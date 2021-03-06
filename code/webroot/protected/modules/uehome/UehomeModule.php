<?php

class UehomeModule extends CWebModule
{
	public $allowedAction=array(
                        'user/login',
						'user/captcha',
						'user/register',
						'user/getCity',
						'user/registeruser',
						'user/ajaxLogin',
						'user/findPwd',
						'user/findPwdSucc',
			);
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

        parent::init();

		// import the module-level models and components
		$this->setImport(array(
			'uehome.models.*',
			#'uehome.components.*',
			'uehome.widgets.*',
		));
		Yii::app()->setComponents(array(
                   'user'=>array(
                           'class'=>'WebUser',
                           'loginUrl'=>Yii::app()->createUrl('uehome/user/login'),
		),
		), false);
	}

	public function beforeControllerAction($controller, $action)
	{
		//return parent::beforeControllerAction($controller, $action);
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			$route=$controller->id.'/'.$action->id;
			if(Yii::app()->user->isGuest && !in_array($route,$this->allowedAction))
				Yii::app()->user->loginRequired();
			else
			return true;
		}
		else
			return false;
	}
}
