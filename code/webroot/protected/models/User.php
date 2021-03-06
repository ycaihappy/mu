<?php

/**
 * This is the model class for table "mu_user".
 *
 * The followings are the available columns in table 'mu_user':
 * @property integer $user_id
 * @property string $user_name
 * @property string $user_pwd
 * @property string $user_email
 * @property string $user_nickname
 * @property integer $user_type
 * @property string $user_mobile_no
 * @property string $user_first_name
 * @property string $user_last_name
 * @property integer $user_status
 * @property integer $user_province_id
 * @property integer $user_city_id
 * @property integer $user_subscribe
 * @property string $user_point
 * @property string $user_join_date
 * @property string $user_confirm_date
 * @property string $user_last_login_date
 */
class User extends CActiveRecord
{
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
		return 'mu_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_name, user_pwd', 'required','message'=>'用户名不允许为空'),
			array('user_type, user_status, user_province_id, user_city_id, user_subscribe', 'numerical', 'integerOnly'=>true),
			array('user_name, user_first_name, user_last_name', 'length', 'max'=>50),
			array('user_pwd', 'length', 'max'=>40),
			array('user_email', 'length', 'max'=>100),
			array('user_sex', 'numerical'),
			array('user_template', 'length', 'max'=>128),
			array('user_open_template', 'boolean'),
			array('user_nickname, user_point', 'length', 'max'=>20),
			array('user_mobile_no,user_telephone', 'length', 'max'=>30),
			array('user_mobile_no', 'CMobileValidator'),
			array('user_telephone', 'CPhoneValidator'),
			//array('comfirmPwd','compare','compareAttribute'=>'user_pwd'),
			array('user_join_date, user_confirm_date,user_status, user_last_login_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('user_id, user_name, user_pwd, user_email, user_sex, user_nickname, user_type, user_mobile_no, user_first_name, user_last_name, user_status, user_province_id, user_city_id, user_subscribe, user_point, user_join_date, user_confirm_date, user_last_login_date', 'safe', ),
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
			'status'=>array(self::BELONGS_TO,'Term','user_status'),
			'role'=>array(self::MANY_MANY,'AuthItem','mu_right_assignment(userid,itemname)'),
			'enterprise'=>array(self::HAS_ONE,'Enterprise','ent_user_id'),
			'city'=>array(self::BELONGS_TO,'City','user_city_id'),
			'type'=>array(self::BELONGS_TO,'UserGroup','user_type'),
			
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'user_id' => 'User',
			'user_name' => 'User Name',
			'user_pwd' => 'User Pwd',
			'user_email' => 'User Email',
			'user_sex' => 'User Sex',
			'user_nickname' => 'User Nickname',
			'user_type' => 'User Type',
			'user_mobile_no' => '手机号码',
			'user_first_name' => 'User First Name',
			'user_last_name' => 'User Last Name',
			'user_status' => 'User Status',
			'user_province_id' => 'User Province',
			'user_city_id' => 'User City',
			'user_subscribe' => 'User Subscribe',
			'user_point' => 'User Point',
			'user_join_date' => 'User Join Date',
			'user_confirm_date' => 'User Confirm Date',
			'user_last_login_date' => 'User Last Login Date',
		);
	}
	public static function  getSexName($sex)
	{
		return $sex==1?'先生':'女士';
	}
	public function beforeSave()
	{
		if($this->isNewRecord)
		{
			$this->user_join_date=date('Y-m-d H:i:s');
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

		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('user_name',$this->user_name,true);
		$criteria->compare('user_pwd',$this->user_pwd,true);
		$criteria->compare('user_email',$this->user_email,true);
		$criteria->compare('user_sex',$this->user_sex,true);
		$criteria->compare('user_nickname',$this->user_nickname,true);
		$criteria->compare('user_type',$this->user_type);
		$criteria->compare('user_mobile_no',$this->user_mobile_no,true);
		$criteria->compare('user_first_name',$this->user_first_name,true);
		$criteria->compare('user_last_name',$this->user_last_name,true);
		$criteria->compare('user_status',$this->user_status);
		$criteria->compare('user_province_id',$this->user_province_id);
		$criteria->compare('user_city_id',$this->user_city_id);
		$criteria->compare('user_subscribe',$this->user_subscribe);
		$criteria->compare('user_point',$this->user_point,true);
		$criteria->compare('user_join_date',$this->user_join_date,true);
		$criteria->compare('user_confirm_date',$this->user_confirm_date,true);
		$criteria->compare('user_last_login_date',$this->user_last_login_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
