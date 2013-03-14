<?php
class IndexNewsWidget extends CWidget
{
    public $top_news;
    public $top_mu_news;
    public function init()
    {
    	$this->top_news = Article::model()->topTrendsNews()->findAll();
    	$this->top_mu_news = Article::model()->topHotSpotNews()->findAll();
    }

    public function run()
    {
        $this->render('index_news',array('data'=>$this->top_news,'mu_news'=>$this->top_mu_news));
    }
}
