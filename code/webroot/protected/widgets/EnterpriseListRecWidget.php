<?php



class EnterpriseListRecWidget extends CWidget {
	public function run()
	{
		//搜索表单
		$entCriteria=new CDbCriteria();
		$entCriteria->select='ent_name';
		$entCriteria->join='inner join mu_recommend b on t.ent_id=b.recommend_object_id and b.recommend_status=1 and b.recommend_type=24 and b.recommend_position=119';
		$entCriteria->condition='ent_status=1';
		$entCriteria->with=array('user'=>array('select'=>'user_name'));
		$entCriteria->limit=15;
		$recEnterprises=Enterprise::model()->findAll($entCriteria);
		if($recEnterprises)
		{
			foreach ($recEnterprises as &$ent)
			{
				$ent->ent_id=$this->getController()->createUrl('/storeFront/default/index',array('username'=>$ent->user->user_name));
			}
		}
		$adv=CCacheHelper::getAdvertisement(145);//左侧中部
		$data=compact('recEnterprises','adv');
		$this->render('ent_index_rec',$data);
	}
}


?>