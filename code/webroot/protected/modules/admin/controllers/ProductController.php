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
				'params'=>array('Product[product_type_id]'=>$model->product_type_id,
								'Product[product_status]'=>$model->product_status,
								'Product[product_user_id]'=>$model->product_user_id,
								'Product[product_name]'=>$model->product_name,
							),
		),
		));
		$products=$dataProvider->data;
		$cachedCity=CCacheHelper::getAllCity();
		foreach ($products as &$product)
		{
			if($product->product_city_id){
				$product->product_city_id=$this->_getCityLayer($product->product_city_id);
			}
			else {
				$supply->supply_city_id='未指定';
			}
		}
		$productType=Term::getTermsByGroupId(14);
		$productStatus=Term::getTermsByGroupId(1);
		$rePosition=Term::getTermsByGroupId(13,false,null,'推荐位置');
		$this->render('manageProduct',array('dataProvider'=>$dataProvider,
		'isSpecial'=>$isSpecial,
		'model'=>$model,
		'productType'=>$productType,
		'productStatus'=>$productStatus,
		'rePosition'=>$rePosition,
		));
	}
	function _actionChangeSupplyStatus($redirectAction)
	{
		$toStatus=@$_REQUEST['toStatus'];
		$supplyIds=@$_REQUEST['supply_id'];
		if(!$supplyIds && in_array($toStatus,array(1,2)))
		{
				
			Yii::app()->admin->setFlash('changeStatusError','请选择要更新状态的供求信息，以及改变的状态');
			$this->redirect($redirectAction);
				
		}
		$updateStatusCriteria=new CDbCriteria();
		$updateStatusCriteria->addInCondition('supply_id', $supplyIds);
		$checkedBy=Yii::app()->admin->getName();
		$updateRows=Supply::model()->updateAll(array('supply_status'=>$toStatus,'supply_check_by'=>$checkedBy),$updateStatusCriteria);
		if($updateRows>0)
		{
			Yii::app()->admin->setFlash('changeStatus','更新状态成功！');
		}
		else {
			Yii::app()->admin->setFlash('changeStatusError','更新异常');
		}
		$this->redirect(array($redirectAction,'page'=>Yii::app()->request->getParam('page',1)));

	}
	public function actionChangeSupplyStatus()
	{

		$this->_actionChangeSupplyStatus('manageSupply');

	}
	public function actionChangeBuyStatus()
	{
		$this->_actionChangeSupplyStatus('manageBuy');
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
				$action=$model->product_special?'manageSpecial':'manageProduct';
				$this->redirect(array($action));
			}
		}
		if($productId=@$_REQUEST['product_id']){
			$productModel=Product::model()->with(array('user.enterprise'=>array('select'=>'ent_name'),'user'=>array('select'=>'user_name')))->findByPk($productId);
			
		}
		$unit=Term::getTermsByGroupId(2);
		$allCity=City::getAllCity();
		$productType=Term::getTermsByGroupId(14);
		$productStatus=Term::getTermsByGroupId(1);
		$muContent=Term::getTermsByGroupId(16);
		$waterContent=Term::getTermsByGroupId(17);
		$rePosition=Term::getTermsByGroupId(13,false,null,'推荐位置');
		$this->render('updateProduct',array('model'=>$productModel,
		'unit'=>$unit,
		'allCity'=>$allCity,
		'productType'=>$productType,
		'productStatus'=>$productStatus,
		'muContent'=>$muContent,
		'waterContent'=>$waterContent
		));

	}
	function _actionChangeProductStatus($redirectPage)
	{
		$toStatus=@$_REQUEST['toStatus'];
		$productIds=@$_REQUEST['product_id'];
		if(!$productIds && in_array($toStatus,array(1,2)))
		{
				
			Yii::app()->admin->setFlash('changeStatusError','请选择要更新状态的现货或特价信息，以及改变的状态');
			$this->redirect(array($redirectPage));
				
		}
		$updateStatusCriteria=new CDbCriteria();
		$updateStatusCriteria->addInCondition('product_id', $productIds);
		$checkedBy=Yii::app()->admin->getName();
		$updateRows=Product::model()->updateAll(array('product_status'=>$toStatus,'product_check_by'=>$checkedBy),$updateStatusCriteria);
		if($updateRows>0)
		{
			Yii::app()->admin->setFlash('changeStatus','更新状态成功！');
		}
		else {
			Yii::app()->admin->setFlash('changeStatusError','更新异常');
		}
		$this->redirect(array($redirectPage,'page'=>Yii::app()->request->getParam('page',1)));

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
		$this->_manageSupply(18);
	}
	private function _manageSupply($type=18)
	{
		$model=new Supply();
		$supplyCategoryId=@$_REQUEST['Supply']['supply_category_id'];
		$model->supply_category_id=$supplyCategoryId;
		$supplyStatus=@$_REQUEST['Supply']['supply_status'];
		$model->supply_status=$supplyStatus;
		$supplyEnterpriseName=@$_REQUEST['Supply']['supply_user_id'];
		$model->supply_user_id=$supplyEnterpriseName;
		$supplyName=@$_REQUEST['Supply']['supply_name'];
		$model->supply_name=$supplyName;
		$supplyCriteria=new CDbCriteria();
		$supplyCriteria->addCondition('supply_type='.$type);
		if($supplyCategoryId)
		{
			$supplyCriteria->addCondition('supply_category_id=:supply_category_id');
			$supplyCriteria->params[':supply_category_id']=$supplyCategoryId;
		}
		if($supplyStatus)
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
			$supplyCriteria->compare('supply_name',$supplyName,true);
		}
		$supplyCriteria->with=array(
		'user.enterprise'=>array('select'=>'ent_name'),
		'status'=>array('select'=>'term_name'),
		'category'=>array('select'=>'term_name'),
		'unit'=>array('select'=>'term_name'));
		$dataProvider=new CActiveDataProvider('Supply',array(
			'criteria'=>$supplyCriteria,
			'pagination'=>array(
		        'pageSize'=>10,
				'pageVar'=>'page',
				'params'=>array('Supply[supply_category_id]'=>$model->supply_category_id,
								'Supply[supply_status]'=>$model->supply_status,
								'Supply[supply_user_id]'=>$model->supply_user_id,
								'Supply[supply_name]'=>$model->supply_name,
							),
		),
		));
		$supplys=$dataProvider->data;
		foreach ($supplys as &$supply)
		{
			if($supply->supply_city_id)
			{
				$supply->supply_city_id=$this->_getCityLayer($supply->supply_city_id);
			}
			else {
				$supply->supply_city_id='未指定';
			}
		}
		$supplyCategory=Term::getTermsByGroupId(14);
		$supplyStatus=Term::getTermsByGroupId(1);
		$rePosition=Term::getTermsByGroupId(13,false,null,'推荐位置');
		$this->render('manageSupply',array(
		'dataProvider'=>$dataProvider,
		'supplyStatus'=>$supplyStatus,
		'supplyCategory'=>$supplyCategory,
		'isSupply'=>$type==18?true:false,
		'rePosition'=>$rePosition,
		'model'=>$model));
	}
	private function _getCityLayer($cityId,$sep='>>',$noCityText='未指明')
	{
		return City::getCityLayer($cityId,$sep='>>',$noCityText='未指明');
	}
	public function actionManageBuy()
	{
		$buyResult=$this->_manageSupply(19);
	}
	public function actionUpdateSupply()
	{
		$model=new Supply();
		if (isset($_POST['Supply'])) {//add or update to database
			$model->attributes=$_POST['Supply'];
			if($model->supply_id)$model->setIsNewRecord(false);
			if($model->save())
			{
				//redirect to manage page
				$action=$model->supply_type==18?'manageSupply':'manageBuy';
				$this->redirect(array($action));
			}
			
		}
		if($supplyId=@$_REQUEST['supply_id']){
			$supplyModel=Supply::model()->with(array('user.enterprise'=>array('select'=>'ent_name'),'user'=>array('select'=>'user_name')))->findByPk($supplyId);
		}
		$muContent=Term::getTermsByGroupId(16);
		$waterContent=Term::getTermsByGroupId(17);
			$unit=Term::getTermsByGroupId(2);
			$allCity=City::getAllCity();
			$supplyCategory=Term::getTermsByGroupId(14);
			$supplyStatus=Term::getTermsByGroupId(1);
			$this->render('updateSupply',array('model'=>$supplyModel,
			'unit'=>$unit,
			'allCity'=>$allCity,
			'supplyCategory'=>$supplyCategory,
			'supplyStatus'=>$supplyStatus,
			'muContent'=>$muContent,
		    'waterContent'=>$waterContent,
			));

	}
	public function actionManageEnterprise()
	{
		$model=new Enterprise();
		$entCriteria=new CDbCriteria();
		$entType=@$_POST['Enterprise']['ent_type'];
		$model->ent_type=$entType;
		$entBusiness=@$_POST['Enterprise']['ent_business_model'];
		$model->ent_business_model=$entBusiness;
		$entStatus=@$_POST['Enterprise']['ent_status'];
		$model->ent_status=$entStatus;
		$entName=@$_POST['Enterprise']['ent_name'];
		$model->ent_name=$entName;
		if($entType)
		{
			$entCriteria->addCondition('ent_type=:type');
			$entCriteria->params[':type']=$entType;//compare('ent_type',$entType);
		}
		if($entBusiness)
		{
			$entCriteria->addCondition('ent_business_model=:business_model');
			$entCriteria->params[':business_model']=$entBusiness;//$entCriteria->compare('ent_city',$entCity);
		}
		if($entName)
		{
			$entCriteria->addSearchCondition('ent_name', $entName,true,'AND',true);
		}
		$entCriteria->select='ent_name,ent_create_time,ent_city';
		$entCriteria->order='ent_create_time desc';
		$entCriteria->with=array(
		'user'=>array('select'=>'user_id,user_name'),
		'business'=>array('select'=>'term_name'),
		'status'=>array('select'=>'term_name'),
		'type'=>array('select'=>'term_name'),
		'city'=>array('select'=>'city_name')
		);
		$dataProvider=new CActiveDataProvider('Enterprise',array(
			'criteria'=>$entCriteria,
			'pagination'=>array(
		        'pageSize'=>10,
				'pageVar'=>'page',
				'params'=>array('Enterprise[ent_type]'=>$model->ent_type,
						'Enterprise[ent_status]'=>$model->ent_status,
						'Enterprise[ent_business_model]'=>$model->ent_business_model,
						'Enterprise[ent_name]'=>$model->ent_name,
					),
		),
		));
		$enterprises=$dataProvider->data;
		foreach ($enterprises as &$enterprise)
		{
			if($enterprise->ent_city)
				$enterprise->ent_city=$this->_getCityLayer($enterprise->ent_city);
			else {
					$enterprise->ent_city='未指定';
			}
		}
		$businessModel=Term::getTermsByGroupId(5);
		$type=Term::getTermsByGroupId(4);
		$entStatus=Term::getTermsByGroupId(1);
		$rePosition=Term::getTermsByGroupId(13,false,null,'推荐位置');
		$this->render('manageEnterprise',array('dataProvider'=>$dataProvider,
		'type'=>$type,
		'entStatus'=>$entStatus,
		'businessModel'=>$businessModel,
		'rePosition'=>$rePosition,
		'model'=>$model));
	}
	public function actionChangeEnterpriseStatus()
	{
		$toStatus=@$_REQUEST['toStatus'];
		$entIds=@$_REQUEST['ent_id'];
		if(!$entIds && in_array($toStatus,array(1,2)))
		{
				
			Yii::app()->admin->setFlash('changeStatusError','请选择要更新状态的企业信息，以及改变的状态');
			$this->redirect(array($redirectPage));
				
		}
		$updateStatusCriteria=new CDbCriteria();
		$updateStatusCriteria->addInCondition('ent_id', $entIds);
		$checkedBy=Yii::app()->admin->getName();
		$updateRows=Enterprise::model()->updateAll(array('ent_status'=>$toStatus,'ent_check_by'=>$checkedBy),$updateStatusCriteria);
		if($updateRows>0)
		{
			Yii::app()->admin->setFlash('changeStatus','更新状态成功！');
		}
		else {
			Yii::app()->admin->setFlash('changeStatusError','更新异常');
		}
		$this->redirect(array('manageEnterprise','page'=>Yii::app()->request->getParam('page',1)));
	}
	public function actionUpdateEnterprise()
	{
		if (isset($_POST['Enterprise'])) {//update to database
			$model=new EnterPrise();
			$model->attributes=$_POST['Enterprise'];
			if($model->ent_id)$model->setIsNewRecord(false);
			if($model->save())
			{
				//redirect to manage page
				$this->redirect(array('manageEnterprise'));
			}
			else {
				//redirect to create/update page when error(es) occured
				$enterprise=EnterPrise::model()->findByPk($model->ent_id);
				$this->_loadEnterprise($model->ent_id);
			}
		}
		else {
			$entId=@$_REQUEST['ent_id'];
			$this->_loadEnterprise($entId);
		}

	}
	private function _loadEnterprise($entId)
	{
		$entId=$entId;
		$enterprise=EnterPrise::model()->with(array('user'=>array('select'=>'user_name')))->findByPk($entId);
		$businessModel=Term::getTermsByGroupId(5);
		$type=Term::getTermsByGroupId(4);
		$entStatus=Term::getTermsByGroupId(1);
		$pos=Term::getTermsByGroupId(3);
		$allCity=City::getAllCity();
		$this->render('updateEnterprise',array('model'=>$enterprise,
			'businessModel'=>$businessModel,
			'type'=>$type,
			'entStatus'=>$entStatus,
			'allCity'=>$allCity,
			'pos'=>$pos,
		));
	}
}
?>