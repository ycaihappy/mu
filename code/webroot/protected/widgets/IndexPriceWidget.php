<?php
class IndexPriceWidget extends CWidget
{

    public function run()
    {
    	$price01 = Article::model()->PriceChinaList()->findAll();
    	$price02 = Article::model()->PriceWorldList()->findAll();
        $city  = City::getCityList();
        $category = Term::model()->getTermsListByGroupId(14);
        $rePrice=RelativeRePrice::model()->recentlyRePrice(134)->findAll();
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
    	$otherPrice=RelativeRePrice::model()->recentlyRePrice(135)->findAll();
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
    	$SHPrice=RelativeRePrice::model()->recentlyRePrice(152)->findAll();
        if($SHPrice)
        {
        	foreach ($SHPrice as &$price)
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
    	$WHPrice=Convert::model()->findAll();
        $this->render('index_price',array('WHPrice'=>$WHPrice,'SHPrice'=>$SHPrice,'otherPrice'=>$otherPrice,'rePrice'=>$rePrice,'data01'=>$price01, 'data02'=>$price02,'city'=>$city,'category'=>$category));
    }
}
