<?php
class IndexPriceWidget extends CWidget
{
	private $recentlyPriceList=array();
    public function init()
    {
    	$this->recentlyPriceList=Article::model()->recentlyprice()->findAll();
    }

    public function run()
    {
        $city  = City::getCityList();
        $category = Term::model()->getTermsListByGroupId(14);
        $this->render('index_price',array('data'=>$this->recentlyPriceList, 'city'=>$city,'category'=>$category));
    }
}
