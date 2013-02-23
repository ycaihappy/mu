<?php
class FrontTop extends CWidget {


	public function run()
	{
		$this->render('frontTop',array('build'=>1));
	}
}


?>