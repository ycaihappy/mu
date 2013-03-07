<?php
class SupplyMuWidget extends CWidget
{
    public $list;
    public $pager;
    public function init()
    {
        $this->list = Supply::model()->topsupplyIndex()->findAll();
    }

    public function run()
    {
        $this->render('supply_mu',array('data'=>$this->list));
    }
}
