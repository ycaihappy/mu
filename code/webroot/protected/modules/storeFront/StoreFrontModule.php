<?php

class StoreFrontModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'storeFront.models.*',
			'storeFront.components.*',
			'storeFront.widgets.*',
		));
		Yii::app()->setComponents(array(
			'fileCache'=>array(
				'class'=>'CFileCache',
				'cachePath'=>'cache/storeFrontConfigCache',
				'directoryLevel'=>2,
			),
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
}
