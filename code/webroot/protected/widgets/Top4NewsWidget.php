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
		$artCriteria=new CDbCriteria();
		$artCriteria->select='art_id,art_img,art_title,art_content';
		$artCriteria->join='inner join mu_recommend b on t.art_id=b.recommend_object_id and b.recommend_status=1 and b.recommend_type=23 and b.recommend_position=46';
		$artCriteria->condition='art_status=1';
		$artCriteria->order='art_id desc';
		$artCriteria->limit=1;
		$headNews=Article::model()->find($artCriteria);
		$data=array();
        if ( !empty($headNews) )
        {
            $headNews->art_title=CStringHelper::truncate_utf8_string($headNews->art_title, 20);
            $headNews->art_source=$this->getController()->createUrl('/news/view',array('art_id'=>$headNews->art_id));
            $headNews->art_content=CStringHelper::truncate_utf8_string(strip_tags($headNews->art_content), 85);
            $topOne=array_shift($top4News);
            $data=compact('top4News','headNews');
        }
        else {
        	$data=compact('top4News');
        }
        $this->render('top_4_news',$data);
	}
}


?>
