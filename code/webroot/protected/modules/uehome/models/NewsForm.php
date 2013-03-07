<?php

class NewsForm extends CFormModel
{
    public $art_id;
	public $art_title;
	public $art_content;


	/**
	 * Declares the validation rules.
	 */
	public function rules()
    {
        return array(
            array('art_title', 'required'),		
            array('art_content', 'required'),		
            array('art_user_id', 'safe'),		
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
        $addsql = "insert into mu_user_article(art_title, art_content, art_user_id)
            values(:art_title,:art_content,:art_user_id)";

        $commd = Yii::app()->db->createCommand($addsql);

        $commd->bindValue(":art_title", $this->art_title, PDO::PARAM_STR);
        $commd->bindValue(":art_content", $this->art_content, PDO::PARAM_STR);
        $commd->bindValue(":art_user_id", yii::app()->user->getID(), PDO::PARAM_STR);

        $commd->execute();
	}

	public function update()
	{
        $addsql = "update mu_user_article set art_title=:art_title, art_content=:art_content, art_user_id=:art_user_id where art_id=:art_id";

        $commd = Yii::app()->db->createCommand($addsql);

        $commd->bindValue(":art_id", $this->art_id, PDO::PARAM_STR);
        $commd->bindValue(":art_title", $this->art_title, PDO::PARAM_STR);
        $commd->bindValue(":art_content", $this->art_content, PDO::PARAM_STR);
        $commd->bindValue(":art_user_id", yii::app()->user->getID(), PDO::PARAM_STR);

        $commd->execute();
	}
}
