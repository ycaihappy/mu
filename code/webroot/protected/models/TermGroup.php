<?php

/**
 * This is the model class for table "mu_term_group".
 *
 * The followings are the available columns in table 'mu_term_group':
 * @property integer $group_id
 * @property string $group_name
 * @property string $group_desc
 */
class TermGroup extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TermGroup the static model class
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
		return 'mu_term_group';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('group_id', 'numerical', 'integerOnly'=>true),
			array('group_name', 'length', 'max'=>100),
			array('group_desc', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('group_id, group_name, group_desc', 'safe', 'on'=>'search'),
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
			'terms'=>array(self::HAS_MANY,'Term','term_group_id'),
		);
	}
	public function scopes()
	{
		return array('allGroupNameIndexById'=>array('select'=>'group_id,group_name'));
	}
	public function getGroupTermsByArray($groupId)
	{
		if(!$groupId && !$this->group_id)
		{
			return array();
		}
		$termGroup=$this;
		if(!$this->group_id)
		{
			$termGroup=TermGroup::model()->findByPk($groupId);
		}
		$terms=$termGroup->terms;
		if($terms)
		{
			$termArray=array();
			$termArray[0]='顶级';
			foreach ($terms as $term)
			{
				$termArray[$term->term_id]=$term->term_name;
			}
			return $termArray;
		}
	}
	public function getAllGroupIdToNameArray()
	{
		$groupArray=$this->allGroupNameIndexById()->findAll();
		if($groupArray)
		{
			$groupNameArray=array();
			$groupNameArray[0]='不限分组';
			foreach($groupArray as $group)
			{
				$groupNameArray[$group->group_id]=$group->group_name;
			}
			return $groupNameArray;
		}
		else
		{
			return false;
		}
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'group_id' => 'Group',
			'group_name' => 'Group Name',
			'group_desc' => 'Group Desc',
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

		$criteria->compare('group_id',$this->group_id);
		$criteria->compare('group_name',$this->group_name,true);
		$criteria->compare('group_desc',$this->group_desc,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}