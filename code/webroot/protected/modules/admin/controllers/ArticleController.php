<?php

class ArticleController extends AdminController {


	private $muCategoryCache;

	public function __construct($id,$module=null)
	{
		parent::__construct($id,$module);
		$this->muCategoryCache=CCacheHelper::getMuCategory();
	}
	public function actionManageNews()
	{
		$this->_actionManageArticle();
	}
	public function actionManagePrice()
	{
		$this->_actionManageArticle(16);
	}
	private function _actionManageArticle()
	{
		if(Yii::app ()->request->isAjaxRequest && @$_GET ['type'] == 'getSubCategory')
		{
			$terms = Term::getTermsByGroupId ( 10,false,$_REQUEST ['categoryId'] );
			foreach ( $terms as $value => $name ) {
				echo CHtml::tag ( 'option', array ('value' => $value ), CHtml::encode ( $name ), true );
			}
			exit;
		}
		if(Yii::app()->request->isPostRequest || isset($_GET['Article']))
		{
			Yii::app()->admin->setState('articleQueryForm',$_REQUEST['Article']);
		}
		else {
			$_REQUEST['Article']=Yii::app()->admin->getState('articleQueryForm');
		}
		$model=new Article();
		$articleTitle=@$_REQUEST['Article']['art_title'];
		$model->art_title=$articleTitle;
		$articleStatus=@$_REQUEST['Article']['art_status'];
		$model->art_status=$articleStatus;
		$model->art_category_id=@$_REQUEST['Article']['art_category_id'];
		$model->art_subcategory_id=@$_REQUEST['Article']['art_subcategory_id'];
		
		$articleCriteria=new CDbCriteria();
		if($articleStatus)
		{
			$articleCriteria->addCondition('art_status=:status');
			$articleCriteria->params[':status']=$articleStatus;
		}
		if($articleTitle)
		{
			$articleCriteria->addSearchCondition('art_title', $articleTitle,true);
		}
		if($model->art_category_id)
		{
			$articleCriteria->compare('art_category_id','='.$model->art_category_id);
		}
		if($model->art_subcategory_id)
		{
			$articleCriteria->compare('art_subcategory_id','='.$model->art_subcategory_id);
		}

		$articleCriteria->select='art_id,art_title,art_post_date,art_check_by,art_img';
		$articleCriteria->with=array('category'=>array('select'=>'term_name'),'subcategory'=>array('select'=>'term_name'),'createUser'=>array('select'=>'user_name'),'status'=>array('select'=>'term_name'));
		$articleCriteria->order='find_in_set(art_status,\'33,1,2\'),art_id desc';
		$articleDataProvider=new CActiveDataProvider('Article',array(
			'criteria'=>$articleCriteria,
			'pagination'=>array('pageSize'=>10,'pageVar'=>'page','params'=>array('Article[art_title]'=>$model->art_title,
					'Article[art_status]'=>$model->art_status,
					'Article[art_category_id]'=>$model->art_category_id,
					'Article[art_subcategory_id]'=>$model->art_subcategory_id,
			
		),),
			
			'sort'=>array('defaultOrder'=> array('art_create_time'=>CSort::SORT_DESC), ),
		));
		$artStatus=Term::getTermsByGroupId(1);
		$artCategory=Term::getTermsByGroupId(10,true);
		$artSubcategory=array();
		if($model->art_category_id)
		{
			$artSubcategory=Term::getTermsByGroupId(10,false,$model->art_category_id);
		}
		$rePosition=Term::getTermsByGroupId(13,false,null,'推荐位置');
		$this->render('manageArticle',array(
		'dataProvider'=>$articleDataProvider,
		'artCategory'=>$artCategory,
		'artStatus'=>$artStatus,
		'rePosition'=>$rePosition,
		'artSubcategory'=>$artSubcategory,
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
			$model->art_img=CUploadedFile::getInstance($model,'art_img');
			if($model->art_img)
			{
				$newimg = $model->art_category_id.'_'.time().'_'.rand(1, 9999).'.'.$model->art_img->extensionName;
				//根据时间戳重命名文件名,extensionName是获取文件的扩展名
				$uploadedImg='images/article/'.$newimg;

				$image=Yii::app()->image->load($model->art_img->getTempName());
				$image->resize(600,600);
				$image->save($uploadedImg);
				$image=Yii::app()->image->load($uploadedImg);
				$image->resize(400,280);
				$thumbImg='images/article/thumb/'.$newimg;
				$image->save($thumbImg);
				$model->art_img = $newimg;
			}
			else {
				$model->art_img=@$_REQUEST['art_img_2'];
			}
			if($model->save())
			{
				$this->redirect(array('manageNews','page'=>Yii::app()->admin->getState('page')));
			}
		}
		else
		{
			if($artId=@$_GET['art_id'])
			{
				$model=Article::model()->with(array('createUser'=>array('select'=>'user_name')))->findByPk($artId);
			}
		}
		$parentId=@$_REQUEST['parentId']?@$_REQUEST['parentId']:$model->art_category_id;
		
		if($parentId)
		{
			$model->art_category_id=$parentId;
			$artCategory=Term::getTermsByGroupId(10,true);
			$curCategory=@$artCategory[$parentId];
			$artStatus=Term::getTermsByGroupId(1,false,null,'',false);
			$artSubCategory=Term::getTermsByGroupId(10,false,$parentId,'',false);
			$this->render('updateArticle',array('model'=>$model,
			'artStatus'=>$artStatus,
			'curCategory'=>$curCategory,
			'artSubCategory'=>$artSubCategory,));
		}
		else {
			$this->redirect(array('manageNews'));
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
	public function actionDeleteArticle()
	{
		if(Yii::app()->request->isAjaxRequest)
		{
			$artId=@$_REQUEST['art_id'];
			if(!$artId )
			{
				if(Yii::app()->request->isAjaxRequest)
				{
					echo '请选择要删除的文章';
					exit;
				}
			}
			$deleteCriteria=new CDbCriteria();
			$deleteCriteria->addInCondition('art_id', $artId);
			$deleteeRows=Article::model()->deleteAll($deleteCriteria);
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
	private function _actionChangeArticleStatus()
	{
		$toStatus=@$_REQUEST['toStatus'];
		$artId=@$_REQUEST['art_id'];
		if(!$artId && in_array($toStatus,array(1,2,33)))
		{
			if(Yii::app()->request->isAjaxRequest)
			{
				echo '请选择要更新的文章';
				exit;
			}
			Yii::app()->admin->setFlash('changeStatusError','请选择要更新状态的文章信息，以及改变的状态');
			$this->redirect(array('manageNews'));

		}
		$updateStatusCriteria=new CDbCriteria();
		$updateStatusCriteria->addInCondition('art_id', $artId);
		$checkedBy=Yii::app()->admin->getName();
		$updateRows=Article::model()->updateAll(array('art_status'=>$toStatus,'art_check_by'=>$checkedBy),$updateStatusCriteria);
		if(Yii::app()->request->isAjaxRequest)
		{
			if($updateRows>0)
			{
				echo '更新成功！';
			}
			else {
				echo '更新失败！';
			}
			exit;
		}
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
		if(Yii::app()->request->isPostRequest || isset($_GET['ImageLibrary']))
		{
			Yii::app()->admin->setState('imgLibQueryForm',$_REQUEST['ImageLibrary']);
		}
		else {
			$_REQUEST['ImageLibrary']=Yii::app()->admin->getState('imgLibQueryForm');
		}
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
		$imageLibaryCriteria->select='image_id,image_title,image_used_type,image_added_time,image_src,image_thumb_src';
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
		$imageLibary=$imageDataProvider->data;
		if($imageLibary)
		{
			$muCategories=CCacheHelper::getMuCategory();
			foreach ($imageLibary as &$image)
			{
				$usedType=array();
				$parent=$muCategories[$image['image_used_type']]['term_parent_id'];
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
		if(Yii::app()->request->isPostRequest)
		{

			$targetFolder='images/commonProductsImages';
			$verifyToken = md5('unique_salt' . $_POST['timestamp']);
			if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
				$model=new ImageLibrary();
				$model->image_used_type=(int)$_POST['image_used_type'];
				$model->image_src=CUploadedFile::getInstanceByName('Filedata');
				$fileTypes = array('jpg','jpeg','gif','png'); // File extensions
				if(!in_array($model->image_src->getExtensionName(),$fileTypes))
				{
					echo '上传非图片类型.';
					exit;
				}
				if($model->image_src)
				{
					$newimg = $model->image_used_type.'_'.time().'_'.rand(1, 9999).'.'.$model->image_src->getExtensionName();
					//根据时间戳重命名文件名,extensionName是获取文件的扩展名
					$uploadedImg=$targetFolder.'/'.$newimg;
					$model->image_src->saveAs($uploadedImg);
					$model->image_title = '未指定';
					$model->image_added_by = Yii::app()->admin->getId();
					$model->image_status=33;//图片处于待审状态 ，回跳转到标题修改页面
					$im = null;
					$imagetype = strtolower($model->image_src->getExtensionName());
					if($imagetype == 'gif')
					$im = imagecreatefromgif($uploadedImg);
					else if ($imagetype == 'jpg')
					$im = imagecreatefromjpeg($uploadedImg);
					else if ($imagetype == 'png')
					$im = imagecreatefrompng($uploadedImg);
					$thumbImg='thumb_'.$newimg;
					CThumb::resizeImage (
					$im,100, 100,
					'images/commonProductsImages/thumb/'.$thumbImg, $model->image_src->getExtensionName());
					$model->image_src = $newimg;
					$model->image_thumb_src = $thumbImg;
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
		else {
			$model=new ImageLibrary();
			$imageUsedType=Term::getMuCategory();
			$this->render('batchUploadImageLibary',array('model'=>$model,'imageUsedType'=>$imageUsedType));
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
				$uploadedImg='images/commonProductsImages/'.$newimg;
				$model->image_src->saveAs($uploadedImg);
				$im = null;
				$imagetype = strtolower($model->image_src->getExtensionName());
				if($imagetype == 'gif')
				$im = imagecreatefromgif($uploadedImg);
				else if ($imagetype == 'jpg')
				$im = imagecreatefromjpeg($uploadedImg);
				else if ($imagetype == 'png')
				$im = imagecreatefrompng($uploadedImg);
				$thumbImg=$newimg;
				CThumb::resizeImage (
				$im,100, 100,
				'images/commonProductsImages/thumb/'.$thumbImg, $model->image_src->getExtensionName() );
				$model->image_src = $newimg;
				$model->image_thumb_src = $thumbImg;
			}
			else {
				$model->image_src=@$_REQUEST['image_src_2'];
				$model->image_thumb_src=@$_REQUEST['image_thumb_src_2'];
			}
			if($model->image_id)$model->setIsNewRecord(false);
			if($model->save())
			{
				$this->redirect(array('manageImageLibary'));
			}
		}
		if($imageId=@$_GET['image_id'])
		{
			$model=$model->with(array('createUser'=>array('select'=>'user_name')))->findByPk($imageId);
		}
		if($model->isNewRecord)
		{
			$model->image_status=33;
		}
		$imageStatus=Term::getTermsByGroupId(1);
		$imageUsedType=Term::getMuCategory();
		$this->render('updateImageLibary',array('model'=>$model,'imageStatus'=>$imageStatus,'imageUsedType'=>$imageUsedType));
			
	}
	public function actionChangeImageLibaryStatus()
	{

		$toStatus=@$_REQUEST['toStatus'];
		$imageId=@$_REQUEST['image_id'];
		if(!$imageId && in_array($toStatus,array(1,2,33)))
		{
			if(Yii::app()->request->isAjaxRequest)
			{
				echo '请求参数不正确！';
				exit;
			}
			Yii::app()->admin->setFlash('changeStatusError','请选择要更新状态的图片信息，以及改变的状态');
			$this->redirect(array('manageImageLibary','page'=>Yii::app()->request->getParam('page',1)));

		}
		$updateStatusCriteria=new CDbCriteria();
		$updateStatusCriteria->addInCondition('image_id', $imageId);
		$updateRows=ImageLibrary::model()->updateAll(array('image_status'=>$toStatus),$updateStatusCriteria);
		if(Yii::app()->request->isAjaxRequest)
		{
			echo $updateRows>0?'更新成功！':'更新失败！';
			exit;
		}
		else {
			if($updateRows>0)
			{
				Yii::app()->admin->setFlash('changeStatus','更新状态成功！');
			}
			else {
				Yii::app()->admin->setFlash('changeStatusError','更新异常');
			}
			$this->redirect(array('manageImageLibary','page'=>Yii::app()->request->getParam('page',1)));
		}
	}
	public function actionDeleteImageLibary()
	{
		$imageIds=@$_REQUEST['image_id'];
		if($imageIds && is_array($imageIds))
		{
			$deleteCreteria=new CDbCriteria();
			$deleteCreteria->addInCondition('image_id', $imageIds);
			$delrows=ImageLibrary::model()->deleteAll($deleteCreteria);
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
	public function actionManagePriceSummary()
	{
		
		if(Yii::app()->request->isPostRequest || isset($_GET['PriceSummary']))
		{
			Yii::app()->admin->setState('priceSummaryQueryForm',$_REQUEST['PriceSummary']);
		}
		else {
			$_REQUEST['PriceSummary']=Yii::app()->admin->getState('priceSummaryQueryForm');
		}
		$model=new PriceSummary();
		$model->sum_year=@$_REQUEST['PriceSummary']['sum_year'];
		$model->sum_month=@$_REQUEST['PriceSummary']['sum_month'];
		$model->sum_day=@$_REQUEST['PriceSummary']['sum_day'];
		$model->sum_product_type=@$_REQUEST['PriceSummary']['sum_product_type'];
		$model->sum_product_zone=@$_REQUEST['PriceSummary']['sum_product_zone'];

		$sumCriteria=new CDbCriteria();
		if($model->sum_year)
		{
			$sumCriteria->compare('sum_year', '='.$model->sum_year);
			if($model->sum_month)
			{
				$sumCriteria->compare('sum_month', '='.$model->sum_month);
				if($model->sum_day)
				{
					$sumCriteria->compare('sum_day', '='.$model->sum_day);
				}
			}
		}
		if($model->sum_product_type)
		{
			$sumCriteria->compare('sum_product_type', '='.$model->sum_product_type);
		}
		if($model->sum_product_zone)
		{
			$sumCriteria->compare('sum_product_zone', '='.$model->sum_product_zone);
		}
		$sumCriteria->with=array('unit'=>array('select'=>'term_name'));
		$dataProvider=new CActiveDataProvider('PriceSummary',array(
			'criteria'=>$sumCriteria,
			'pagination'=>array('pageSize'=>10,'pageVar'=>'page',
					'params'=>array('PriceSummary[sum_year]'=>$model->sum_year,
									'PriceSummary[sum_month]'=>$model->sum_month,
									'PriceSummary[sum_day]'=>$model->sum_day,
									'PriceSummary[sum_product_type]'=>$model->sum_product_type,
									'PriceSummary[sum_product_zone]'=>$model->sum_product_zone,
		),),
		));
		$priceSummary=$dataProvider->data;
		if($priceSummary)
		{
			foreach ($priceSummary as &$price)
			{
				$price->sum_product_zone=$this->_getCityLayer($price->sum_product_zone);
				$price->sum_product_type=$this->_getMuCategoryLayer($price->sum_product_type);
			}
		}
		if(!$model->sum_year)
		{
			$model->sum_year=date('Y');
			$model->sum_month=date('m');
			$model->sum_day=date('d');
		}
		$allCity=City::getAllCity();
		$allCategory=Term::getMuCategory();
		$this->render('managePriceSummary',array('model'=>$model,'dataProvider'=>$dataProvider,'allCity'=>$allCity,'allCategory'=>$allCategory));
	}
	public function actionUpdatePriceSummary()
	{
		$model=new PriceSummary();
		if(isset($_REQUEST['PriceSummary']))
		{
			$model->attributes=$_REQUEST['PriceSummary'];
			if($model->sum_id)$model->setIsNewRecord(false);
			if($model->save())
			{
				$this->redirect(array('managePriceSummary','page'=>Yii::app()->request->getParam('page',1)));
			}
		}
		else
		{
			if($sumId=(int)@$_GET['sum_id'])
			{
				$model=$model->findByPk($sumId);

			}
		}
		if($model->isNewRecord)
		{
			$model->sum_year=date('Y');
			$model->sum_month=date('m');
			$model->sum_day=date('d');
		}
		$allCity=City::getAllCity();
		$allCategory=Term::getMuCategory();
		$unit=Term::getTermsByGroupId(2);
		$this->render('updatePriceSummary',array('model'=>$model,'allCity'=>$allCity,'allCategory'=>$allCategory,'unit'=>$unit));
	}
	public function actionDeletePriceSummary()
	{
		if($sumId=@$_REQUEST['sum_id'])
		{
			$deleteCondition=new CDbCriteria();
			$deleteCondition->addInCondition('sum_id', $sumId);
			$deleteRows=PriceSummary::model()->deleteAll($deleteCondition);
			if($deleteRows>0)
			{
				Yii::app()->admin->setFlash('changeStatus','删除成功！');
			}
			else {
				Yii::app()->admin->setFlash('changeStatusError','删除异常');
			}
			$this->redirect(array('managePriceSummary','page'=>Yii::app()->request->getParam('page',1)));
		}
	}
	private function _getMuCategoryLayer($muCategoryId)
	{
		$parent=$this->muCategoryCache[$muCategoryId]['term_parent_id'];
		while($parent)
		{
			$muCategoryLayer[]=$this->muCategoryCache[$parent]['term_name'];
			$parent=$this->muCategoryCache[$parent]['term_parent_id'];
		}
		if($muCategoryLayer)
		array_reverse($muCategoryLayer);
		$muCategoryLayer[]=$this->muCategoryCache[$muCategoryId]['term_name'];

		return implode('>>',$muCategoryLayer);
	}
	private function _getCityLayer($cityId)
	{
		return  City::getCityLayer($cityId);
	}
}


?>