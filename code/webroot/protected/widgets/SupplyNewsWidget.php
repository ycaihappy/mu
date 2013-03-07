<?php
class SupplyNewsWidget extends CWidget
{
    public $top_supply_01;
    public $top_supply_02;
    public $top_supply_03;
    public $top_mu_news;
    public function init()
    {

    	$this->top_supply_01 = Supply::model()->categorysupply01()->findAll();
    	$this->top_supply_02 = Supply::model()->categorysupply02()->findAll();
    	$this->top_supply_03 = Supply::model()->categorysupply03()->findAll();
    	$this->top_mu_news = Article::model()->topMuNews()->findAll();
    }

    public function run()
    {
        $this->render('supply_news',array('mu_news'=>$this->top_mu_news,'data01'=>$this->top_supply_01,'data02'=>$this->top_supply_02,'data03'=>$this->top_supply_03));
    }
}
