<?php



class SystemController extends SBaseController {


	public function actionManageMessageTemplate()
	{
		$templateCriteria=new CDbCriteria();
		$templateCriteria->with=array('type'=>array('select'=>'term_name'));
		$dataProvider=new CActiveDataProvider('MessageTemplate',array(
			'criteria'=>$articleCriteria,
			'pagination'=>array('pageSize'=>10,'pageVar'=>'page'
		)));
		$data=compact('dataProvider');
		$this->render('manageMessageTemplate',$data);
	}
	public function actionSaveMessageTemplate()
	{
		
	}
}


?>