<?php



class Top4NewsWidget extends CWidget {


	public function run()
	{
		$top4News=Article::model()->newest4News()->findAll();
		if($top4News)
		{
			foreach ($top4News as &$news)
			{//用其他字段封装链接
				$news->art_title=CStringHelper::truncate_utf8_string($news->art_title, 20);
				$news->art_source=$this->getController()->createUrl('/news/view',array('art_id'=>$news->art_id));
			}
		}
		$topOne=array_shift($top4News);
		$data=compact('top4News','topOne');
		$this->render('top_4_news',$data);
	}
}


?>