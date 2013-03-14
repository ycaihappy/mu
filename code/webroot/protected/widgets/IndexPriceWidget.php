<?php
class IndexPriceWidget extends CWidget
{

    public function run()
    {
    	$price01 = Article::model()->PriceMaterialList()->findAll();
    	$price02 = Article::model()->PriceSummaryList()->findAll();
        $city  = City::getCityList();
        $category = Term::model()->getTermsListByGroupId(14);
        $this->render('index_price',array('data01'=>$price01, 'data02'=>$price02,'city'=>$city,'category'=>$category));
    }
}
