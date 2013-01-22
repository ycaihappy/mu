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
			$productCriteria->params[':product_type_id']=$productTypeId;  
		}
		if($productStatus)
		{
			$productCriteria->addCondition('product_status=:product_status');
			$productCriteria->params[':product_status']=$productStatus;  
		}
		if($productEnterpriseName)
		{
			$productCriteria->addSearchCondition('enterprise.ent_name',$productEnterpriseName,true);
		}
		if($productName)
		{
			$productCriteria->addCondition('product_name',$productName,true);
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
		if (isset($_POST['Product'])) {//add or update to database
			$model=new Product();
			$model->attributes=$_POST['Product'];
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
			$productModel=Product::model()->findByPk($productId);
		}
		
	}
	public function actionManageSpecial()
	{
		$specialResult=$this->_manageProduct(1);
	}
	public function actionManageSupply()
	{
		$supplyResult=$this->_manageSupply(1);
	}
	private function _manageSupply($type=0)
	{
	if (!Yii::app()->request->isAjaxRequest) {
			Yii::app()->admin->setState("currentPage", Yii::app()->request->getParam('page', 0) - 1);
		}
		$supplyTypeId=@$_REQUEST['Supply']['supply_category_id'];
		$supplyStatus=@$_REQUEST['Supply']['supply_status'];
		$supplyEnterpriseName=@$_REQUEST['ent_name'];
		$supplyName=@$_REQUEST['Supply']['supply_name'];
		$supplyCriteria=new CDbCriteria();
		$supplyCriteria->addCondition('supply_type_id='.$type);
		if($supplyTypeId)
		{
			$supplyCriteria->addCondition('supply_category_id=:supply_category_id');
			$supplyCriteria->params[':supply_category_id']=$supplyTypeId;  
		}
		if($productStatus)
		{
			$supplyCriteria->addCondition('supply_status=:supply_status');
			$supplyCriteria->params[':supply_status']=$supplyStatus;  
		}
		if($supplyEnterpriseName)
		{
			$supplyCriteria->addSearchCondition('enterprise.ent_name',$supplyEnterpriseName,true);
		}
		if($supplyName)
		{
			$supplyCriteria->addCondition('product_name',$supplyName,true);
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
	public function actionManageBuy()
	{
		$buyResult=$this->_manageSupply(2);
	}
	public function actionCreateSupply()
	{
		if (isset($_POST['Supply'])) {//add or update to database
			$model=new Supply();
			$model->attributes=$_POST['Supply'];
			if($model->save())
			{
				//redirect to manage page
			}
			else {
				//redirect to create/update page when error(es) occured
			}
		}
		else {
			$supplyId=@$_REQUEST['supply_id'];
			$supplyModel=Supply::model()->findByPk($supplyId);
			//redirect to update page 
		}
		
	}
	public function actionManageEnterprise()
	{
		
	}
}
?>