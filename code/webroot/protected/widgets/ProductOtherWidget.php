<?php
class ProductOtherWidget extends CWidget
{
    public function init()
    {
    	
    }

    public function run()
    {
        $this->render('product_other',array('name'=>'lizhli'));
    }
}
