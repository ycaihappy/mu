<?php

class UserController extends Controller {
	public $layout = '//layouts/user_main';
	public function actions() {
		return array (// captcha action renders the CAPTCHA image displayed on the contact page
				'captcha' => array (
				'class' => 'CCaptchaAction', 
				'backColor' => 0xFFFFFF, 
				'minLength' => 4, //最短为4位
				'maxLength' => 4, //是长为4位
				'transparent' => true ,
				'height'=>35
		) 
						);
	}
	public function accessRules()
	{
		return array('allow',  // allow all users to perform 'index' and 'view' actions
			    'actions'=>array('index','view','captcha'),
			    'users'=>array('*'),
			   );
	}
	public function actionIndex() {
		$this->render ( 'index' );
	}
	public function actionDetail() {
		$this->render ( 'detail' );
	}
	public function actionCompany() {
		$this->render ( 'company' );
	}
	public function actionPassword() {
		$this->render ( 'password' );
	}
	public function actionNews() {
		$this->render ( 'news' );
	}
	public function actionSupply() {
		$this->render ( 'supply' );
	}
	public function actionGoods() {
		$this->render ( 'goods' );
	}
	public function actionCert() {
		$this->render ( 'cert' );
	}
	public function actionLogin() {
		$this->layout = '//layouts/ajax_main';
		$model = new UserLoginForm ();
		
		if (! Yii::app ()->user->isGuest)
			$this->redirect ( array ('index' ) );
		
		// if it is ajax validation request
		if (isset ( $_POST ['ajax'] ) && $_POST ['ajax'] === 'login-form') {
			echo CActiveForm::validate ( $model );
			Yii::app ()->end ();
		}
		
		// collect user input data
		if (isset ( $_POST ['UserLoginForm'] )) {
			$model->attributes = $_POST ['UserLoginForm'];
			// validate user input and redirect to the previous page if valid
			if ($model->validate () && $model->login ())
				$this->redirect ( array ('index' ) );
		}
		// display the login form
		$this->render ( 'login', array ('model' => $model ) );
	}
	public function actionLogout() {
		Yii::app ()->user->logout ( false );
		$this->redirect ( array ('login' ) );
	}
}
