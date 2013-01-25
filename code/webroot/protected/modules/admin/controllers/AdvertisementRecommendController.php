<?php
class AdvertisementRecommendController extends CController {

	public function actionManageAdvertisement()
	{
		if(!Yii::app()->request->isAjaxRequest)
		{
			Yii::app()->admin->setState("currentPage", Yii::app()->request->getParam('page', 0) - 1);
		}
		$advertisementCriteria=new CDbCriteria();
		$adPos=@$_POST['Advertisement']['ad_no'];
		$adStartTime=@$_POST['Advertisement']['ad_start_date'];
		$adEndTime=@$_POST['Advertisement']['ad_end_date'];
		$adTitle=@$_POST['Advertisement']['ad_title'];
		$adStatus=@$_POST['Advertisement']['ad_status'];
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
			$advertisementCriteria->compare('ad_no','=:'.$adPos,true);
		}
		if($adStartTime)
		{
			$advertisementCriteria->compare('ad_start_time','>=:'.$adStartTime,true);

		}
		if($adEndTime)
		{
			$advertisementCriteria->compare('ad_no','<=:'.$adEndTime,true);
		}
		$advertisementCriteria->with=array('user.enterprise'=>array('select'=>'ent_name'),
											'type'=>array('select'=>'term_name'),
											'position'=>array('select'=>'term_name'),
											'status'=>array('select'=>'term_name'),);
		$adDataProvider=new CActiveDataProvider('Advertisement',array(
			'criteria'=>$advertisementCriteria,
			'pagination'=>array('pageSize'=>20,'currentPage'=>Yii::app()->admin->getState("currentPage")),
			'sort'=>array('defaultOrder'=> array('ad_create_time'=>CSort::SORT_DESC), ),
		));

		var_dump($adDataProvider->data);
	}
	public function actionSaveAdvertisement()
	{
		$model=new Advertisement();
		if($_POST['Advertisement'])
		{
			$model->attributes=$_POST['Advertisement'];
			if($model->save())
			{
				
			}
		}
		else
		{
			if($adId=$_GET['ad_id'])
				$model=$model->findByPk($adId);
			$this->render('show');
		}
	}
	
	public function actionManageRecommend()
	{
		if(!Yii::app()->request->isAjaxRequest)
		{
			Yii::app()->admin->setState("currentPage", Yii::app()->request->getParam('page', 0) - 1);
		}
		$recommendCriteria=new CDbCriteria();
		$recommendInfoType=@$_POST['Recommend']['recommend_type'];
		$recommendPosition=@$_POST['Recommend']['recommend_position'];
		$recommendTitle=@$_POST['Recommend']['recommend_title'];
		//进行视图查询
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


}


?>