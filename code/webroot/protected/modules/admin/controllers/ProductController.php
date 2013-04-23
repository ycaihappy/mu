<?php
class ProductController extends AdminController {

	public function actions() {
		return array (
		'getCity'=>array(
			'class'=>'CGetCityAction',
			'emptySelect'=>'选择城市',
		),
		'getChildrenTerm'=>array(
			'class'=>'CGetChildrenTermsAction',
			'emptySelect'=>'选择品类',
		),
		);
	}
	public function actionManageProduct()
	{
		$productResult=$this->_manageProduct(0);
	}
	private function _manageProduct($isSpecial=0)
	{
		CQueryRequestHelper::registerLastQueryForm(array('parentCategory','Product'),'Product');
		$parentCategory=(int)@$_REQUEST['parentCategory'];
		$model=new Product();
		$model->product_type_id=(int)@$_REQUEST['Product']['product_type_id'];
		$model->product_status=(int)@$_REQUEST['Product']['product_status'];
		$model->product_user_id=(int)@$_REQUEST['Product']['product_user_id'];
		$model->product_name=@$_REQUEST['Product']['product_name'];
		$model->product_keyword=@$_REQUEST['Product']['product_keyword'];
		$productCriteria=new CDbCriteria();
		$productCriteria->order='find_in_set(product_status,\'33,1,2\'),product_join_date desc';
		$productCriteria->select='product_id,product_name,product_quanity,product_city_id,product_join_date';
		$productCriteria->addCondition('product_special='.$isSpecial);
		if($model->product_type_id)
		{
			$productCriteria->addCondition('product_type_id=:product_type_id');
			$productCriteria->params[':product_type_id']=$model->product_type_id;
		}
		else {
			if($parentCategory)
			{
				$allTypes=Term::getTermsByGroupId(14,false,$parentCategory,'',false);
				$productCriteria->addInCondition('product_type_id', array_keys($allTypes));
			}

		}

		if($model->product_status)
		{
			$productCriteria->addCondition('product_status=:product_status');
			$productCriteria->params[':product_status']=$model->product_status;
		}
		if($model->product_keyword)
		{
			$productCriteria->addSearchCondition('enterprise.ent_name',$model->product_keyword,true);
		}
		if($model->product_user_id)
		{
			$productCriteria->compare('product_user_id','='.$model->product_user_id);
		}
		if($model->product_name)
		{
			$productCriteria->compare('product_name',$model->product_name,true);
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
								'Product[product_keyword]'=>$model->product_keyword,
								'parentCategory'=>$parentCategory,
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

		$productStatus=Term::getTermsByGroupId(1);
		$rePosition=Term::getTermsByGroupId(13,false,null,'推荐位置');
		$data=compact('parentCategory','isSpecial','dataProvider','productStatus','rePosition','model');
		$this->render('manageProduct',$data);
	}
	function _actionChangeSupplyStatus($redirectAction)
	{
		$toStatus=@$_REQUEST['toStatus'];
		$supplyIds=@$_REQUEST['supply_id'];
		if(!$supplyIds && in_array($toStatus,array(1,2)))
		{
			if(Yii::app()->request->isAjaxRequest)
			{
				echo '请求参数不正确！';
				exit;
			}
			else {
				Yii::app()->admin->setFlash('changeStatusError','请选择要更新状态的供求信息，以及改变的状态');
				$this->redirect($redirectAction);
			}

		}
		$updateStatusCriteria=new CDbCriteria();
		$updateStatusCriteria->addInCondition('supply_id', $supplyIds);
		$checkedBy=Yii::app()->admin->getName();
		$updateRows=Supply::model()->updateAll(array('supply_status'=>$toStatus,'supply_check_by'=>$checkedBy),$updateStatusCriteria);
		if(Yii::app()->request->isAjaxRequest)
		{
			echo $updateRows>0?'更新成功！':'更新失败！';
			exit;
		}
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
		$productModel=new Product();
		if (isset($_POST['Product'])) {//add or update to database
			$productModel->attributes=$_POST['Product'];
			if($productModel->product_id)$productModel->setIsNewRecord(false);
			if($productModel->save())
			{
				//redirect to manage page
				$action=$productModel->product_special?'manageSpecial':'manageProduct';
				$this->redirect(array($action));
			}
		}
		if($productId=@$_REQUEST['product_id']){
			$productModel=Product::model()->with(array('user.enterprise'=>array('select'=>'ent_name'),'user'=>array('select'=>'user_name')))->findByPk($productId);

		}
		$parentType=0;
		if($user_id=(int)Yii::app()->request->getParam('user_id',0))
		{
			$productModel->product_user_id=$user_id;
		}
		$parentProductTypes= Term::getTermsByGroupId(14,true);
		
		$productSmallTypes=array();
		if($productModel->product_type_id)
		{
			$allCategory=CCacheHelper::getMuCategory();
			$parentType=$allCategory[$productModel->product_type_id]->term_parent_id;
			$productSmallTypes=Term::getTermsByGroupId(14,false,$parentType,'',false);
		}
		$unit=Term::getTermsByGroupId(2);
		$allProvince=City::getProvice();
		$province=0;
		$allCity=array();
		if($productModel->product_city_id)
		{
			$province=City::getParentId($productModel->product_city_id);
			$allCity=City::getAllCity($province);
		}
		$productType=Term::getTermsByGroupId(14);
		$productStatus=Term::getTermsByGroupId(1);
		$rePosition=Term::getTermsByGroupId(13,false,null,'推荐位置');
		$this->render('updateProduct',array('model'=>$productModel,
		'unit'=>$unit,
		'province'=>$province,
		'allProvince'=>$allProvince,
		'allCity'=>$allCity,
		'productType'=>$productType,
		'parentType'=>$parentType,
		'parentProductTypes'=>$parentProductTypes,
		'productSmallTypes'=>$productSmallTypes,
		'productStatus'=>$productStatus,
		));

	}
	function _actionChangeProductStatus($redirectPage)
	{
		$toStatus=@$_REQUEST['toStatus'];
		$productIds=@$_REQUEST['product_id'];
		if(!$productIds && in_array($toStatus,array(1,2)))
		{

			if(Yii::app()->request->isAjaxRequest)
			{
				echo '请求参数不正确！';
				exit;
			}
			else {
				Yii::app()->admin->setFlash('changeStatusError','请选择要更新状态的现货或特价信息，以及改变的状态');
				$this->redirect(array($redirectPage));
			}

		}
		$updateStatusCriteria=new CDbCriteria();
		$updateStatusCriteria->addInCondition('product_id', $productIds);
		$checkedBy=Yii::app()->admin->getName();
		$updateRows=Product::model()->updateAll(array('product_status'=>$toStatus,'product_check_by'=>$checkedBy),$updateStatusCriteria);
		if(Yii::app()->request->isAjaxRequest)
		{
			echo $updateRows>0?'更新成功！':'更新失败！';
			exit;
		}
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
		CQueryRequestHelper::registerLastQueryForm(array('Supply','parentCategory'),'Supply');
		$parentCategory=(int)@$_REQUEST['parentCategory'];
		$model=new Supply();
		$model->supply_category_id=(int)@$_REQUEST['Supply']['supply_category_id'];
		$model->supply_status=(int)@$_REQUEST['Supply']['supply_status'];
		$model->supply_user_id=@$_REQUEST['Supply']['supply_user_id'];
		$model->supply_name=@$_REQUEST['Supply']['supply_name'];
		$supplyCriteria=new CDbCriteria();
		$supplyCriteria->select='supply_id,supply_name,supply_city_id,supply_join_date';
		$supplyCriteria->addCondition('supply_type='.$type);
		if($model->supply_category_id)
		{
			$supplyCriteria->addCondition('supply_category_id=:supply_category_id');
			$supplyCriteria->params[':supply_category_id']=$model->supply_category_id;
		}
		else {
			if($parentCategory)
			{
				$allTypes=Term::getTermsByGroupId(14,false,$parentCategory,'',false);
				$supplyCriteria->addInCondition('supply_category_id', array_keys($allTypes));
			}
		}
		/*if($parentCategory)
		 {
			if($model->supply_category_id)
			{
			$supplyCriteria->addCondition('supply_category_id=:supply_category_id');
			$supplyCriteria->params[':supply_category_id']=$model->supply_category_id;
			}
			else {
			$allTypes=Term::getTermsByGroupId(14,false,$parentCategory,'',false);
			$supplyCriteria->addInCondition('supply_category_id', array_keys($allTypes));
			}
			}*/
		if($model->supply_status)
		{
			$supplyCriteria->addCondition('supply_status=:supply_status');
			$supplyCriteria->params[':supply_status']=$model->supply_status;
		}
		if($model->supply_user_id)
		{
			$supplyCriteria->addSearchCondition('enterprise.ent_name',$model->supply_user_id,true);
		}
		if($model->supply_name)
		{
			$supplyCriteria->compare('supply_name',$model->supply_name,true);
		}
		$supplyCriteria->with=array(
		'user.enterprise'=>array('select'=>'ent_name'),
		'status'=>array('select'=>'term_name'),
		'category'=>array('select'=>'term_name'),
		'unit'=>array('select'=>'term_name'));
		$supplyCriteria->order='find_in_set(supply_status,\'33,1,2\'),supply_join_date desc';
		$dataProvider=new CActiveDataProvider('Supply',array(
			'criteria'=>$supplyCriteria,
			'pagination'=>array(
		        'pageSize'=>10,
				'pageVar'=>'page',
				'params'=>array('Supply[supply_category_id]'=>$model->supply_category_id,
								'Supply[supply_status]'=>$model->supply_status,
								'Supply[supply_user_id]'=>$model->supply_user_id,
								'Supply[supply_name]'=>$model->supply_name,
								'parentCategory'=>$parentCategory,
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
		$supplyStatus=Term::getTermsByGroupId(1);
		$isSupply=$type==18?true:false;
		$rePosition=Term::getTermsByGroupId(13,false,null,'推荐位置');
		$data=compact('parentCategory','dataProvider','supplyStatus','supplyCategory','isSupply','rePosition','model');
		$this->render('manageSupply',$data);
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
		$supplyParentCategory= Term::getTermsByGroupId(14,true);
		$parentCategory=0;
		$supply_smallType=array();
		if($supplyModel->supply_category_id)
		{
			$allCategory=CCacheHelper::getMuCategory();
			$parentCategory=$allCategory[$supplyModel->supply_category_id]->term_parent_id;
			$supply_smallType=Term::getTermsByGroupId(14,false,$parentCategory,'选择品类');
		}
		$unit=Term::getTermsByGroupId(2);
		$allProvince=City::getProvice();
		$province=0;
		$allCity=array();
		if($supplyModel->supply_city_id)
		{
			$province=City::getParentId($supplyModel->supply_city_id);
			$allCity=City::getAllCity($province);
		}
		$supplyCategory=Term::getTermsByGroupId(14);
		$supplyStatus=Term::getTermsByGroupId(1);
		$this->render('updateSupply',array('model'=>$supplyModel,
			'unit'=>$unit,
			'province'=>$province,
			'allProvince'=>$allProvince,
			'allCity'=>$allCity,
			'parentCategory'=>$parentCategory,
			'supplyParentCategory'=>$supplyParentCategory,
			'supplyCategory'=>$supply_smallType,
			'supplyStatus'=>$supplyStatus,
		));

	}
	public function actionManageEnterprise()
	{
		CQueryRequestHelper::registerLastQueryForm(array('Enterprise'),'Enterprise');
		$model=new Enterprise();
		$entCriteria=new CDbCriteria();
		$entType=@$_REQUEST['Enterprise']['ent_type'];
		$model->ent_type=$entType;
		$entBusiness=@$_REQUEST['Enterprise']['ent_business_model'];
		$model->ent_business_model=$entBusiness;
		$entStatus=@$_REQUEST['Enterprise']['ent_status'];
		$model->ent_status=$entStatus;
		$entName=@$_REQUEST['Enterprise']['ent_name'];
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
		$entCriteria->order='find_in_set(ent_status,\'33,1,2\'),ent_id desc';
		$entCriteria->with=array(
		'user'=>array('select'=>'user_id,user_name'),
		'business'=>array('select'=>'term_name'),
		'status'=>array('select'=>'term_name'),
		'type'=>array('select'=>'term_name'),
		'city'=>array('select'=>'city_name')
		);
		$entCriteria->condition='ent_status<>147';
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
	public function actionDeleteProduct()
	{
		if(Yii::app()->request->isAjaxRequest)
		{
			$productId=@$_REQUEST['product_id'];
			if(!$productId )
			{
				if(Yii::app()->request->isAjaxRequest)
				{
					echo '请选择要删除的现货特价信息';
					exit;
				}
			}
			$deleteCriteria=new CDbCriteria();
			$deleteCriteria->addInCondition('product_id', $productId);
			$deleteeRows=Product::model()->deleteAll($deleteCriteria);
			if($deleteeRows>0)
			{
				echo '删除成功！';
			}
			else {
				echo '删除失败！';
			}
			exit;
		}
	}
	public function actionDeleteSupply()
	{
		if(Yii::app()->request->isAjaxRequest)
		{
			$supplyId=@$_REQUEST['supply_id'];
			if(!$supplyId )
			{
				if(Yii::app()->request->isAjaxRequest)
				{
					echo '请选择要删除的供求信息';
					exit;
				}
			}
			$deleteCriteria=new CDbCriteria();
			$deleteCriteria->addInCondition('supply_id', $supplyId);
			$deleteeRows=Supply::model()->deleteAll($deleteCriteria);
			if($deleteeRows>0)
			{
				echo '删除成功！';
			}
			else {
				echo '删除失败！';
			}
			exit;
		}
	}
	public function actionChangeEnterpriseStatus()
	{
		if(Yii::app()->request->isAjaxRequest)
		{
			$toStatus=@$_REQUEST['toStatus'];
			$entIds=@$_REQUEST['ent_id'];
			if($toStatus==147 && in_array(45,$entIds))
			{
				echo '为保证系统处于可用状态，该用户无法删除，请谅解！';
				exit;
			}
			if(!$entIds && in_array($toStatus,array(1,2,33,147)))
			{
				echo '请求参数不正确！';
				exit;

			}
			$updateStatusCriteria=new CDbCriteria();
			$updateStatusCriteria->addInCondition('ent_id', $entIds);
			$checkedBy=Yii::app()->admin->getName();
			$updateRows=Enterprise::model()->updateAll(array('ent_status'=>$toStatus,'ent_check_by'=>$checkedBy),$updateStatusCriteria);
			if(Yii::app()->request->isAjaxRequest)
			{
				if($toStatus==147)
				{
					echo $updateRows>0?'删除成功！':'删除失败！';
				}
				else{
					echo $updateRows>0?'更新成功！':'更新失败！';
				}
				exit;
			}
		}

	}
	public function actionUpdateEnterprise()
	{
		$model=new Enterprise();
		if (isset($_POST['Enterprise'])) {//update to database
			$model->attributes=$_POST['Enterprise'];
			if($model->ent_id)$model->setIsNewRecord(false);
			if($model->save())
			{
				//redirect to manage page
				$this->redirect(array('manageEnterprise'));
			}
		}
		$entId=@$_REQUEST['ent_id'];
		$this->_loadEnterprise($entId,$model);
	}
	private function _loadEnterprise($entId,$enterprise)
	{
		if($entId)
		$enterprise=Enterprise::model()->with(array('user'=>array('select'=>'user_name')))->findByPk($entId);
		$businessModel=Term::getTermsByGroupId(5);
		$type=Term::getTermsByGroupId(4);
		$entStatus=Term::getTermsByGroupId(1);
		$pos=Term::getTermsByGroupId(3);
		$allProvince=City::getProvice();
		$province=0;
		$allCity=array();
		if($enterprise->ent_city)
		{
			$province=City::getParentId($enterprise->ent_city);
			$allCity=City::getAllCity($province);
		}
		$this->render('updateEnterprise',array('model'=>$enterprise,
			'businessModel'=>$businessModel,
			'type'=>$type,
			'entStatus'=>$entStatus,
			'allCity'=>$allCity,
			'province'=>$province,
			'allProvince'=>$allProvince,
			'pos'=>$pos,
		));
	}
}
?>
