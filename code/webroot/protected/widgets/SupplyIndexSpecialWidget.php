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

        $cur_supply = Supply::model()->find('supply_id=:supply_id', array(':supply_id'=>$_REQUEST['supply_id']));
        $criteria=new CDbCriteria;
        $criteria->order='supply_id DESC';
        $criteria->addCondition('supply_category_id='.$cur_supply->supply_category_id);
        $criteria->limit = 8;

        $supply_category_list =Supply::model()->findAll($criteria);
		$data=compact('topSpecial','supply_category_list');
		$this->render('supply_index_special',$data);
	}
}


?>
