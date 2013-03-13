<?php

class FlinkForm extends CFormModel
{
    public $flink_name;
	public $flink_url;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
    {
        return array(
        	array('flink_name','required','message'=>'请填写标题'),
        	array('flink_url','required','message'=>'请填写URL!'),
        	array('flink_url','url','message'=>'URL格式不正确'),
        	array('flink_name,flink_url','safe'),	
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
        $addsql = "insert into mu_friend_link(flink_name,flink_user_id,flink_url,flink_status,flink_order,flink_create_date) 
            values(:flink_name,:flink_user_id,:flink_url,:flink_status,:flink_order,:flink_create_date)";

        $commd = Yii::app()->db->createCommand($addsql);

        $commd->bindValue(":flink_name", $this->flink_name, PDO::PARAM_STR);
        $commd->bindValue(":flink_user_id", yii::app()->user->getID(), PDO::PARAM_STR);
        $commd->bindValue(":flink_url", $this->flink_url);
        $commd->bindValue(":flink_status",1);
        $commd->bindValue(":flink_order",0);
        $commd->bindValue(":flink_create_date", date("Y-m-d H:i:s"));
        $commd->execute();
	}
}
