<?php

/**
 * This is the model class for table "{{_user_arctile}}".
 *
 * The followings are the available columns in table '{{_user_arctile}}':
 * @property integer $art_id
 * @property integer $art_user_id
 * @property string $art_title
 * @property string $art_subtitle
 * @property string $art_tags
 * @property string $art_intro
 * @property integer $art_click_count
 * @property string $art_content
 * @property string $art_added_date
 * @property string $art_updated_date
 */
class UserArticle extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserArctile the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'mu_user_article';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('art_user_id, art_click_count', 'numerical', 'integerOnly'=>true),
			array('art_title, art_subtitle, art_tags', 'length', 'max'=>218),
			array('art_intro', 'length', 'max'=>512),
			array('art_content, art_added_date, art_updated_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('art_id, art_user_id, art_title, art_subtitle, art_tags, art_intro, art_click_count, art_content, art_added_date, art_updated_date', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'art_id' => 'Art',
			'art_user_id' => 'Art User',
			'art_title' => 'Art Title',
			'art_subtitle' => 'Art Subtitle',
			'art_tags' => 'Art Tags',
			'art_intro' => 'Art Intro',
			'art_click_count' => 'Art Click Count',
			'art_content' => 'Art Content',
			'art_added_date' => 'Art Added Date',
			'art_updated_date' => 'Art Updated Date',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('art_id',$this->art_id);
		$criteria->compare('art_user_id',$this->art_user_id);
		$criteria->compare('art_title',$this->art_title,true);
		$criteria->compare('art_subtitle',$this->art_subtitle,true);
		$criteria->compare('art_tags',$this->art_tags,true);
		$criteria->compare('art_intro',$this->art_intro,true);
		$criteria->compare('art_click_count',$this->art_click_count);
		$criteria->compare('art_content',$this->art_content,true);
		$criteria->compare('art_added_date',$this->art_added_date,true);
		$criteria->compare('art_updated_date',$this->art_updated_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}