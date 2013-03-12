<?php
class ExhibitionRecommendWidget extends CWidget
{
    public $type;
    public $exhibitions;
    public $title;
    public function init()
    {
    	switch ($this->type)
    	{
    		case 1:
    			$this->exhibitions = Article::model()->recommdExhibitions()->findAll();
    			$this->title='推荐展会';  
    			break;
    		case 2:
    			$this->exhibitions = Article::model()->internalExhibitions()->findAll();  
    			$this->title='国内展会'; 
    			break;
    		case 3:
    			$this->exhibitions = Article::model()->internationalExhibitions()->findAll();  
    			$this->title='国际展会'; 
    			break;
    	}
     		
    }

    public function run()
    {
        $this->render('news_recommend',array('data'=>$this->exhibitions,'title'=>$this->title));
    }
}
