<?php



class CJsonModel extends CFormModel {

	protected $dataPath;
	public function attributeNames()
	{
		return array_keys(get_class_vars(get_class($this)));
	}
	public function save()
	{
		$baseSiteInfo=$this->getAttributes();
		file_put_contents($this->dataPath,json_encode($baseSiteInfo));
		
	}
	public function LoadData()
	{
		$attributes=json_decode(file_get_contents($this->dataPath),true);
		$this->attributes=$attributes;
		return $this;
	}
	public function setAttributes($values,$safeOnly=false){
		parent::setAttributes($values,$safeOnly);
	}
}


?>