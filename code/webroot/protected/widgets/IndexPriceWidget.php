<?php
class IndexPriceWidget extends CWidget
{

    public function run()
    {
    	$price01 = Article::model()->PriceMaterialList()->findAll();
    	$price02 = Article::model()->PriceSummaryList()->findAll();
        $city  = City::getCityList();
        $category = Term::model()->getTermsListByGroupId(14);
        $rePrice=RelativeRePrice::model()->recentlyRePrice()->findAll();
        if($rePrice)
        {
        	foreach ($rePrice as &$price)
        	{
        		switch ($price->re_fallup)
        		{
        			case 94:
        				$price->re_fallup=' ↑ '.$price->re_margin;
        				break;
        			case 95:
        				$price->re_fallup=' ↑ '.$price->re_margin;
        				break;
        			case 96:
        				$price->re_fallup=' - ';
        				break;
        		}
        	}
        }
    	$otherPrice=RelativeRePrice::model()->recentlyOtherPrice()->findAll();
        if($otherPrice)
        {
        	foreach ($otherPrice as &$price)
        	{
        		switch ($price->re_fallup)
        		{
        			case 94:
        				$price->re_fallup=' ↑ '.$price->re_margin;
        				break;
        			case 95:
        				$price->re_fallup=' ↑ '.$price->re_margin;
        				break;
        			case 96:
        				$price->re_fallup=' - ';
        				break;
        		}
        	}
        }
        $this->render('index_price',array('otherPrice'=>$otherPrice,'rePrice'=>$rePrice,'data01'=>$price01, 'data02'=>$price02,'city'=>$city,'category'=>$category));
    }
}
