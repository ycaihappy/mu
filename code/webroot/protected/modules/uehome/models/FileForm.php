<?php

class FileForm extends CFormModel
{
	public $image;
    public $file_title;
    public $file_type_id;
    public $file_content;
    public $file_url;
    public $file_create_time;


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
        array('file_title','safe'),
        array('file_content','safe'),
        array('file_type_id','safe'),
        array('file_url', 'safe')
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

	public function save()
	{
        $addsql = "insert into mu_file(file_title,file_type_id,file_content, file_url, file_create_time,file_user_id)
            values(:file_title, :file_type_id, :file_content, :file_url, :file_create_time,:file_user_id)";

        $commd = Yii::app()->db->createCommand($addsql);

        $commd->bindValue(":file_title", $this->file_title, PDO::PARAM_STR);
        $commd->bindValue(":file_type_id", $this->file_type_id, PDO::PARAM_STR);
        $commd->bindValue(":file_content", $this->file_content, PDO::PARAM_STR);
        $commd->bindValue(":file_url", $this->file_url, PDO::PARAM_STR);
        $commd->bindValue(":file_create_time", date("Y-m-d H:i:s"), PDO::PARAM_STR);
        $commd->bindValue(":file_user_id", yii::app()->user->getID(), PDO::PARAM_STR);

        $commd->execute();
	}

    public function glist()
    {
        $getsql = "select * from  mu_file where file_user_id=".yii::app()->user->getID();

        $commd = Yii::app()->db->createCommand($getsql);

        return $commd->queryAll();
    }
}
