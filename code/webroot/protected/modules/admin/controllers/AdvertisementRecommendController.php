<?php
class AdvertisementRecommendController extends AdminController {

	public function actionManageAdvertisement()
	{
		$model=new Advertisement();
		$advertisementCriteria=new CDbCriteria();
		$adPos=@$_POST['Advertisement']['ad_no'];
		$model->ad_no=$adPos;
		$adType=@$_POST['Advertisement']['ad_type'];
		//$adStartTime=@$_POST['Advertisement']['ad_start_date'];
		$model->ad_type=$adType;
		//$adEndTime=@$_POST['Advertisement']['ad_end_date'];
		$adEnterprise=@$_POST['Advertisement']['ad_user_id'];
		$model->ad_user_id=$adEnterprise;
		$adTitle=@$_POST['Advertisement']['ad_title'];
		$model->ad_title=$adTitle;
		$adStatus=@$_POST['Advertisement']['ad_status'];
		$model->ad_status=$adStatus;
		if($adStatus)
		{
			$advertisementCriteria->addCondition('ad_status=:ad_status');
			$advertisementCriteria->params[':ad_status']=$adStatus;
		}
		if($adTitle)
		{
			$advertisementCriteria->addSearchCondition('ad_title',$adTitle,true);
		}
		if($adPos)
		{
			$advertisementCriteria->compare('ad_no','='.$adPos,true);
		}
		if($adType)
		{
			$advertisementCriteria->compare('ad_type','='.$adType,true);
		}
		if($adEnterprise)
		{
			$advertisementCriteria->addSearchCondition('enterprise.ent_name',$adEnterprise,true);
		}

		$advertisementCriteria->with=array('user.enterprise'=>array('select'=>'ent_name'),
											'type'=>array('select'=>'term_name'),
											'position'=>array('select'=>'term_name'),
											'status'=>array('select'=>'term_name'),);
		$adDataProvider=new CActiveDataProvider('Advertisement',array(
			'criteria'=>$advertisementCriteria,
			'pagination'=>array('pageSize'=>20,
				'pageVar'=>'page',
				'params'=>array('Advertisement[ad_no]'=>$model->ad_no,
							'Advertisement[ad_user_id]'=>$model->ad_user_id,
							'Advertisement[ad_type]'=>$model->ad_type,
							'Advertisement[ad_title]'=>$model->ad_title,
							'Advertisement[ad_status]'=>$model->ad_status,
		),
		),
			'sort'=>array('defaultOrder'=> array('ad_create_time'=>CSort::SORT_DESC), ),
		));
		$adStatus=Term::getTermsByGroupId(1);
		$adPosition=Term::getTermsByGroupId(7);
		$adType=Term::getTermsByGroupId(6);
		$this->render('manageAdvertisement',array('dataProvider'=>$adDataProvider,
		'model'=>$model,
		'adType'=>$adType,
		'adStatus'=>$adStatus,
		'adPosition'=>$adPosition,
		));

	}
	public function actionUpdateAdvertisement()
	{
		$model=new Advertisement();
		if(isset($_POST['Advertisement']))
		{
			$model->attributes=$_POST['Advertisement'];
			if($model->ad_id)$model->setIsNewRecord(false);
			$model->ad_media_src=CUploadedFile::getInstance($model,'ad_media_src');
			if($model->ad_media_src)
			{
				$newimg = 'advertisement_'.$model->ad_user_id.'_'.time().'_'.rand(1, 9999).'.'.$model->ad_media_src->extensionName;
				//根据时间戳重命名文件名,extensionName是获取文件的扩展名
				$model->ad_media_src->saveAs('images/advertisement/'.$newimg);
				$model->ad_media_src = $newimg;
			}
			else {
				$model->ad_media_src=$_POST['ad_media_src_hidden'];

			}
			if($model->save())
			{
				$this->redirect(array('manageAdvertisement'));
			}
		}
		if($adId=(int)@$_GET['ad_id']){
			$model=$model->findByPk($adId);
		}
		$adPosition=Term::getTermsByGroupId(7);
		$adStatus=Term::getTermsByGroupId(1);
		$adType=Term::getTermsByGroupId(6);
		$this->render('updateAdvertisement',array(
			'adPosition'=>$adPosition,
			'adStatus'=>$adStatus,
			'adType'=>$adType,
			'model'=>$model,
		));

	}

	public function actionManageRecommend()
	{
		$model=new Recommend();
		$recommendCriteria=new CDbCriteria();
		$model->recommend_type=@$_POST['Recommend']['recommend_type'];
		$model->recommend_position=@$_POST['Recommend']['recommend_position'];
		$model->recommend_id=@$_POST['Recommend']['recommend_title'];
		$model->recommend_status=@$_POST['Recommend']['recommend_status'];
		if($model->recommend_type)
		{
			$recommendCriteria->compare('recommend_type', '='.$model->recommend_type);
				
		}
		if($model->recommend_position)
		{
			$recommendCriteria->compare('recommend_position', '='.$model->recommend_position);
				
		}
		if($model->recommend_status)
		{
			$recommendCriteria->compare('recommend_status', '='.$model->recommend_status);
				
		}
		if($model->recommend_id)
		{
			$recommendCriteria->addSearchCondition('name', $model->recommend_id,true);
		}
		$recommendCriteria->select='recommend_id,name,recommend_object_id,recommend_time';
		$recommendCriteria->with=array('infoType'=>array('select'=>'term_name'),'status'=>array('select'=>'term_name'),'module'=>array('select'=>'term_name'));
		$dataProvider=new CActiveDataProvider('RecommendView',
		array(
		'criteria'=>$recommendCriteria,
		'pagination'=>array(
		        'pageSize'=>20,
				'pageVar'=>'page',
				'params'=>array('Recommend[recommend_type]'=>$model->recommend_type,
						'Recommend[recommend_position]'=>$model->recommend_position,
						'Recommend[recommend_title]'=>$model->recommend_id,
						'Recommend[recommend_status]'=>$model->recommend_status,
		),
		),
		)
		);
		$reStatus=Term::getTermsByGroupId(1);
		$rePosition=Term::getTermsByGroupId(13);
		$reType=Term::getTermsByGroupId(12);
		$this->render('manageRecommend',array('model'=>$model,
		'dataProvider'=>$dataProvider,
		'reStatus'=>$reStatus,
		'rePosition'=>$rePosition,
		'reType'=>$reType
		));
	}
	public function actionChangePosition()
	{
		$recommendIds=$_POST['Recommend']['recommend_id'];
		$toPosition=$_POST['Recommend']['recommend_position'];
		$result=$this->_changeInfo($recommendIds, 'recommend_position', $toPosition);
	}
	private function _changeInfo($recommendIds,$column,$value)
	{
		if($recommendIds)
		{
			if($value)
			{
				$updateTypeCriteria=new CDbCriteria();
				if(is_array($objectIds))
				{
					$updateTypeCriteria->addInCondition('recommend_id',$recommendIds );
				}
				else {
					$updateTypeCriteria->compare('recommend_id', '=:'.$recommendIds);
				}
				$updateRows=Recommend::model()->updateAll(array($column=>$value),$updateTypeCriteria)	;
				if($updateRows>0)
				{
					//更新成功
				}
			}
		}
	}
	public function actionChangeInfoType()
	{
		$recommendIds=$_POST['Recommend']['recommend_id'];
		$toType=$_POST['Recommend']['recommend_type'];
		$result=$this->_changeInfo($recommendIds, 'recommend_type', $toType);
	}
	public function actionChangeInfoStatus()
	{
		$recommendIds=$_POST['Recommend']['recommend_id'];
		$toStatus=$_POST['Recommend']['recommend_status'];
		$result=$this->_changeInfo($recommendIds, 'recommend_status', $toStatus);
	}
	public function actionRecommendInfo()
	{
		if(Yii::app()->request->isAjaxRequest)
		{
			$infoIds=@$_REQUEST['info_ids'];
			$infoType=@$_REQUEST['info_type'];
			$infoPos=@$_REQUEST['info_pos'];
			$resultMsg='推荐失败！';
			if(!$infoIds && !$infoType && infoPos )
			{
				$resultMsg='参数不完整';
			}
			else {
				$error=array();
				foreach ($infoIds as $infoId) {
					$recommendModel=new Recommend();
					$recommendModel->recommend_type=$infoType;
					$recommendModel->recommend_object_id=$infoId;
					$recommendModel->recommend_position=$infoPos;
					$recommendModel->recommend_status=1;
					$recommendModel->recommend_time=date('Y-m-d H:i:s');
					if(!$recommendModel->save())
					{
						$error[]=$infoId;
					}
				}
				if(!$error)
					$resultMsg='推荐成功！';
				else {
					$resultMsg='部分数据重复推荐！';
				}
			}
			echo $resultMsg;
		}
	}
	public function actionChangeAdvertisementStatus()
	{
		$toStatus=@$_REQUEST['toStatus'];
		$adId=@$_REQUEST['ad_id'];
		if(!$adId && in_array($toStatus,array(1,2)))
		{
			if(Yii::app()->request->isAjaxRequest)
			{
				echo '请求参数不正确！';
				exit;
			}
			Yii::app()->admin->setFlash('changeStatusError','请选择要更新状态的广告信息，以及改变的状态');
			$this->redirect(array('manageAdvertisement'));

		}
		$updateStatusCriteria=new CDbCriteria();
		$updateStatusCriteria->addInCondition('ad_id', $adId);
		$updateRows=Advertisement::model()->updateAll(array('ad_status'=>$toStatus),$updateStatusCriteria);
		if(Yii::app()->request->isAjaxRequest)
		{
			echo $updateRows>0?'更新成功！':'更新失败！';
			exit;
		}
		if($updateRows>0)
		{
			Yii::app()->admin->setFlash('changeStatus','更新状态成功！');
		}
		else {
			Yii::app()->admin->setFlash('changeStatusError','更新异常');
		}
		$this->redirect(array('manageAdvertisement','page'=>Yii::app()->request->getParam('page',1)));
	}
	public function actionDeleteRecommend()
	{
		$recommendIds=@$_REQUEST['recommend_id'];
		if($recommendIds && is_array($recommendIds))
		{
			$deleteCreteria=new CDbCriteria();
			$deleteCreteria->addInCondition('recommend_id', $recommendIds);
			$delrows=Recommend::model()->deleteAll($deleteCreteria);
			if($delrows>0)
			{
				echo '删除成功！';
			}
			else {
				echo '删除失败！';
			}
		}
		else {
			echo '删除失败！';
		}
	}


}


?>