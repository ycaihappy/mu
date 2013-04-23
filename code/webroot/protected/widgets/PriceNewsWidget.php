<?php
class PriceNewsWidget extends CWidget
{
    public function run()
    {
        $top_news = $top_mu_news = array();
    #	$top_news = Article::model()->PriceMarketList()->findAll();
    #    $top_mu_news = Article::model()->PriceAnalyList()->findAll();
    	$top_news = Article::model()->PriceDayList()->findAll();
    	$top_mu_news= Article::model()->PriceWeekList()->findAll();
        $this->render('price_news',array('data'=>$top_news,'mu_news'=>$top_mu_news));
    }
}
