<?php
class PriceEnterpriseWidget extends CWidget
{
    public $list;
    public function init()
    {
    	$this->list =Enterprise::model()->with(array('user'=>array('select'=>'user_name')))->recommedEnt()->findAll();
    }

    public function run()
    {
        $this->render('price_enterprise',array('data'=>$this->list));
    }
}
