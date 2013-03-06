<?php
class SupplyIndexRecEnterpriseLeftWidget extends CWidget
{
    public $type;
    public $top_ent;
    public function init()
    {
    	$entCriteria=new CDbCriteria();
		$entCriteria->select='ent_name,ent_website';
		$entCriteria->join='inner join mu_recommend b on t.ent_id=b.recommend_object_id and b.recommend_status=1 and b.recommend_type=24 and b.recommend_position=55';
		$entCriteria->condition='ent_status=1';
		$entCriteria->with=array('user'=>array('select'=>'user_telephone,user_mobile_no,user_first_name'));
		$entCriteria->limit=15;
		$recEnt=Enterprise::model()->findAll($entCriteria);
		if($recEnt)
		{
			foreach ($recEnt as &$ent)
			{
				$ent->ent_id=$ent->ent_website?$ent->ent_website:$this->getController()->createUrl('/storeFront/default/default',array('username'=>$ent->user->user_name));
			}
		}
    	$this->top_ent = $recEnt;
    }

    public function run()
    {
        $this->render('supply_index_rec_ent',array('type'=>$this->type,'data'=>$this->top_ent));
    }
}
