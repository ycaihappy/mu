<?php



class FrontHeader extends CWidget {

	public function run()
	{
		$logo='';
		if($this->getController()->company->ent_logo)
		{
			$logo='images/enterprise/'.$this->getController()->company->ent_logo;
		}
		$menu=$this->getController()->storeFrontConfig['menu'];
		$company=$this->getController()->company;
		$this->render('frontHeader',array('menu'=>$menu,'logo'=>$logo,'company'=>$company));
	}
}


?>