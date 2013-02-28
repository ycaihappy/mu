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
	/*public function filters()
    {
        return array(
            'accessControl',
        );
    }
	public function accessRules()
	{
		return array(
		array('allow',  // allow all users to perform 'index' and 'view' actions
			    'actions'=>array('login','captcha','register'),
			    'users'=>array('*'),)
		,
		array('deny',  // deny all users
                'users'=>array('*'),
        ),
			   );
	}*/
	public function actionIndex() {
		$this->render ( 'index' );
	}
    public function actionRegisterUser()
    {
        $u_model = new User();
        $u_model->user_email = $_REQUEST['email'];
        $u_model->user_pwd   = md5($_REQUEST['pwd']);
        $u_model->user_nickname = $_REQUEST['nickname'];
        $u_model->user_province_id = $_REQUEST['province'];
        $u_model->user_city_id     = $_REQUEST['city'];
        $u_model->user_subscribe   = $_REQUEST['newsletter'];
        $u_model->save();
        if ( $_REQUEST['user_type'] == 1)
        {
            $e_model = new Enterprise();
            $e_model->ent_user_id='';
            $e_model->location = $_REQUEST['ent_location'];
            $e_model->ent_chief= $_REQUEST['ent_chief'];
            $e_model->save();
        }

        echo json_encode(array('status'=>1,'data'=>array()));

    }
	public function actionDetail() {
        $model = new UserForm();

        if (isset($_POST['User']))
        {
            $model->attributes = $_POST['User'];
            #if ( $model->validate() )
            {
                $model->update();
            }
        }
        else
        {
            $user = new User();
            $model = $user_info = User::model()->findByPk(yii::app()->user->getID());
        }
		$this->render ( 'detail', array('model'=>$model) );
	}
	public function actionCompany() {
        $model = new EnterpriseForm();

        if (isset($_POST['Enterprise']))
        {
            $model->attributes = $_POST['Enterprise'];
            #if ( $model->validate() )
            {
                $model->update();
            }
        }
        else
        {
            $user = new Enterprise();
            $model = Enterprise::model()->find("ent_user_id=:ent_user_id", array('ent_user_id'=>yii::app()->user->getID()));
        }
		$this->render ( 'company' ,array('model'=>$model));
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
        $model = new FileForm;
        $cert_list = $model->glist();
		$this->render ( 'cert' ,array('data'=>$cert_list));
	}
	public function actionAddcert() {
        $model=new FileForm;

        if(isset($_POST['FileForm']))
        {
            $model->attributes=$_POST['FileForm'];

            $model->image=CUploadedFile::getInstance($model,'image');
            if (is_object($model->image) && get_class($model->image) === 'CUploadedFile')
            {
                $filename = md5(uniqid());
                $uploadfile= 'uploads/'. $filename . '.' . $model->image->extensionName;
                $model->image->saveAs($uploadfile);
                $model->file_url= 'uploads/' . $filename . '.' . $model->image->extensionName;
            }
            $model->save();
            $this->redirect( array('user/cert') );
        }
        else
        {
            $this->render ('cert_add', array('model'=>$model));
        }

	}
    public function actionRegister()
    {
        $this->layout = '//layouts/ajax_main';
        // display the login form
        $this->render ( 'register');
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
