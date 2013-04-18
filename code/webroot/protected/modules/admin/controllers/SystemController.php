<?php



class SystemController extends AdminController {


	public function actionManageMessageTemplate()
	{
		$templateCriteria=new CDbCriteria();
		$templateCriteria->with=array('type'=>array('select'=>'term_name'));
		$templateCriteria->order='msg_template_added_date desc';
		$dataProvider=new CActiveDataProvider('MessageTemplate',array(
			'criteria'=>$templateCriteria,
			'pagination'=>array('pageSize'=>10,'pageVar'=>'page'
		)));
		$data=compact('dataProvider');
		$this->render('manageMessageTemplate',$data);
	}
	public function actionSaveMessageTemplate()
	{
		$model=new MessageTemplate();
		if(isset($_POST['MessageTemplate']))
		{
			$model->attributes=$_POST['MessageTemplate'];
			if($model->msg_template_id) $model->setIsNewRecord(false);
			if($model->save())
			{
				$this->redirect(array('manageMessageTemplate'));
			}
		}
		else {
			if($msgTemplateId=@$_GET['msg_template_id'])
			{
				$model=$model->findByPk($msgTemplateId);
			}
		}
		$templateType=Term::getTermsByGroupId(15);
		$data=compact('templateType','model');
		$this->render('updateMessageTemplate',$data);
	}
	public function actionManageRelativeRePrice()
	{
		CQueryRequestHelper::registerLastQueryForm(array('RelativeRePrice'),'RelativeRePrice');
		$model=new RelativeRePrice();
		if(isset($_REQUEST['RelativeRePrice']))
		{
			$model->attributes=$_REQUEST['RelativeRePrice'];
		}
		$model->re_status=(int)@$_REQUEST['RelativeRePrice']['re_status'];
		$model->re_type=(int)@$_REQUEST['RelativeRePrice']['re_type'];
		$model->re_name=@$_REQUEST['RelativeRePrice']['re_name'];
		$reCriteria=new CDbCriteria();
		$reCriteria->with=array('status'=>array('select'=>'term_name'),
		'type'=>array('select'=>'term_name'),
		'nameType'=>array('select'=>'term_name'),
		'fallup'=>array('select'=>'term_name'));
		$reCriteria->order='re_added_time desc';
		if($model->re_status)
		{
			$reCriteria->compare('re_status', $model->re_status);
		}
		if($model->re_type)
		{
			$reCriteria->compare('re_type', $model->re_type);
		}
		if($model->re_name)
		{
			$reCriteria->addSearchCondition('re_name', $model->re_name,true);
		}
		$dataProvider=new CActiveDataProvider('RelativeRePrice',array(
			'criteria'=>$reCriteria,
			'pagination'=>
				array(
					'pageSize'=>10,
					'pageVar'=>'page',
					'params'=>array(
						'RelativeRePrice[re_status]'=>$model->re_status,
						'RelativeRePrice[re_name]'=>$model->re_name,	
						'RelativeRePrice[re_type]'=>$model->re_type,
					),
					
		)));
		$allReStatus=Term::getTermsByGroupId(1);
		$allReTypes=Term::getTermsByGroupId(20);
		$data=compact('dataProvider','allReStatus','model','allReTypes');
		$this->render('manageRelativeRePrice',$data);
	}
	public function actionUpdateRelativeRePrice()
	{
		$model=new RelativeRePrice();
		if(isset($_POST['RelativeRePrice']))
		{
			$model->re_type=$_POST['RelativeRePrice']['re_type'];
			$model->attributes=$_POST['RelativeRePrice'];
			if($model->re_id) $model->setIsNewRecord(false);
			
			if($model->save())
			{
				$this->redirect(array('manageRelativeRePrice'));
			}
		}
		else {
			if($reId=@$_GET['re_id'])
			{
				$model=$model->findByPk($reId);
			}elseif(isset($_GET['RelativeRePrice']['re_type'])){
				$model->re_type=$_GET['RelativeRePrice']['re_type'];
			}
		}
		$allStatus=Term::getTermsByGroupId(1);
		$allNameTypies=Term::getMuCategoryByGroup();
		$allFallUp=Term::getTermsByGroupId(19);
		$allReTypes=Term::getTermsByGroupId(20);
		$data=compact('allStatus','model','allFallUp','allReTypes','allNameTypies');
		$this->render('updateRelativeRePrice',$data);
	}
	public function actionDeleteRelativeRePrice()
	{
		if(Yii::app()->request->isAjaxRequest)
		{
			$reId=@$_REQUEST['re_id'];
			if(!$reId )
			{
				
				echo '请选择要删除的价格信息';
				exit;
				
			}
			$deleteCriteria=new CDbCriteria();
			$deleteCriteria->addInCondition('re_id', $reId);
			$deleteeRows=RelativeRePrice::model()->deleteAll($deleteCriteria);
			if($deleteeRows>0)
			{
				echo '删除成功！';
			}
			else {
				echo '删除失败！';
			}
			exit;
		}
	}
	public function xxactionBulkMail()
	{
		$model=new BulkMailForm();
		if(Yii::app()->request->isPostRequest)
		{
			if(isset($_REQUEST['BulkMailForm']))
			{
				$model->attributes=$_REQUEST['BulkMailForm'];
				if($model->validate())
				{
					$criterial=new CDbCriteria();
					$criterial->select='user_email,user_mobile_no';
					if($model->province)
					{
						$model->province=array_map('intVal',$model->province);
						if(!in_array(0,$model->province))
							$criterial->addInCondition('user_province_id', $model->province);
					}
					if($model->userGroup)
					{
						$model->userGroup=array_map('intVal',$model->userGroup);
						if(!in_array(0,$model->userGroup))
							$criterial->addInCondition('user_type', $model->userGroup);
					}
					$users=User::model()->findAll($criterial);
					if($users)
					{
						if($model->sendType==2)//短信方式发送
						{
							
						}
						else {//邮件方式发送
							
						}
					}
				}
			}
		}
		$allSendType=array('1'=>'邮件方式','2'=>'短信方式');
		$allProvince=City::getProvice();
		$allBusModel=Term::getTermsByGroupId(5);
		$allUserGroup=UserGroup::getUserGroup();
		$data=compact('allProvince','allBusModel','allUserGroup');
		$this->render('bulkMail',$data);
	}
}



?>