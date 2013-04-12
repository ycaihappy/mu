<?php
class IndexNewsWidget extends CWidget
{

    public function run()
    {
    	$top_news= Article::model()->PriceMaterialList()->findAll();
    	$top_mu_news= Article::model()->PriceSummaryList()->findAll();
        $this->render('index_news',array('data'=>$top_news,'mu_news'=>$top_mu_news));
    }
}
