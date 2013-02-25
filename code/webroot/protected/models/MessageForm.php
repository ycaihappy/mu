<?php



class MessageForm extends CFormModel {

	public $sub;
	public $content;
	public $fromContact;
	public $fromEmail;
	public $fromCompany;
	public $fromTelephone;
	
	public function rules()
	{
		$guest=Yii::app()->user->isGuest;
		$rules=array(
			array('sub,content','required'),
			array('sub','length','max'=>'218'),
			array('fromEmail','email'),
			array('fromCompany','length','max'=>128),
			array('fromContact','length','min'=>2),
			array('fromTelephone','CPhoneValidator'),
		);
		if(!$guest)
		{
			$rules+=array(
				array('fromCompany','required'),
				array('fromEmail','required'),
				array('fromContact','required'),
				array('fromTelephone','required'),
			);
		}
		return $rules;
	}
}


?>