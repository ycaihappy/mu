<?php
class ProductController extends SBaseController {

	public function actionManageProduct()
	{
		$productResult=$this->_manageProduct(0);
	}
	private function _manageProduct($isSpecial=0)
	{
	if (!Yii::app()->request->isAjaxRequest) {
			Yii::app()->admin->setState("currentPage", Yii::app()->request->getParam('page', 0) - 1);
		}
		$productTypeId=@$_REQUEST['Product']['product_type_id'];
		$productStatus=@$_REQUEST['Product']['product_status'];
		$productEnterpriseName=@$_REQUEST['ent_name'];
		$productName=@$_REQUEST['Product']['product_name'];
		$productCriteria=new CDbCriteria();
		$productCriteria->addCondition('product_special='.$isSpecial);
		if($productTypeId)
		{
			$productCriteria->addCondition('product_type_id=:product_type_id');
			$criteria->params[':product_type_id']=$productTypeId;  
		}
		if($productStatus)
		{
			$productCriteria->addCondition('product_status=:product_status');
			$criteria->params[':product_status']=$productStatus;  
		}
		if($productEnterpriseName)
		{
			$productCriteria->addSearchCondition('enterprise.ent_name',$productEnterpriseName,true);
		}
		$productCriteria->with=array(
		'user.enterprise'=>array('select'=>'ent_name'),
		'status'=>array('select'=>'term_name'),
		'type'=>array('select'=>'term_name'));
		$pages = new CPagination(City::model()->count($productCriteria));
		$pages->route = "manageTerm";
		$pages->pageSize = 20;
		$pages->applyLimit($productCriteria);
		$pages->setCurrentPage(Yii::app()->admin->getState('currentPage'));
		$products=Product::model()->findAll($productCriteria);
		foreach ($products as $product)
		{
			var_dump($product->user->enterprise);
		}
		return array('models'=>$products,'pages'=>$pages);
	}
	public function actionCreateProduct()
	{
		if (isset($_POST['AuthItem'])) {//add or update to database
			$model=new Product();
			$model->attributes=$_POST['AuthItem'];
			if($model->save())
			{
				//redirect to manage page
			}
			else {
				//redirect to create/update page when error(es) occured
			}
		}
		else {
			$productId=@$_REQUEST['product_id'];
			$productModel=Product::model()->with(
			array(
					'status'=>array('select'=>'term_name'),
					'user.enterprise'=>array('ent_name'),
				)
			)->findByPk($productId);
			var_dump($productModel);
		}
		
	}
	public function actionManageSpecial()
	{
		$specialResult=$this->_manageProduct(1);
	}
	public function actionManageSupply()
	{
		
	}
	public function actionManageEnterprise()
	{
		
	}
}
?>