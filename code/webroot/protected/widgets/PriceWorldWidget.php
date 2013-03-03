<?php
class PriceWorldWidget extends CWidget
{
    public $top_news;
    public function init()
    {
    	$this->top_news = Article::model()->topNews()->findAll();
    }

    public function run()
    {
        $this->render('price_world',array('data'=>$this->top_news));
    }
}
