<?php



class EnterpriseController extends Controller  {

	public function actionIndex()
	{
		$userType=(int)Yii::app()->request->getParam('user_type');
		
		$entCity=(int)Yii::app()->request->getParam('ent_city');
		
		$businessModel=(int)Yii::app()->request->getParam('bus_model');
		
		$entCriteria=new CDbCriteria();
		
		$entCriteria->select=array('ent_name','left(ent_introduce,150) as ent_introduce','ent_business_scope','ent_location','ent_logo');
		
		$entCriteria->compare('ent_status', '=1');
		
		$entCriteria->with=array('user'=>array('select'=>'user_name',
		'condition'=>'user_type<>0 and user_status=1 '.($userType?"and user_type={$userType}":'')),
			'user.type'=>array('select'=>'group_logo'),
		'business'=>array('select'=>'term_name')
		);
		
		$selectParams=array();
		
		$allProvince=City::getMuRelCity();
		
		$allUserType=UserGroup::getUserGroup();
		
		$allBusModel=Term::getTermsByGroupId(4,false,null,'',false);
		
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
		
		$page->pageSize=10;
		
		$page->pageVar='page';
		
		$page->applyLimit($entCriteria);
		
		$enterprises=Enterprise::model()->findAll($entCriteria);
		
		if($enterprises)
		{
			foreach ($enterprises as &$enterprise)
			{
				$enterprise->ent_introduce=CStringHelper::truncate_utf8_string(strip_tags($enterprise->ent_introduce), 100);
			}
		}
		
		$data=compact('page','enterprises','selectParams','userType','businessModel','entCity','allProvince','allUserType','allBusModel');
		
		$this->render('index',$data);
	}
}


?>