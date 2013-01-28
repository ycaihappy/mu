<?php

class RecentlyUncheckBuy extends CWidget {

	private $recentlyUncheckBuy=array();
	public function init()
	{
		$this->recentlyUncheckBuy=Product::model()->recentlyUncheckBuy()->findAll();
	}
	public function run()
	{
		$this->render('recentlyUncheckBuy',array('data'=>$this->recentlyUncheckBuy));
	}
}


?>