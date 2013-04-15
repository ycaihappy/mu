<?php

/**
 * This is the model class for table "{{_relative_re_price}}".
 *
 * The followings are the available columns in table '{{_relative_re_price}}':
 * @property integer $re_id
 * @property string $re_name
 * @property integer $re_fallup
 * @property integer $re_margin
 * @property string $re_market
 * @property string $re_price
 * @property integer $re_status
 * @property string $re_added_time
 * @property string $re_updated_time
 */
class RelativeRePrice extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return RelativeRePrice the static model class
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
		return 'mu_relative_re_price';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('re_name', 'required','message'=>'名称不能留空'),
			array('re_id,re_fallup, re_margin, re_status', 'numerical', 'integerOnly'=>true),
			array('re_name', 'length', 'max'=>50),
			array('re_market', 'length', 'max'=>128),
			array('re_price', 'length', 'max'=>128),
			array('re_type', 'required', 'message'=>'选择价格类型！'),
			array('re_added_time, re_updated_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('re_id, re_name, re_fallup, re_margin, re_market, re_price, re_status, re_added_time, re_updated_time', 'safe', 'on'=>'search'),
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
			'fallup'=>array(self::BELONGS_TO,'Term','re_fallup'),
			'status'=>array(self::BELONGS_TO,'Term','re_status'),
			'type'=>array(self::BELONGS_TO,'Term','re_type'),
		);
	}
	public function scopes()
	{
		return  array(
			'recentlyRePrice'=>array(
				'condition'=>'re_status=1',
				'order'=>'re_id desc',
			),
		);
	}
	public function recentlyRePrice($reType=134,$limit=7)
	{
		$recentlyCriteria=new CDbCriteria();
		$recentlyCriteria->addCondition('re_type=:reType');
		$recentlyCriteria->params[':reType']=$reType;
		$recentlyCriteria->order='re_id desc';
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
			're_id' => 'Re',
			're_name' => '品名',
			're_fallup' => 'Re Fallup',
			're_margin' => '幅度',
			're_market' => '所属市场',
			're_price' => '价格',
			're_status' => 'Re Status',
			're_added_time' => 'Re Added Time',
			're_updated_time' => 'Re Updated Time',
		);
	}
	public function  beforeSave()
	{
		if($this->isNewRecord)
		{
			$this->re_added_time=date('Y-m-d H:i:s');
		}
		else
		{
			$this->re_updated_time=date('Y-m-d H:i:s');;
		}
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

		$criteria->compare('re_id',$this->re_id);
		$criteria->compare('re_name',$this->re_name,true);
		$criteria->compare('re_fallup',$this->re_fallup);
		$criteria->compare('re_margin',$this->re_margin);
		$criteria->compare('re_market',$this->re_market,true);
		$criteria->compare('re_price',$this->re_price,true);
		$criteria->compare('re_status',$this->re_status);
		$criteria->compare('re_added_time',$this->re_added_time,true);
		$criteria->compare('re_updated_time',$this->re_updated_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
