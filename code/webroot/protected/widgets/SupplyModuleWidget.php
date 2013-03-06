<?php
class SupplyModuleWidget extends CWidget
{
    public $type;
    public $top_supply;
    public function init()
    {
    	$this->top_supply = Supply::model()->topsupplyIndex()->findAll();
    }

    public function run()
    {
        $this->render('supply_module',array('type'=>$this->type,'data'=>$this->top_supply));
    }
}
