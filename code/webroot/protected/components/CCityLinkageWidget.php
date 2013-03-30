<?php

class CCityLinkageWidget extends CWidget
{
	public $model=null;
	
	public $form=null;
	
	public $attribute;
	
	private $parentCities=array();
	
	private $childCities=array();
	
	public $parentCity=0;
	
	public $ajaxRoute='getCity';
	
	public $displayError=false;
	
	public function init(){
		
		$this->parentCities=City::getProvice();
		
		if($this->parentCity)
		{
			$this->childCities=City::getAllCity($this->parentCity);
		}
		else {
			if($this->model->{$this->attribute})
			{
				$this->parentCity=City::getParentId($this->model->{$this->attribute});
				
				$this->childCities=City::getAllCity($this->parentCity);
			}
		}
	}
	public function run(){
		
		$childDropdownListId='#'.get_class($this->model).'_'.$this->attribute;
		
		echo CHtml::dropDownList('parentCity',$this->parentCity,$this->parentCities,array(
		 'ajax'=>array(
					'type'=>'GET',
                    'url'=>$this->getController()->createUrl($this->ajaxRoute),
                    'update'=>$childDropdownListId,
                    'data'=>array('province_id'=>"js:this.value")
				),
		));
		
		echo $this->form->dropDownList($this->model,$this->attribute,$this->childCities,array('empty'=>'选择城市'));
		
		if($this->displayError)
			echo $this->form->error($this->model,$this->attribute);
	}
}