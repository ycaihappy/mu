<?php

/**
 * This is the model class for table "mu_term".
 *
 * The followings are the available columns in table 'mu_term':
 * @property integer $term_id
 * @property integer $term_parent_id
 * @property string $term_name
 * @property string $term_slug
 * @property integer $term_group_id
 * @property integer $term_order
 * @property string $term_create_time
 */
class Term extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Term the static model class
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
		return 'mu_term';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
//			array('term_id', 'required'),
			array('term_id, term_parent_id, term_group_id, term_order', 'numerical', 'integerOnly'=>true),
			array('term_name', 'length', 'max'=>128),
			array('term_slug', 'length', 'max'=>200),
			array('term_create_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('term_id, term_parent_id, term_name, term_slug, term_group_id, term_order, term_create_time', 'safe', 'on'=>'search'),
		);
	}
    public static function getTermsListByGroupId($groupId)
    {
        $termCritria=new CDbCriteria();
        $termCritria->addCondition('term_group_id=:groupId');
        $termCritria->params[':groupId']=$groupId;
        $terms=self::model()->findAll($termCritria);
        foreach($terms as $term)
        {
            $returnTerms[$term->term_id]=$term->term_name;
        }

        return $returnTerms;
    }
	public static function getTermsByGroupId($groupId,$top=false,$parent=null,$empty='不限',$needEmpty=true)
	{
		if($groupId)
		{
			$termCritria=new CDbCriteria();
			if($top)
			{
				$termCritria->compare('term_parent_id','=0');
			}
			if($parent)
			{
				$termCritria->addCondition('term_parent_id=:parent_id');
				$termCritria->params[':parent_id']=$parent;
			}
			$termCritria->addCondition('term_group_id=:groupId');
			$termCritria->params[':groupId']=$groupId;
			$terms=self::model()->findAll($termCritria);
			if($terms)
			{
				$returnTermsTermp=array();
				foreach ($terms as $term)
				{
					$returnTermsTermp[$term->term_id]=$term;
				}
				$returnTerms=array();
				if($needEmpty){
					$returnTerms[]=$empty;
				}
				foreach($terms as $term)
				{
					$returnLayer=array();
					$parent=$term->term_parent_id;
					while($parent&&isset($returnTermsTermp[$parent]))
					{
						$returnLayer[]=$returnTermsTermp[$parent]->term_name;
						$parent=$returnTermsTermp[$parent]->term_parent_id;
					}
					if($returnLayer)
						$returnLayer=array_reverse($returnLayer);
					$returnLayer[]=$term->term_name;
					$returnTerms[$term->term_id]=implode('>>',$returnLayer);
					
				}
				return $returnTerms;
			}
		}
		return array();
	}
	public static function getMuCategory()
	{
		$muCategories=CCacheHelper::getMuCategory();
		$muCategories1=$muCategories;
		$returnCategories=array();
		if($muCategories)
		{
			foreach ($muCategories as $category)
			{
				$categoryLayer=array();
				$parent=$category['term_parent_id'];
				while($parent)
				{
					$categoryLayer[]=$muCategories1[$parent]['term_name'];
					$parent=$muCategories1[$parent]['term_parent_id'];
				}
				if($categoryLayer)
					array_reverse($categoryLayer);
				$categoryLayer[]=$muCategories1[$category['term_id']]['term_name'];
				$returnCategories[$category->term_id]=implode('>>',$categoryLayer);
			}
		}
		return $returnCategories;
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'termGroup'=>array(self::BELONGS_TO,'TermGroup','term_group_id'),
			'parent'=>array(self::BELONGS_TO,'Term','term_parent_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'term_id' => 'Term',
			'term_parent_id' => 'Term Parent',
			'term_name' => 'Term Name',
			'term_slug' => 'Term Slug',
			'term_group_id' => 'Term Group',
			'term_order' => 'Term Order',
			'term_create_time' => 'Term Create Time',
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

		$criteria->compare('term_id',$this->term_id);
		$criteria->compare('term_parent_id',$this->term_parent_id);
		$criteria->compare('term_name',$this->term_name,true);
		$criteria->compare('term_slug',$this->term_slug,true);
		$criteria->compare('term_group_id',$this->term_group_id);
		$criteria->compare('term_order',$this->term_order);
		$criteria->compare('term_create_time',$this->term_create_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
