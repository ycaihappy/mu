<?php
class ProductDetailWidget extends CWidget
{
    public function init()
    {
    	
    }

    public function run()
    {
        $this->render('product_detail',array('name'=>'lizhli'));
    }
}
