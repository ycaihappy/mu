<?php

class RecentlyUncheckSupply extends CWidget {

	private $recentlyUncheckSupply=array();
	public function init()
	{
		$this->recentlyUncheckSupply=Product::model()->recentlyUncheckSupply()->findAll();
	}
	public function run()
	{
		$this->render('recentlyUncheckSupply',array('data'=>$this->recentlyUncheckSupply));
	}
}


?>