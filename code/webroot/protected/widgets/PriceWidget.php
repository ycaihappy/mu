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
        $this->render('price',array('data'=>$this->recentlyPriceList));
    }
}
