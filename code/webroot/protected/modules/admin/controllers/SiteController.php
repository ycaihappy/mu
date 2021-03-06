﻿<?php

class SiteController extends AdminController{
	/**
	 * Declares class-based actions.
	 */
	public function actions() {
		return array (
		// captcha action renders the CAPTCHA image displayed on the contact page
		'captcha' => array (
				'class' => 'CCaptchaAction', 
				'backColor' => 0xFFFFFF, 
				'minLength' => 4, //最短为4位
				'maxLength' => 4, //是长为4位
				'transparent' => true ,
				'height'=>35
		) ,
		// page action renders "static" pages stored under 'protected/views/site/pages'
		// They can be accessed via: index.php?r=site/page&view=FileName
		'page' => array ('class' => 'CViewAction' ) );
	}
	
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex() {
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->layout = '//layouts/admin_iframe_main';
		$this->render('index');
		//$this->_actionManageBasicSiteInfo ();
	}
	
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError() {
		if ($error = Yii::app ()->errorHandler->error) {
			if (Yii::app ()->request->isAjaxRequest)
				echo $error ['message'];
			else
				$this->render ( 'error', $error );
		}
	}
	
	/**
	 * Displays the login page
	 */
	public function actionLogin() {
		$this->layout = '//layouts/ajax_main';
		$model = new LoginForm ();
		
		if (! Yii::app ()->admin->isGuest)
			$this->redirect ( array ('index' ) );
		
		// if it is ajax validation request
		if (isset ( $_POST ['ajax'] ) && $_POST ['ajax'] === 'login-form') {
			echo CActiveForm::validate ( $model );
			Yii::app ()->end ();
		}
		
		// collect user input data
		if (isset ( $_POST ['LoginForm'] )) {
			$model->attributes = $_POST ['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if ($model->validate () && $model->login ())
				$this->redirect ( array ('index' ) );
		}
		// display the login form
		$model->password='';
		$this->render ( 'login', array ('model' => $model ) );
	}
	
	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout() {
		Yii::app ()->admin->logout ( false );
		$this->redirect ( array ('login' ) );
	}
	
	public function actionUpdateCity() {
		$message = "";
		$model = new City ();
		if (isset ( $_POST ['City'] )) {
			$model->attributes = $_POST ['City'];
			if ($model->city_id)
				$model->setIsNewRecord ( false );
			if ($model->save ()) {
				Yii::app ()->user->setFlash ( 'updateSuccess', 'updated successfully' );
				$this->redirect ( array ('manageCity' ) );
			}
		} 
		if (isset ( $_GET ['city_id'] )) {
			$model = $model->findByPk ( $_GET ['city_id'] );
		}
		$allCity = City::getProvice();
		$this->render ( 'updateCity', array ('model' => $model, 'allCity' => $allCity ) );
	
	}
	public function actionManageCity() {
		
		CQueryRequestHelper::registerLastQueryForm(array('City'),'Enterprise');
		
		$model = new City ();
		if (isset ( $_REQUEST ['City'] )) {
			$model->attributes = $_REQUEST ['City'];
		}
		
		$criteriaCity = new CDbCriteria ();
		if ($model->city_parent) {
			$criteriaCity->addCondition ( 'city_parent=:parent' );
			$criteriaCity->params [':parent'] = $model->city_parent;
		}
		if ($model->city_name) {
			$criteriaCity->addSearchCondition ( 'city_name', $model->city_name, true );
		}
		$criteriaCity->select = '*';
		$criteriaCity->order = 'city_parent asc';
		$dataProvider = new CActiveDataProvider ( 'City', 
		array (
		'criteria' => $criteriaCity, 
		'pagination' => array (
			'pageSize' => 10, 
			'pageVar' => 'page',
			'params'=>array(
					'City[city_parent]'=>$model->city_parent,
					'City[city_name]'=>$model->city_name,
				),
		) 
		));
		$citys = $dataProvider->data;
		if ($citys) {
			$cachedCity = CCacheHelper::getAllCity ();
			foreach ( $citys as &$city ) {
				$parentCity = array ();
				$parent = $city->city_parent;
				while ( $parent ) {
					$parentCity [] = $cachedCity [$parent]->city_name;
					$parent = $cachedCity [$parent]->city_parent;
				}
				if ($parentCity) {
					$parentCity = array_reverse ( $parentCity );
					$city->city_parent = implode ( '>>', $parentCity );
				} else {
					$city->city_parent = '顶级';
				}
			}
		}
		$allCity = City::getProvice();
		$this->render ( 'manageCity', array ('dataProvider' => $dataProvider, 'model' => $model,'allCity'=>$allCity ) );
	
	}
	public function actionUpdateTerm() {
		if (Yii::app ()->request->isAjaxRequest && @$_GET ['type'] == 'getTermByGroupId') {
			
			$terms = Term::getTermsByGroupId ( $_GET ['group_id'],false,null,'顶级' );
			foreach ( $terms as $value => $name ) {
				echo CHtml::tag ( 'option', array ('value' => $value ), CHtml::encode ( $name ), true );
			}
		} else {
			$message = "";
			$model = new Term ();
			$termGroup = TermGroup::model ()->getAllGroupIdToNameArray ();
			if (isset ( $_POST ['Term'] )) {
				$model = new Term ();
				$model->attributes = $_POST ['Term'];
				$model->term_create_time = date("Y-m-d H:i:s");
				if ($model->term_id)
					$model->setIsNewRecord ( false );
				if ($model->save ()) {
					Yii::app ()->user->setFlash ( 'updateSuccess', 'updated successfully' );
					$this->redirect ( array ('manageTerm' ) );
				} else {
					$terms = Term::getTermsByGroupId  ( $term->term_group_id ,false,null,'顶级' );
					$this->render ( 'updateTerm', array ('model' => $model, 'termGroup' => $termGroup, 'terms' => array () ) );
				}
			} else if (isset ( $_GET ['term_id'] )) {
				$term = Term::model ()->findByPk ( $_GET ['term_id'] );
				$terms =Term::getTermsByGroupId ( $term->term_group_id ,false,null,'顶级' );
				$this->render ( 'updateTerm', array ('model' => $term, 'termGroup' => $termGroup, 'terms' => $terms ) );
			} else {
				$this->render ( 'updateTerm', array ('model' => $model, 'termGroup' => $termGroup, 'terms' => array () ) );
			}
		}
	}
	public function actionManageTerm() {
		
		if(Yii::app()->request->isPostRequest || isset($_GET['Term']))
		{
			Yii::app()->admin->setState('termQueryForm',$_REQUEST['Term']);
		}
		else {
			$_REQUEST['Term']=Yii::app()->admin->getState('termQueryForm');
		}
		$model = new Term ();
		if (isset ( $_REQUEST ['Term'] )) {
			$model->attributes = $_REQUEST ['Term'];
		}
		$criteriaTerm = new CDbCriteria ();
		if ($model->term_group_id) {
			$criteriaTerm->addCondition ( 'term_group_id=:group_id' );
			$criteriaTerm->params [':group_id'] = $model->term_group_id;
		}
		if ($model->term_name) {
			$criteriaTerm->addSearchCondition ( 'term_name', $model->term_name, true );
		}
		$criteriaTerm->select = '*';
		$criteriaTerm->order = 'term_group_id asc';
		$criteriaTerm->with = array ('termGroup' => array ('select' => 'group_name' ) );
		$dataProvider = new CActiveDataProvider ( 'Term', 
		array ('criteria' => $criteriaTerm, 
		'pagination' => array ('pageSize' => 10,
		 'pageVar' => 'page' ,
		'params'=>array(
					'Term[term_group_id]'=>$model->term_group_id,
					'Term[term_name]'=>$model->term_name,
				),
		) ) );
		if ($dataProvider->data) {
			$cachedTerm = CCacheHelper::getAllTerm ();
			foreach ( $dataProvider->data as $term ) {
				$parentTerm = array ();
				$parent = $term->term_parent_id;
				while ( $parent ) {
					$parentTerm [] = $cachedTerm [$parent]->term_name;
					$parent = $cachedTerm [$parent]->term_parent_id;
				}
				if (! $parentTerm) {
					$term->term_parent_id = '顶级';
				} else {
					$term->term_parent_id = implode ( '&laquo;', $parentTerm );
				}
			}
		}
		$allGroups = TermGroup::model ()->getAllGroupIdToNameArray ();
		$this->render ( 'manageTerm', array ('dataProvider' => $dataProvider, 'model' => $model, 'allGroups' => $allGroups ) );
	
	}
	public function actionManageBasicSiteInfo() {
		$basicSiteInfoModel = new BasicSiteInfo ();
		if (isset ( $_POST ['BasicSiteInfo'] )) {
			$basicSiteInfoModel->attributes = $_POST ['BasicSiteInfo'];
		
			if ($basicSiteInfoModel->validate ()) {
				$basicSiteInfoModel->save ();
				$this->render ( 'basicSiteInfo', array ('model' => $basicSiteInfoModel ) );
			} else {
				Yii::app ()->admin->setFlash ( 'erroInfo', '输入的字段不合法，保存失败' );
				$this->render ( 'basicSiteInfo', array ('model' => $basicSiteInfoModel ) );
			}
		} else {
			$basicSiteInfoModel = $basicSiteInfoModel->LoadData ();
			$this->render ( 'basicSiteInfo', array ('model' => $basicSiteInfoModel ) );
		}
	}
	public function actionManageSiteDescription() {
		$siteDescriptionModel = new SiteDescription ();
		if (isset ( $_POST ['SiteDescription'] )) {
			$siteDescriptionModel->attributes = $_POST ['SiteDescription'];
		
			if ($siteDescriptionModel->validate ()) {
				$siteDescriptionModel->save ();
			} 
			else {
				var_dump($model->getErrors());
			}
		} 
		if(!Yii::app()->request->isPostRequest)
		{
			$siteDescriptionModel = $siteDescriptionModel->LoadData ();
		}
		$this->render ( 'basicSiteDescription', array ('model' => $siteDescriptionModel ) );
		
	}
	public function actionSendTestEmail()
	{
		$result=array();
		if($toEmail=@$_REQUEST['toEmail'])
		{
			$emailValidator=new CEmailValidator();
			if($emailValidator->validateValue($toEmail))
			{
				$emailSetting=new SiteEmailSetting();
				$emailSetting->LoadData();
				$message = new YiiMailMessage;
			    $message->From = $emailSetting->sendorEmail;    // 送信人  
			    $message->addTo($toEmail);               // 收信人  
			    $message->setSubject("testTitle");  
			    $message->view = 'testTemplate';      // 邮件模板的文件名(不带后缀PHP)  
			    $message->setBody(  
			        array('email'=>$toEmail, 'password' => '123456'),  // 传递到模板文件中的参数  
			        'text/html',                 // 邮件格式  
			        'utf-8'                      // 邮件编码  
			        );  
			      
			    if(Yii::app()->mail->send($message)){  
			        $result['message']='测试邮件发送成功！';
			    } 
			    else {
			    	$result['message']='测试邮件发送失败！请检查邮件配置是否正确';
			    }
			}
			else {
				$result['message']='输入测试邮箱地址格式不正确';
			}
		}
		else {
			$result['message']='请输入测试邮箱地址';
		}
		echo json_encode($result);
	}
	public function actionSaveTermGroup()
	{
		$model=new TermGroup();
		if(isset($_REQUEST['TermGroup']))
		{
			$model->attributes=$_REQUEST['TermGroup'];
			$isNew=$model->group_id?false:true;
			$model->setIsNewRecord($isNew);
			if($model->save())
			{
				Yii::app()->admin->setFlash('updateSuccess',($isNew?'创建 ':'修改 ').$model->group_name.' 成功！');
				$this->renderPartial('update',array('model'=>$model));
			}
			else {
				Yii::app()->admin->setFlash('updateError',($isNew?'创建 ':'修改 ').$model->group_name.' 失败！');
				$this->renderPartial($isNew?'create':'update',array('model'=>$model));
			}
		}
		else {
			if($termGroupId=@$_GET['group_id'])
			{
				$model=$model->findByPk($termGroupId);
				$this->renderPartial('update',array('model'=>$model));
			}
			else {
				$this->renderPartial('create',array('model'=>$model));
			}
		}
	}
	public function actionManageTermGroup()
	{
		$dataProvider = new CActiveDataProvider ( 'TermGroup', array ( 'pagination' => array ('pageSize' => 10, 'pageVar' => 'page' ) ) );
		$this->render('manageTermGroup',array('dataProvider'=>$dataProvider));
	}
	public function actionManageSiteEmailSetting() {
		$siteEmailSettingModel = new SiteEmailSetting ();
		if (isset ( $_POST ['SiteEmailSetting'] )) {
			$siteEmailSettingModel->attributes = $_POST ['SiteEmailSetting'];
			if ($siteEmailSettingModel->validate ()) {
				$siteEmailSettingModel->save ();
				$this->render ( 'siteEmailSetting', array ('model' => $siteEmailSettingModel ) );
			} else {
				Yii::app ()->admin->setFlash ( 'erroInfo', '输入的字段不合法，保存失败' );
				$this->render ( 'siteEmailSetting', array ('model' => $siteEmailSettingModel ) );
			}
		} else {
			$siteEmailSettingModel = $siteEmailSettingModel->LoadData ();
			$this->render ( 'siteEmailSetting', array ('model' => $siteEmailSettingModel ) );
		}
	}
	public function actionManageSMSSetting() {
		$smsSettingModel = new SMSSetting ();
		if (isset ( $_POST ['SMSSetting'] )) {
			$smsSettingModel->attributes = $_POST ['SMSSetting'];
			if ($smsSettingModel->validate ()) {
				$smsSettingModel->save ();
			} else {
				Yii::app ()->admin->setFlash ( 'erroInfo', '输入的字段不合法，保存失败' );
			}
		} else {
			$smsSettingModel = $smsSettingModel->LoadData ();
			if(empty($smsSettingModel->system))
			{
				$smsSettingModel->system=PHP_OS=='WINNT'?'windows':PHP_OS;
			}
			
		}
		$smsTemplates=MessageTemplate::getTemplates('sms');
		$this->render ( 'smsSetting', array ('model' => $smsSettingModel,'smsTemplates'=>$smsTemplates ) );
	}
	public function actionManageFLink()
	{
		$model=new FriendLink();
		$model->flink_status=@$_REQUEST['FriendLink']['flink_status'];
		$model->flink_name=@$_REQUEST['FriendLink']['flink_name'];
		$flinkCriteria=new CDbCriteria();
		$flinkCriteria->with=array('status'=>array('select'=>'term_name')
		);
		$flinkCriteria->condition='flink_user_id=0';
		if($model->flink_status)
		{
			$flinkCriteria->compare('flink_status', $model->flink_status);
		}
		if($model->flink_name)
		{
			$flinkCriteria->addSearchCondition('flink_name', $model->flink_name,true);
		}
		$dataProvider=new CActiveDataProvider('FriendLink',array(
			'criteria'=>$flinkCriteria,
			'pagination'=>array(
				'pageSize'=>10,
				'pageVar'=>'page',
				'params'=>array(
					'FriendLink[flink_status]'=>$model->flink_status,
					'FriendLink[flink_name]'=>$model->flink_name,
				),
			),
		));
		$flinkStatus=Term::getTermsByGroupId(1);
		$data=compact('dataProvider','flinkStatus','model');
		$this->render('manageFLink',$data);
		
	}
	public function actionUpdateFLink()
	{
		$model=new FriendLink();
		if(isset($_POST['FriendLink']))
		{
			$model->attributes=$_POST['FriendLink'];
			if($model->flink_id)$model->setIsNewRecord(false);
			else {
				$model->flink_user_id=0;
			}
			if($model->save())
			{
				$this->redirect(array('manageFLink'));
			}
		}
		if($flinkId=@$_GET['flink_id'])
		{
			$model=$model->findByPk($flinkId);
		}
		$flinkStatus=Term::getTermsByGroupId(1);
		$data=compact('model','flinkStatus');
		$this->render('updateFLink',$data);
	}
	public function actionChangeFLinkStatus()
	{
		$toStatus=@$_REQUEST['toStatus'];
		$flinkIds=@$_REQUEST['flink_id'];
		if(!$flinkIds && in_array($toStatus,array(1,2)))
		{
			if(Yii::app()->request->isAjaxRequest)
			{
				echo '请选择要更新的文章';
				exit;
			}
			Yii::app()->admin->setFlash('changeStatusError','请选择要更新状态的友情链接，以及改变的状态');
			$this->redirect(array('manageFLink'));
				
		}
		$updateStatusCriteria=new CDbCriteria();
		$updateStatusCriteria->addInCondition('flink_id', $productIds);
		
		$updateRows=FriendLink::model()->updateAll(array('flink_status'=>$toStatus),$updateStatusCriteria);
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
		$this->redirect(array('manageFLink','page'=>Yii::app()->request->getParam('page',1)));
		
	}
	public function actionFrontPage()
	{
		//待审核会员，企业，特价，现货，供应，求购，友情链接
		$userSql='select count(user_id) from mu_user where user_status=33 and user_type=1';
		$userCount=Yii::app()->db->createCommand($userSql)->queryScalar();
		$entSql='select count(ent_id) from mu_user_enterprise where ent_status=33';
		$entCount=Yii::app()->db->createCommand($entSql)->queryScalar();
		$specialSql='select count(product_id) from mu_product where product_status=33 and product_special=1';
		$specialCount=Yii::app()->db->createCommand($specialSql)->queryScalar();
		$productSql='select count(product_id) from mu_product where product_status=33 and product_special=0';
		$productCount=Yii::app()->db->createCommand($productSql)->queryScalar();
		$supplySql='select count(supply_id) from mu_supply where supply_status=33 and supply_type=18';
		$supplyCount=Yii::app()->db->createCommand($supplySql)->queryScalar();
		$buySql='select count(supply_id) from mu_supply where supply_status=33 and supply_type=19';
		$buyCount=Yii::app()->db->createCommand($buySql)->queryScalar();
		$flinkSql='select count(flink_id) from mu_friend_link where flink_status=33 and flink_user_id<>0';
		$flinkCount=Yii::app()->db->createCommand($flinkSql)->queryScalar();
		//当前用户的登陆IP,登陆名称，权限组，可考虑展示权限列表
		$userIp=Yii::app()->request->getUserHostAddress();
		$userName=Yii::app()->admin->getName();
		$userRoles=Yii::app()->db->createCommand('select zh_name from mu_right_assignment a 
						inner join mu_right_item i on i.name=a.itemname where a.userid=:uid')->queryColumn(array('uid'=>Yii::app()->admin->getId()));
		$userRoles=implode('，',$userRoles);
		$data=compact('userCount','entCount','specialCount','productCount',
		'supplyCount','buyCount','flinkCount','userIp','userName','userRoles');
		$this->render('frontPage',$data);
		
	}
}
