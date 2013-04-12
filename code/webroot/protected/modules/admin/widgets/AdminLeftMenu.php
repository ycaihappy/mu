<?php

class AdminLeftMenu extends CWidget {

	public function init()
	{
		
	}
	public function run(){
		$articleType=Term::getTermsByGroupId(10,true,null,'',false);
		$relativeReType=Term::getTermsByGroupId(20,true,null,'',false);
		$productType=Term::getTermsByGroupId(14,true,null,'',false);
		if($productType)
		{
			$productMenuType=array();
			foreach ($productType as $key=>$type)
			{
				$tempType=array();
				$tempType['name']=$type;
				$tempType['subTypes']=Term::getTermsByGroupId(14,false,$key,'',false);
				$productMenuType[$key]=$tempType;
			}
		}
		$data=compact('articleType','productMenuType','relativeReType');
		$this->render('adminLeftMenu',$data);
	}

}


?>