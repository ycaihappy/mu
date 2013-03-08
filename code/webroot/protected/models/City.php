<?php

/**
 * This is the model class for table "mu_city".
 *
 * The followings are the available columns in table 'mu_city':
 * @property integer $city_id
 * @property string $city_name
 * @property integer $city_parent
 * @property integer $city_level
 * @property integer $city_order
 * @property string $city_open
 */
class City extends CActiveRecord
{
	private  static $cityCache;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return City the static model class
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
		return 'mu_city';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
		array('city_name, city_level,city_parent', 'required'),
		array('city_id, city_parent, city_level, city_order', 'numerical', 'integerOnly'=>true),
		array('city_name', 'length', 'max'=>128),
		array('city_open', 'length', 'max'=>45),
		// The following rule is used by search().
		// Please remove those attributes that should not be searched.
		array('city_id, city_name, city_parent, city_level, city_order, city_open', 'safe', 'on'=>'search'),
		);
	}
    public static function getCityList()
    {
		if(!self::$cityCache)
		{
			self::$cityCache=CCacheHelper::getAllCity();
		}
        foreach (self::$cityCache as $city) {
            $returnCity[$city->city_id]=$city->city_name;
        }
        return $returnCity;
    }
	public static function getAllCity($cityId=false)
	{
		if(!self::$cityCache)
		{
			self::$cityCache=CCacheHelper::getAllCity();
		}
		if($cityId===false)
		{
			$returnCity=array();
			$returnCity[0]='地区';
			foreach (self::$cityCache as $city) {
				$parentCity=array();
				$parent=$city->city_parent;
				while($parent)
				{
					$parentCity[]=self::$cityCache[$parent]->city_name;
					$parent=self::$cityCache[$parent]->city_parent;
				}
				$parentCity[]=$city->city_name;
				$returnCity[$city->city_id]=implode('>>',$parentCity);
			}
			return $returnCity;
		}
		else
		{
			$returnCity=array();
			foreach (self::$cityCache as $city) {
				if($city->city_parent==$cityId)
				{
					$returnCity[$city->city_id]=$city->city_name;
				}
			}
			return $returnCity;
		}
	}
	public static function getCityLayer($cityId,$sep='>>',$noCityText='未指明')
	{
		if(!self::$cityCache)
		{
			self::$cityCache=CCacheHelper::getAllCity();
		}
		$parent=self::$cityCache[$cityId]['city_parent'];
		$parentCity=array();
		while($parent)
		{
			$parentCity[]=self::$cityCache[$parent]->city_name;
			$parent=self::$cityCache[$parent]->city_parent;
		}
		if($parentCity)
			$parentCity=array_reverse($parentCity);
		$parentCity[]=self::$cityCache[$cityId]->city_name;
		if($parentCity)
		$cityLayer=implode($sep,$parentCity);
		else
		$cityLayer=$noCityText;
		return $cityLayer;
	}
	public static function getProvice($emptyProvice='全部')
	{
		if(!self::$cityCache)
		{
			self::$cityCache=CCacheHelper::getAllCity();
		}
		$province=array();
		$province[0]=$emptyProvice;
		if(self::$cityCache){
			foreach (self::$cityCache as $city)
			{
				if($city->city_level==2)
				{
					$province[$city->city_id]=$city->city_name;
				}
			}
		}
		return $province;
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
	public function beforeSave()
	{
		if($this->isNewRecord&&!$this->city_level)
		{
			if($this->city_parent!=0)
			{
				if(!self::$cityCache)
					self::$cityCache=CCacheHelper::getAllCity();
				$this->city_level=self::$cityCache[$this->city_parent]->city_level+1;
			}
			else {
				$this->city_level=1;
			}
			
		}
		return parent::beforeSave();
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'city_id' => 'City',
			'city_name' => 'City Name',
			'city_parent' => 'City Parent',
			'city_level' => 'City Level',
			'city_order' => 'City Order',
			'city_open' => 'City Open',
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

		$criteria->compare('city_id',$this->city_id);
		$criteria->compare('city_name',$this->city_name,true);
		$criteria->compare('city_parent',$this->city_parent);
		$criteria->compare('city_level',$this->city_level);
		$criteria->compare('city_order',$this->city_order);
		$criteria->compare('city_open',$this->city_open,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
