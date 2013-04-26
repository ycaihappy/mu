<?php
class IndexProductWidget extends CWidget
{
	public $type;
	public $newlist=array();
	public $proTypes=array();

	public function run()
    {

		$allProvince=City::getProvice('所有省份');
    	$selectedType=31;//默认选择钼初级
    	$typies=Term::getMuCategoryByGroup();
    	//产品推荐
    	$recProductCriteria=new CDbCriteria();
    	$recProductCriteria->select='product_id,product_name,product_image_src,product_mu_content,product_quanity,product_price,product_water_content';
    	$recProductCriteria->with=array('unit'=>array('select'=>'term_name'),'user'=>array('select'=>'user_name,user_first_name,user_mobile_no'),'type'=>array('select'=>'term_name'),'city'=>array('select'=>'city_name'));
    	$recProductCriteria->condition='product_status=1 and product_type_id='.$selectedType;
    	$recProductCriteria->order='product_id desc';
    	$recProductCriteria->limit=20;
    	$recProducts=Product::model()->findAll($recProductCriteria);
        $this->render('index_product',array('typies'=>$typies,'selectedType'=>$selectedType,'allProvince'=>$allProvince,'recProducts'=>$recProducts));
	}
}
