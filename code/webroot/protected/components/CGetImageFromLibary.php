<?php

class CGetImageFromLibary extends CAction {

	public function run()
	{
		$imageCategory=(int)Yii::app()->request->getParam('category_id');
		if($imageCategory)
		{
			$imageCretria=new CDbCriteria();
			$imageCretria->select='image_title,image_src,image_thumb_src';
			$imageCretria->condition='image_status=1';
			$imageCretria->addCondition('image_used_type=:categoryId');
			$imageCretria->params[':categoryId']=$imageCategory;
			$count=ImageLibrary::model()->count($imageCretria);
			$pager=new CPagination($count);
			$pager->pageSize=16;
			$pager->pageVar='page';
			$pager->applyLimit($imageCretria);
			$images=ImageLibrary::model()->findAll($imageCretria);
			
			$returnImage=array();
			$returnImage['imageCount']=$count;
			$returnImage['currentPage']=$pager->getCurrentPage()+1;
			$returnImage['pageCount']=$pager->getPageCount();
			if($images)
			{
				foreach ($images as $image)
				{
					$returnImage['imageList'][]=array('image_src'=>$image->image_src,'image_title'=>$image->image_title,'image_thumb_src'=>'/images/commonProductsImages/thumb/'.$image->image_thumb_src);

				}
			}
			echo json_encode($returnImage);
			exit;
			
		}
		else
		{
			echo '请先选择产品分类！';
		}
	}

}


?>