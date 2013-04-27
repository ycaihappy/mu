<?php



class IndexRelativeRePriceWidget extends CWidget  {


	public function run()
	{
	$rePrice=RelativeRePrice::model()->recentlyRePrice(148)->findAll();
        if($rePrice)
        {
        	foreach ($rePrice as &$price)
        	{
        		$price->re_name=$price->nameType?$price->nameType->term_name:'未指定';
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
    	$otherPrice=RelativeRePrice::model()->recentlyRePrice(149)->findAll();
        if($otherPrice)
        {
        	foreach ($otherPrice as &$price)
        	{
        		$price->re_name=$price->nameType?$price->nameType->term_name:'未指定';
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

    	$thirdPrice=RelativeRePrice::model()->recentlyRePrice(163)->findAll();
        if($thirdPrice)
        {
        	foreach ($thirdPrice as &$price)
        	{
        		$price->re_name=$price->nameType?$price->nameType->term_name:'未指定';
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
        $this->render('index_relative_re_price',array('otherPrice'=>$otherPrice,'rePrice'=>$rePrice,'thirdPrice'=>$thirdPrice));
	}
}


?>
