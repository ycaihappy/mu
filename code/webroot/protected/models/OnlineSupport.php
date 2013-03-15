<?php

/**
 * This is the model class for table "{{_online_support}}".
 *
 * The followings are the available columns in table '{{_online_support}}':
 * @property integer $online_id
 * @property integer $online_ent_id
 * @property string $online_name
 * @property integer $online_type
 * @property string $online_num
 * @property string $online_added_time
 */
class OnlineSupport extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MuOnlineSupport the static model class
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
		return 'mu_online_support';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('online_name, online_num', 'required'),
			array('online_ent_id, online_type', 'numerical', 'integerOnly'=>true),
			array('online_name, online_num', 'length', 'max'=>50),
			array('online_added_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('online_id, online_ent_id, online_name, online_type, online_num, online_added_time', 'safe', 'on'=>'search'),
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
			'online_id' => 'Online',
			'online_ent_id' => 'Online Ent',
			'online_name' => 'Online Name',
			'online_type' => 'Online Type',
			'online_num' => 'Online Num',
			'online_added_time' => 'Online Added Time',
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

		$criteria->compare('online_id',$this->online_id);
		$criteria->compare('online_ent_id',$this->online_ent_id);
		$criteria->compare('online_name',$this->online_name,true);
		$criteria->compare('online_type',$this->online_type);
		$criteria->compare('online_num',$this->online_num,true);
		$criteria->compare('online_added_time',$this->online_added_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}