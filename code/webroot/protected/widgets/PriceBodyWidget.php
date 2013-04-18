<?php
class PriceBodyWidget extends CWidget
{
    public $type;

    public function run()
    {
    	$price01 = Article::model()->PriceMaterialList()->findAll();
    	$price02 = Article::model()->PriceSummaryList()->findAll();
    	$price03 = Article::model()->PriceDayList()->findAll();
    	$price04 = Article::model()->PriceWeekList()->findAll();
        $this->render('price_body',array('type'=>$this->type,'data01'=>$price01,'data02'=>$price02,'data03'=>$price03,'data04'=>$price04));
    }
}
