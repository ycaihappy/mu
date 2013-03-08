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
		) ,
		'getCity'=>array(
			'class'=>'CGetCityAction',
		),
		'getChildrenTerm'=>array(
			'class'=>'CGetChildrenTermsAction',
			'emptySelect'=>'选择品类',
		),
		'getImagesFromLibary'=>array(
			'class'=>'CGetImageFromLibary'
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
        # check username
        $user_exist = User::model()->find('user_name=:user_name',array('user_name'=>$_REQUEST['user_name']));
        $error = array();
        if ( !empty($user_exist->user_id) )
        {
            $error['user_name'] = '用户名已经被注册';
        }
        if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $_REQUEST['email']))
        {
            $error['email'] = '邮箱格式不正确';
        }
        if ( $_REQUEST['pwd'] != $_REQUEST['repwd'])
        {
            $error['pwd'] = '密码不一致';
        }
        if (!empty($error))
        {
            echo json_encode(array('status'=>0,'data'=>$error));
            exit;
        }
        $u_model = new User();
        $u_model->user_name  = $_REQUEST['user_name'];
        $u_model->user_email = $_REQUEST['email'];
        $u_model->user_pwd   = md5($_REQUEST['pwd']);
        $u_model->user_nickname = $_REQUEST['nickname'];
        $u_model->user_province_id = $_REQUEST['user_province_id'];
        $u_model->user_city_id     = $_REQUEST['user_city_id'];
        $u_model->user_subscribe   = isset($_REQUEST['newsletter']) ? $_REQUEST['newsletter'] : 0;
        $u_model->user_type = $_REQUEST['user_type'];
        $u_model->user_mobile_no = $_REQUEST['mobile_number'];
        $u_model->user_status = 1;
        $u_model->user_join_date = date("Y-m-d");

        $u_model->save();

        if ( $_REQUEST['user_type'] == 1)
        {
            $e_model = new Enterprise();
            $e_model->ent_user_id=$u_model->primaryKey;
            $e_model->ent_name   = $_REQUEST['company_name'];
            $e_model->ent_type   = $_REQUEST['company_type'];
            $e_model->ent_location = $_REQUEST['address'];
            $e_model->ent_chief= $_REQUEST['nickname'];
            $e_model->ent_create_time = date("Y-m-d H:i:s");
            $e_model->ent_city  = $_REQUEST['user_city_id'];
            $e_model->save();
        }

        echo json_encode(array('status'=>1,'data'=>array()));

    }
	public function actionDetail() {
        $model = new UserForm();

        if (isset($_POST['UserForm']))
        {
            $model->attributes = $_POST['UserForm'];
            if ( $model->validate() )
            {
                $model->update();
            }
        }
        else
        {
            $user = User::model()->findByPk(Yii::app()->user->getID());
            $model->attributes=$user->attributes;
        }
        $province=City::getProvice('选择省份');
        $citys=array();
        if($model->user_city_id)
        {
        	$citys=City::getAllCity($model->user_province_id);
        }
        $data=compact('model','province','citys');
		$this->render ( 'detail',$data);
	}
	public function actionCompany() {
        $model = new EnterpriseForm();
        if (isset($_POST['Enterprise']))
        {
            $model->attributes = $_POST['Enterprise'];
            if ( $model->validate() )
            {
                $model->update();
            }
        }
        else
        {
            $user = new Enterprise();
            $model = Enterprise::model()->find("ent_user_id=:ent_user_id", array('ent_user_id'=>yii::app()->user->getID()));
        }

        $ent_type = Term::model()->getTermsByGroupId(5);
		$allProvince =City::getProvice();
        $province=0;
        $allCity=array();
        if($model->ent_city)
        {
        	$cityCache=CCacheHelper::getAllCity();
        	$province=$cityCache[$model->ent_city]->city_parent;
        	$allCity=City::getAllCity($province);
        }
		$this->render ( 'company' ,array('model'=>$model,'allProvince'=>$allProvince,'allCity'=>$allCity,'province'=>$province,'city'=>$allCity,'ent_type'=>$ent_type));
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
        if ( isset($_REQUEST['update']) )
        {
            $article= UserArticle::model()->find("art_id=:art_id", array('art_id'=>$_REQUEST['art_id']));
            $model->art_id    = $article->art_id;
            $model->art_title = $article->art_title;
            $model->art_content= $article->art_content;
        }
        if (isset($_POST['NewsForm']))
        {
            $model->attributes = $_POST['NewsForm'];
            if ( $model->validate() )
            {
               empty($model->art_id) ? $model->draft() : $model->update();
            }
            $this->actionNlist();
        }
		$this->render ( 'news', array('model'=>$model) );
	}
    public function actionNewsDel()
    {
        $model = UserArticle::model()->find("art_id=:art_id", array('art_id'=>$_REQUEST['ids']));
        $model->delete();
        echo json_encode(array('status'=>1,'data'=>array()));
    }
    public function actionSupplyDel()
    {
        $model = Supply::model()->find("supply_id=:supply_id", array('supply_id'=>$_REQUEST['ids']));
        $model->delete();
        echo json_encode(array('status'=>1,'data'=>array()));
    }
    public function actionProductSpecial()
    {
        if ( strstr($_REQUEST['ids'],',') )
        {
            $product_ids = explode(',', $_REQUEST['ids']);
            foreach ($product_ids as $one_id)
            {
                $model = Product::model()->find("product_id=:product_id", array('product_id'=>$one_id));
                $model->product_special = 1;
                $model->save();
            }
        }
        else
        {
            $model = Product::model()->find("product_id=:product_id", array('product_id'=>$_REQUEST['ids']));
            $model->product_special = 1;
            $model->save();
        }
        echo json_encode(array('status'=>1,'data'=>array()));
    }
    public function actionProductDel()
    {
        if ( strstr($_REQUEST['ids'],',') )
        {
            $criteria=new CDbCriteria;
            $criteria->addCondition("product_id in(".$_REQUEST['ids'].")");
            Product::model()->deleteAll($criteria);
        }
        else
        {
            $model = Product::model()->find("product_id=:product_id", array('product_id'=>$_REQUEST['ids']));
            $model->delete();
        }
        echo json_encode(array('status'=>1,'data'=>array()));
    }
	public function actionSupply() {
        $model = new SupplyForm();
        if ( isset($_REQUEST['update']) )
        {
            $supply= Supply::model()->find("supply_id=:supply_id", array('supply_id'=>$_REQUEST['supply_id']));
            $model->supply_id   = $supply->supply_id;
            $model->supply_name = $supply->supply_name;
            $model->supply_keyword = $supply->supply_keyword;
            $model->address     = $supply->supply_address;
            $model->tel         = $supply->supply_phone;
            $model->price       = $supply->supply_price;
            $model->description = $supply->supply_content;
            $model->effective_time = $supply->supply_valid_date;
            $model->category    = $supply->supply_category_id;
            $model->supply_category    = $supply->supply_type;
            $model->city    = $supply->supply_city_id;
            $model->unit    = $supply->supply_unit;
            $model->muContent    = $supply->supply_mu_content;
            $model->waterContent    = $supply->supply_water_content;
            $model->image    = $supply->supply_image_src;
        }

        if (isset($_POST['SupplyForm']))
        {
            $model->attributes = $_POST['SupplyForm'];
            
            if ( $model->validate() )
            {
                empty($model->supply_id) ? $model->draft() : $model->update();
                $this->actionSlist();

            }
            
        }

        $supply_type = Term::getTermsByGroupId(11);
		$category= Term::getTermsByGroupId(14,true,'选择分类');
        $parentCategory=0;
        $smallCategory=array();
        if($model->category)
        {
        	$allCategory=CCacheHelper::getMuCategory();
        	$parentCategory=$allCategory[$model->category]->term_parent_id;
        	$smallCategory=Term::getTermsByGroupId(14,false,$parentCategory,'选择品类');
        }
        $allProvince =City::getProvice();
        $province=0;
        $allCity=array();
        if($model->city)
        {
        	$cityCache=CCacheHelper::getAllCity();
        	$province=$cityCache[$model->city]->city_parent;
        	$allCity=City::getAllCity($province);
        }
        $allMuContent=Term::getTermsByGroupId(16,false,null,'选择品阶');
        $allWaterContent=Term::getTermsByGroupId(17,false,null,'选择含水量');
        $data=compact('allMuContent','model','supply_type','allWaterContent','category','smallCategory','parentCategory','province','allCity','allProvince');
		$this->render ( 'supply', $data);
	}
	public function actionGoods() {
        $model = new ProductForm();
        if ( isset($_REQUEST['update']) )
        {
            $good= Product::model()->find("product_id=:product_id", array('product_id'=>$_REQUEST['product_id']));
            $model->product_id   = $good->product_id;
            $model->product_name = $good->product_name;
            $model->product_keyword = $good->product_keyword;
            $model->product_city_id = $good->product_city_id;
            $model->product_price = $good->product_price;
            $model->product_join_date = $good->product_join_date;
            $model->product_type_id = $good->product_type_id;
            $model->product_quanity = $good->product_quanity;
            $model->product_content = $good->product_content;
            $model->product_mu_content = $good->product_mu_content;
            $model->product_image_src = $good->product_image_src;
            $model->product_unit = $good->product_unit;
            $model->product_water_content = $good->product_water_content;
        }
        if ( isset($_POST['ProductForm']) )
        {
            $model->attributes = $_POST['ProductForm'];
            if ( $model->validate() )
            {
                empty($model->product_id) ? $model->draft() : $model->update();
                $this->actionGlist();
            }
        }

        $product_type= Term::model()->getTermsByGroupId(14,true,'选择分类');
        $parentType=0;
        $product_smallType=array();
        if($model->product_type_id)
        {
        	$allCategory=CCacheHelper::getMuCategory();
        	$parentType=$allCategory[$model->product_type_id]->term_parent_id;
        	$product_smallType=Term::getTermsByGroupId(14,false,$parentType,'选择品类');
        }
        $allProvince =City::getProvice();
        $province=0;
        $allCity=array();
        if($model->product_city_id)
        {
        	$cityCache=CCacheHelper::getAllCity();
        	$province=$cityCache[$model->product_city_id]->city_parent;
        	$allCity=City::getAllCity($province);
        }
        $unit_type= Term::model()->getTermsByGroupId(2);
        $allMuContent=Term::getTermsByGroupId(16,false,null,'选择品阶');
        $allWaterContent=Term::getTermsByGroupId(17,false,null,'选择含水量');
        $data=compact('allWaterContent','allMuContent','model','product_type','parentType','product_smallType','allCity','unit_type','allProvince','province');
		$this->render ( 'goods' , $data);
	}
	public function actionNlist() {

        $status = Term::model()->getTermsByGroupId(1);
        $city  = City::getAllCity();
        $category = Term::model()->getTermsByGroupId(14);
        $criteria=new CDbCriteria;
        $criteria->order='art_id DESC';
        if ( isset($_REQUEST['news_status']) )
            $criteria->addCondition("news_status=".$_REQUEST['news_status']);
        $criteria->addCondition("art_user_id=".yii::app()->user->getID());

        $count=UserArticle::model()->count($criteria);
        $selectStatus = isset($_REQUEST['news_status']) ? $_REQUEST['news_status'] : 0;

        $pager=new CPagination($count);
        $pager->pageSize=15;
        $pager->applyLimit($criteria);
        $list=UserArticle::model()->findAll($criteria);
		$this->render ( 'nlist', array('status'=>$status,'allcity'=>$city,'allcategory'=>$category,'data'=>$list, 'pager'=>$pager, 'select_status'=>$selectStatus) );
	}
	public function actionSlist() {

        $status = Term::model()->getTermsByGroupId(1);
        $city  = City::getAllCity();
        $category = Term::model()->getTermsByGroupId(14);
        $criteria=new CDbCriteria;
        $criteria->order='supply_id DESC';
        $criteria->with=array('city'=>array('select'=>'city_name'),'muContent'=>array('select'=>'term_name'),'category'=>array('select'=>'term_name'));
        if ( $supplyStatus=@$_REQUEST['supply_status'])
            $criteria->addCondition("supply_status=".$supplyStatus);
        $criteria->addCondition("supply_user_id=".yii::app()->user->getID());

        $count=Supply::model()->count($criteria);
        $selectStatus = isset($_REQUEST['supply_status']) ? $_REQUEST['supply_status'] : 0;

        $pager=new CPagination($count);
        $pager->pageSize=15;
        $pager->applyLimit($criteria);
        $list=Supply::model()->findAll($criteria);
		$this->render ( 'slist', array('status'=>$status,'allcity'=>$city,'allcategory'=>$category,'data'=>$list, 'pager'=>$pager, 'select_status'=>$selectStatus) );
	}
	public function actionGlist() {
        $status = Term::model()->getTermsByGroupId(1);
        $city  = City::getAllCity();
        $category = Term::model()->getTermsByGroupId(14);
        $criteria=new CDbCriteria;
        $criteria->order='product_id DESC';
        $criteria->with=array('city'=>array('select'=>'city_name'),'muContent'=>array('select'=>'term_name'),'type'=>array('select'=>'term_name'));
        if ( $product_status=@$_REQUEST['product_status'] )
            $criteria->addCondition("product_status=".$product_status);
        $criteria->addCondition("product_user_id=".yii::app()->user->getID());

        $selectStatus = isset($_REQUEST['product_status']) ? $_REQUEST['product_status'] : 0;
        $count=Product::model()->count($criteria);

        $pager=new CPagination($count);
        $pager->pageSize=10;
        $pager->applyLimit($criteria);
        $list=Product::model()->findAll($criteria);
		$this->render ( 'glist', array('status'=>$status,'allcity'=>$city,'allcategory'=>$category,'data'=>$list, 'pager'=>$pager, 'select_status'=>$selectStatus) );
	}
    public function actionCertDel()
    {
        $model = FileModel::model()->find("file_id=:file_id", array('file_id'=>$_REQUEST['ids']));
        $model->delete();
        echo json_encode(array('status'=>1,'data'=>array()));
    }
	public function actionCert() {
        $model = new FileForm;
        $cert_list = $model->glist();
        $category = Term::getTermsListByGroupId(18);
		$this->render ( 'cert' ,array('data'=>$cert_list,'category'=>$category));
	}
	public function actionAddcert() {

        $model = new FileForm();
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
            $category = Term::getTermsListByGroupId(18);
            $this->render ('cert_add', array('model'=>$model,'category'=>$category));
        }

	}
    public function actionRegister()
    {
        $this->layout = '//layouts/ajax_main';
        $allProvince=City::getProvice('选择省份');
        $data=compact('allProvince');
        // display the login form
        $this->render ( 'register', $data);
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
				$this->redirect(Yii::app()->user->returnUrl);
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
