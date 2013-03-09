<?php
class CommonHeaderWidget extends CWidget
{
    public function init()
    {
    }

    public function run()
    {
        $keywords = '';
        if ( isset($_REQUEST['product_id']) ) 
        {
            $product_detail = Product::model()->findByPk($_GET['product_id']);
            $keywords = $product_detail->product_keyword;
        }

        $this->render('common_header',array('keywords'=>$keywords));
    }
}
