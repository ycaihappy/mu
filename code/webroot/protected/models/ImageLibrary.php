<?php

/**
 * This is the model class for table "mu_image_library".
 *
 * The followings are the available columns in table 'mu_image_library':
 * @property integer $image_id
 * @property string $image_title
 * @property string $image_src
 * @property integer $image_used_type
 * @property integer $image_added_by
 * @property string $image_added_time
 */
class ImageLibrary extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ImageLibrary the static model class
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
		return 'mu_image_library';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('image_status,image_used_type, image_added_by', 'numerical', 'integerOnly'=>true),
			array('image_title', 'length', 'max'=>128),
			array('image_src', 'length', 'max'=>256),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('image_id, image_title, image_src, image_used_type, image_added_by, image_added_time', 'safe', 'on'=>'search'),
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
			'createUser'=>array(self::BELONGS_TO,'User','image_added_by'),
			'usedType'=>array(self::BELONGS_TO,'Term','image_used_type'),
			'status'=>array(self::BELONGS_TO,'Term','image_status'),
		);
	}
	public function beforeSave()
	{
		if($this->isNewRecord)
		{
			$this->image_added_time=date('Y-m-d H:i:s');
			$this->image_added_by=Yii::app()->admin->getId();
		}
		return parent::beforeSave();
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'image_id' => 'Image',
			'image_title' => 'Image Title',
			'image_src' => 'Image Src',
			'image_used_type' => 'Image Used Type',
			'image_added_by' => 'Image Added By',
			'image_added_time' => 'Image Added Time',
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

		$criteria->compare('image_id',$this->image_id);
		$criteria->compare('image_title',$this->image_title,true);
		$criteria->compare('image_src',$this->image_src,true);
		$criteria->compare('image_used_type',$this->image_used_type);
		$criteria->compare('image_added_by',$this->image_added_by);
		$criteria->compare('image_added_time',$this->image_added_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}