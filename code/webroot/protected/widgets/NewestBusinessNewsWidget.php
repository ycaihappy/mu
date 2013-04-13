<?php



class NewestBusinessNewsWidget extends CWidget {


	public function run(){
		$businessNews=Article::model()->topBusinessNews()->findAll();
		if($businessNews)
		{
			foreach ($businessNews as &$news)
			{//用其他字段封装链接
				$news->art_title=CStringHelper::truncate_utf8_string($news->art_title, 20);
				$news->art_source=$this->getController()->createUrl('/news/view',array('art_id'=>$news->art_id));
            }
            $businessOne=array_shift($businessNews);
            $businessOne=$businessOne->findByPk($businessOne->art_id);
            $businessOne->art_title=CStringHelper::truncate_utf8_string($businessOne->art_title, 20);
            $businessOne->art_content=CStringHelper::truncate_utf8_string(strip_tags($businessOne->art_content), 54);
            $businessOne->art_source=$this->getController()->createUrl('/news/view',array('art_id'=>$businessOne->art_id));
            $data=compact('businessNews','businessOne');
            $this->render('newest_business_news',$data);
        }

	}
}


?>
