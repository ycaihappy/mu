<?php
class PriceBodyWidget extends CWidget
{
    public $type;
    public $top_news;
    public $top_mu_news;
    public function init()
    {
    	$this->top_news = Article::model()->topNews()->findAll();
    	$this->top_mu_news = Article::model()->topMuNews()->findAll();
    }

    public function run()
    {
        $this->render('price_body',array('type'=>$this->type,'data'=>$this->top_news,'mu_news'=>$this->top_mu_news));
    }
}
