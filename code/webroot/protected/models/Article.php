<?php

/**
 * This is the model class for table "mu_article".
 *
 * The followings are the available columns in table 'mu_article':
 * @property integer $art_id
 * @property string $art_title
 * @property string $art_source
 * @property integer $art_category_id
 * @property string $art_content
 * @property integer $art_status
 * @property string $art_tags
 * @property integer $art_user_id
 * @property string $art_check_by
 * @property string $art_post_date
 * @property string $art_modified_date
 * @property integer $art_recommend
 */
class Article extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Article the static model class
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
		return 'mu_article';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('art_id, art_title', 'required'),
			array('art_id, art_category_id, art_status, art_user_id, art_recommend', 'numerical', 'integerOnly'=>true),
			array('art_title, art_source', 'length', 'max'=>128),
			array('art_tags, art_check_by', 'length', 'max'=>45),
			array('art_content, art_post_date, art_modified_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('art_id, art_title, art_source, art_category_id, art_content, art_status, art_tags, art_user_id, art_check_by, art_post_date, art_modified_date, art_recommend', 'safe', 'on'=>'search'),
		);
	}
	public function scopes()
	{
		return array(
				'recentlyprice'=>array(
					'condition'=>'art_category_id=16 and art_status=1',
					'order'=>'art_post_date desc',
					'limit'=>8
				),
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
			'status'=>array(self::BELONGS_TO,'Term','art_status'),
			'createUser'=>array(self::BELONGS_TO,'User','art_user_id'),
			'category'=>array(self::BELONGS_TO,'Term','art_category_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'art_id' => 'Art',
			'art_title' => 'Art Title',
			'art_source' => 'Art Source',
			'art_category_id' => 'Art Category',
			'art_content' => 'Art Content',
			'art_status' => 'Art Status',
			'art_tags' => 'Art Tags',
			'art_user_id' => 'Art User',
			'art_check_by' => 'Art Check By',
			'art_post_date' => 'Art Post Date',
			'art_modified_date' => 'Art Modified Date',
			'art_recommend' => 'Art Recommend',
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
		$criteria->compare('art_title',$this->art_title,true);
		$criteria->compare('art_source',$this->art_source,true);
		$criteria->compare('art_category_id',$this->art_category_id);
		$criteria->compare('art_content',$this->art_content,true);
		$criteria->compare('art_status',$this->art_status);
		$criteria->compare('art_tags',$this->art_tags,true);
		$criteria->compare('art_user_id',$this->art_user_id);
		$criteria->compare('art_check_by',$this->art_check_by,true);
		$criteria->compare('art_post_date',$this->art_post_date,true);
		$criteria->compare('art_modified_date',$this->art_modified_date,true);
		$criteria->compare('art_recommend',$this->art_recommend);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}