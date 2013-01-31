<?php

/**
 * This is the model class for table "mu_advertisement".
 *
 * The followings are the available columns in table 'mu_advertisement':
 * @property integer $ad_id
 * @property integer $ad_user_id
 * @property integer $ad_type
 * @property integer $ad_no
 * @property string $ad_link
 * @property integer $ad_status
 * @property integer $ad_click_num
 * @property string $ad_start_date
 * @property string $ad_end_date
 * @property string $ad_price
 * @property string $ad_media_src
 * @property string $ad_create_time
 */
class Advertisement extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Advertisement the static model class
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
		return 'mu_advertisement';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ad_id', 'required'),
			array('ad_id, ad_user_id, ad_type, ad_no, ad_status, ad_click_num', 'numerical', 'integerOnly'=>true),
			array('ad_link', 'length', 'max'=>256),
			array('ad_title', 'length', 'max'=>128),
			array('ad_price', 'length', 'max'=>12),
			array('ad_media_src', 'length', 'max'=>128),
			array('ad_media_src', 'length', 'max'=>128),
			array('ad_start_date, ad_end_date, ad_create_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ad_id, ad_user_id, ad_type, ad_no, ad_link, ad_status, ad_click_num, ad_start_date, ad_end_date, ad_price, ad_media_src, ad_create_time', 'safe', 'on'=>'search'),
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
		'user'=>array(self::BELONGS_TO,'User','ad_user_id'),
		'type'=>array(self::BELONGS_TO,'Term','ad_type'),
		'position'=>array(self::BELONGS_TO,'Term','ad_no'),
		'status'=>array(self::BELONGS_TO,'Term','ad_status'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ad_id' => 'Ad',
			'ad_user_id' => 'Ad User',
			'ad_type' => 'Ad Type',
			'ad_no' => 'Ad No',
			'ad_link' => 'Ad Link',
			'ad_status' => 'Ad Status',
			'ad_click_num' => 'Ad Click Num',
			'ad_start_date' => 'Ad Start Date',
			'ad_end_date' => 'Ad End Date',
			'ad_price' => 'Ad Price',
			'ad_media_src' => 'Ad Media Src',
			'ad_create_time' => 'Ad Create Time',
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

		$criteria->compare('ad_id',$this->ad_id);
		$criteria->compare('ad_user_id',$this->ad_user_id);
		$criteria->compare('ad_type',$this->ad_type);
		$criteria->compare('ad_no',$this->ad_no);
		$criteria->compare('ad_link',$this->ad_link,true);
		$criteria->compare('ad_status',$this->ad_status);
		$criteria->compare('ad_click_num',$this->ad_click_num);
		$criteria->compare('ad_start_date',$this->ad_start_date,true);
		$criteria->compare('ad_end_date',$this->ad_end_date,true);
		$criteria->compare('ad_price',$this->ad_price,true);
		$criteria->compare('ad_media_src',$this->ad_media_src,true);
		$criteria->compare('ad_create_time',$this->ad_create_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}