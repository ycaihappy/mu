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
    public function actionCase()
    {
        $this->render ( 'case' );
    }
	public function actionNews() {
        $model = new NewsForm();
        if (isset($_POST['NewsForm']))
        {
            $model->attributes = $_POST['NewsForm'];
            if ( $model->validate() )
            {
                $model->draft();
            }
        }
		$this->render ( 'news', array('model'=>$model) );
	}
	public function actionSupply() {
        $model = new SupplyForm();
        if (isset($_POST['SupplyForm']))
        {
            $model->attributes = $_POST['SupplyForm'];
            if ( $model->validate() )
            {
                $model->draft();
            }
        }
		$this->render ( 'supply' ,array('model'=>$model));
	}
	public function actionGoods() {
        $model = new ProductForm();
        if ( isset($_POST['ProductForm']) )
        {
            $model->attributes = $_POST['ProductForm'];

            if ( $model->validate() )
            {
                $model->draft();
            }
        }
		$this->render ( 'goods' , array('model'=>$model));
	}
	public function actionCert() {
		$this->render ( 'cert' );
	}
	public function actionAddcert() {
        $model=new FileForm;
        if(isset($_POST['FileForm']))
        {
            $model->attributes=$_POST['FileForm'];
            $model->image=CUploadedFile::getInstance($model,'image');
            if (is_object($model) && get_class($model) === 'CUploadedFile')
            {
                $uploaddir=Yii::app()->basePath . '/uploads/';
                echo $uploaddir;exit;
                $filename = md5(uniqid());
                $uploadfile= $uploaddir . $filename . '.' . $model->image->extensionName;
                $model->image->saveAs($uploadfile);
                $model->picture = 'uploads/' . $filename . '.' . $ext;
            }
        }
        $this->render ( 'cert_add', array('model'=>$model) );
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
