<?php
class PriceBodyWidget extends CWidget
{
    public $type;

    public function run()
    {
    	$price01 = Article::model()->PriceMaterialList()->findAll();
    	$price02 = Article::model()->PriceSummaryList()->findAll();
        $this->render('price_body',array('type'=>$this->type,'data01'=>$price01,'data02'=>$price02));
    }
}
