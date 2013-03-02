<?php

class NewsController extends Controller
{
    public $layout = '//layouts/news_main';
    public $breadcrumbs=array();
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	public function actionView()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('view');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
	public function actionList()
	{
		$newsCategoryId=(int)@$_REQUEST['subcategory_id'];
		if($newsCategoryId)
		{
			$newsCriteria=new CDbCriteria();
			$newsCriteria->select='art_id,art_title,art_post_date';
			$newsCriteria->condition='art_status=1 and art_subcategory_id='.$newsCategoryId;
			$newsCriteria->order='art_post_date desc';
			$count = Article::model()->count($newsCriteria);//
			$pager = new CPagination($count);
			$pager -> pageSize = 10; 
			$pager->applyLimit($newsCriteria);
			$newses=Article::model()->findAll($newsCriteria);
			if($newses)
			{
				foreach ($newses as &$news)
				{//用其他字段封装链接
					$news->art_title=CStringHelper::truncate_utf8_string($news->art_title, 20);
					$news->art_source=$this->createUrl('/news/view',array('art_id'=>$news->art_id));
				}
			}
			$allTerm=CCacheHelper::getAllTerm();
			$categoryName=$allTerm[$newsCategoryId]->term_name;
			$data=compact('newses','pager','categoryName');
		}
		else {
			$this->redirect(array('index'));
		}
		$this->render('list',$data);
	}
}
