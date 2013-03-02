<?php



class TopHotSpotNewsWidget extends CWidget {

	
	public function run(){
		$hotspot=Article::model()->topHotSpotNews()->findAll();
		if($hotspot)
		{
			foreach ($hotspot as &$news)
			{//用其他字段封装链接
				$news->art_title=CStringHelper::truncate_utf8_string($news->art_title, 20);
				$news->art_source=$this->getController()->createUrl('/news/view',array('art_id'=>$news->art_id));
			}
		}
		$hotspotOne=array_shift($hotspot);
		$hotspotOne=$hotspotOne->findByPk($hotspotOne->art_id);
		$hotspotOne->art_title=CStringHelper::truncate_utf8_string($hotspotOne->art_title, 20);
		$hotspotOne->art_content=CStringHelper::truncate_utf8_string(strip_tags($hotspotOne->art_content), 54);
		$hotspotOne->art_source=$this->getController()->createUrl('/news/view',array('art_id'=>$hotspotOne->art_id));
		$data=compact('hotspot','hotspotOne');
		$this->render('top_hotspot_news',$data);
	}

}


?>