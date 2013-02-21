<?php

/**
 * This is the model class for table "{{_price_summary}}".
 *
 * The followings are the available columns in table '{{_price_summary}}':
 * @property integer $sum_id
 * @property integer $sum_unit
 * @property string $sum_price
 * @property string $sum_year
 * @property string $sum_month
 * @property string $sum_day
 * @property integer $sum_product_type
 * @property integer $sum_product_zone
 * @property string $sum_add_date
 */
class PriceSummary extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PriceSummary the static model class
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
		return 'mu_price_summary';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sum_unit, sum_product_type, sum_product_zone', 'numerical', 'integerOnly'=>true),
			array('sum_price', 'length', 'max'=>5),
			array('sum_year, sum_month, sum_day', 'length', 'max'=>45),
			array('sum_add_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('sum_id, sum_unit, sum_price, sum_year, sum_month, sum_day, sum_product_type, sum_product_zone, sum_add_date', 'safe', 'on'=>'search'),
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
			'productType'=>array(self::BELONGS_TO,'Term','sum_product_type'),
			'productZone'=>array(self::BELONGS_TO,'City','sum_product_zone'),
			'unit'=>array(self::BELONGS_TO,'Term','sum_unit'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'sum_id' => 'Sum',
			'sum_unit' => 'Sum Unit',
			'sum_price' => 'Sum Price',
			'sum_year' => 'Sum Year',
			'sum_month' => 'Sum Month',
			'sum_day' => 'Sum Day',
			'sum_product_type' => 'Sum Product Type',
			'sum_product_zone' => 'Sum Product Zone',
			'sum_add_date' => 'Sum Add Date',
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

		$criteria->compare('sum_id',$this->sum_id);
		$criteria->compare('sum_unit',$this->sum_unit);
		$criteria->compare('sum_price',$this->sum_price,true);
		$criteria->compare('sum_year',$this->sum_year,true);
		$criteria->compare('sum_month',$this->sum_month,true);
		$criteria->compare('sum_day',$this->sum_day,true);
		$criteria->compare('sum_product_type',$this->sum_product_type);
		$criteria->compare('sum_product_zone',$this->sum_product_zone);
		$criteria->compare('sum_add_date',$this->sum_add_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}