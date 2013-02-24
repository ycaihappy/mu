<?php

/**
 * This is the model class for table "{{_user_template}}".
 *
 * The followings are the available columns in table '{{_user_template}}':
 * @property integer $temp_id
 * @property string $temp_name
 * @property integer $temp_status
 * @property integer $temp_order
 * @property string $temp_dir
 * @property integer $temp_amount
 * @property string $temp_add_date
 * @property string $temp_update_date
 */
class UserTemplate extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserTemplate the static model class
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
		return 'mu_user_template';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('temp_status, temp_order, temp_amount', 'numerical', 'integerOnly'=>true),
			array('temp_name, temp_dir', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('temp_id, temp_name, temp_status, temp_order, temp_dir, temp_amount, temp_added_date, temp_updated_date', 'safe', 'on'=>'search'),
		);
	}

	public function beforeSave()
	{
		if($this->isNewRecord)
		{
			$this->temp_added_date=date('Y-m-d H:i:s');
		}
		else
		{
			$this->temp_updated_date=date('Y-m-d H:i:s');
		}
		return parent::beforeSave();
	}
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'status'=>array(self::BELONGS_TO,'Term','temp_status'),
		);
	}
	public static function getAllTemplate($status=1){
		
		$templates=self::model()->findAll('temp_status=:status',array(':status'=>$status));
		$returnTemplate=array();
		if($templates)
		{
			foreach ($templates as $template)
			{
				$returnTemplate[$template->temp_dir]=$template->temp_dir;
			}
		}
		return $returnTemplate;
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'temp_id' => 'Temp',
			'temp_name' => 'Temp Name',
			'temp_status' => 'Temp Status',
			'temp_order' => 'Temp Order',
			'temp_dir' => 'Temp Dir',
			'temp_amount' => 'Temp Amount',
			'temp_added_date' => 'Temp Add Date',
			'temp_updated_date' => 'Temp Update Date',
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

		$criteria->compare('temp_id',$this->temp_id);
		$criteria->compare('temp_name',$this->temp_name,true);
		$criteria->compare('temp_status',$this->temp_status);
		$criteria->compare('temp_order',$this->temp_order);
		$criteria->compare('temp_dir',$this->temp_dir,true);
		$criteria->compare('temp_amount',$this->temp_amount);
		$criteria->compare('temp_add_date',$this->temp_add_date,true);
		$criteria->compare('temp_update_date',$this->temp_update_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}