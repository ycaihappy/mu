<?php
class IndexSupplyWidget extends CWidget
{
    public function run()
    {
        $supply01 = Supply::model()->topsupply()->findAll();
        $this->render('index_supply',array('data01'=>$supply01));
    }
}
