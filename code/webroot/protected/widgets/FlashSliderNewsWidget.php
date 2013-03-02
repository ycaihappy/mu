<?php



class FlashSliderNewsWidget extends CWidget {


	public function run()
	{
		$artCriteria=new CDbCriteria();
		$artCriteria->select='art_id,art_img,art_title,art_content';
		$artCriteria->join='inner join mu_recommend b on t.art_id=b.recommend_object_id and b.recommend_status=1 and b.recommend_type=23 and b.recommend_position=45';
		$artCriteria->condition='art_status=1';
		$artCriteria->limit=5;
		$flashSilderNews=Article::model()->findAll($artCriteria);
		if($flashSilderNews)
		{
			foreach ($flashSilderNews as &$news)
			{//用其他字段封装链接
				$news->art_title=CStringHelper::truncate_utf8_string($news->art_title, 20);
				$news->art_source=$this->getController()->createUrl('/news/view',array('art_id'=>$news->art_id));
				$news->art_content=CStringHelper::truncate_utf8_string(strip_tags($news->art_content), 54);
			}
		}
		$data=compact('flashSilderNews');
		$this->render('flash_slider_news',$data);
	}
}


?>