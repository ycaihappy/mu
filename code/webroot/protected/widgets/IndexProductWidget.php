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
		//$allBigType=Term::getTermsByGroupId(14,true);
		//分类过滤
    	/*$caetories=CCacheHelper::getMuCategory();
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
    	}*/
    	$selectedType=31;//默认选择钼初级
    	$typies=Term::getMuCategoryByGroup();
    	//产品推荐
    	$recProductCriteria=new CDbCriteria();
    	$recProductCriteria->select='product_id,product_name,product_image_src,product_mu_content,product_quanity,product_join_date';
    	$recProductCriteria->with=array('unit'=>array('select'=>'term_name'),'user'=>array('select'=>'user_name,user_first_name,user_mobile_no'),'type'=>array('select'=>'term_name'),'city'=>array('select'=>'city_name'));
    	$recProductCriteria->condition='product_status=1 and product_type_id='.$selectedType;
    	$recProductCriteria->order='product_id desc';
    	$recProductCriteria->limit=20;
    	$recProducts=Product::model()->findAll($recProductCriteria);
        $this->render('index_product',array('typies'=>$typies,'selectedType'=>$selectedType,'allProvince'=>$allProvince,'recProducts'=>$recProducts, 'data'=>$this->newlist,'proTypes'=>$this->proTypes,'ent'=>$advEnt));
	}
}
