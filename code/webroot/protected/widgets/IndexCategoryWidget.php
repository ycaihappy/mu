<?php
class IndexCategoryWidget extends CWidget
{

    public function run()
    {
    	$caetories=CCacheHelper::getMuCategory();
    	$layerCategory=array();
    	if($caetories)
    	{
    		foreach ($caetories as $category)
    		{
    			$layerCategory[$category->term_parent_id][]=$category;
    		}
    	}
        $this->render('index_category',array('data'=>$layerCategory));
    }
}
