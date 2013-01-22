<?php

class SiteController extends Controller
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
		$this->render('index');
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
	public function actionCreateCity()
	{
		$model=new City();
		if($_POST['City'])
		{
			$model->attributes = $_POST['City'];
			try {
				if ($model->save()) {
					Yii::app()->user->setFlash('updateSuccess', 'created successfully');
					$this->renderPartial('manageCity/update', array('model' => $model));
				}
				else {
					$this->renderPartial('manageCity/create', array('model' => $model));
				}
			}catch(CDbException $exc)
			{
				$this->renderPartial('manageCity/create', array('model' => $model));
			}
		}
		else {
			$this->renderPartial('manageCity/create', array('model' => $model));
		}
	}
	public function actionUpdateCity() {
		$message = "";
		if (isset($_POST['City'])) {
			$model->attributes = $_POST['City'];
			try {
				if ($model->save()) {
					Yii::app()->user->setFlash('updateSuccess', 'updated successfully');
				} else {
					$this->renderPartial('manageCity/update', array('model' => $model));
				}
			}
			catch(CDbException $exc)
			{
				$this->renderPartial('manageCity/update', array('model' => $model));
			}
		}
		$this->renderPartial('manageCity/update', array('model' => $model));
	}
	public function actionManageCity()
	{
		if(Yii::app()->request->isAjaxRequest)
		{

		}
		else {
			if (!Yii::app()->request->isAjaxRequest) {
				Yii::app()->user->setState("currentPage", Yii::app()->request->getParam('page', 0) - 1);
			}
			$criteriaCity=new CDbCriteria();
			$criteriaCity->select='*';
			$criteriaCity->order='city_parent asc';
			$pages = new CPagination(City::model()->count($criteriaCity));
			$pages->route = "manageCity";
			$pages->pageSize = 20;
			$pages->applyLimit($criteriaCity);
			$pages->setCurrentPage(Yii::app()->admin->getState('currentPage'));
			$citys=City::model()->findAll($criteriaCity);
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
					$city->city_parent=implode('&laquo;',$parentCity);
				}
			}

		}
	}
	public function actionCreateTerm()
	{
		$model=new City();
		if($_POST['Term'])
		{
			$model->attributes = $_POST['Term'];
			try {
				if ($model->save()) {
					Yii::app()->user->setFlash('updateSuccess', 'created successfully');
					$this->renderPartial('manageTerm/update', array('model' => $model));
				}
				else {
					$this->renderPartial('manageTerm/create', array('model' => $model));
				}
			}catch(CDbException $exc)
			{
				$this->renderPartial('manageTerm/create', array('model' => $model));
			}
		}
		else {
			$termGroup=TermGroup::model()->findAll();
			$this->renderPartial('manageTerm/create', array('model' => $model));
		}
	}
	public function actionUpdateTerm() {
		$message = "";
		if (isset($_POST['Term'])) {
			$model->attributes = $_POST['Term'];
			try {
				if ($model->save()) {
					Yii::app()->user->setFlash('updateSuccess', 'updated successfully');
				} else {
					$this->renderPartial('manageTerm/update', array('model' => $model));
				}
			}
			catch(CDbException $exc)
			{
				$this->renderPartial('manageTerm/update', array('model' => $model));
			}
		}
		$termGroup=TermGroup::model()->findAll();
		$this->renderPartial('manageTerm/update', array('model' => $model));
	}
	public function actionManageTerm()
	{
		if(Yii::app()->request->getIsPostRequest())
		{//update or add Term Data
				
		}
		else//list term data
		{
			if (!Yii::app()->request->isAjaxRequest) {
				Yii::app()->user->setState("currentPage", Yii::app()->request->getParam('page', 0) - 1);
			}
			$criteriaTerm=new CDbCriteria();
			$criteriaTerm->select='*';
			$criteriaTerm->order='term_group_id asc';
			$criteriaTerm->with=array('termGroup');
			$pages = new CPagination(City::model()->count($criteriaTerm));
			$pages->route = "manageTerm";
			$pages->pageSize = 20;
			$pages->applyLimit($criteriaTerm);
			$pages->setCurrentPage(Yii::app()->admin->getState('currentPage'));
			$terms=Term::model()->findAll($criteriaTerm);
			if($terms)
			{
				$cachedTerm=CCacheHelper::getAllTerm();
				foreach ($cachedTerm as $term)
				{
					$parentTerm=array();
					$parent=$term->term_parent_id;
					while($parent)
					{
						$parentTerm[]=$cachedTerm[$parent]->term_name;
						$parent=$cachedTerm[$parent]->term_parent_id;
					}
					$city->term_parent=implode('&laquo;',$parentTerm);
				}

			}
		}
	}
}