<?php



class EnterpriseController extends Controller  {

	public function actionIndex()
	{
		$userType=(int)Yii::app()->request->getParam('user_type');
		
		$entCity=(int)Yii::app()->request->getParam('ent_city');
		
		$businessModel=(int)Yii::app()->request->getParam('bus_model');
		
		$entCriteria=new CDbCriteria();
		
		$entCriteria->compare('user.user_type', '<>0');
		
		$entCriteria->with=array('user'=>array('select'=>'user_name','condition'=>'user_type<>0 '.($userType?"and user_type={$userType}":'')),
			'user.type'=>array('select'=>'group_logo'),
		);
		$selectParams=array();
		
		$allProvince=City::getMuRelCity();
		
		$allUserType=UserGroup::getUserGroup();
		
		$allBusModel=Term::getTermsByGroupId($groupId);
		
		if($entCity)
		{
			$cities=City::getAllCity($entCity);
			
			$selectParams['ent_city']=array('name'=>$allProvince[$entCity]);
			
			$entCriteria->addInCondition('ent_city', array_keys($cities));
		}
		if($businessModel)
		{
			$entCriteria->compare('ent_business_model', $value);
			
			$selectParams['bus_model']=array('name'=>$allBusModel[$businessModel]);
		}
		if($userType)
		{
			$selectParams['user_type']=array('name'=>$allUserType[$userType]);
		}
		
		$count=Enterprise::model()->count($entCriteria);
		
		$page=new CPagination($count);
		
		$page->pageSize=25;
		
		$page->pageVar='page';
		
		$page->applyLimit($entCriteria);
		
		$enterprises=Enterprise::model()->findAll($entCriteria);
		
		
		
		$data=compact('page','enterprises','userType','businessModel','entCity','allProvince','allUserType','allBusModel');
		
		$this->render('enterpriseList',$data);
	}
}


?>