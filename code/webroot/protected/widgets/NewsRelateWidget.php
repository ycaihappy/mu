<?php
class NewsRelateWidget extends CWidget
{
    public $top_mu_news;
    public function init()
    {
    	$this->top_mu_news = Article::model()->topMuNews()->findAll();
    }

    public function run()
    {
        $this->render('news_relate',array('data'=>$this->top_mu_news));
    }
}
