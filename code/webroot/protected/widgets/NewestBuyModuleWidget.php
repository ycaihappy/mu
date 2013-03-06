<?php
class NewestBuyModuleWidget extends CWidget
{
    public $type;
    public $top_buy;
    public function init()
    {
    	$this->top_buy = Supply::model()->topbuyIndex()->findAll();
    }

    public function run()
    {
        $this->render('newest_buy_module',array('type'=>$this->type,'data'=>$this->top_buy));
    }
}
