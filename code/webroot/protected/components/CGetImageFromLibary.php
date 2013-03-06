<?php

class CGetImageFromLibary extends CAction {

	public function run()
	{
		$imageCategory=(int)Yii::app()->request->getParam('category_id');
		if($imageCategory)
		{
			$imageCretria=new CDbCriteria();
		}
		else
		{
			echo '请先选择产品分类！';
		}
	}

}


?>