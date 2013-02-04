<?php

class UehomeModule extends CWebModule
{
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
							'stateKeyPrefix'=>'uehome',
                           'loginUrl'=>Yii::app()->createUrl('uehome/user/login'),
		),
		), false);
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			$route=$controller->id.'/'.$action->id;
			$publicPages=array(
                        'user/login',
						'user/captcha',
			);
			if(Yii::app()->user->isGuest && !in_array($route,$publicPages))
				Yii::app()->user->loginRequired();
			else
			return true;
		}
		else
			return false;
	}
}
