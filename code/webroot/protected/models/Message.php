<?php

/**
 * This is the model class for table "{{_message}}".
 *
 * The followings are the available columns in table '{{_message}}':
 * @property integer $msg_id
 * @property integer $msg_to_user_id
 * @property integer $msg_from_info
 * @property integer $msg_from_user_id
 * @property string $msg_subject
 * @property string $msg_content
 * @property integer $msg_type
 * @property string $msg_date
 */
class Message extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Message the static model class
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
		return '{{_message}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('msg_to_user_id, msg_from_user_id, msg_type', 'numerical', 'integerOnly'=>true),
			array('msg_subject', 'length', 'max'=>218),
			array('msg_content,msg_from_info, msg_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('msg_id, msg_to_user_id, msg_from_user_id, msg_subject, msg_content, msg_type, msg_date', 'safe', 'on'=>'search'),
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
			'msg_id' => 'Msg',
			'msg_to_user_id' => 'Msg To User',
			'msg_from_info' => 'Msg From Info',
			'msg_from_user_id' => 'Msg From User',
			'msg_subject' => 'Msg Subject',
			'msg_content' => 'Msg Content',
			'msg_type' => 'Msg Type',
			'msg_date' => 'Msg Date',
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

		$criteria->compare('msg_id',$this->msg_id);
		$criteria->compare('msg_to_user_id',$this->msg_to_user_id);
		$criteria->compare('msg_from_info',$this->msg_from_info);
		$criteria->compare('msg_from_user_id',$this->msg_from_user_id);
		$criteria->compare('msg_subject',$this->msg_subject,true);
		$criteria->compare('msg_content',$this->msg_content,true);
		$criteria->compare('msg_type',$this->msg_type);
		$criteria->compare('msg_date',$this->msg_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}