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
    			if($category->term_parent_id==0)
    			{
    				$layerCategory[$category->term_id]['title']=$category->term_name;
    			}
    			if($category->term_parent_id>0)
    				$layerCategory[$category->term_parent_id]['sub'][]=$category;
    		}
    	}
    	$adv=CCacheHelper::getAdvertisement(144);
        $this->render('index_category',array('data'=>$layerCategory,'adv'=>$adv));
    }
}
