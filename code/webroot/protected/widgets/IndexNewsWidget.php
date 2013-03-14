<?php
class IndexNewsWidget extends CWidget
{
    public $top_news;
    public $top_mu_news;
    public function init()
    {
    	$this->top_news = Article::model()->topNews()->findAll();
    	$this->top_mu_news = Article::model()->topMuNews()->findAll();
    }

    public function run()
    {
        $this->render('index_news',array('data'=>$this->top_news,'mu_news'=>$this->top_mu_news));
    }
}
