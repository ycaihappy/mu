<?php
class ThemeProductWidget extends CWidget
{
	public $type;
	public $newlist=array();
	public $proTypes=array();

	public function run()
    {
    	$caetories=CCacheHelper::getMuCategory();
    	$selectedType=Yii::app()->request->getParam('type',31);//默认选择钼初级
    	//产品推荐
    	$recProductCriteria=new CDbCriteria();
    	$recProductCriteria->select='product_id,product_name,product_image_src,product_mu_content,product_quanity,product_price,product_water_content,product_join_date';
    	$recProductCriteria->with=array('unit'=>array('select'=>'term_name'),'user'=>array('select'=>'user_name,user_first_name,user_mobile_no'),'type'=>array('select'=>'term_name'),'city'=>array('select'=>'city_name'));
    	$recProductCriteria->condition='product_status=1 and product_type_id='.$selectedType;
    	$recProductCriteria->order='product_id desc';
    	$recProductCriteria->limit=20;
    	$recProducts=Product::model()->findAll($recProductCriteria);
        $this->render('theme_product',array('selectedType'=>$selectedType,'recProducts'=>$recProducts, 'data'=>$this->newlist,'proTypes'=>$this->proTypes,'title'=>isset($caetories[$selectedType])?$caetories[$selectedType]->term_name:''));
	}
}
