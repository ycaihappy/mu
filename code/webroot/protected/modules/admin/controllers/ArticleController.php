<?php

class ArticleController extends AdminController {

	public function actionManageNews()
	{
		$this->_actionManageArticle(17);
	}
	public function actionManagePrice()
	{
		$this->_actionManageArticle(16);
	}
	private function _actionManageArticle($type=17)
	{
		$model=new Article();
		$articleTitle=@$_REQUEST['Article']['art_title'];
		$model->art_title=$articleTitle;
		$articleStatus=@$_REQUEST['Article']['art_status'];
		$model->art_status=$articleStatus;
		$articleCriteria=new CDbCriteria();
		$articleCriteria->addCondition('art_category_id='.$type);
		if($articleStatus)
		{
			$articleCriteria->addCondition('art_status=:status');
			$articleCriteria->params[':status']=$articleStatus;
		}
		if($articleTitle)
		{
			$articleCriteria->addSearchCondition('art_title', $articleTitle,true);
		}

		$articleCriteria->select='art_id,art_title,art_post_date,art_check_by';
		$articleCriteria->with=array('createUser'=>array('select'=>'user_name'),'status'=>array('select'=>'term_name'));
		$articleDataProvider=new CActiveDataProvider('Article',array(
			'criteria'=>$articleCriteria,
			'pagination'=>array('pageSize'=>10,'pageVar'=>'page','params'=>array('Article[art_title]'=>$model->art_title,
					'Article[art_status]'=>$model->art_status,
					'Article[art_category_id]'=>$type,
			
		),),
			
			'sort'=>array('defaultOrder'=> array('art_create_time'=>CSort::SORT_DESC), ),
		));
		$artStatus=Term::getTermsByGroupId(1);
		$this->render('manageArticle',array(
		'dataProvider'=>$articleDataProvider,
		'isNews'=>$type==17?true:false,
		'artStatus'=>$artStatus,
		'model'=>$model,
		));
	}
	public function actionUpdateArticle()
	{
		$model=new Article();

		if(isset($_POST['Article']))
		{
			$model->attributes=$_POST['Article'];
			if($model->art_id)$model->setIsNewRecord(false);
			if($model->save())
			{
				$redirectAction=$model->art_category_id==17?'manageNews':'managePrice';
				$this->redirect(array($redirectAction));
			}
			else {
				$artStatus=Term::getTermsByGroupId(1);
				$this->render('updateArticle',array('model'=>$model,'artStatus'=>$artStatus,'isNews'=>$model->art_category_id==17?true:false));
			}
		}
		else
		{
			if($artId=@$_GET['art_id'])
			{
				$model=Article::model()->with(array('createUser'=>array('select'=>'user_name')))->findByPk($artId);
			}
			else {
				$artCategoryId=in_array((int)$_GET['type'],array(17,16))?(int)$_GET['type']:17;
				$model->art_category_id=$artCategoryId;
			}
			$artStatus=Term::getTermsByGroupId(1);
			$this->render('updateArticle',array('model'=>$model,
			'artStatus'=>$artStatus,
			'isNews'=>$model->art_category_id==17?true:false));
		}
	}
	public function actionChangeNewsStatus()
	{
		$this->_actionChangeArticleStatus('manageNews');
	}
	public function actionChangePriceStatus()
	{
		$this->_actionChangeArticleStatus('managePrice');
	}
	private function _actionChangeArticleStatus($redirectAction)
	{
		$toStatus=@$_REQUEST['toStatus'];
		$artId=@$_REQUEST['art_id'];
		if(!$artId && in_array($toStatus,array(1,2)))
		{
			Yii::app()->admin->setFlash('changeStatusError','请选择要更新状态的文章信息，以及改变的状态');
			$this->redirect(array($redirectPage));

		}
		$updateStatusCriteria=new CDbCriteria();
		$updateStatusCriteria->addInCondition('art_id', $artId);
		$checkedBy=Yii::app()->admin->getName();
		$updateRows=Article::model()->updateAll(array('art_status'=>$toStatus,'art_check_by'=>$checkedBy),$updateStatusCriteria);
		if($updateRows>0)
		{
			Yii::app()->admin->setFlash('changeStatus','更新状态成功！');
		}
		else {
			Yii::app()->admin->setFlash('changeStatusError','更新异常');
		}
		$this->redirect(array($redirectAction,'page'=>Yii::app()->request->getParam('page',1)));
	}
	public function actionManageImageLibary()
	{
		$model=new ImageLibrary();
		$imageTitle=@$_REQUEST['ImageLibrary']['image_title'];
		$model->image_title=$imageTitle;
		$imageleUsedType=@$_REQUEST['ImageLibrary']['image_used_type'];
		$model->image_used_type=$imageleUsedType;
		$imageleStatus=@$_REQUEST['ImageLibrary']['image_status'];
		$model->image_status=$imageleStatus;
		$imageLibaryCriteria=new CDbCriteria();
		if($model->image_used_type)
		{
			$articleCriteria->compare('image_used_type', '='.$model->image_used_type);
		}
		if($model->image_status)
		{
			$imageLibaryCriteria->compare('image_status', '='.$model->image_status);
		}
		if($model->image_title)
		{
			$imageLibaryCriteria->addSearchCondition('image_title', $model->image_title);
		}
		$imageLibaryCriteria->select='image_id,image_title,image_used_type,image_added_time';
		$imageLibaryCriteria->with=array('createUser'=>array('user_name'),
										 'usedType'=>array('term_name'),
										 'status'=>array('term_name'));
		$imageDataProvider=new CActiveDataProvider('ImageLibrary',array(
			'criteria'=>$imageLibaryCriteria,
			'pagination'=>array('pageSize'=>10,'pageVar'=>'page',
					'params'=>array('ImageLibrary[image_title]'=>$model->image_title,
									'ImageLibrary[image_status]'=>$model->image_status,
									'ImageLibrary[image_used_type]'=>$model->image_used_type,
		),),
			'sort'=>array('defaultOrder'=> array('image_added_time'=>CSort::SORT_DESC), ),
		));
		if($imageDataProvider->data)
		{
			$muCategories=CCacheHelper::getMuCategory();
			foreach ($imageDataProvider->data as &$image)
			{
				$usedType=array();
				$parent=$muCategories['term_parent_id'];
				while($parent)
				{
					$usedType[]=$muCategories[$parent]['term_name'];
					$parent=$muCategories[$parent]['term_parent_id'];
				}
				if($usedType)
				array_reverse($usedType);
				$usedType[]=$muCategories[$image['image_used_type']]['term_name'];
				$image->image_used_type=implode('>>',$usedType);
			}
		}
		$imageStatus=Term::getTermsByGroupId(1);
		$imageUsedType=Term::getMuCategory();
		$this->render('manageImageLibary',array(
		'dataProvider'=>$imageDataProvider,
		'imageUsedType'=>$imageUsedType,
		'imageStatus'=>$imageStatus,
		'model'=>$model,
		));
	}
	public function actionBatchUpdateImageTitle()
	{
		if(!Yii::app()->request->isPostRequest)
		{//保存标题
			
		}
		else {//展示需要修改标题的图片
			$imageNeedUpdatesCriteria=new CDbCriteria();
			$imageNeedUpdatesCriteria->select='image_id,image_src';
			$imageNeedUpdatesCriteria->condition='image_added_by='.Yii::app()->admin->getId().' and image_status=33';
			$imageNeedUpdates=ImageLibary::model()->findAll($imageNeedUpdatesCriteria);
			$this->render('batchUpdateImageTitle',array('models'=>$imageNeedUpdates));
		}
	}
	public function actionBatchUploadImage()
	{
		$targetFolder='images/commonProductsImages';
		$verifyToken = md5('unique_salt' . $_POST['timestamp']);
		if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
			$model=new ImageLibrary();
			$model->attributes=$_POST['ImageLibrary'];
			$model->image_src=CUploadedFile::getInstance($model,'image_src');
			$fileTypes = array('jpg','jpeg','gif','png'); // File extensions
			if(!in_array($model->image_src->extensionName,$fileTypes))
			{
				echo '上传非图片类型.';
				exit;
			}
			if($model->image_src)
			{
				$newimg = $model->image_used_type.'_'.time().'_'.rand(1, 9999).'.'.$model->image_src->extensionName;
				//根据时间戳重命名文件名,extensionName是获取文件的扩展名
				$model->image_src->saveAs($targetFolder.'/'.$newimg);
				$model->image_src = $targetFolder.'/'.$newimg;
				$model->image_added_by = Yii::app()->admin->getId();
				$model->image_status=33;//图片处于待审状态 ，回跳转到标题修改页面
				if($model->save())
				{
					echo '1';
				}
				else
				{
					echo '该图片保存失败！';
				}
			}
		}
	}
	public function actionUpdateImageLibary()
	{
		$model=new ImageLibrary();
		if(isset($_POST['ImageLibrary']))
		{
			$model->attributes=$_POST['ImageLibrary'];
			$model->image_src=CUploadedFile::getInstance($model,'image_src');
			if($model->image_src)
			{
				$newimg = $model->image_used_type.'_'.time().'_'.rand(1, 9999).'.'.$model->image_src->extensionName;
				//根据时间戳重命名文件名,extensionName是获取文件的扩展名
				$model->image_src->saveAs('images/commonProductsImages/'.$newimg);
				$model->image_src = 'images/commonProductsImages/'.$newimg;
				//将image属性重新命名
			}
			else {
				$model->image_src=@$_REQUEST['image_src_2'];
			}
			if($model->image_id)$model->setIsNewRecord(false);
			if($model->save())
			{
				$this->redirect(array('manageImageLibary'));
			}
		}
		$imageStatus=Term::getTermsByGroupId(1);
		$imageUsedType=Term::getMuCategory();
		$this->render('updateImageLibary',array('model'=>$model,'imageStatus'=>$imageStatus,'imageUsedType'=>$imageUsedType));
	  
	}
}


?>