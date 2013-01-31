<?php



class RecommendView extends CActiveRecord {

 	/**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Article the static model class
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
        return 'mu_view_recommend';
    }

    public function primaryKey()
    {
        return 'recommend_id';
    }
	/**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'status'=>array(self::BELONGS_TO,'Term','recommend_status'),
            'infoType'=>array(self::BELONGS_TO,'Term','recommend_type'),
            'module'=>array(self::BELONGS_TO,'Term','recommend_position'),
        );
    }

}


?>