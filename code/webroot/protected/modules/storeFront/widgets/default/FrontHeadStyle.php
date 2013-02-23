<?php
class FrontHeadStyle extends CWidget {

	public function init()
	{
		
	}
	public function run()
	{
		$this->render('frontHeadStyle',array('imageurl'=>'images/storeFront/default/'));
	}

}


?>