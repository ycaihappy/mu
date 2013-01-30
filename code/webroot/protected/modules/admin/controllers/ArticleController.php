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
			'pagination'=>array('pageSize'=>20,'pageVar'=>'page',),
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
}


?>