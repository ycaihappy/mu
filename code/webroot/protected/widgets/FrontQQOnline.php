<?php



class FrontQQOnline extends CWidget {


	public function run()
	{
		$onlines=OnlineSupport::model()->getOwnOnline($this->getController()->company->ent_id)->findAll();
		$companyName=$this->getController()->company->ent_name;
		$this->render('frontQQOnline',array('onlines'=>$onlines,'companyName'=>$companyName));
	}
}


?>