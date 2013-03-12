<?php

class KnowledgeController extends Controller
{
	public $layout = '//layouts/knowledge_main';
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

		$newsCriteria=new CDbCriteria();
		$newsCriteria->select='art_id,art_title,art_post_date';
		$newsCriteria->condition='art_status=1 and art_category_id=20';
		$allTerm=CCacheHelper::getAllTerm();
		if($newsCategoryId)
		{
			$newsCriteria->compare('art_subcategory_id', $newsCategoryId);
			$categoryName=$allTerm[$newsCategoryId]->term_name;
		}
		else {
			$categoryName=$allTerm[20]->term_name;
		}
		$newsCriteria->order='art_post_date desc';
		$count = Article::model()->count($newsCriteria);//
		$pager = new CPagination($count);
		$pager -> pageSize = 25;
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
		
		
		$data=compact('newses','pager','categoryName');


		$this->render('list',$data);
	}
}
