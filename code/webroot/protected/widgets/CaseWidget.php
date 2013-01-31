<?php
class CaseWidget extends CWidget
{
	private $recenltyCase=array();
    public function init()
    {
        $sql = 'select ent_name,ent_id,purchase_amount,supply_unit from mu_success_case sc,mu_user_enterprise ent,mu_supply sup
            where sc.supply_id=sup.supply_id and sc.purchase_user_id=ent.ent_user_id';
        $this->recenltyCase = YII::app()->db->createCommand($sql)->queryAll();
    }

    public function run()
    {
        $this->render('case',array('data'=>$this->recenltyCase));
    }
}
