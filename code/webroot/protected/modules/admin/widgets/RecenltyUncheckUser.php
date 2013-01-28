<?php
class RecenltyUncheckUser extends CWidget {

	private $recentlyUncheckUser=array();
	public function init()
	{
		$this->recentlyUncheckUser=User::model()->recenltyUncheckUser()->findAll();
	}
	public function  run()
	{
		$this->render('recentlyUncheckUser',array('data'=>$this->recentlyUncheckUser));
	}
}


?>