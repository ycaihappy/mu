<?php

/**
 * This is the model class for table "{{_file}}".
 *
 * The followings are the available columns in table '{{_file}}':
 * @property integer $file_id
 * @property string $file_title
 * @property integer $file_type_id
 * @property string $file_content
 * @property string $file_url
 * @property string $file_create_time
 */
class FileModel extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return FileModel the static model class
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
		return '{{file}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('file_id', 'required'),
			array('file_id, file_type_id', 'numerical', 'integerOnly'=>true),
			array('file_title', 'length', 'max'=>45),
			array('file_content, file_url', 'length', 'max'=>255),
			array('file_create_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('file_id, file_title, file_type_id, file_content, file_url, file_create_time', 'safe', 'on'=>'search'),
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
			'file_id' => 'File',
			'file_title' => 'File Title',
			'file_type_id' => 'File Type',
			'file_content' => 'File Content',
			'file_url' => 'File Url',
			'file_create_time' => 'File Create Time',
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

		$criteria->compare('file_id',$this->file_id);
		$criteria->compare('file_title',$this->file_title,true);
		$criteria->compare('file_type_id',$this->file_type_id);
		$criteria->compare('file_content',$this->file_content,true);
		$criteria->compare('file_url',$this->file_url,true);
		$criteria->compare('file_create_time',$this->file_create_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
