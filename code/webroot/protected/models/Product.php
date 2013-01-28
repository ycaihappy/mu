<?php

/**
 * This is the model class for table "mu_product".
 *
 * The followings are the available columns in table 'mu_product':
 * @property string $product_id
 * @property integer $product_user_id
 * @property string $product_name
 * @property integer $product_quanity
 * @property string $product_unit
 * @property integer $product_type_id
 * @property string $product_price
 * @property integer $product_status
 * @property string $product_location
 * @property integer $product_special
 * @property string $product_join_date
 */
class Product extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Product the static model class
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
		return 'mu_product';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('product_id', 'required'),
			array('product_user_id, product_quanity, product_type_id, product_status,product_unit,product_city_id, product_special', 'numerical', 'integerOnly'=>true),
			array('product_id', 'length', 'max'=>20),
			array('product_name, product_unit', 'length', 'max'=>45),
			array('product_price', 'length', 'max'=>10),
			array('product_location', 'length', 'max'=>100),
			array('product_join_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('product_id, product_user_id, product_name, product_quanity, product_unit, product_type_id, product_price, product_status, product_location, product_special, product_join_date', 'safe', 'on'=>'search'),
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
			'type'=>array(self::BELONGS_TO,'Term','product_type_id'),
			'status'=>array(self::BELONGS_TO,'Term','product_status'),
			'user'=>array(self::BELONGS_TO,'User','product_user_id'),
			'city'=>array(self::BELONGS_TO,'City','product_city_id'),
			'unit'=>array(self::BELONGS_TO,'Term','product_unit')
		);
	}
	public function scopes()
	{
		return array(
			'recenltyUncheckProduct'=>array('select'=>'product_id,product_name,product_join_date','condition'=>'product_status=20 and product_special=0','order'=>'product_join_date desc','limit'=>8),
			'recenltyUncheckSpecial'=>array('select'=>'product_id,product_name,product_join_date','condition'=>'product_status=20 and product_special=1','order'=>'product_join_date desc','limit'=>8),
            'topSpecial'=>array('condition'=>'product_status=1 and product_special=1','order'=>'product_join_date desc','limit'=>8),
            'topProduct'=>array('condition'=>'product_special=1','order'=>'product_join_date desc','limit'=>8),
		);
	}
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'product_id' => 'Product',
			'product_user_id' => 'Product User',
			'product_name' => 'Product Name',
			'product_quanity' => 'Product Quanity',
			'product_unit' => 'Product Unit',
			'product_type_id' => 'Product Type',
			'product_price' => 'Product Price',
			'product_status' => 'Product Status',
			'product_location' => 'Product Location',
			'product_special' => 'Product Special',
			'product_join_date' => 'Product Join Date',
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

		$criteria->compare('product_id',$this->product_id,true);
		$criteria->compare('product_user_id',$this->product_user_id);
		$criteria->compare('product_name',$this->product_name,true);
		$criteria->compare('product_quanity',$this->product_quanity);
		$criteria->compare('product_unit',$this->product_unit,true);
		$criteria->compare('product_type_id',$this->product_type_id);
		$criteria->compare('product_price',$this->product_price,true);
		$criteria->compare('product_status',$this->product_status);
		$criteria->compare('product_location',$this->product_location,true);
		$criteria->compare('product_special',$this->product_special);
		$criteria->compare('product_join_date',$this->product_join_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
