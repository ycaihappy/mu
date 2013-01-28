<?php
class NewsTopWidget extends CWidget
{
    public $top_news;
    public function init()
    {
    	$this->top_news = Article::model()->topNews()->findAll();
    }

    public function run()
    {
        $this->render('news_top',array('data'=>$this->top_news));
    }
}
