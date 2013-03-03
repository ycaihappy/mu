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
        $u_model->user_name  = $_REQUEST['nickname'];
        $u_model->user_email = $_REQUEST['email'];
        $u_model->user_pwd   = md5($_REQUEST['pwd']);
        $u_model->user_nickname = $_REQUEST['nickname'];
        $u_model->user_province_id = $_REQUEST['province'];
        $u_model->user_city_id     = $_REQUEST['city'];
        $u_model->user_subscribe   = $_REQUEST['newsletter'];
        $u_model->user_type = $_REQUEST['user_type'];
        $u_model->user_mobile_no = $_REQUEST['mobile_number'];
        $u_model->user_status = 1;
        $u_model->user_join_date = date("Y-m-d");
        $u_model->user_subscribe = $_REQUEST['newsletter'];
        $u_model->save();

        if ( $_REQUEST['user_type'] == 1)
        {
            $e_model = new Enterprise();
            $e_model->ent_user_id=$u_model->primaryKey;
            $e_model->ent_name   = $_REQUEST['company_name'];
            $e_model->ent_type   = $_REQUEST['company_type'];
            $e_model->ent_location = $_REQUEST['address'];
            $e_model->ent_chief= $_REQUEST['nickname'];
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
        $city = City::model()->getAllCity();
		$this->render ( 'detail', array('model'=>$model, 'city'=>$city) );
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
        $city = City::model()->getAllCity();

        $ent_type = Term::model()->getTermsByGroupId(5);
		$this->render ( 'company' ,array('model'=>$model,'city'=>$city,'ent_type'=>$ent_type));
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
        $supply_type = Term::model()->getTermsByGroupId(11);
        $product_type= Term::model()->getTermsByGroupId(14);
        $city = City::model()->getAllCity();
		$this->render ( 'supply' ,array('model'=>$model,'supply_type'=>$supply_type,'product_type'=>$product_type,'city'=>$city));
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
        $product_type= Term::model()->getTermsByGroupId(14);
        $unit_type= Term::model()->getTermsByGroupId(2);
        $city = City::model()->getAllCity();
		$this->render ( 'goods' , array('model'=>$model,'product_type'=>$product_type,'city'=>$city,'unit_type'=>$unit_type));
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
	public function actionUploadTemplateImage()
	{
		if(Yii::app()->request->isPostRequest)
		{
			$uid=Yii::app()->user->getId();
			$targetFolder="images/enterprise/{$uid}";
			if (!empty($_FILES) ) {
				$image_src=CUploadedFile::getInstanceByName('Filedata');
				$fileTypes = array('jpg','jpeg','gif','png'); // File extensions
				if(!in_array($image_src->getExtensionName(),$fileTypes))
				{
					echo '上传非图片类型.';
					exit;
				}
				if($image_src)
				{
					$newimg = $uid.'_'.time().'_'.rand(1, 9999).'.'.$image_src->getExtensionName();
					//根据时间戳重命名文件名,extensionName是获取文件的扩展名
					if(!file_exists($targetFolder))
					{
						mkdir($targetFolder);
					}
					$uploadedImg=$targetFolder.'/'.$newimg;
					$im = null;
					$imagetype = strtolower($image_src->getExtensionName());
					if($imagetype == 'gif')
						$im = imagecreatefromgif($image_src->getTempName());
					else if ($imagetype == 'jpg')
						$im = imagecreatefromjpeg($image_src->getTempName());
					else if ($imagetype == 'png')
						$im = imagecreatefrompng($image_src->getTempName());
					$width=@$_REQUEST['upload_width'];
					$height=@$_REQUEST['upload_height'];
					CThumb::resizeImage ( 
					$im,$width, $height,
					$uploadedImg, $image_src->getExtensionName());
					if(file_exists($uploadedImg))
					{
						echo $uploadedImg;
					}
					else {
						echo '该图片保存失败！';
					}
				}
			}
			else {
				echo '请选择要上传的文件！';
			}
		}
	}
	public function actionTemplateSetting()
	{
		if(Yii::app()->request->isPostRequest)
		{
			$c=array();
			$shopconfig=array();
			foreach($_POST['menu_order'] as $key=>$v)
			{
				$c[$key]['menu_show']=isset($_POST['menu_show'][$key])?$_POST['menu_show'][$key]:0;
				$c[$key]['menu_order']=$v;
				$c[$key]['menu_name']=$_POST['menu_name'][$key];
				$c[$key]['menu_link']=$_POST['menu_link'][$key];
			}
			foreach($c as $k=>$val) 
			{  
				$name[$k] = $val['menu_order'];
			}
			
			array_multisort($name,SORT_ASC,$c);
			$shopconfig['menu']=$c;
			foreach($_POST as $ks=>$v)
			{
				if(substr($ks,0,4)!='menu'&&$ks!='sconfig')
				{
					$shopconfig[$ks]=$v;
				}
			}
			$shop_config_array=$shopconfig;
			$shop_config_str=serialize($shop_config_array);	
			$storeFrontConfig=StoreFrontSetting::model()->find('user_id=:uid',array(':uid'=>Yii::app()->user->getId()));
			if(!$storeFrontConfig){
				$storeFrontConfig=new StoreFrontSetting();
				$storeFrontConfig->user_id=Yii::app()->user->getId();
			}
			$storeFrontConfig->setting_config_data=$shop_config_str;
			if($storeFrontConfig->save())
			{
				Yii::app()->fileCache->delete(Yii::app()->user->getId());
				Yii::app()->fileCache->set(Yii::app()->user->getId(),$storeFrontConfig->setting_config_data,2000);
				Yii::app()->user->setFlash('saveSuccess','保存成功！');
			}
			else {
				Yii::app()->user->setFlash('saveSuccess','保存失败！');
			}
			$storeFrontConfig=$shopconfig;
		}
		else {
			$storeFrontConfig=Yii::app()->fileCache->get(Yii::app()->user->getId());
			if(!$storeFrontConfig)
			{
				$storeFrontConfig=StoreFrontSetting::model()->find('user_id=:uid',array(':uid'=>Yii::app()->user->getId()));
				
				if($storeFrontConfig && $storeFrontConfig->setting_config_data)
				{
					$storeFrontConfig=unserialize($storeFrontConfig->setting_config_data);
					Yii::app()->fileCache->set(Yii::app()->user->getId(),$storeFrontConfig->setting_config_data,2000);
				}
				else {
					$storeFrontConfig=require 'protected/config/storeFrontDefault.php';
				}
			}
			else
			{
				$storeFrontConfig=unserialize($storeFrontConfig);
			}
		}
		$data=compact('storeFrontConfig');
		$this->render('templateSetting',$data);
	}
}
