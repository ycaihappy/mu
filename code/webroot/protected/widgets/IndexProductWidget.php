<?php
class IndexProductWidget extends CWidget
{
	public $type;
	public $newlist=array();
	public $proTypes=array();

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

		$allProvince=City::getProvice('所有省份');
		$allBigType=Term::getTermsByGroupId(14,true);
		//分类过滤
    	$caetories=CCacheHelper::getMuCategory();
    	$layerCategory=array();
    	if($caetories)
    	{
    		foreach ($caetories as $category)
    		{
    			if($category->term_parent_id>0)
    				$layerCategory[$category->term_parent_id][]=$category;
    		}
    		if($layerCategory)
    		{
    			$temp=array();
    			foreach ($layerCategory as $layer)
    			{
    				$temp=array_merge($layer,$temp);
    			}
    			$layerCategory=$temp;
    		}
    	}
    	//产品推荐
    	$recProductCriteria=new CDbCriteria();
    	$recProductCriteria->select='product_id,product_name,product_image_src';
    	$recProductCriteria->join='inner join mu_recommend b on t.product_id=b.recommend_object_id and b.recommend_status=1 and b.recommend_type=22 and b.recommend_position=117';
    	$recProductCriteria->condition='product_status=1';
    	$recProductCriteria->order='product_id';
    	$recProductCriteria->limit=20;
    	$recProducts=Product::model()->findAll($recProductCriteria);
        $this->render('index_product',array('recProducts'=>$recProducts,'layerCategory'=>$layerCategory,'allProvince'=>$allProvince,'allBigType'=>$allBigType,'type'=>$this->type, 'data'=>$this->newlist,'proTypes'=>$this->proTypes,'ent'=>$advEnt));
	}
}
