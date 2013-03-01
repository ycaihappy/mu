<?php



class SystemController extends AdminController {


	public function actionManageMessageTemplate()
	{
		$templateCriteria=new CDbCriteria();
		$templateCriteria->with=array('type'=>array('select'=>'term_name'));
		$templateCriteria->order='msg_template_added_date desc';
		$dataProvider=new CActiveDataProvider('MessageTemplate',array(
			'criteria'=>$templateCriteria,
			'pagination'=>array('pageSize'=>10,'pageVar'=>'page'
		)));
		$data=compact('dataProvider');
		$this->render('manageMessageTemplate',$data);
	}
	public function actionSaveMessageTemplate()
	{
		$model=new MessageTemplate();
		if(isset($_POST['MessageTemplate']))
		{
			$model->attributes=$_POST['MessageTemplate'];
			if($model->msg_template_id) $model->setIsNewRecord(false);
			if($model->save())
			{
				$this->redirect(array('manageMessageTemplate'));
			}
		}
		else {
			if($msgTemplateId=@$_GET['msg_template_id'])
			{
				$model=$model->findByPk($msgTemplateId);
			}
		}
		$templateType=Term::getTermsByGroupId(15);
		$data=compact('templateType','model');
		$this->render('updateMessageTemplate',$data);
	}
}


?>