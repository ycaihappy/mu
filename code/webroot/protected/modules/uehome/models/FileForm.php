<?php

class FileForm extends CFormModel
{
	public $image;


	/**
	 * Declares the validation rules.
	 */
	public function rules()
    {
        return array(
            array('image', 'file', 'allowEmpty'=>true,
            'types'=>'jpg, jpeg, gif, png',
            'maxSize'=>1024 * 1024 * 1, // 1MB
            'tooLarge'=>'上传文件超过 1MB，无法上传。',
        ),
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
        $addsql = "insert into mu_file()
            values()";

        $commd = Yii::app()->db->createCommand($addsql);

        $commd->bindValue(":art_title", $this->art_title, PDO::PARAM_STR);
        $commd->bindValue(":art_content", $this->art_content, PDO::PARAM_STR);
        $commd->bindValue(":art_user_id", yii::app()->user->getID(), PDO::PARAM_STR);

        $commd->execute();
	}
}
