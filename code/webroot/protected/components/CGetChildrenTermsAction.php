<?php

class CGetChildrenTermsAction extends CAction {

	/**
	 * @var string the height of the generated CAPTCHA image. Defaults to 50.
	 */
	public $emptySelect='不限';
	
	public function run()
	{
		if(Yii::app()->request->isAjaxRequest)
		{
			$groupId=(int)@$_REQUEST['group_id'];
			$parentId=(int)@$_REQUEST['parent_id'];
			if($groupId && $parentId)
			{
				$termsOption=Term::getTermsByGroupId($groupId,false,$parentId,$this->emptySelect);
				foreach ( $termsOption as $value => $name ) {
					echo CHtml::tag ( 'option', array ('value' => $value ), CHtml::encode ( $name ), true );
				}
			}
		}
		
	}
}


?>