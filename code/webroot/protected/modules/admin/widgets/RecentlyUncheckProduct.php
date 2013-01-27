<?php

class RecentlyUncheckProduct extends CWidget {

	private $recentlyUncheckProduct=array();
	public function init()
	{
		$this->recentlyUncheckProduct=Product::model()->recenltyUncheckProduct()->findAll();
	}
	public function run()
	{
		$this->render('recentlyUncheckProduct',array('data'=>$this->recentlyUncheckProduct));
	}
}


?>