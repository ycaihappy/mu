<?php

class DefaultController extends Controller
{
	public $layout='//layouts/storeFront/default/main';
	public function init()
	{
		Yii::import('storeFront.widgets.default.*');
	}
	public function actionIndex()
	{
		$this->render('index');
	}
	/**
	 * @return string the controller ID that is prefixed with the module ID (if any).
	 */
	public function getUniqueId()
	{
		//可以在此处添加根据用户选择的不同模板的路径
		return $this->getModule() ? $this->getModule()->getId().'/'.$this->getId() : $this->getId();
	}
}