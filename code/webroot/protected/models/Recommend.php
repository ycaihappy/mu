<?php

/**
 * This is the model class for table "mu_recommend".
 *
 * The followings are the available columns in table 'mu_recommend':
 * @property integer $recommend_id
 * @property string $recommend_object_id
 * @property integer $recommend_type
 * @property integer $recommend_position
 * @property string $recommend_time
 */
class Recommend extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Recommend the static model class
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
		return 'mu_recommend';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('recommend_id, recommend_object_id, recommend_type, recommend_position', 'required'),
			array('recommend_id, recommend_type, recommend_position', 'numerical', 'integerOnly'=>true),
			array('recommend_object_id', 'length', 'max'=>20),
			array('recommend_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('recommend_id, recommend_object_id, recommend_type, recommend_position, recommend_time', 'safe', 'on'=>'search'),
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
			'type'=>array(self::BELONGS_TO,'Term','recommend_type'),
			'position'=>array(self::BELONGS_TO,'Term','recommend_position'),
			'status'=>array(self::BELONGS_TO,'Term','recommend_status'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'recommend_id' => 'Recommend',
			'recommend_object_id' => 'Recommend Object',
			'recommend_type' => 'Recommend Type',
			'recommend_position' => 'Recommend Position',
			'recommend_time' => 'Recommend Time',
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

		$criteria->compare('recommend_id',$this->recommend_id);
		$criteria->compare('recommend_object_id',$this->recommend_object_id,true);
		$criteria->compare('recommend_type',$this->recommend_type);
		$criteria->compare('recommend_position',$this->recommend_position);
		$criteria->compare('recommend_time',$this->recommend_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}