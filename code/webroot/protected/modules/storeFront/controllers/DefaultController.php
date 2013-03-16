<?php

class DefaultController extends Controller
{
	public $layout='//layouts/storeFront/default/main';
	public $template;
	public $storeFrontConfig;
	public $user;
	public $company;
	public $configCacheExpire=300;
	
	public function actions() {
		return array (// captcha action renders the CAPTCHA image displayed on the contact page
				'captcha' => array (
				'class' => 'CCaptchaAction', 
				'backColor' => 0xFFFFFF, 
				'minLength' => 4, //最短为4位
				'maxLength' => 4, //是长为4位
				'transparent' => true ,
				'height'=>35,
				'urlParams'=>array('username'=>Yii::app()->request->getParam('username')),
		) 
						);
	}
	public function beforeAction($action)
	{
		$this->_initStoreFrontData();
		return true;
	}
	private function _initStoreFrontData()
	{
		Yii::import('storeFront.widgets.default.*');
		$userName=@$_REQUEST['username'];
		$this->_getCurrentUser($userName);//获取当前要访问旺铺的用户信息
		//获取当前要访问旺铺的配置信息
		$this->_getStoreFrontConfig();
		$this->_getCompanyInfo();
	}
	private function _getCompanyInfo()
	{
		if($this->user->user_id)
		{
			$companyCriteria=new CDbCriteria();
			$companyCriteria->with=array(
				'type'=>array('select'=>'term_name'),
				'business'=>array('select'=>'term_name'),
				'chiefPosition'=>array('select'=>'term_name'),
			);
			$companyCriteria->compare('ent_user_id', '='.$this->user->user_id);
			$this->company=Enterprise::model()->find($companyCriteria);
			if($this->company && $this->company->ent_status==1)
			{
				
			}
			else {//企业未审核或者企业信息不存在
				$this->redirect(array('/site/index'));
			}
			$cityCache=CCacheHelper::getAllCity();
			if($this->company->ent_city)
			{
				$this->company->ent_city=City::getCityLayer($this->company->ent_city,'.');
			}
		}
	}
	private function _getStoreFrontConfig()
	{
		$this->storeFrontConfig=Yii::app()->fileCache->get($this->user->user_id);
		if(!$this->storeFrontConfig)
		{
			$storeFrontConfig=StoreFrontSetting::model()->find('user_id=:uid',array(':uid'=>$this->user->user_id));
			
			if($storeFrontConfig && $storeFrontConfig->setting_config_data)
			{
				Yii::app()->fileCache->set($this->user->user_id,$storeFrontConfig->setting_config_data,$this->configCacheExpire);
			}
			else {
				$this->storeFrontConfig=require 'protected/config/storeFrontDefault.php';
			}
		}
		else {
			$this->storeFrontConfig=unserialize($this->storeFrontConfig);
		}
	}
	private function _getCurrentUser($userName)
	{
		if($userName)
		{//获取全站需要的公共信息
			$userCriteria=new CDbCriteria();
			$userCriteria->addCondition('user_name=:username');
			$userCriteria->params[':username']=$userName;
			$user=User::model()->find($userCriteria);
			if($user)
			{
				$this->user=$user;
				if($user->user_open_template==0)
				{//没有开启模板
					$this->redirect(array('/site/index'));
				}
				else {
					if(!$user->user_template)
					{//没有模板
						$this->redirect(array('/site/index'));
					}
					$this->layout='//layouts/storeFront/'.$user->user_template.'/main';
				}

			}
		}
		else {//访问的用户不存在
			$this->redirect(array('/site/index'));
		}
	}
	public function actionIndex()
	{
		$img='/images/enterprise/'.$this->company->ent_image;
		$content=CStringHelper::truncate_utf8_string($this->company->ent_introduce, 300);
	$productCriteria=new CDbCriteria();
		$productCriteria->select='product_name,product_type_id,product_city_id,product_price,product_join_date';
		$productCriteria->with=array('unit'=>array('select'=>'term_name'),'city'=>array('select'=>'city_name'));
		$productCriteria->condition='product_status=1 and product_special=0 and product_user_id='.$this->user->user_id;
		$productCriteria->order='product_join_date desc';
		$productCriteria->limit=10;
		$productsList = Product::model()->findAll($productCriteria);
		
		if($productsList)
		{
			foreach ($productsList as &$product)
			{
				$product->product_city_id=City::getCityLayer($product->product_city_id,'.');
			}
		}
		$userName=$this->user->user_name;
		$data=compact('img','content','productsList','userName');
		$this->render('index',$data);
	}
	/**
	 * @return string the controller ID that is prefixed with the module ID (if any).
	 */
	public function getUniqueId()
	{
		//可以在此处添加根据用户选择的不同模板的路径
		$template=$this->user->user_template;
		return $this->getModule() ? $this->getModule()->getId().'/'.$this->getId()."/{$template}" : $this->getId();
	}
	public function actionCompanyProfile()
	{
		$img='/images/enterprise/'.$this->company->ent_image;
		$content=$this->company->ent_introduce;
		$company=$this->company;
		$authenticate=0;
		$data=compact('company','img','content','authenticate');
		$this->render('profile',$data);
	}
	public function actionNewsList()
	{
		$criteria = new CDbCriteria();

		$criteria->order = ' art_added_date desc'; 
		
		$criteria->select='art_id,art_title,art_intro,art_added_date';
		
		$criteria->condition='art_user_id='.$this->user->user_id;
		
		$count = UserArticle::model()->count($criteria);//
		
		$pager = new CPagination($count);
		
		$pager -> pageSize = 10; 
		
		$pager->applyLimit($criteria);
		
		$artList = UserArticle::model()->findAll($criteria);
		foreach ($artList as &$art)
		{
			$titleLength=strlen($art->art_title);
			$art->art_intro=CStringHelper::truncate_utf8_string(strip_tags($art->art_intro), 50-$titleLength);
		}
		
		$data=compact('artList','pager');
		
		$this->render('newsList',$data);
	}
	public function actionNewsDetail()
	{
		if($newsId=@$_GET['id'])
		{
			$model=UserArticle::model()->findByPk($newsId);
			if($model)
			{
				$model->art_content=$model->art_content;
			}
		}
		else {
			$this->redirect(array('newsList'));
		}
		$data=compact('model');
		$this->render('newsDetail',$data);
	}
	public function actionMail()
	{
		$model=new MessageForm();
		if(isset($_POST['MessageForm']))
		{
			//验证输入字段信息
			$model->attributes=$_POST['MessageForm'];
			
			if($model->validate())
			{//进行保存操作
				
				$message=new Message();
				$message->msg_content=$model->content;
				$message->msg_subject=$model->sub;
				$message->msg_to_user_id=$this->user->user_id;
				if(!Yii::app()->user->isGuest)
				{
					$message->msg_from_user_id=Yii::app()->user->getId();
				}
				else {
					if(!empty($model->fromCompany))
						$message->msg_from_info.="企业名称:{$model->fromCompany}<br>";
					if(!empty($model->fromContact))
						$message->msg_from_info.="联系人:{$model->fromContact}<br>";
					if(!empty($model->fromEmail))
						$message->msg_from_info.="发件人:{$model->fromEmail}<br>";
					if(!empty($model->fromTelephone))
						$message->msg_from_info.="电话号码:{$model->fromTelephone}<br>";
				}
				if($message->save())
				{
					$model=new MessageForm();
				}
			}
		}
		$company=$this->company;
		$user=$this->user;
		//登陆用户信息
		$uid=Yii::app()->user->isGuest?0:Yii::app()->user->getId();
		$loginUrl=Yii::app()->getController()->createUrl('/uehome/user/login');
		$userName=Yii::app()->user->isGuest?0:Yii::app()->user->getName();
		$storeFrontUrl=Yii::app()->getController()->createUrl('index',array('username'=>$userName));
		
		$company=$this->company;
		$user=$this->user;
		$data=compact('model','uid','loginUrl','userName','company','user','storeFrontUrl');
		$this->render('mail',$data);
	}
	public function actionProductsList()
	{
		$productCriteria=new CDbCriteria();
		$productCriteria->select='product_name,product_type_id,product_city_id,product_price,product_join_date';
		$productCriteria->with=array('unit'=>array('select'=>'term_name'),'city'=>array('select'=>'city_name'));
		$productCriteria->condition='product_status=1 and product_special=0 and product_user_id='.$this->user->user_id;
		$productCriteria->order='product_join_date desc';
		$count = Product::model()->count($productCriteria);//
		
		$pager = new CPagination($count);
		
		$pager -> pageSize = 10; 
		
		$pager->applyLimit($productCriteria);
		
		$productsList = Product::model()->findAll($productCriteria);
		
		if($productsList)
		{
			foreach ($productsList as &$product)
			{
				$product->product_city_id=City::getCityLayer($product->product_city_id,'.');
			}
		}
		$data=compact('productsList','pager');
		$this->render('productsList',$data);
		
	}
}