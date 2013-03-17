<?php

/**
 * This is the model class for table "{{_user_group}}".
 *
 * The followings are the available columns in table '{{_user_group}}':
 * @property integer $group_id
 * @property string $group_name
 * @property string $group_description
 * @property string $group_logo
 * @property integer $group_status
 * @property string $group_added_time
 * @property string $group_updated_time
 */
class UserGroup extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserGroup the static model class
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
		return 'mu_user_group';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('group_id,group_status', 'numerical', 'integerOnly'=>true),
			array('group_name', 'length', 'max'=>50),
			array('group_name', 'required', 'message'=>'请填写分组名称！'),
			array('group_logo', 'length', 'max'=>128),
			array('group_logo', 'required', 'message'=>'分组LOGO必须上传！'),
			array('group_description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('group_id, group_name, group_description, group_logo, group_status, group_added_time, group_updated_time', 'safe', 'on'=>'search'),
		);
	}
	public static function getUserGroup()
	{
		$groups=CCacheHelper::getUserGroup();
		$return=array();
		if($groups)
		{
			foreach ($groups as $group)
			{
				$return[$group->group_id]=$group->group_name;
			}
			
		}
		return $return;
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'status'=>array(self::BELONGS_TO,'Term','group_status'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'group_id' => 'Group',
			'group_name' => 'Group Name',
			'group_description' => 'Group Description',
			'group_logo' => 'Group Logo',
			'group_status' => 'Group Status',
			'group_added_time' => 'Group Added Time',
			'group_updated_time' => 'Group Updated Time',
		);
	}
	public function beforeSave()
	{
		if($this->isNewRecord)
		{
			$this->group_added_time=date('Y-m-d H:i:s');
		}
		$this->group_updated_time=date('Y-m-d H:i:s');
		return parent::beforeSave();
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

		$criteria->compare('group_id',$this->group_id);
		$criteria->compare('group_name',$this->group_name,true);
		$criteria->compare('group_description',$this->group_description,true);
		$criteria->compare('group_logo',$this->group_logo,true);
		$criteria->compare('group_status',$this->group_status);
		$criteria->compare('group_added_time',$this->group_added_time,true);
		$criteria->compare('group_updated_time',$this->group_updated_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}