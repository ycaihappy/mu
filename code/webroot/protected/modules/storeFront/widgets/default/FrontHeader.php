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
		if($menu)
		{
			foreach ($menu as &$menuone)
			{
				$menuone['menu_href']=$this->getController()->createUrl($menuone['menu_link'],array('username'=>$this->getController()->user->user_name));
			}
		}
		$company=$this->getController()->company;
		$data=compact('action','menu','logo','company');
		$this->render('frontHeader',$data);
	}
}


?>