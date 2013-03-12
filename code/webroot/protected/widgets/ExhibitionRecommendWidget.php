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
    			$artCriteria=new CDbCriteria();
				$artCriteria->select='art_id,art_title';
				$artCriteria->join='inner join mu_recommend b on t.art_id=b.recommend_object_id and b.recommend_status=1 and b.recommend_type=23 and b.recommend_position=102';
				$artCriteria->condition='art_status=1';
				$artCriteria->limit=10;
				$this->exhibitions=Article::model()->findAll($artCriteria);
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
        $this->render('exhibition_recommend',array('data'=>$this->exhibitions,'title'=>$this->title));
    }
}
