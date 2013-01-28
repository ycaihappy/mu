<?php
class RecenltyUncheckCase extends CWidget {

	private $recentlyUncheckCase=array();
	public function init()
	{
		$this->recentlyUncheckCase=User::model()->recentlyUncheckCase()->findAll();
	}
	public function  run()
	{
		$this->render('recentlyUncheckCase',array('data'=>$this->recentlyUncheckCase));
	}
}


?>