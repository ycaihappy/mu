<?php

/**
 * This is the model class for table "{{_message_template}}".
 *
 * The followings are the available columns in table '{{_message_template}}':
 * @property integer $msg_template_id
 * @property string $msg_template_name
 * @property integer $msg_template_type
 * @property integer $msg_template_title
 * @property string $msg_template_content
 * @property string $msg_template_added_date
 * @property string $msg_template_update_date
 */
class MessageTemplate extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MessageTemplate the static model class
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
		return 'mu_message_template';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('msg_template_name, msg_template_type', 'required'),
			array('msg_template_type', 'numerical', 'integerOnly'=>true),
			array('msg_template_title', 'length', 'max'=>255),
			array('msg_template_name,msg_template_mnemonic', 'length', 'max'=>128),
			
			array('msg_template_mnemonic', 'unique'),
			array('msg_template_content, msg_template_added_date, msg_template_update_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('msg_template_id, msg_template_name, msg_template_type, msg_template_title, msg_template_content, msg_template_added_date, msg_template_update_date', 'safe', 'on'=>'search'),
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
			'type'=>array(self::BELONGS_TO,'Term','msg_template_type')
		);
	}
	public function beforeSave()
	{
		if($this->isNewRecord)
		{
			$this->msg_template_added_date=date('Y-m-d H:i:s');
		}
		else {
			$this->msg_template_update_date=date('Y-m-d H:i:s');
		}
		return parent::beforeSave();
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'msg_template_id' => 'Msg Template',
			'msg_template_name' => 'Msg Template Name',
			'msg_template_type' => 'Msg Template Type',
			'msg_template_title' => 'Msg Template Title',
			'msg_template_content' => 'Msg Template Content',
			'msg_template_added_date' => 'Msg Template Added Date',
			'msg_template_update_date' => 'Msg Template Update Date',
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

		$criteria->compare('msg_template_id',$this->msg_template_id);
		$criteria->compare('msg_template_name',$this->msg_template_name,true);
		$criteria->compare('msg_template_type',$this->msg_template_type);
		$criteria->compare('msg_template_title',$this->msg_template_title);
		$criteria->compare('msg_template_content',$this->msg_template_content,true);
		$criteria->compare('msg_template_added_date',$this->msg_template_added_date,true);
		$criteria->compare('msg_template_update_date',$this->msg_template_update_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}