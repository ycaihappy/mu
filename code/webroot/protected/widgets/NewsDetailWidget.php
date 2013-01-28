<?php
class NewsDetailWidget extends CWidget
{
    public function init()
    {
    	
    }

    public function run()
    {
        $this->render('news_detail',array('name'=>'lizhli'));
    }
}
