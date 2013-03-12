<?php
class PriceNewsWidget extends CWidget
{
    public $top_news;
    public $top_mu_news;
    public function init()
    {
    	$this->top_news = Article::model()->PriceMarketList()->findAll();
    	$this->top_mu_news = Article::model()->PriceAnalyList()->findAll();
    }

    public function run()
    {
        $this->render('price_news',array('data'=>$this->top_news,'mu_news'=>$this->top_mu_news));
    }
}
