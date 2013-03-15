<?php

class OnlineForm extends CFormModel
{
    public $contact_id;
    public $contact_name;
	public $contact_value;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
    {
        return array(
        	array('contact_id,contact_name,contact_value','safe'),	
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
        $ent=Enterprise::model()->find('ent_user_id=:ent_user_id', array('ent_user_id'=>yii::app()->user->getID()));

        for($i=0;$i<count($this->contact_name);$i++)
        {
            if(empty($this->contact_id[$i]))
            {
                $addsql = "insert into mu_online_support(online_ent_id, online_name,online_type,online_num,online_added_time) 
                    values(:online_ent_id,:online_name,:online_type,:online_num,:online_added_time)";

                $commd = Yii::app()->db->createCommand($addsql);

                $commd->bindValue(":online_ent_id", $ent->ent_id, PDO::PARAM_STR);
                $commd->bindValue(":online_name", $this->contact_name[$i], PDO::PARAM_STR);
                $commd->bindValue(":online_type", 1);
                $commd->bindValue(":online_num",$this->contact_value[$i],PDO::PARAM_STR);
                $commd->bindValue(":online_added_time", date("Y-m-d H:i:s"));
                $commd->execute();
            }
            else
            {
                $addsql = "update mu_online_support set online_name=:online_name,online_num=:online_num where online_id=:online_id";

                $commd = Yii::app()->db->createCommand($addsql);

                $commd->bindValue(":online_name", $this->contact_name[$i], PDO::PARAM_STR);
                $commd->bindValue(":online_num",$this->contact_value[$i],PDO::PARAM_STR);
                $commd->bindValue(":online_id", $this->contact_id[$i], PDO::PARAM_STR);
                $commd->execute();
            }
        }

	}
}
