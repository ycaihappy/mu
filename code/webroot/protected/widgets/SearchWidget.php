<?php
class SearchWidget extends CWidget
{
    public function init()
    {
    }

    public function run()
    {
    	$keywods=$this->getController()->siteConfig->hotSearchKeywords;
    	$data=array();
    	if($keywods)
    	{
	    	$hotKeyWods=explode('|',$keywods );
	    	if($hotKeyWods)
	    	{
	    		$data=compact('hotKeyWods');
	    	}
    	}
        $this->render('search',$data);
    }
}
