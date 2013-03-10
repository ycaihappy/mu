<?php

class MessageForm extends CFormModel
{
    public $msg_to_user_id;
	public $msg_subject;
	public $msg_content;
    public $msg_to_user_name;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
    {
        return array(
        	array('msg_subject','required','message'=>'请填写主题'),
        	array('msg_content','required','message'=>'请填写发送内容!'),
        	array('msg_to_user_id','required','message'=>'请选择接收人'),
        	array('msg_subject,msg_content,msg_to_user_id','safe'),	
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
		);
	}

	public function draft()
	{
        $addsql = "insert into mu_message(msg_subject,msg_content,msg_to_user_id,msg_from_user_id,msg_date)
            values(:msg_subject,:msg_content,:msg_to_user_id,:msg_from_user_id,:msg_date)";

        $commd = Yii::app()->db->createCommand($addsql);

        $commd->bindValue(":msg_subject", $this->msg_subject, PDO::PARAM_STR);
        $commd->bindValue(":msg_from_user_id", yii::app()->user->getID(), PDO::PARAM_STR);
        $commd->bindValue(":msg_content", $this->msg_content);
        $commd->bindValue(":msg_to_user_id", $this->msg_to_user_id);
        $commd->bindValue(":msg_date", date("Y-m-d H:i:s"));
        $commd->execute();
	}
}
