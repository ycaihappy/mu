<?php
class IndexProductWidget extends CWidget
{
	public $type;
	public $newlist=array();
	public $proTypes=array();
	public function init()
	{

		switch ($this->type)
		{
			case 'special':
				$this->newlist = Product::model()->topSpecial()->findAll();
				break;
			case 'product':
				try{
					//现货分类统计
					$params['fl']='product_id';
					$params['facet']='on';
					$params['facet.field']='product_type_id';
					$query='*:*';
					$result= Yii::app()->searcher->get($query,0,1,$params);
					$facetTypes=(array)$result->facet_counts->facet_fields->product_type_id;
					 
					if ($facetTypes)
					{
						$typesCache=CCacheHelper::getMuCategory();
						foreach ($facetTypes as $type=>$num)
						{
							$this->proTypes[$type]=array('name'=>$typesCache[$type]->term_name,'num'=>$num);
						}
					}
					$this->proTypes=array_slice($this->proTypes,0,8);
				}
				catch (CException $ex)
				{
					$this->newlist=array();
					$this->proTypes=array();
				}
				//推荐现货
				$recProCriteria=new CDbCriteria();
				$recProCriteria->select='product_id,product_name';
				$recProCriteria->join='inner join mu_recommend b on t.product_id=b.recommend_object_id and b.recommend_status=1 and b.recommend_type=22 and b.recommend_position=54';
				$recProCriteria->condition='product_status=1';
				$recProCriteria->limit=10;
				$recProducts=Product::model()->findAll($recProCriteria);
				if($recProducts)
				{
					foreach ($recProducts as &$product)
					{//用其他字段封装链接
						$product->product_name=CStringHelper::truncate_utf8_string($product->product_name, 20);
						$product->product_keyword=$this->getController()->createUrl('/product/view',array('product_id'=>$product->product_id));
					}
				}
				$this->newlist = $recProducts;
				 
				break;
		}
	}

	public function run()
	{
		$this->render('index_product',array('type'=>$this->type, 'data'=>$this->newlist,'proTypes'=>$this->proTypes));
	}
}
