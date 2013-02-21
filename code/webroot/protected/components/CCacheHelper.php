<?php
class CacheStrategy{
	private static $instance=null;
	const FIVE_MINITS_EXPIRE=300;
	const HALF_HOUR_EXPIRE=1800;
	const THREE_HOURS_EXPIRE=10800;
	const ONE_DAY_EXPIRE=86400;
	private $expireType=self::FIVE_MINITS_EXPIRE;
	public static function getInstance($expireType=5)
	{
		if(!$expireType)
		$expireType=self::FIVE_MINITS_EXPIRE;
		if(!self::$instance)
		{
			self::$instance=new self;
		}
		self::$instance->expireType=$expireType;
		return self::$instance;
	}
	public function getCacheDataForDb($key,CDbCriteria $criteria=null,$modelClass=null,$indexKey='')
	{
		$content=Yii::app()->cache->get($key);
		if(!$content && $modelClass)
		{
			$content=$modelClass::model()->findAll($criteria);
			if($indexKey)
			{
				foreach ($content as $a)
				{
					$contentTemp[$a[$indexKey]]=$a;
				}
				$content=$contentTemp;
				unset($contentTemp);
			}
			Yii::app()->cache->set($key, $content,$this->expireType);
		}
		return $content;
	}
}
class CCacheHelper  {

	public static function getAllCity()
	{
		$cityCriteria=new CDbCriteria();
		$cityCriteria->select='city_id,city_name,city_parent';
		$sort=new CSort('City');
		$sort->defaultOrder='city_parent asc';
		$allCity=CacheStrategy::getInstance(CacheStrategy::FIVE_MINITS_EXPIRE)->getCacheDataForDb('allCity',$cityCriteria,'City','city_id');
        return $allCity;

	}
	public static function getAllTerm()
	{
		$termCriteria=new CDbCriteria();
		$termCriteria->select='term_id,term_name,term_group_id';
		$termCriteria->order='term_group_id asc';
		$allTerm=CacheStrategy::getInstance(CacheStrategy::FIVE_MINITS_EXPIRE)->getCacheDataForDb('allTerm',$termCriteria,'Term','term_id');
		return $allTerm;
	}
	public static function getMuCategory()
	{
		$categoryCriteria=new CDbCriteria();
	    $categoryCriteria->select='term_id,term_name,term_parent_id';
	    $categoryCriteria->order='term_order asc';
	    $categoryCriteria->condition='term_group_id=14';
	    $muCategory=CacheStrategy::getInstance(CacheStrategy::FIVE_MINITS_EXPIRE)->getCacheDataForDb('muCategory',$categoryCriteria,'Term','term_id');
		return $muCategory;
	}
}


?>