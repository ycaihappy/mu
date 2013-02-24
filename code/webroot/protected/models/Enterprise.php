<?php

/**
 * This is the model class for table "mu_user_enterprise".
 *
 * The followings are the available columns in table 'mu_user_enterprise':
 * @property integer $ent_id
 * @property integer $ent_user_id
 * @property string $ent_name
 * @property string $ent_website
 * @property string $ent_zipcode
 * @property string $ent_introduce
 * @property string $ent_location
 * @property string $ent_chief
 * @property integer $ent_chief_postion
 * @property string $ent_business_scope
 * @property string $ent_registered_capital
 * @property integer $ent_recommend
 */
class Enterprise extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Enterprise the static model class
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
		return 'mu_user_enterprise';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ent_id, ent_name', 'required'),
			array('ent_id,ent_status, ent_user_id, ent_chief_postion, ent_recommend', 'numerical', 'integerOnly'=>true),
			array('ent_name', 'length', 'max'=>256),
			array('ent_website, ent_business_scope', 'length', 'max'=>512),
			array('ent_zipcode', 'length', 'max'=>32),
			array('ent_tax', 'length', 'max'=>30),
			array('ent_website', 'url'),
			array('ent_location', 'length', 'max'=>218),
			array('ent_chief,ent_logo,ent_image', 'length', 'max'=>128),
			array('ent_registered_capital', 'length', 'max'=>10),
			array('ent_introduce', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ent_id, ent_user_id, ent_name, ent_website, ent_zipcode, ent_introduce, ent_location, ent_chief, ent_chief_postion, ent_business_scope, ent_registered_capital, ent_recommend', 'safe', 'on'=>'search'),
		);
	}

	public function scopes()
	{
		return array(
			'recommedEnt'=>array(
					'condition'=>'ent_recommend=1',
					'order'=>'ent_create_time desc',
					'limit'=>12,	
				),
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
			'user'=>array(self::BELONGS_TO,'User','ent_user_id'),
			'status'=>array(self::BELONGS_TO,'Term','ent_status'),
			'city'=>array(self::BELONGS_TO,'City','ent_city'),
			'type'=>array(self::BELONGS_TO,'Term','ent_type'),
			'business'=>array(self::BELONGS_TO,'Term','ent_business_model'),
			'chiefPosition'=>array(self::BELONGS_TO,'Term','ent_chief_position'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ent_id' => 'Ent',
			'ent_user_id' => 'Ent User',
			'ent_name' => 'Ent Name',
			'ent_website' => 'Ent Website',
			'ent_zipcode' => 'Ent Zipcode',
			'ent_introduce' => 'Ent Introduce',
			'ent_location' => 'Ent Location',
			'ent_chief' => 'Ent Chief',
			'ent_chief_postion' => 'Ent Chief Postion',
			'ent_business_scope' => 'Ent Business Scope',
			'ent_registered_capital' => 'Ent Registered Capital',
			'ent_recommend' => 'Ent Recommend',
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

		$criteria->compare('ent_id',$this->ent_id);
		$criteria->compare('ent_user_id',$this->ent_user_id);
		$criteria->compare('ent_name',$this->ent_name,true);
		$criteria->compare('ent_website',$this->ent_website,true);
		$criteria->compare('ent_zipcode',$this->ent_zipcode,true);
		$criteria->compare('ent_introduce',$this->ent_introduce,true);
		$criteria->compare('ent_location',$this->ent_location,true);
		$criteria->compare('ent_chief',$this->ent_chief,true);
		$criteria->compare('ent_chief_postion',$this->ent_chief_postion);
		$criteria->compare('ent_business_scope',$this->ent_business_scope,true);
		$criteria->compare('ent_registered_capital',$this->ent_registered_capital,true);
		$criteria->compare('ent_recommend',$this->ent_recommend);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
