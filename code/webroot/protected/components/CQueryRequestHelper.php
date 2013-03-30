<?php
class CQueryRequestHelper  {

	public static function registerLastQueryForm(array $regieteredParams=array(),$modelName)
	{
		$prefix=str_replace('/','-',Yii::app()->controller->getRoute());
		
		if(Yii::app()->request->isPostRequest || @$_GET[$modelName])
		{
			if($regieteredParams && is_array($regieteredParams))
			{
				foreach ($regieteredParams as $param)
				{
					Yii::app()->admin->setState($prefix.'_'.$param,$_REQUEST[$param]);
				}
			}
		}
		else {
			if($regieteredParams && is_array($regieteredParams))
			{
				foreach ($regieteredParams as $param)
				{
					$_REQUEST[$param]=Yii::app()->admin->getState($prefix.'_'.$param);
				}
			}
		}
	}
}


?>