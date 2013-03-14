<?php

/**
 * This is the model class for table "mu_supply".
 *
 * The followings are the available columns in table 'mu_supply':
 * @property integer $supply_id
 * @property integer $supply_user_id
 * @property integer $supply_type
 * @property string $supply_keyword
 * @property integer $supply_category_id
 * @property string $supply_contractor
 * @property string $supply_content
 * @property string $supply_address
 * @property integer $supply_status
 * @property string $supply_phone
 * @property string $supply_price
 * @property string $supply_valid_date
 * @property integer $supply_check_by
 * @property integer $supply_recommend
 * @property string $supply_image_src
 * @property string $supply_join_date
 */
class Supply extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Supply the static model class
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
		return 'mu_supply';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('supply_unit, supply_user_id', 'required'),
			array('supply_id, supply_city_id,supply_user_id,supply_mu_content,supply_water_content,  supply_type, supply_category_id, supply_status, supply_recommend', 'numerical', 'integerOnly'=>true),
			array('supply_keyword, supply_content,supply_check_by', 'length', 'max'=>128),
			array('supply_contractor, supply_phone', 'length', 'max'=>32),
			array('supply_address', 'length', 'max'=>100),
			array('supply_price', 'length', 'max'=>8),
			array('supply_image_src,supply_name', 'length', 'max'=>218),
			array('supply_valid_date, supply_join_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('supply_id, supply_user_id, supply_type, supply_keyword, supply_category_id, supply_contractor, supply_content, supply_address, supply_status, supply_phone, supply_price, supply_valid_date, supply_check_by, supply_recommend, supply_image_src, supply_join_date', 'safe'),
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
			'category'=>array(self::BELONGS_TO,'Term','supply_category_id'),
			'status'=>array(self::BELONGS_TO,'Term','supply_status'),
			'user'=>array(self::BELONGS_TO,'User','supply_user_id'),
			'city'=>array(self::BELONGS_TO,'City','supply_city_id'),
			'unit'=>array(self::BELONGS_TO,'Term','supply_unit'),
		);
	}
	public function scopes()
	{
		return array(
			'recentlyUncheckSupply'=>array('condition'=>'supply_status=20 and supply_type=18','order'=>'supply_join_date desc','limit'=>8),
			'recentlyUncheckBuy'=>array('condition'=>'supply_status=20 and supply_type=19','order'=>'supply_join_date desc','limit'=>8),
			'topsupply'=>array(
					'condition'=>'supply_status=1',
					'order'=>'supply_join_date desc',
					'limit'=>8
				),
			'topsupplyIndex'=>array(
					'select'=>'supply_id,supply_name,supply_mu_content,supply_join_date',
					'with'=>array('user.enterprise'=>array('ent_name'),'city'=>array('select'=>'city_name'),'category'=>array('select'=>'term_name')),
					'condition'=>'supply_status=1 and supply_type=18',
					'order'=>'supply_join_date desc',
					'limit'=>25
				),
			'topbuyIndex'=>array(
					'select'=>'supply_id,supply_name,supply_contractor,supply_mu_content,supply_phone,supply_join_date',
					'with'=>array('user.enterprise'=>array('ent_name'),'user'=>array('select'=>'user_name'),'city'=>array('select'=>'city_name'),'category'=>array('select'=>'term_name')),
					'condition'=>'supply_status=1 and supply_type=19',
					'order'=>'supply_join_date desc',
					'limit'=>25

                ),
   			'categorysupply01'=>array(
					'select'=>'supply_id,supply_name',
					'condition'=>'supply_status=1 and supply_category_id=28',
					'order'=>'supply_join_date desc',
					'limit'=>5
				),
   			'categorysupply02'=>array(
					'select'=>'supply_id,supply_name',
					'condition'=>'supply_status=1 and supply_category_id=32',
					'order'=>'supply_join_date desc',
					'limit'=>5
				),
   			'categorysupply03'=>array(
					'select'=>'supply_id,supply_name',
					'condition'=>'supply_status=1 and supply_category_id=31',
					'order'=>'supply_join_date desc',
					'limit'=>5
				),
		);
	}
	public function hasWaterContent()
	{
		if($this->supply_category_id!=31)//只有钼精矿才有含水量
		{
			return false;
		}
		return true;
	}
	public function beforeSave()
	{
		if($this->supply_category_id!=31)//只有钼精矿才有含水量
		{
			$this->supply_water_content=0;
		}
		return parent::beforeSave();
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'supply_id' => 'Supply',
			'supply_user_id' => 'Supply User',
			'supply_type' => 'Supply Type',
			'supply_keyword' => 'Supply Keyword',
			'supply_category_id' => 'Supply Category',
			'supply_contractor' => 'Supply Contractor',
			'supply_content' => 'Supply Content',
			'supply_address' => 'Supply Address',
			'supply_status' => 'Supply Status',
			'supply_phone' => 'Supply Phone',
			'supply_price' => 'Supply Price',
			'supply_valid_date' => 'Supply Valid Date',
			'supply_check_by' => 'Supply Check By',
			'supply_recommend' => 'Supply Recommend',
			'supply_image_src' => 'Supply Image Src',
			'supply_join_date' => 'Supply Join Date',
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

		$criteria->compare('supply_id',$this->supply_id);
		$criteria->compare('supply_user_id',$this->supply_user_id);
		$criteria->compare('supply_type',$this->supply_type);
		$criteria->compare('supply_keyword',$this->supply_keyword,true);
		$criteria->compare('supply_category_id',$this->supply_category_id);
		$criteria->compare('supply_contractor',$this->supply_contractor,true);
		$criteria->compare('supply_content',$this->supply_content,true);
		$criteria->compare('supply_address',$this->supply_address,true);
		$criteria->compare('supply_status',$this->supply_status);
		$criteria->compare('supply_phone',$this->supply_phone,true);
		$criteria->compare('supply_price',$this->supply_price,true);
		$criteria->compare('supply_valid_date',$this->supply_valid_date,true);
		$criteria->compare('supply_check_by',$this->supply_check_by);
		$criteria->compare('supply_recommend',$this->supply_recommend);
		$criteria->compare('supply_image_src',$this->supply_image_src,true);
		$criteria->compare('supply_join_date',$this->supply_join_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
