<?php
class FrontBottom extends CWidget {

	public function run()
	{
		$company=$this->getController()->company;
		$telephone=$this->getController()->user->user_telephone;
		$this->render('frontBottom',array('company'=>$company,'telephone'=>$telephone));
	}
}


?>