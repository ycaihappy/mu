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
			array('sum_unit, sum_product_type, sum_product_zone', 'numerical', 'integerOnly'=>true,'message'=>'必须为数字类型'),
			array('sum_year, sum_month, sum_day', 'required', 'message'=>'年月日必须填写完整'),
			array('sum_add_date', 'safe'),
			array('sum_unit', 'required','message'=>'单位必须填写'),
			array('sum_product_type', 'required','message'=>'所属类型必须填写'),
			array('sum_price', 'required','message'=>'价格必须填写'),
			array('sum_price', 'numerical','message'=>'价格必须是数字'),
			array('sum_product_zone', 'required','message'=>'地区必须填写'),
			array('sum_id,sum_alias, sum_unit, sum_price, sum_year, sum_month, sum_day, sum_product_type, sum_product_zone, sum_add_date', 'safe'),
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

	public function beforeSave()
	{
		$this->sum_alias_date=implode('-',array($this->sum_year,str_pad($this->sum_month,2,'0',STR_PAD_LEFT),str_pad($this->sum_day,2,'0',STR_PAD_LEFT)));
		
		return parent::beforeSave();
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
