<?php
class CMUButtonColumn extends CButtonColumn {

	protected function renderButton($id,$button,$row,$data)
	{
		if(isset($button['options']['data-id']))
		{
			if(is_string($button['options']['data-id']))
				$button['options']['data-id']=$this->evaluateExpression($button['options']['data-id'],array('row'=>$row,'data'=>$data));
		}
		if(isset($button['options']['data-acttype']))
		{
			
			$button['options']['data-acttype']=$this->evaluateExpression($button['options']['data-acttype'],array('row'=>$row,'data'=>$data));
			
		}
		
		parent::renderButton($id, $button, $row, $data);
	}
}


?>