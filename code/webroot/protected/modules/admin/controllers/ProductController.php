<?php
class ProductController extends AdminController {

	public function actionManageProduct()
	{
		$productResult=$this->_manageProduct(0);
	}
	private function _manageProduct($isSpecial=0)
	{
		$model=new Product();
		$productTypeId=@$_REQUEST['Product']['product_type_id'];
		$model->product_type_id=$productTypeId;
		$productStatus=@$_REQUEST['Product']['product_status'];
		$model->product_status=$productStatus;
		$productEnterpriseName=@$_REQUEST['Product']['product_user_id'];
		$model->product_user_id=$productEnterpriseName;
		$productName=@$_REQUEST['Product']['product_name'];
		$model->product_name=$productName;
		$productCriteria=new CDbCriteria();
		$productCriteria->select='product_id,product_name,product_quanity,product_city_id';
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
			$productCriteria->compare('product_name',$productName,true);
		}
		$productCriteria->with=array(
		'user.enterprise'=>array('select'=>'ent_name'),
		'status'=>array('select'=>'term_name'),
		'type'=>array('select'=>'term_name'),
		'unit'=>array('select'=>'term_name'),
		'city'=>array('select'=>'city_name'));
		$dataProvider=new CActiveDataProvider('Product',array(
			'criteria'=>$productCriteria,
			'pagination'=>array(
		        'pageSize'=>10,
				'pageVar'=>'page',
		),
		));
		$products=$dataProvider->data;
		$cachedCity=CCacheHelper::getAllCity();
		foreach ($products as &$product)
		{
			$parentCity=array();
			$parent=$cachedCity[$product->product_city_id]['city_parent'];
			while($parent)
			{
				$parentCity[]=$cachedCity[$parent]->city_name;
				$parent=$cachedCity[$parent]->city_parent;
			}
			$parentCity=array_reverse($parentCity);
			$parentCity[]=$product->city->city_name;
			if($parentCity)
				$product->product_city_id=implode('>>',$parentCity);
			else 
				$product->product_city_id='未指明';
		}
		$productType=Term::getTermsByGroupId(12);
		$productStatus=Term::getTermsByGroupId(1);
		$this->render('manageProduct',array('dataProvider'=>$dataProvider,
		'isSpecial'=>$isSpecial,
		'model'=>$model,
		'productType'=>$productType,
		'productStatus'=>$productStatus
		));
	}
	function _actionChangeSupplyStatus($redirectAction)
	{
		$toStatus=@$_REQUEST['toStatus'];
		$supplyIds=@$_REQUEST['supply_id'];
		if(!$modelObjectIds)
		{
			
			Yii::app()->admin->setFlash('changeStatusError','');
			$this->redirect($redirectAction);
			
		}
		$updateStatusCriteria=new CDbCriteria();
		$updateStatusCriteria->addInCondition('supply_id', $supplyIds);
		$updateRows=Supply::model()->updateAll(array('supply_status'=>$toStatus),$updateStatusCriteria);
		if($updateRows>0)
		{
			
		}
		else {
			
		}
		
	}
	function actionChangeSupplyStatus()
	{
		
		$this->_actionChangeSupplyStatus('manageSupply');
		
	}
	function actionChangeBuyStatus()
	{
		$this->_actionChangeSupplyStatus('manageBug');
	}
	public function actionUpdateProduct()
	{
		$model=new Product();
		if (isset($_POST['Product'])) {//add or update to database
			$model->attributes=$_POST['Product'];
			if($model->product_id)$model->setIsNewRecord(false);
			if($model->save())
			{
				//redirect to manage page
				$this->redirect(array('manageProduct'));
			}
			else {
				//redirect to create/update page when error(es) occured
				$this->render('updateProduct',array('model'=>$model));
			}
		}
		else if(isset($_REQUEST['product_id'])){
			$productId=@$_REQUEST['product_id'];
			$productModel=Product::model()->with(array('user.enterprise'=>array('select'=>'ent_name'),'user'=>array('select'=>'user_name')))->findByPk($productId);
			$unit=Term::getTermsByGroupId(2);
			$allCity=City::getAllCity();
			$productType=Term::getTermsByGroupId(12);
			$productStatus=Term::getTermsByGroupId(1);
			$this->render('updateProduct',array('model'=>$productModel,
			'unit'=>$unit,
			'allCity'=>$allCity,
			'productType'=>$productType,
			'productStatus'=>$productStatus));
		}
		
	}
	function _actionChangeProductStatus($redirectPage)
	{
		$toStatus=@$_REQUEST['toStatus'];
		$productIds=@$_REQUEST['product_id'];
		if(!$productIds)
		{
			
			Yii::app()->admin->setFlash('changeStatusError','');
			$this->redirect($redirectPage);
			
		}
		$updateStatusCriteria=new CDbCriteria();
		$updateStatusCriteria->addInCondition('supply_id', $supplyIds);
		$updateRows=Supply::model()->updateAll(array('supply_status'=>$toStatus),$updateStatusCriteria);
		if($updateRows>0)
		{
			
		}
		else {
			
		}
		
	}
	public function actionChangeProductStatus()
	{
		$this->_actionChangeProductStatus('manageProduct');
	}
	public function actionChangeSpecialStatus()
	{
		$this->_actionChangeProductStatus('manageSpecial');
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
			$supplyCriteria->compare('product_name',$supplyName,true);
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
	public function actionUpdateSupply()
	{
		if (isset($_POST['Supply'])) {//update to database
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
		if (!Yii::app()->request->isAjaxRequest) {
			Yii::app()->admin->setState("currentPage", Yii::app()->request->getParam('page', 0) - 1);
		}
		$entCriteria=new CDbCriteria();
		$entType=@$_POST['enterprise']['ent_type'];
		$entCity=@$_POST['enterprise']['ent_city'];
		$entName=@$_POST['enterprise']['ent_name'];
		if($entType)
		{
			$entCriteria->addCondition('ent_type=:type');
			$entCriteria->params[':type']=$entType;//compare('ent_type',$entType);
		}
		if($entCity)
		{
			$entCriteria->addCondition('ent_city=:city');
			$entCriteria->params[':city']=$entCity;//$entCriteria->compare('ent_city',$entCity);
		}
		if($entName)
		{
			$entCriteria->addSearchCondition('ent_name', $entName,true,'AND',true);
		}
		$entCriteria->select='ent_name,ent_create_time';
		$entCriteria->order='ent_create_time desc';
		$entCriteria->with=array(
		'user'=>array('select'=>'user_id,user_name'),
		'business'=>array('select'=>'term_name'),
		'status'=>array('select'=>'term_name'),);
		$pages = new CPagination(Enterprise::model()->count($entCriteria));
		$pages->route = "manageEnterprise";
		$pages->pageSize = 20;
		$pages->applyLimit($entCriteria);
		$pages->setCurrentPage(Yii::app()->admin->getState('currentPage'));
		$enterprises=Enterprise::model()->findAll($entCriteria);
		var_dump($enterprises);
		
	}
	public function actionUpdateEnterPrise()
	{
		if (isset($_POST['EnterPrise'])) {//update to database
			$model=new EnterPrise();
			$model->attributes=$_POST['EnterPrise'];
			if($model->save())
			{
				//redirect to manage page
			}
			else {
				//redirect to create/update page when error(es) occured
			}
		}
		else {
			$entId=@$_REQUEST['ent_id'];
			$enterprise=EnterPrise::model()->findByPk($entId);
			//redirect to update page 
		}
		
	}
}
?>