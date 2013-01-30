<?php
class AdminHeader extends CWidget {

	public $type=1;
	public function init()
	{
		$this->type=Yii::app()->request->getParam('type',1);
	}
	public function run(){
		$this->render('adminHeader',array('type'=>$this->type));
	}
}


?>