<?php

/**
 * This is the model class for table "mu_success_case".
 *
 * The followings are the available columns in table 'mu_success_case':
 * @property integer $case_id
 * @property integer $supply_id
 * @property integer $supply_user_id
 * @property integer $purchase_user_id
 * @property string $purchase_amount
 * @property string $create_time
 * @property integer $case_status
 */
class SuccessCase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SuccessCase the static model class
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
		return 'mu_success_case';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('supply_id, purchase_user_id', 'required'),
			array('supply_id, purchase_user_id, case_status', 'numerical', 'integerOnly'=>true),
			array('purchase_amount', 'length', 'max'=>32),
			array('create_time', 'safe'),
			array('case_recommend', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('case_id, supply_id, purchase_user_id, purchase_amount, create_time, case_status,case_recommend', 'safe', 'on'=>'search'),
		);
	}

	public function scopes()
	{
		return array(
			'recenltyCase'=>array(
					'condition'=>'case_status=1',
					'order'=>'create_time desc',
					'limit'=>7,	
				),
				'recentlyUncheckCase'=>array('condition'=>'case_status=20',
					'order'=>'create_time desc',
					'limit'=>8,),
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
			'supply'=>array(self::BELONGS_TO,'Supply','supply_id'),
			'purchaseUser'=>array(self::BELONGS_TO,'User','purchase_user_id'),
			'status'=>array(self::BELONGS_TO,'Term','case_status'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'case_id' => 'Case',
			'supply_id' => 'Supply',
			'purchase_user_id' => 'Purchase User',
			'purchase_amount' => 'Purchase Amount',
			'create_time' => 'Create Time',
			'case_status' => 'Case Status',
			'case_recommend' => 'Case Recommend',
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

		$criteria->compare('case_id',$this->case_id);
		$criteria->compare('supply_id',$this->supply_id);
		$criteria->compare('purchase_user_id',$this->purchase_user_id);
		$criteria->compare('purchase_amount',$this->purchase_amount,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('case_status',$this->case_status);
		$criteria->compare('case_recommend',$this->case_recommend);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
