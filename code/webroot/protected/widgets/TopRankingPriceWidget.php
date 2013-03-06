<?php

class TopRankingPriceWidget extends CWidget {

	public function run()
	{
		$topRanking=Article::model()->topRankingPrice()->findAll();
		if($topRanking)
		{
			foreach ($topRanking as &$news)
			{//用其他字段封装链接
				$news->art_title=CStringHelper::truncate_utf8_string($news->art_title, 20);
				$news->art_source=$this->getController()->createUrl('/news/view',array('art_id'=>$news->art_id));
			}
		}
		$data=compact('topRanking');
		$this->render('top_ranking_price',$data);
	}

}


?>