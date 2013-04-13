<?php



class TopTrendsNewsWidget extends CWidget {

	public function run(){
		$trendsNews=Article::model()->topTrendsNews()->findAll();
		$trendsOne=null;
		if($trendsNews)
		{
			foreach ($trendsNews as &$news)
			{//用其他字段封装链接
				$news->art_title=CStringHelper::truncate_utf8_string($news->art_title, 20);
				$news->art_source=$this->getController()->createUrl('/news/view',array('art_id'=>$news->art_id));
				if(!$trendsOne && $news->art_img)
				{
					$trendsOne=Article::model()->findByPk($news->art_id);
					$trendsOne->art_title=CStringHelper::truncate_utf8_string($trendsOne->art_title, 20);
					$trendsOne->art_content=CStringHelper::truncate_utf8_string(strip_tags($trendsOne->art_content), 54);
					$trendsOne->art_source=$this->getController()->createUrl('/news/view',array('art_id'=>$trendsOne->art_id));
					unset($news);
				}
            }
            $data=compact('trendsNews','trendsOne');
            $this->render('top_trends_news',$data);
		}

	}
}


?>
