<?php
class SupplyAdWidget extends CWidget
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
    	$adv=CCacheHelper::getAdvertisement(137);//百科头部横幅
        $this->render('supply_ad',array('data'=>$this->top_news,'mu_news'=>$this->top_mu_news,'adv'=>$adv));
    }
}
