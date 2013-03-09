<?php
class ProductDetailWidget extends CWidget
{
    public function init()
    {
    	
    }

    public function run()
    {
        $product_detail = Product::model()->findByPk($_GET['product_id']);
        $ent_info = User::model()->with(array('enterprise'=>array('select'=>'*')))->find('user_id=:user_id', array('user_id'=>$product_detail->product_user_id));
        $city = City::getCityList();
        $this->render('product_detail',array('product_detail'=>$product_detail,'ent_info'=>$ent_info, 'city'=>$city));
    }
}
