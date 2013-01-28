<?php
class ProductDetailWidget extends CWidget
{
    public function init()
    {
    	
    }

    public function run()
    {
        $product_detail = Product::model()->findByPk($_GET['product_id']);
        $this->render('product_detail',array('product_detail'=>$product_detail));
    }
}
