<?php

class ArticleController extends CController {

	public function actionManageActicle()
	{
		if (!Yii::app()->request->isAjaxRequest) {
			Yii::app()->admin->setState("currentPage", Yii::app()->request->getParam('page', 0) - 1);
		}
		$articleCriteria=new CDbCriteria();
		$articleCategory=@$_REQUEST['article']['art_category_id'];
		$articleTitle=@$_REQUEST['article']['art_title'];
		if($articleCategory)
		{
			$articleCriteria->addCondition('art_category_id=:category');
			$articleCriteria->params[':category']=$articleCategory;
		}
		if($articleTitle)
		{
			$articleCriteria->addSearchCondition('art_title', $articleTitle);
		}
		$articleDataProvider=new CActiveDataProvider('Article',array(
			'criteria'=>$articleCriteria,
			'pagination'=>array('pageSize'=>20,'currentPage'=>Yii::app()->admin->getState("currentPage")),
			'sort'=>array('defaultOrder'=> array('art_create_time'=>CSort::SORT_DESC), ),
		));
		$this->render('manageActicle',array('dateProvider'=>$articleDataProvider));
	}
	public function actionSaveArticle()
	{
		CCaptcha
		$model=new Article();
		if($_POST['Article'])
		{
			$model->attributes=$_POST['Article'];
			if($model->save())
			{
				
			}
		}
		else
		{
			$model=new Article();
			if($artId=$_GET['art_id'])
				$model=Article::model()->findByPk($artId);
			$this->render('show');
		}
	}
}


?>