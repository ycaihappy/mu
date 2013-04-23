<?php

/**
 * This is the model class for table "{{_convert}}".
 *
 * The followings are the available columns in table '{{_convert}}':
 * @property integer $co_id
 * @property string $co_name
 * @property double $co_unit
 * @property double $co_cur_price
 * @property double $co_sell_price
 * @property double $co_cur_rate_buy_price
 * @property double $co_cur_cash_buy_price
 * @property string $co_added_time
 */
class Convert extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Convert the static model class
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
		return 'mu_convert';
	}
	public function beforeSave()
	{
		if($this->isNewRecord)
		{
			$this->co_added_time=date('Y-m-d H:i:s');
		}
		return parent::beforeSave();
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('co_unit,co_id, co_cur_price, co_sell_price, co_cur_rate_buy_price, co_cur_cash_buy_price', 'numerical','message'=>'必须输入数字'),
			array('co_name', 'length', 'max'=>50),
			array('co_added_time', 'safe'),
			
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('co_id, co_name, co_unit, co_cur_price, co_sell_price, co_cur_rate_buy_price, co_cur_cash_buy_price, co_added_time', 'safe'),
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
			'co_id' => 'Co',
			'co_name' => 'Co Name',
			'co_unit' => 'Co Unit',
			'co_cur_price' => 'Co Cur Price',
			'co_sell_price' => 'Co Sell Price',
			'co_cur_rate_buy_price' => 'Co Cur Rate Buy Price',
			'co_cur_cash_buy_price' => 'Co Cur Cash Buy Price',
			'co_added_time' => 'Co Added Time',
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

		$criteria->compare('co_id',$this->co_id);
		$criteria->compare('co_name',$this->co_name,true);
		$criteria->compare('co_unit',$this->co_unit);
		$criteria->compare('co_cur_price',$this->co_cur_price);
		$criteria->compare('co_sell_price',$this->co_sell_price);
		$criteria->compare('co_cur_rate_buy_price',$this->co_cur_rate_buy_price);
		$criteria->compare('co_cur_cash_buy_price',$this->co_cur_cash_buy_price);
		$criteria->compare('co_added_time',$this->co_added_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}