<?php



class NewestStockNewsWidget extends CWidget {


	public function run(){
		$stockNews=Article::model()->topStockNews()->findAll();
		if($stockNews)
		{
			foreach ($stockNews as &$news)
			{//用其他字段封装链接
				$news->art_title=CStringHelper::truncate_utf8_string($news->art_title, 20);
				$news->art_source=$this->getController()->createUrl('/news/view',array('art_id'=>$news->art_id));
			}
		}
		$stockOne=array_shift($stockNews);
		$stockOne=$stockOne->findByPk($stockOne->art_id);
		$stockOne->art_title=CStringHelper::truncate_utf8_string($stockOne->art_title, 20);
		$stockOne->art_content=CStringHelper::truncate_utf8_string(strip_tags($stockOne->art_content), 54);
		$stockOne->art_source=$this->getController()->createUrl('/news/view',array('art_id'=>$stockOne->art_id));
		$data=compact('stockNews','stockOne');
		$this->render('newest_stock_news',$data);
	}
}


?>