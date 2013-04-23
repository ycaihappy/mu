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
	public function actionBulkMail()
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
							$toMobile=array();
							foreach ($users as $user)
							{
								$toMobile[]=$user->user_mobile_no;
							}

						}
						else {//邮件方式发送
							$toEmail=array();
							foreach ($users as $user)
							{
								$toEmail[]=$user->user_email;
							}
							$emailSetting=new SiteEmailSetting();
							$emailSetting->LoadData();
							CMessageHelper::sendEmail($emailSetting->sendorEmail,$model->mailSubject
							,$toEmail,$model->mailSubject);
						}
					}
				}
				$model=new BulkMailForm();
			}
		}
		$allSendType=array('1'=>'邮件方式','2'=>'短信方式');
		$allProvince=City::getProvice('全部地区');
		$allBusModel=Term::getTermsByGroupId(5);
		$model->sendType=1;
		$allUserGroup=UserGroup::getUserGroup();
		$data=compact('allProvince','allBusModel','allUserGroup','model','allSendType');
		$this->render('bulkMail',$data);
	}
	public function actionManageConvert()
	{
		$dataProvider=new CActiveDataProvider('Convert',array(
			'pagination'=>
		array(
					'pageSize'=>10,
					'pageVar'=>'page',
			
		)));
		$data=compact('dataProvider');
		$this->render('manageConvert',$data);
	}
	public function actionCollectConvert()
	{
		if(Yii::app()->request->isAjaxRequest)
		{
			$siteInfo=new BasicSiteInfo();
			$siteInfo=$siteInfo->LoadData();
			$collectionUrl=$siteInfo->convertCollectionUrl;
			$urlValidator=new CUrlValidator;
			if($urlValidator->validateValue($collectionUrl))
			{
				$html=Yii::app()->htmlParser->file_get_html($collectionUrl);
				if($html)
				{
					$trs=$html->find('div#tab tr');
					if($trs && is_array($trs))
					{
						unset($trs[0]);
						if(count($trs)>1)
						{
							Convert::model()->deleteAll();
						}
						foreach ($trs as $tr)
						{
							$convert=new Convert();
							$tds=$tr->find('td');
							if($tds)
							{
								foreach ($tds as $key=>$td)
								{
									switch ($key)
									{
										case 0:
											$convert->co_name=mb_convert_encoding($td->innertext(), 'utf-8','gb2312');
											break;
										case 1:
											$convert->co_unit=$td->innertext();
											break;
										case 2:
											$convert->co_cur_price=$td->innertext();
											break;
										case 3:
											$convert->co_sell_price=$td->innertext();
											break;
										case 4:
											$convert->co_cur_rate_buy_price=$td->innertext();
											break;
										case 5:
											$convert->co_cur_cash_buy_price=$td->innertext();
											break;
									}
								}
								$convert->save();
							}
						}
						echo '采集成功';
					}
					echo Convert::model()->count()>0?'采集成功！':'采集失败！';
					Yii::app ()->end ();
				}
			}
			else {
				echo '采集地址设置不合法！请进入 网站设置>>网站基本信息设置 中正确设置';
			}
		}
		else
		{
			echo '非法请求！';
		}

	}
	public function actionDeleteConvert()
	{
		if(Yii::app()->request->isAjaxRequest)
		{
			$coId=@$_REQUEST['co_id'];
			if(!$coId )
			{
				echo '请选择要删除的外汇牌价信息';
				exit;
			}
			$deleteCriteria=new CDbCriteria();
			$deleteCriteria->addInCondition('co_id', $coId);
			$deleteeRows=Convert::model()->deleteAll($deleteCriteria);
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
	public function actionUpdateConvert()
	{
		$model=new Convert();
		if(isset($_POST['Convert']))
		{
			$model->attributes=$_POST['Convert'];
			if($model->co_id) $model->setIsNewRecord(false);
			if($model->save())
			{
				$this->redirect(array('manageConvert'));
			}
		}
		if($coId=@$_GET['co_id'])
		{
			$model=$model->findByPk($coId);
		}
		$data=compact('model');
		$this->render('updateConvert',$data);
	}
}



?>