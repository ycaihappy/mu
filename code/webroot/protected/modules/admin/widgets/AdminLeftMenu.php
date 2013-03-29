<?php

class AdminLeftMenu extends CWidget {

	public function init()
	{
		
	}
	public function run(){
		$articleType=Term::getTermsByGroupId(10,true,null,'',false);
		$data=compact('articleType');
		$this->render('adminLeftMenu',$data);
	}

}


?>