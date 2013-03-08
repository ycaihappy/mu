<?php
class SupplyEnterpriseWidget extends CWidget
{
    public $type = 0;

    public function run()
    {
        if ( $this->type != 1)
        {
		$entCriteria=new CDbCriteria();
		$entCriteria->select='ent_name,ent_website,ent_business_scope,ent_location';
		$entCriteria->join='inner join mu_recommend b on t.ent_id=b.recommend_object_id and b.recommend_status=1 and b.recommend_type=24 and b.recommend_position=53';
		$entCriteria->condition='ent_status=1';
		$entCriteria->with=array('user'=>array('select'=>'user_telephone,user_mobile_no,user_first_name'));
		$entCriteria->limit=10;
		$advEnt=Enterprise::model()->findAll($entCriteria);
		if($advEnt)
		{
			foreach ($advEnt as &$ent)
			{
				$ent->ent_id=$ent->ent_website?$ent->ent_website:$this->getController()->createUrl('/storeFront/default/default',array('username'=>$ent->user->user_name));
			}
		}
        }
        else
        {
            $advEnt = Supply::model()->topsupplyIndex()->findAll();
        }
        $this->render('supply_enterprise',array('advEnt'=>$advEnt,'type'=>$this->type));
    }
}
