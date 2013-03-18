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
	public function beforeAction($action)
	{
		if(Yii::app()->user->getUserStatus()!=1)
		{
			$allowedAction=array('user/index','user/refused','user/company','user/detail','user/password','user/logout');
			$allowedAction=array_merge($this->getModule()->allowedAction,$allowedAction);
			$requestAction=$this->getId().'/'.$action->getId();
			if(!in_array($requestAction,$allowedAction))
			{
				$this->redirect(array('user/refused'));
			}
		}
		return true;
		
	}
	public function actionRefused()
	{
		$status=Yii::app()->user->getUserStatus();
		$data=compact('status');
		$this->render('refused',$data);
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
                'cusers'=>array('*'),
        ),
			   );
	}*/
    public function actionFindPwd()
    {
        $this->layout = '//layouts/ajax_main';
        $model=new FindPasswordForm();
        if(isset($_POST['FindPasswordForm']))
        {
        	$model->attributes=$_POST['FindPasswordForm'];
        	$error='';
        	if($model->validate())
        	{
        		$user=User::model()->find('user_email=:email',array(':email'=>$model->email));
        		if($user)//判断邮箱是否存在
        		{
        			$newPwd=CStringHelper::generatePassword(6);
        			$user->user_pwd=md5($newPwd);
        			if($user->save())//将新密码加密保存入数据库
        			{
        				$result=CMessageHelper::sendFindPasswordEmail($model->email, $newPwd);
        				if($result['status']==1)
        				{
        					$this->redirect(array('/uehome/user/findPwdSucc','email'=>$model->email));
        				}
        				$error=$result['message'];
        			}
        			else {
        				$error='产生新密码失败！';
        			}
        			
        		}
        		else {
        			$error='邮箱对应的账户不存在！';
        		}
        	}
        }
        $this->render ( 'find_pwd',array('model'=>$model));
    }
    public function actionFindPwdSucc()
    {
        $this->layout = '//layouts/ajax_main';
        $email=$_GET['email'];
        $mailServer='';
        if(preg_match('/[\w]+@([\w]+)\.[\.\w]+/i',$email,$matches))
        {
        	$mailServer="mail.{$matches[1]}.com";
        }
        $data=compact('email','mailServer');
        $this->render ( 'find_pwd_succ',$data);
    }
    public function actionOnlineDel()
    {
        $model = OnlineSupport::model()->find("online_id=:online_id", array('online_id'=>$_REQUEST['ids']));
        $model->delete();
        Yii::app()->user->setFlash('success','删除成功');
        echo json_encode(array('status'=>1,'data'=>array()));
    }
    public function actionOnline()
    {
        $model = new OnlineForm();
        if (isset($_POST['OnlineForm']))
        {
            $model->attributes = $_POST['OnlineForm'];
            if ( $model->validate() )
            {
                $model->draft();
                Yii::app()->user->setFlash('success','更新在线服务成功!');
            }
        }
        else
        {
            $online_list = OnlineSupport::model()->findAll('online_ent_id=:online_ent_id', array(':online_ent_id'=>Yii::app()->user->getEntId()));
            foreach ( $online_list as $online_one)
            {
                $model->contact_name[] = $online_one->online_name;
                $model->contact_value[]= $online_one->online_num;
                $model->contact_id[]= $online_one->online_id;
            }
        }
        $this->render ( 'online',array('model'=>$model));
    }
    public function actionFlink()
    {
        $criteria=new CDbCriteria;
        $criteria->order='flink_id DESC';
        $criteria->addCondition("flink_user_id=".yii::app()->user->getID());

        $count=FriendLink::model()->count($criteria);

        $pager=new CPagination($count);
        $pager->pageSize=15;
        $pager->applyLimit($criteria);
        $list=FriendLink::model()->findAll($criteria);

		$this->render ( 'flink', array('data'=>$list,'pager'=>$pager));
    }
    public function actionFlinkadd()
    {
        $model = new FlinkForm();
        if (isset($_POST['FlinkForm']))
        {
            $model->attributes = $_POST['FlinkForm'];
            if ( $model->validate() )
            {
                $model->draft();
                Yii::app()->user->setFlash('success','添加友情链接成功!');
                $this->actionFlink();
            }
            
        }
        $this->render ( 'flink_add', array('model'=>$model));
    }
    public function actionFlinkdel()
    {
    if ( strstr($_REQUEST['ids'],',') )
        {
            $criteria=new CDbCriteria;
            $criteria->addCondition("flink_id in(".$_REQUEST['ids'].")");
            FriendLink::model()->deleteAll($criteria);
        }
        else
        {
            $model = FriendLink::model()->find("flink_id=:flink_id", array('flink_id'=>$_REQUEST['ids']));
            $model->delete();
        }
        echo json_encode(array('status'=>1,'data'=>array()));
    }
    public function actionIndex() {
        $user = User::model()->findByPk(Yii::app()->user->getID());
        $enterprise = Enterprise::model()->find("ent_user_id=:ent_user_id", array('ent_user_id'=>yii::app()->user->getID()));
        $model = new FileForm;
        $cert_list = $model->glist();
        $business_type = Term::model()->getTermsByGroupId(5);
        $ent_type = Term::getTermsByGroupId(4);
        $category = Term::getTermsListByGroupId(18);
		$this->render ( 'index', array('user'=>$user,'enterprise'=>$enterprise,'cert_list'=>$cert_list,'ent_type'=>$ent_type,'business_type'=>$business_type,'category'=>$category));
	}
    public function actionAutolist()
    {
        $keyword = isset($_REQUEST['term']) ? $_REQUEST['term'] : '';

        $connection = Yii::app()->db;
        $sql = 'select * from mu_user where user_name like "%'.$keyword.'%" and user_type != 0';
        $detail= $connection->createCommand($sql)->queryAll();

        foreach ($detail as $u)
        {
            $b['id'] = $u['user_id'];
            $b['lable'] = $u['user_name'];
            $b['value'] = $u['user_name'];
            $a[] = $b;
        }
        echo json_encode($a);

    }
    public function actionJob()
    {
        $this->render ( 'job' );
    }
    public function actionMessageAdd()
    {
        $model = new MessageForm();
        if ( isset($_REQUEST['view']) )
        {
            $connection = Yii::app()->db;
            $sql = 'select * from mu_message,mu_user_enterprise,mu_user 
                where (msg_id='.$_REQUEST['msg_id'].') AND (msg_from_user_id=ent_user_id) and msg_to_user_id=user_id
                ORDER BY msg_id DESC ';
            $detail= $connection->createCommand($sql)->queryAll();
            $model->msg_to_user_id = $detail[0]['msg_to_user_id'];
            $model->msg_to_user_name = $detail[0]['user_name'];
            $model->msg_subject= $detail[0]['msg_subject'];
            $model->msg_content= $detail[0]['msg_content'];
        }

        if (isset($_POST['MessageForm']))
        {
            $model->attributes = $_POST['MessageForm'];
            if ( $model->validate() )
            {
                $model->draft();
                Yii::app()->user->setFlash('success','站内短信发送成功!');
                $this->actionMessage();
            }
            
        }

        $view = isset($_REQUEST['view']) ? true :false;
        $data=compact('model', 'view');
		$this->render ( 'message_add', $data);
    }
    public function actionMessageDel(){
        if ( strstr($_REQUEST['ids'],',') )
        {
            $criteria=new CDbCriteria;
            $criteria->addCondition("msg_id in(".$_REQUEST['ids'].")");
            Message::model()->deleteAll($criteria);
        }
        else
        {
            $model = Message::model()->find("msg_id=:msg_id", array('msg_id'=>$_REQUEST['ids']));
            $model->delete();
        }
        Yii::app()->user->setFlash('success','站内短信删除成功!');
        echo json_encode(array('status'=>1,'data'=>array()));
    }
    public function actionMessage()
    {
    #    $criteria=new CDbCriteria;
    #    $criteria->join='join mu_user_enterprise ent on t.msg_from_user_id=ent.ent_user_id';
    #    $criteria->order='msg_id DESC';
    #    #$criteria->with=array('user'=>array('select'=>'user_name'));

    #    $criteria->addCondition('t.msg_to_user_id='.yii::app()->user->getID());
    #    $criteria->addCondition('t.msg_from_user_id=ent.ent_user_id');
    #    $list = Message::model()->findAll($criteria);

$connection = Yii::app()->db;
        if ( isset($_REQUEST['page']) )
        {
            $limit ='limit '.(15*($_REQUEST['page']-1)).','.(15*$_REQUEST['page']);
        }
        else
        {
            $limit = 'limit 0,15';
        }
$user_id =yii::app()->user->getID();
        $sql = 'select * from mu_message,mu_user_enterprise,mu_user 
            where (msg_to_user_id='.$user_id.' or msg_from_user_id='.$user_id.') AND (msg_from_user_id=ent_user_id) and msg_to_user_id=user_id
            ORDER BY msg_id DESC '.$limit;

        $list= $connection->createCommand($sql)->queryAll();
        $pager=new CPagination(count($list));
        $pager->pageSize=15;
        $this->render ( 'message', array('data'=>$list,'pager'=>$pager) );
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
            $error['repwd'] = '密码不一致';
        }
        if ( strlen($_REQUEST['pwd']) < 6)
        {
            $error['pwd'] = '密码至少6位';
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
        $u_model->user_type =2;
        $u_model->user_mobile_no = $_REQUEST['mobile_number'];
        $u_model->user_status = 33;
        $u_model->user_join_date = date("Y-m-d");

        $u_model->save();

        
            $e_model = new Enterprise();
            $e_model->ent_user_id=$u_model->primaryKey;
            $e_model->ent_name   = $_REQUEST['company_name'];
            $e_model->ent_type   = $_REQUEST['company_type'];
            $e_model->ent_location = $_REQUEST['address'];
            $e_model->ent_chief= $_REQUEST['nickname'];
            $e_model->ent_create_time = date("Y-m-d H:i:s");
            $e_model->ent_city  = $_REQUEST['user_city_id'];
            $e_model->ent_status = 33;
            $e_model->save();
        

        echo json_encode(array('status'=>1,'data'=>array()));

    }
	public function actionDetail() {
        $model = new UserForm();

        if (isset($_POST['UserForm']))
        {
            $model->attributes = $_POST['UserForm'];
            if ( $model->validate() )
            {
                $flag=$model->update();
                Yii::app()->user->setFlash('success','修改用户信息成功!');
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
        $data=compact('model','province','citys','flag');
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
            Yii::app()->user->setFlash('success','修改企业信息成功!');
        }
        else
        {
            $user = new Enterprise();
            $model = Enterprise::model()->find("ent_user_id=:ent_user_id", array('ent_user_id'=>yii::app()->user->getID()));
        }

        $business_type = Term::model()->getTermsByGroupId(5);
        $ent_type = Term::getTermsByGroupId(4);
		$allProvince =City::getProvice();
        $province=0;
        $allCity=array();
        if($model->ent_city)
        {
        	$cityCache=CCacheHelper::getAllCity();
        	$province=$cityCache[$model->ent_city]->city_parent;
            $allCity=City::getAllCity($province);

        }
		$this->render ( 'company' ,array('model'=>$model,'allProvince'=>$allProvince,'allCity'=>$allCity,'province'=>$province,'city'=>$allCity,'ent_type'=>$ent_type,'business_type'=>$business_type));
	}
	public function actionPassword() {
        $model = new PasswordForm();
        if (isset($_POST['PasswordForm']))
        {
            $model->attributes = $_POST['PasswordForm'];
            
            if ( $model->validate())
            {
	            $creteria=new CDbCriteria();
	            $creteria->select='user_pwd';
	            $creteria->condition='user_id='.Yii::app()->user->getId();
	            $user=User::model()->find($creteria);
            	if(md5($model->old_pwd)!=$user->user_pwd)
            	{
            		Yii::app()->user->setFlash('validateError','输入旧密码错误，修改失败！');
            	}
            	else {
                	$model->save();
                	Yii::app()->user->setFlash('validateSuccess','密码修改成功，请惠存！');
            	}
            	
            }
            else {
            	Yii::app()->user->setFlash('validateError','输入旧密码错误，修改失败！');
            }
            $model=new PasswordForm();
        }
		$this->render ( 'password' ,array('model'=>$model));
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
            $model->art_intro  = $article->art_intro;
        }
        if (isset($_POST['NewsForm']))
        {
            $model->attributes = $_POST['NewsForm'];
            if ( $model->validate() )
            {
                empty($model->art_id) ? $model->draft() : $model->update();
                $message = empty($model->art_id) ? '添加企业新闻成功' : '更新企业新闻成功';
                Yii::app()->user->setFlash('success',$message);
                $this->actionNlist();
            }
        }
		$this->render ( 'news', array('model'=>$model) );
	}
    public function actionNewsDel()
    {
        $model = UserArticle::model()->find("art_id=:art_id", array('art_id'=>$_REQUEST['ids']));
        $model->delete();
        Yii::app()->user->setFlash('success','企业新闻删除成功');
        echo json_encode(array('status'=>1,'data'=>array()));
    }
    public function actionSupplyDel()
    {
        if ( strstr($_REQUEST['ids'],',') )
        {
            $criteria=new CDbCriteria;
            $criteria->addCondition("supply_id in(".$_REQUEST['ids'].")");
            Supply::model()->deleteAll($criteria);
        }
        else
        {
            $model = Supply::model()->find("supply_id=:supply_id", array('supply_id'=>$_REQUEST['ids']));
            $model->delete();
        }
        Yii::app()->user->setFlash('success','供求删除成功');
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
        Yii::app()->user->setFlash('success','设置产品特价成功');
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
        Yii::app()->user->setFlash('success','产品删除成功');
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
                $message = empty($model->supply_id) ? '添加供求成功' : '更新供求成功';
                Yii::app()->user->setFlash('success',$message);
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
        $data=compact('model','supply_type','category','smallCategory','parentCategory','province','allCity','allProvince');
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
                $message = empty($model->product_id) ? '添加现货成功' : '更新现货成功';
                Yii::app()->user->setFlash('success',$message);
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
       
        $data=compact('model','product_type','parentType','product_smallType','allCity','unit_type','allProvince','province');
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
        $criteria->with=array('city'=>array('select'=>'city_name'),'category'=>array('select'=>'term_name'));
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
        $criteria->with=array('city'=>array('select'=>'city_name'),'type'=>array('select'=>'term_name'));
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
        $connection = Yii::app()->db;
        $sql = 'delete from mu_file where file_id='.$_REQUEST['ids']; 
        $detail= $connection->createCommand($sql)->execute();
       # $model = FileModel::model()->find("file_id=:file_id", array('file_id'=>$_REQUEST['ids']));
        # $model->delete();
        Yii::app()->user->setFlash('success','企业资质删除成功');
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
            if ( $model->validate())
            {
                $model_image=CUploadedFile::getInstance($model,'file_url');
                if (is_object($model_image) && get_class($model_image) === 'CUploadedFile')
                {
                    $filename = md5(uniqid());
                    $uploadfile= 'images/enterprise/'.Yii::app()->user->getId().'/'.$filename . '.' . $model_image->extensionName;
                    $model_image->saveAs($uploadfile);
                    $model->file_url= 'images/enterprise/'.Yii::app()->user->getId().'/'. $filename . '.' . $model_image->extensionName;
                }
                $model->save();
                Yii::app()->user->setFlash('success','添加企业资质成功!');
                $this->redirect( array('user/cert') );
            }
        }
        $category = Term::getTermsListByGroupId(18);
        $this->render ('cert_add', array('model'=>$model,'category'=>$category));
	}
    public function actionRegister()
    {
        $this->layout = '//layouts/ajax_main';
        $allProvince=City::getProvice('选择省份');
        $ent_type = Term::getTermsByGroupId(4);
        $role = Term::getTermsByGroupId(3);
        $data=compact('allProvince','ent_type','role');
        // display the login form
        $this->render ( 'register', $data);
    }
    public function actionAjaxLogin()
    {
    	$this->layout = '//layouts/ajax_main';
		$model = new UserLoginForm ();
		$result=array('status'=>0,'msg'=>'');
    	if (isset ( $_POST ['UserLoginForm'] )) {
			$model->attributes = $_POST ['UserLoginForm'];
			// validate user input and redirect to the previous page if valid
			if ($model->validate () && $model->login ())
			{
				$result['status']=1;
				$result['msg']=Yii::app()->user->getName();
			}
			else {
				$result['msg']='用户名和密码错误！';
			}
		}
		else {
			$result['msg']='非法请求！';
		}
		echo json_encode($result);
		Yii::app ()->end ();
    }
	public function actionLogin() {
		$this->layout = '//layouts/ajax_main';
		$model = new UserLoginForm ();
		$adv=CCacheHelper::getAdvertisement(127);//会员中心登录主体图片
		
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
			{
				
				$this->redirect(Yii::app()->user->returnUrl);
			}
		}
		$data=compact('adv','model');
		// display the login form
		$this->render ( 'login', $data );
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
					$storeFrontConfig=serialize($storeFrontConfig->setting_config_data);
					Yii::app()->fileCache->set(Yii::app()->user->getId(),$storeFrontConfig,2000);
					$storeFrontConfig=unserialize($storeFrontConfig);
				}
				else {
					$storeFrontConfig=require 'protected/config/storeFrontDefault.php';
				}
			}
			else {
				$storeFrontConfig=unserialize($storeFrontConfig);
			}
		}
		$data=compact('storeFrontConfig');
		$this->render('templateSetting',$data);
	}
	public function actionShopTemplate()
	{
		$templates=CCacheHelper::getShopTemplate();
		if($templateId=(int)@$_GET['temp_id'] )
		{
			if($templateDir=@$templates[$templateId]->temp_dir)
			{
				$updateRows=User::model()->updateByPk(Yii::app()->user->getId(), array('user_template'=>$templateDir));
				if($updateRows)
				{
					Yii::app()->user->user_template=$templateDir;
					Yii::app()->user->setFlash('validateSuccess','模板选择成功！');
				}
				else {
					Yii::app()->user->setFlash('validateError','模板选择失败！');
				}
			}
			else{
				Yii::app()->user->setFlash('validateError','模板选择失败！');
			}
		}
		$userTemplate=Yii::app()->user->user_template;
		$data=compact('templates','userTemplate');
		$this->render('shop_template',$data);
	}
}
