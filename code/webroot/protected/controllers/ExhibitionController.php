<?php
class ExhibitionController extends Controller {

	
	public function actionList()
	{
		$exCategoryId=(int)@$_REQUEST['subcategory_id'];

		$exCriteria=new CDbCriteria();
		$exCriteria->select='art_id,art_title,art_post_date';
		$exCriteria->condition='art_status=1 and art_category_id=98';
		$allTerm=CCacheHelper::getAllTerm();
		if($exCategoryId)
		{
			$exCriteria->compare('art_subcategory_id', $exCategoryId);
			$categoryName=$allTerm[$exCategoryId]->term_name;
		}
		else {
			$categoryName=$allTerm[20]->term_name;
		}
		$exCriteria->order='art_post_date desc';
		$count = Article::model()->count($exCriteria);//
		$pager = new CPagination($count);
		$pager -> pageSize = 25;
		$pager->applyLimit($exCriteria);
		$exhibitions=Article::model()->findAll($exCriteria);
		if($exhibitions)
		{
			foreach ($exhibitions as &$exhibition)
			{//用其他字段封装链接
				$exhibition->art_title=CStringHelper::truncate_utf8_string($exhibition->art_title, 20);
				$exhibition->art_source=$this->createUrl('/exhibition/view',array('art_id'=>$exhibition->art_id));
			}
		}
		$data=compact('exhibitions','pager','categoryName');
		$this->render('list',$data);
	}

}


?>