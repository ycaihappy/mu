<?php

class CCategoryLinkageWidget extends CWidget
{
	public $model=null;
	
	public $form=null;
	
	public $attribute;
	
	private $parentCategories=array();
	
	private $childCategories=array();
	
	public $parentCategory=0;
	
	public $ajaxRoute='getChildrenTerm';
	
	public $displayError=false;
	
	public function init(){
		
		$this->parentCategories=Term::getTermsByGroupId(14,true);
		
		if($this->parentCategory)
		{
			$this->childCategories=Term::getTermsByGroupId(14,false,$this->parentCategory,'',false);
		}
		else {
			if($this->model->{$this->attribute})
			{
				$allCategory=CCacheHelper::getMuCategory();
				
				$this->parentCategory=$allCategory[$this->model->{$this->attribute}]->term_parent_id;
				
				$this->childCategories=Term::getTermsByGroupId(14,false,$this->parentCategory,'',false);
			}
		}
	}
	public function run(){
		
		$childDropdownListId='#'.get_class($this->model).'_'.$this->attribute;
		
		echo CHtml::dropDownList('parentCategory',$this->parentCategory,$this->parentCategories,array(
		 'ajax'=>array(
					'type'=>'GET',
                    'url'=>$this->getController()->createUrl($this->ajaxRoute),
                    'update'=>$childDropdownListId,
                    'data'=>array('parent_id'=>"js:this.value",'group_id'=>14)
				),
		));
		
		echo $this->form->dropDownList($this->model,$this->attribute,$this->childCategories,array('empty'=>'选择品类'));
		
		if($this->displayError)
			echo $this->form->error($this->model,$this->attribute);
	}
}