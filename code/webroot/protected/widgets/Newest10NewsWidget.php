<?php



class Newest10NewsWidget extends CWidget {


	public function run(){
		
		$newest10News=Article::model()->newest10News()->findAll();
		if($newest10News)
		{
			foreach ($newest10News as &$news)
			{//用其他字段封装链接
				$news->art_title=CStringHelper::truncate_utf8_string($news->art_title, 20);
				$news->art_source=$this->getController()->createUrl('/news/view',array('art_id'=>$news->art_id));
			}
		}
		$newest10One=array_shift($newest10News);
		$newest10One=$newest10One->findByPk($newest10One->art_id);
		$newest10One->art_title=CStringHelper::truncate_utf8_string($newest10One->art_title, 20);
		$newest10One->art_content=CStringHelper::truncate_utf8_string(strip_tags($newest10One->art_content), 54);
		$newest10One->art_source=$this->getController()->createUrl('/news/view',array('art_id'=>$newest10One->art_id));
		$data=compact('newest10News','newest10One');
		$this->render('newest_10_news',$data);
	}
}


?>