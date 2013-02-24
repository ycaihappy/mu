<?php

class DefaultController extends Controller
{
	public $layout='//layouts/storeFront/default/main';
	public $template;
	public $storeFrontConfig;
	public $user;
	public $company;
	public $configCacheExpire=300;
	
	public function init()
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
			$companyCriteria->compare('ent_user_id', '='.$this->user->user_id);
			$this->company=Enterprise::model()->find($companyCriteria);
			if($this->company && $this->company->ent_status==1)
			{
				
			}
			else {//企业未审核或者企业信息不存在
				$this->redirect(array('/site/index'));
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
				$this->storeFrontConfig=unserialize($storeFrontConfig->setting_config_data);
				Yii::app()->fileCache->set($this->user->user_id,$storeFrontConfig->setting_config_data,$this->configCacheExpire);
			}
			else {
				$this->storeFrontConfig=require 'protected/config/storeFrontDefault.php';
			}
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
				}

			}
		}
		else {//访问的用户不存在
			$this->redirect(array('/site/index'));
		}
	}
	public function actionIndex()
	{
		$img='images/enterprise/'.$this->company->ent_image;
		$content=CStringHelper::truncate_utf8_string($this->company->ent_introduce, 300);
		$rec_pro=array(
		array('title'=>'测试产品','pic'=>''),
		array('title'=>'测试产品','pic'=>''),
		array('title'=>'测试产品','pic'=>''),
		);
		$data=compact('img','content','rec_pro');
		$this->render('index',$data);
	}
	/**
	 * @return string the controller ID that is prefixed with the module ID (if any).
	 */
	public function getUniqueId()
	{
		//可以在此处添加根据用户选择的不同模板的路径
		$template=$this->user->user_template;
		return $this->getModule() ? $this->getModule()->getId()."/{$template}/".$this->getId() : $this->getId();
	}
}