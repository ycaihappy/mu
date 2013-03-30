<?php



class CGetCityAction extends CAction {
	
	public $emptySelect='';
	
	public function run()
	{
		if(Yii::app()->request->isAjaxRequest)
		{
			$province=(int)@$_REQUEST['province_id'];
			if($province )
			{
				$citysOption=City::getAllCity($province,$this->emptySelect?true:false,$this->emptySelect);
				foreach ( $citysOption as $value => $name ) {
					echo CHtml::tag ( 'option', array ('value' => $value ), CHtml::encode ( $name ), true );
				}
			}
		}
		
	}
}


?>