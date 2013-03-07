<?php



class SupplyIndexSpecialWidget extends CWidget {

	public function run(){
		$topSpecial=Product::model()->topSpecial()->findAll();
		if($topSpecial)
		{
			foreach ($topSpecial as &$special)
			{
				$special->product_id=$this->getController()->createUrl('/product/view',array('product_id'=>$special->product_id));
			}
		}
		$data=compact('topSpecial');
		$this->render();
	}
}


?>