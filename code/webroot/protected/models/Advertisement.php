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
			array('ad_id, ad_user_id, ad_type, ad_no, ad_status, ad_click_num', 'numerical', 'integerOnly'=>true),
			array('ad_link', 'length', 'max'=>256),
			array('ad_link', 'url', 'message'=>'链接地址格式不正确,应如：http://www.mushw.com'),
			array('ad_title', 'length', 'max'=>128),
			array('ad_title', 'required', 'message'=>'必须填写广告标题'),
			array('ad_price', 'length', 'max'=>12),
			array('ad_price', 'numerical', 'message'=>'价格必须为数字'),
			array('ad_image_size', 'length', 'max'=>50),
			array('ad_media_src', 'length', 'max'=>128),
			array('ad_media_src', 'required', 'message'=>'必须选择广告媒体文件'),
			array('ad_start_date, ad_end_date, ad_create_time', 'safe'),
		);
	}
	public function beforeSave()
	{
		if($this->isNewRecord)
		{
			$this->ad_create_time=date('Y-m-d H:i:s');
		}
		return parent::beforeSave();
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
			'ad_user_id' => '广告所属用户',
			'ad_type' => '媒体类型',
			'ad_no' => '广告位置',
			'ad_link' => '广告链接',
			'ad_status' => '状态',
			'ad_click_num' => '点击数',
			'ad_start_date' => '起效时间',
			'ad_end_date' => '终止时间',
			'ad_price' => '广告价格',
			'ad_media_src' => '媒体源',
			'ad_create_time' => '创建时间',
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