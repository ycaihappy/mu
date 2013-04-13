<?php



class ViewpointNewsWidget extends CWidget {

	public function run()
	{
		$viewpoint=Article::model()->topViewPointNews()->findAll();
		if($viewpoint)
		{
			foreach ($viewpoint as &$news)
			{//用其他字段封装链接
				$news->art_title=CStringHelper::truncate_utf8_string($news->art_title, 20);
				$news->art_source=$this->getController()->createUrl('/news/view',array('art_id'=>$news->art_id));
				$news->art_content=CStringHelper::truncate_utf8_string($news->art_content,180);
			}
            $viewpointOne=array_shift($viewpoint);
            $data=compact('viewpoint','viewpointOne');
            $this->render('viewpoint_news',$data);
		}

	}
}


?>
