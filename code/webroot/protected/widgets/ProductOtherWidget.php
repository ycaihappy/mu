<?php
class ProductOtherWidget extends CWidget
{
    public $ent_info;
    public function init()
    {
        $product_info = Product::model()->find("product_id=:product_id", array('product_id'=>$_REQUEST['product_id']));
    	
        $this->ent_info = User::model()->with(array('enterprise'=>array('select'=>'*')))->find('user_id=:user_id', array('user_id'=>$product_info->product_user_id));
    }

    public function run()
    {
        $this->render('product_other',array('data'=>$this->ent_info));
    }
}
