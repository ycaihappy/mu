<?php
class IndexSupplyWidget extends CWidget
{
    public function run()
    {
        $supply01 = Supply::model()->topbuyIndex()->findAll();
        $supply02 = Supply::model()->topsupplyIndex()->findAll();
        $this->render('index_supply',array('data01'=>$supply01,'data02'=>$supply02));
    }
}
