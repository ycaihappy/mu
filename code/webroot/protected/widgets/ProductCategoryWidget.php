<?php
class ProductCategoryWidget extends CWidget
{

	public function run()
	{
        $cur_supply = Product::model()->find('product_id=:product_id', array(':product_id'=>$_REQUEST['product_id']));
        $criteria=new CDbCriteria;
        $criteria->order='product_id DESC';
        $criteria->addCondition('product_type_id='.$cur_supply->product_type_id);
        $criteria->limit = 8;

        $product_category_list = Product::model()->findAll($criteria);
		$this->render('product_category',array('data'=>$product_category_list));
	}
}
