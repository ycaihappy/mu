<?php



class FrontHeader extends CWidget {

	public function run()
	{
		$logo='';
		if($this->getController()->company->ent_logo)
		{
			$logo='images/enterprise/'.$this->getController()->company->ent_logo;
		}
		$action='/'.$this->getController()->getModule()->getId().'/'.$this->getController()->getId().'/'.$this->getController()->getAction()->getId();
		$menu=$this->getController()->storeFrontConfig['menu'];
		$company=$this->getController()->company;
		$data=compact('action','menu','log','company');
		$this->render('frontHeader',$data);
	}
}


?>