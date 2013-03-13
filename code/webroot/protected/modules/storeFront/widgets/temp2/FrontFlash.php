<?php



class FrontFlash extends CWidget {


	public function run()
	{
		$flash=$this->getController()->storeFrontConfig['flash'];
		if($this->getController()->user->user_template)
			$imgurl='/images/storeFront/'.$this->getController()->user->user_template.'/';
		else 
			$imgurl='/images/storeFront/default/';
		$flashImg='';
		if($flash)
		{
			$flashImg=implode('|',$flash);
		}
		$this->render('frontFlash',array('flash'=>$flashImg,'imgurl'=>$imgurl));
	}
}


?>