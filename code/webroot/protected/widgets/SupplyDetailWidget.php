<?php
class SupplyDetailWidget extends CWidget
{
    public function init()
    {
    }

    public function run()
    {
        $supply_detail = Supply::model()->findByPk($_GET['supply_id']);
        $this->render('supply_detail',array('supply_detail'=>$supply_detail));
    }
}
