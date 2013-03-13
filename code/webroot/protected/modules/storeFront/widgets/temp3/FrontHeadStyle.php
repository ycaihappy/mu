<?php
class FrontHeadStyle extends CWidget {

	
	public function init()
	{
		
	}
	public function run()
	{
		$template=$this->getController()->user->user_template;
		$company=$this->getController()->company;
		$config=$this->getController()->storeFrontConfig;
		$this->render('frontHeadStyle',
		array(
			  'imgurl'=>"/images/storeFront/{$template}/",
			  'company'=>$company,
			  'config'=>$config,
		));
	}

}


?>