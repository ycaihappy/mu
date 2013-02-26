<?php

/**
 * This is the model class for table "{{_sms_code}}".
 *
 * The followings are the available columns in table '{{_sms_code}}':
 * @property string $sms_id
 * @property string $mobile_no
 * @property string $sms_code
 * @property integer $sms_status
 * @property string $sms_send_date
 */
class SmsCode extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SmsCode the static model class
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
		return '{{_sms_code}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sms_id', 'required'),
			array('sms_status', 'numerical', 'integerOnly'=>true),
			array('sms_id', 'length', 'max'=>20),
			array('mobile_no, sms_code', 'length', 'max'=>45),
			array('sms_send_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('sms_id, mobile_no, sms_code, sms_status, sms_send_date', 'safe', 'on'=>'search'),
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
			'sms_id' => 'Sms',
			'mobile_no' => 'Mobile No',
			'sms_code' => 'Sms Code',
			'sms_status' => 'Sms Status',
			'sms_send_date' => 'Sms Send Date',
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

		$criteria->compare('sms_id',$this->sms_id,true);
		$criteria->compare('mobile_no',$this->mobile_no,true);
		$criteria->compare('sms_code',$this->sms_code,true);
		$criteria->compare('sms_status',$this->sms_status);
		$criteria->compare('sms_send_date',$this->sms_send_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}