<?php
class PriceEnterpriseWidget extends CWidget
{
    public $list;
    public function init()
    {
    	$this->list =Enterprise::model()->recommedEnt()->findAll();
    }

    public function run()
    {
        $this->render('price_enterprise',array('data'=>$this->list));
    }
}
