<?php
class IndexModuleWidget extends CWidget
{
	public $type=1;
	private $data;
	private $one;
	private $title;
	private $route;
	private $more;
	public function init(){
		$artCriteria=new CDbCriteria();
		$artCriteria->select='art_id,art_title,art_img';
		$this->route='/news/view';
		$this->more='/news/list';
		switch ($this->type){
			case 1:
				$this->title='钼展会';
				$artCriteria->join='inner join mu_recommend b on t.art_id=b.recommend_object_id and b.recommend_status=1 and b.recommend_type=23 and b.recommend_position=116';
				$this->route='/exhibition/view';
				$this->more=$this->getController()->createUrl('/exhibition/index');
				break;
			case 2:
				$this->title='钼新闻';
				$artCriteria->join='inner join mu_recommend b on t.art_id=b.recommend_object_id and b.recommend_status=1 and b.recommend_type=23 and b.recommend_position=113';
				$this->route='/news/view';
				$this->more=$this->getController()->createUrl('/news/index');
				break;
			case 3:
				$this->title='市场动态';
				$artCriteria->join='inner join mu_recommend b on t.art_id=b.recommend_object_id and b.recommend_status=1 and b.recommend_type=23 and b.recommend_position=111';
				$route='/price/view';
				$this->more=$this->getController()->createUrl('/price/index');
				break;
			case 4:
				$this->title='钼工艺';
				$artCriteria->join='inner join mu_recommend b on t.art_id=b.recommend_object_id and b.recommend_status=1 and b.recommend_type=23 and b.recommend_position=112';
				$this->route='/knowledge/view';
				$this->more=$this->getController()->createUrl('/knowledge/list',array('subcategory_id'=>65));
				break;
			case 5:
				$this->title='钼百科';
				$artCriteria->join='inner join mu_recommend b on t.art_id=b.recommend_object_id and b.recommend_status=1 and b.recommend_type=23 and b.recommend_position=114';
				$this->route='/knowledge/view';
				$this->more=$this->getController()->createUrl('/knowledge/index');
				break;
			case 6:
				$this->title='钼标准';
				$artCriteria->join='inner join mu_recommend b on t.art_id=b.recommend_object_id and b.recommend_status=1 and b.recommend_type=23 and b.recommend_position=115';
				$this->route='/knowledge/view';
				$this->more=$this->getController()->createUrl('/knowledge/list',array('subcategory_id'=>64));
				break;
		}
		$artCriteria->condition='art_status=1';
		$artCriteria->limit=8;
		$this->data=Article::model()->findAll($artCriteria);
		if($this->data)
		{
			$index=-1;
			foreach ($this->data as $key=>&$news)
			{//用其他字段封装链接
				$news->art_id=$this->getController()->createUrl($this->route,array('art_id'=>$news->art_id));
				if(!$this->one && $news->art_img)
				{
					$index=$key;
					$news->art_img='/images/article/thumb/'. $news->art_img;
					$news->art_title=CStringHelper::truncate_utf8_string($news->art_title, 20);
					$this->one=clone $news;
					continue;
				}
				$news->art_title=CStringHelper::truncate_utf8_string($news->art_title, 13);
				
			}
			if($index>=0)
			   unset($this->data[$index]);
		}
		
	}
	public function run()
	{
		$this->render('index_module',array('data'=>$this->data,'one'=>$this->one,'title'=>$this->title,'more'=>$this->more));
	}
}
