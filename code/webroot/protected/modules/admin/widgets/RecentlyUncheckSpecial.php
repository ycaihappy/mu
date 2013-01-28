<?php

class RecentlyUncheckSpecial extends CWidget {

	private $recentlyUncheckSpecial=array();
	public function init()
	{
		$this->recentlyUncheckSpecial=Product::model()->recenltyUncheckSpecial()->findAll();
	}
	public function run()
	{
		$this->render('recentlyUncheckSpecial',array('data'=>$this->recentlyUncheckSpecial));
	}
}


?>