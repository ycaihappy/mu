<?php

/**
 * This is the model class for table "{{_friend_link}}".
 *
 * The followings are the available columns in table '{{_friend_link}}':
 * @property integer $flink_id
 * @property string $flink_name
 * @property integer $flink_user_id
 * @property string $flink_url
 * @property integer $flink_status
 * @property string $flink_create_date
 */
class FriendLink extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return FriendLink the static model class
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
		return 'mu_friend_link';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('flink_name, flink_user_id', 'required'),
			array('flink_id, flink_user_id, flink_status', 'numerical', 'integerOnly'=>true),
			array('flink_name', 'length', 'max'=>128),
			array('flink_url', 'length', 'max'=>512),
			array('flink_url', 'length','max'=>128),
			array('flink_create_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('flink_id, flink_name, flink_user_id, flink_url, flink_status, flink_create_date', 'safe', 'on'=>'search'),
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
			'user'=>array(self::BELONGS_TO,'User','flink_user_id'),
			'status'=>array(self::BELONGS_TO,'Term','flink_status'),
		);
	}
	public function scopes()
	{
		return array(
			'recentlyFriendLink'=>
				array(
				'select'=>'flink_name,flink_url',
				'condition'=>'flink_status=1',
				'order'=>'flink_order asc',
				'limit'=>8
				),
			'siteFriendLink'=>
				array(
				'select'=>'flink_name,flink_url',
				'condition'=>'flink_status=1 and flink_user_id=0',
				'order'=>'flink_order asc',
				'limit'=>10,
				),	
			
		);
	}
	public function beforeSave()
	{
		if($this->isNewRecord)
		{
			$this->flink_create_date=date('Y-m-d H:i:s');
		}
		return parent::beforeSave();
	}
	public function recentlyFriendLink($uid,$limit=5)
	{
		$recentlyCriteria=new CDbCriteria();
		$recentlyCriteria->addCondition('flink_user_id=:uid');
		$recentlyCriteria->params[':uid']=$uid;
		$recentlyCriteria->limit=$limit;
		$this->getDbCriteria()->mergeWith($recentlyCriteria);
		return $this;
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'flink_id' => 'Flink',
			'flink_name' => 'Flink Name',
			'flink_user_id' => 'Flink User',
			'flink_url' => 'Flink Url',
			'flink_status' => 'Flink Status',
			'flink_create_date' => 'Flink Create Date',
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

		$criteria->compare('flink_id',$this->flink_id);
		$criteria->compare('flink_name',$this->flink_name,true);
		$criteria->compare('flink_user_id',$this->flink_user_id);
		$criteria->compare('flink_url',$this->flink_url,true);
		$criteria->compare('flink_status',$this->flink_status);
		$criteria->compare('flink_create_date',$this->flink_create_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}