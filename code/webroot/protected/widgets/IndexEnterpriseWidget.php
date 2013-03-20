<?php
class IndexEnterpriseWidget extends CWidget
{

	public function run()
    {
    	//搜索表单
		$entCriteria=new CDbCriteria();
		$entCriteria->select='ent_name';
		$entCriteria->join='inner join mu_recommend b on t.ent_id=b.recommend_object_id and b.recommend_status=1 and b.recommend_type=24 and b.recommend_position=119';
		$entCriteria->condition='ent_status=1';
		$entCriteria->with=array('user'=>array('select'=>'user_name'));
		$entCriteria->limit=15;
		$advEnt=Enterprise::model()->findAll($entCriteria);
		if($advEnt)
		{
			foreach ($advEnt as &$ent)
			{
				$ent->ent_id=$this->getController()->createUrl('/storeFront/default/index',array('username'=>$ent->user->user_name));
			}
		}

        $this->render('index_enterprise',array('ent'=>$advEnt));
	}
}
