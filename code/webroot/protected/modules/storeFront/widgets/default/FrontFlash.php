<?php



class FrontFlash extends CWidget {


	public function run()
	{
		$flash=$this->getController()->storeFrontConfig['flash'];
		if($this->getController()->user->user_template)
			$imgurl='images/storeFront/'.$this->getController()->user->user_template.'/';
		else 
			$imgurl='images/storeFront/default/';
		$flashImg='';
		if($flash)
		{
			$flashImg=array();
			foreach ($flash as $image)
			{
				if(file_exists('images/enterprise/'.$image))
				{
					$flashImg[]='http://local.mushw.com/images/enterprise/'.$image;
				}
			}
			$flashImg=implode('|',$flashImg);
		}
		$this->render('frontFlash',array('flash'=>$flashImg,'imgurl'=>$imgurl));
	}
}


?>