<?php
class KnowNewsWidget extends CWidget
{
    public function run()
    {
    	$KnowledgeList01 = Article::model()->knowledgeProductList()->findAll();
        $KnowledgeList04 = Article::model()->topTrendsNews()->findAll(); 

        $adv1=CCacheHelper::getAdvertisement(142);
        if ( !empty($KnowledgeList01) )
        $this->render('know_news',array('adv1'=>$adv1,'data01'=>$KnowledgeList01,'data04'=>$KnowledgeList04));
    }
}
