<?php
class NewsRecommendWidget extends CWidget
{
    public function init()
    {
    	
    }

    public function run()
    {
        $this->render('news_recommend',array('name'=>'lizhli'));
    }
}
