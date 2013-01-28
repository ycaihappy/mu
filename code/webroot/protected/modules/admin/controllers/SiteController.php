<?php

class SiteController extends AdminController
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
		// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
				'minLength'=>4, //最短为4位
			    'maxLength'=>4, //是长为4位
			    'transparent'=>true, //显示为透明，当关闭该选项，才显示背景颜色
		),
		// page action renders "static" pages stored under 'protected/views/site/pages'
		// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
		),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->_actionManageBasicSiteInfo();
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
			echo $error['message'];
			else
			$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
			$this->redirect(Yii::app()->admin->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout(false);
		$this->redirect(Yii::app()->homeUrl);
	}
	
	public function actionUpdateCity() {
		$message = "";
		$model=new City();
		$allCity=City::getAllCity();
		if (isset($_POST['City'])) {
			$model->attributes = $_POST['City'];
			if($model->city_id)$model->setIsNewRecord(false);
				if ($model->save()) {
					Yii::app()->user->setFlash('updateSuccess', 'updated successfully');
					$this->redirect(array('manageCity'));
				} else {
					$this->render('updateCity', array('model' => $model,'allCity'=>$allCity));
				}
			}
			else if(isset($_GET['city_id'])){
				$model=$model->findByPk($_GET['city_id']);
				$this->render('updateCity', array('model' => $model,'allCity'=>$allCity));
			}
			else {
				$allCity=City::getAllCity();
				$this->render('updateCity', array('model' => $model,'allCity'=>$allCity));
				
			}
		
	}
	public function actionManageCity()
	{
		if(Yii::app()->request->isAjaxRequest)
		{

		}
		else {
			$criteriaCity=new CDbCriteria();
			$criteriaCity->select='city_id,city_name,city_order,city_parent,city_open';
			$criteriaCity->order='city_parent asc';
			$dataProvider=new CActiveDataProvider('City',array(
				'criteria'=>$criteriaCity,
				'pagination'=>array(
			        'pageSize'=>10,
					'pageVar'=>'page',
			),
			));
			$citys=$dataProvider->data;
			if($citys)
			{
				$cachedCity=CCacheHelper::getAllCity();
				foreach ($citys as &$city) {
					$parentCity=array();
					$parent=$city->city_parent;
					while($parent)
					{
						$parentCity[]=$cachedCity[$parent]->city_name;
						$parent=$cachedCity[$parent]->city_parent;
					}
					if($parentCity)
					$city->city_parent=implode('>>',$parentCity);
					else 
					$city->city_parent='顶级';
				}
			}
			$this->render('manageCity',array('dataProvider'=>$dataProvider));

		}
	}
	public function actionUpdateTerm() {
		if(Yii::app()->request->isAjaxRequest&&@$_GET['type']=='getTermByGroupId')
		{
			
			$terms=TermGroup::model()->getGroupTermsByArray($_GET['group_id']);
			echo CHtml::tag('option', array('value'=>0), '顶级', true);
			foreach($terms as $value=>$name) {
				echo CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
			}
		}
		else {
			$message = "";
			$model=new Term();
			$termGroup=TermGroup::model()->getAllGroupIdToNameArray();
			if (isset($_POST['Term'])) {
			    $model=new Term();
				$model->attributes = $_POST['Term'];
				if($model->term_id)$model->setIsNewRecord(false);
					if ($model->save()) {
						Yii::app()->user->setFlash('updateSuccess', 'updated successfully');
						$this->redirect(array('manageTerm'));
					} else {
						$terms=TermGroup::model()->getGroupTermsByArray($term->term_group_id);
						$this->render('updateTerm', array('model' => $model,'termGroup'=>$termGroup,'terms'=>array()));
					}
			}
			else if(isset($_GET['term_id'])){
				$term=Term::model()->findByPk($_GET['term_id']);
				$terms=TermGroup::model()->getGroupTermsByArray($term->term_group_id);
				$this->render('updateTerm', array('model' => $term,'termGroup'=>$termGroup,'terms'=>$terms));
			}
			else {
				$this->render('updateTerm', array('model' => $model,'termGroup'=>$termGroup,'terms'=>array()));
			}
		}
	}
	public function actionManageTerm()
	{
		if(Yii::app()->request->getIsPostRequest())
		{//update or add Term Data

		}
		else//list term data
		{
			$criteriaTerm=new CDbCriteria();
			$criteriaTerm->select='*';
			$criteriaTerm->order='term_group_id asc';
			$criteriaTerm->with=array('termGroup'=>array('select'=>'group_name'));

			$dataProvider=new CActiveDataProvider('Term',array(
				'criteria'=>$criteriaTerm,
				'pagination'=>array(
			        'pageSize'=>10,
					'pageVar'=>'page',
			),
			));
			if($dataProvider->data)
			{
				$cachedTerm=CCacheHelper::getAllTerm();
				foreach ($dataProvider->data as $term)
				{
					$parentTerm=array();
					$parent=$term->term_parent_id;
					while($parent)
					{
						$parentTerm[]=$cachedTerm[$parent]->term_name;
						$parent=$cachedTerm[$parent]->term_parent_id;
					}
					if(!$parentTerm)
					{
						$term->term_parent_id='顶级';
					}
					else {
						$term->term_parent_id=implode('&laquo;',$parentTerm);}
				}
			}
			$this->render('manageTerm',array('dataProvider'=>$dataProvider));
		}
	}
	private function _actionManageBasicSiteInfo()
	{
		$basicSiteInfoModel=new BasicSiteInfo();
		if(isset($_POST['BasicSiteInfo']))
		{
			$basicSiteInfoModel->attributes=$_POST['BasicSiteInfo'];
			if($basicSiteInfoModel->validate())
			{
				$basicSiteInfoModel->save();
				$this->render('basicSiteInfo',array('model'=>$basicSiteInfoModel));
			}
			else {
				Yii::app()->admin->setFlash('erroInfo','输入的字段不合法，保存失败');
				$this->render('basicSiteInfo',array('model'=>$basicSiteInfoModel));
			}
		}
		else
		{
			$basicSiteInfoModel=$basicSiteInfoModel->LoadData();
			$this->render('basicSiteInfo',array('model'=>$basicSiteInfoModel));
		}
	}
	public function actionManageSiteEmailSetting()
	{
		$siteEmailSettingModel=new SiteEmailSetting();
		if(isset($_POST['SiteEmailSetting']))
		{
			$siteEmailSettingModel->attributes=$_POST['SiteEmailSetting'];
			if($siteEmailSettingModel->validate())
			{
				$siteEmailSettingModel->save();
				$this->render('siteEmailSetting',array('model'=>$basicSiteInfoModel));
			}
			else {
				Yii::app()->admin->setFlash('erroInfo','输入的字段不合法，保存失败');
				$this->render('siteEmailSetting',array('model'=>$basicSiteInfoModel));
			}
		}
		else
		{
			$siteEmailSettingModel=$siteEmailSettingModel->LoadData();
			$this->render('siteEmailSetting',array('model'=>$siteEmailSettingModel));
		}
	}
}