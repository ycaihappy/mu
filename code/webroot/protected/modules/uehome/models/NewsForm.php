<?php

class NewsForm extends CFormModel
{
    public $art_id;
	public $art_title;
	public $art_content;
    public $art_intro;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
    {
        return array(
            array('art_title', 'required','message'=>'请填写文章标题'),		
            array('art_content', 'required','message'=>'请填写文章内容'),		
            array('art_intro', 'required','message'=>'请填写文章摘要'),		
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
        $addsql = "insert into mu_user_article(art_title, art_content, art_user_id,art_added_date, art_intro)
            values(:art_title,:art_content,:art_user_id,:art_added_date,:art_intro)";

        $commd = Yii::app()->db->createCommand($addsql);

        $commd->bindValue(":art_title", $this->art_title, PDO::PARAM_STR);
        $commd->bindValue(":art_content", $this->art_content, PDO::PARAM_STR);
        $commd->bindValue(":art_intro", $this->art_intro, PDO::PARAM_STR);
        $commd->bindValue(":art_user_id", yii::app()->user->getID(), PDO::PARAM_STR);
        $commd->bindValue(":art_added_date", date("Y-m-d H:i:s"));

        $commd->execute();
	}

	public function update()
	{
        $addsql = "update mu_user_article set art_intro=:art_intro,art_title=:art_title, art_content=:art_content, art_user_id=:art_user_id where art_id=:art_id";

        $commd = Yii::app()->db->createCommand($addsql);

        $commd->bindValue(":art_id", $this->art_id, PDO::PARAM_STR);
        $commd->bindValue(":art_title", $this->art_title, PDO::PARAM_STR);
        $commd->bindValue(":art_content", $this->art_content, PDO::PARAM_STR);
        $commd->bindValue(":art_intro", $this->art_intro, PDO::PARAM_STR);
        $commd->bindValue(":art_user_id", yii::app()->user->getID(), PDO::PARAM_STR);

        $commd->execute();
	}
}
