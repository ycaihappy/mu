<?php
class SupplyModuleWidget extends CWidget
{
    public $type;
    public $top_mu_news;
    public function init()
    {
    	$this->top_mu_news = Article::model()->topMuNews()->findAll();
    }

    public function run()
    {
        $this->render('supply_module',array('type'=>$this->type,'data'=>$this->top_mu_news));
    }
}
