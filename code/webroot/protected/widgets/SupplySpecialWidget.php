<?php
class SupplySpecialWidget extends CWidget
{
    public function init()
    {
    }

    public function run()
    {

        $special_list = Product::model()->topSpecial()->findAll();
        $this->render('supply_special',array('data'=>$special_list));
    }
}
