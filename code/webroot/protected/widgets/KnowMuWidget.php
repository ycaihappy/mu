<?php
class KnowMuWidget extends CWidget
{

    public function run()
    {
		$topRanking=Article::model()->topRankingKnowledge()->findAll();
		if($topRanking)
		{
			foreach ($topRanking as &$news)
			{//用其他字段封装链接
				$news->art_title=CStringHelper::truncate_utf8_string($news->art_title, 20);
				$news->art_source=$this->getController()->createUrl('knowledge/view',array('art_id'=>$news->art_id));
			}
		}
    	$mu_product = Article::model()->knowledgeProductList()->findAll();
    	$adv1=CCacheHelper::getAdvertisement(140);
    	$adv2=CCacheHelper::getAdvertisement(141);
		$data=compact('topRanking','mu_product','adv1','adv2');
		$this->render('know_mu',$data);
    }
}
