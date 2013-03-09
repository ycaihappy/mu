<?php
class PriceWidget extends CWidget
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
        $this->render('price',array('data'=>$this->recentlyPriceList, 'city'=>$city,'category'=>$category));
    }
}
