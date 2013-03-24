<?php

/**
 * This is the model class for table "mu_article".
 *
 * The followings are the available columns in table 'mu_article':
 * @property integer $art_id
 * @property string $art_title
 * @property string $art_source
 * @property integer $art_category_id
 * @property string $art_content
 * @property integer $art_status
 * @property string $art_tags
 * @property integer $art_user_id
 * @property string $art_check_by
 * @property string $art_post_date
 * @property string $art_modified_date
 * @property integer $art_recommend
 */
class Article extends CActiveRecord
{
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
        return 'mu_article';
    }

    public function primaryKey()
    {
        return 'art_id';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('art_title', 'required','message'=>'请填写文章标题'),
            array('art_id, art_category_id,art_subcategory_id, art_status, art_user_id, art_recommend', 'numerical', 'integerOnly'=>true,'message'=>'必须是填写数字'),
            array('art_title, art_source', 'length', 'max'=>128),
            array('art_img', 'length', 'max'=>218),
            array('art_summary', 'length', 'max'=>255),
            array('art_tags, art_check_by', 'length', 'max'=>45),
            array('art_subcategory_id','required','message'=>'请选择文章分类'),
            array('art_status','required','message'=>'请选择状态'),
            array('art_content, art_post_date, art_modified_date', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('art_id, art_title, art_source, art_category_id, art_content, art_status, art_tags, art_user_id, art_check_by, art_post_date, art_modified_date, art_recommend', 'safe', 'on'=>'search'),
        );
    }
    public function beforeSave()
    {
    	
    	if($this->isNewRecord)
    	{
    		$this->art_post_date=date('Y-m-d H:i:s');
    	}
    	else {
    		$this->art_modified_date=date('Y-m-d H:i:s');
    	}
    	return parent::beforeSave();
    }
    public function scopes()
    {
        return array(
            'recentlyprice'=>array(
                'condition'=>'art_category_id=16 and art_status=1',
                'order'=>'art_post_date desc',
                'limit'=>8
            ),
            'knowledgeList'=>array(
                'condition'=>'art_category_id=20 and art_status=1',
                'order'=>'art_post_date desc',
                'limit'=>5
            ),
            'knowledgeWorldList'=>array(
                'condition'=>'art_subcategory_id=63 and art_status=1',
                'order'=>'art_post_date desc',
                'limit'=>8
            ),
            'knowledgeChinaList'=>array(
                'condition'=>'art_subcategory_id=64 and art_status=1',
                'order'=>'art_post_date desc',
                'limit'=>8
            ),
            'knowledgeMakeList'=>array(
                'condition'=>'art_subcategory_id=65 and art_status=1',
                'order'=>'art_post_date desc',
                'limit'=>8
            ),
            'knowledgeUseList'=>array(
                'condition'=>'art_subcategory_id=66 and art_status=1',
                'order'=>'art_post_date desc',
                'limit'=>8
            ),
            'knowledgeProductList'=>array(
                'condition'=>'art_subcategory_id=67 and art_status=1',
                'order'=>'art_post_date desc',
                'limit'=>8
            ),
            'knowledgeAppList'=>array(
                'condition'=>'art_subcategory_id=68 and art_status=1',
                'order'=>'art_post_date desc',
                'limit'=>5
            ),
            'PriceMarketList'=>array(
                'condition'=>'art_subcategory_id=60 and art_status=1',
                'order'=>'art_post_date desc',
                'limit'=>8
            ),
            'PriceAnalyList'=>array(
                'condition'=>'art_subcategory_id=61 and art_status=1',
                'order'=>'art_post_date desc',
                'limit'=>8
            ),
            'PriceWorldList'=>array(
                'condition'=>'art_subcategory_id=37 and art_status=1',
                'order'=>'art_post_date desc',
                'limit'=>8
            ),
            'PriceChinaList'=>array(
                'condition'=>'art_subcategory_id=36 and art_status=1',
                'order'=>'art_post_date desc',
                'limit'=>8
            ),
            'PriceMaterialList'=>array(
                'condition'=>'art_subcategory_id=101 and art_status=1',
                'order'=>'art_post_date desc',
                'limit'=>8
            ),
            'PriceSummaryList'=>array(
                'condition'=>'art_subcategory_id=59 and art_status=1',
                'order'=>'art_post_date desc',
                'limit'=>8
            ),
            'PriceTrendList'=>array(
                'condition'=>'art_subcategory_id=62 and art_status=1',
                'order'=>'art_post_date desc',
                'limit'=>8
            ),
            'topNews'=>array(
                'condition'=>'art_category_id=17 and art_status=1',
                'order'=>'art_post_date desc',
                'limit'=>8
            ),
            'topMuNews'=>array(
                'condition'=>'art_category_id=21 and art_status=1',
                'order'=>'art_post_date desc',
                'limit'=>8
            ),
            'newest4News'=>array(//新闻首页--最新新闻4
            	'select'=>'art_id,art_title',
                'condition'=>'art_category_id=17 and art_status=1',
                'order'=>'art_post_date desc',
                'limit'=>6
            ),
            'topRankingNews'=>array(//新闻首页--新闻排行
            	'select'=>'art_id,art_title,art_click_count',
                'condition'=>'art_category_id=17 and art_status=1',
                'order'=>'art_click_count desc,art_post_date desc',
                'limit'=>10
            ),
            'topRankingPrice'=>array(//行情列表--行情排行
            	'select'=>'art_id,art_title,art_click_count',
                'condition'=>'art_category_id=16 and art_status=1',
                'order'=>'art_click_count desc,art_post_date desc',
                'limit'=>10
            ),
            'topRankingKnowledge'=>array(//百科列表--知识排行
            	'select'=>'art_id,art_title,art_click_count',
                'condition'=>'art_category_id=20 and art_status=1',
                'order'=>'art_click_count desc,art_post_date desc',
                'limit'=>11
            ),
            'topViewPointNews'=>array(//新闻首页--本网视点
            	'select'=>'art_id,art_title,art_content',
                'condition'=>'art_category_id=17 and art_subcategory_id=40 and art_status=1',
                'order'=>'art_post_date desc',
                'limit'=>6
            ),
            'topHotSpotNews'=>array(//新闻首页--热点新闻
            	'select'=>'art_id,art_title',
                'condition'=>'art_category_id=17 and art_subcategory_id=41 and art_status=1',
                'order'=>'art_post_date desc',
                'limit'=>6
            ),
            'topTrendsNews'=>array(//新闻首页--行业动态
            	'select'=>'art_id,art_title,art_img',
                'condition'=>'art_category_id=17 and art_subcategory_id=42 and art_status=1',
                'order'=>'art_post_date desc',
                'limit'=>11
            ),
            'topStockNews'=>array(//新闻首页--股票
            	'select'=>'art_id,art_title',
                'condition'=>'art_category_id=17 and art_subcategory_id=44 and art_status=1',
                'order'=>'art_post_date desc',
                'limit'=>10
            ),
            'topBusinessNews'=>array(//新闻首页--财经
            	'select'=>'art_id,art_title',
                'condition'=>'art_category_id=17 and art_subcategory_id=44 and art_status=1',
                'order'=>'art_post_date desc',
                'limit'=>10
            ),
            'newest10News'=>array(//新闻首页--最新新闻10
                'condition'=>'art_category_id=17 and art_status=1',
                'order'=>'art_post_date desc',
            	'offset'=>5,
                'limit'=>9
            ),
            'internalExhibitions'=>array(//展会列表也--国内展会
            	'select'=>'art_id,art_title',
                'condition'=>'art_category_id=98 and art_subcategory_id=99 and art_status=1',
                'order'=>'art_post_date desc',
                'limit'=>10
            ),
            'internationalExhibitions'=>array(//展会列表也--国际展会
            	'select'=>'art_id,art_title',
                'condition'=>'art_category_id=98 and art_subcategory_id=100 and art_status=1',
                'order'=>'art_post_date desc',
                'limit'=>10
            ),
            'service'=>array(//目前展示的7项服务
            	'select'=>'art_id,art_title,art_summary,art_subcategory_id',
                'condition'=>'art_category_id=103  and art_status=1',
                'limit'=>7
            ),
            
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
            'status'=>array(self::BELONGS_TO,'Term','art_status'),
            'createUser'=>array(self::BELONGS_TO,'User','art_user_id'),
            'category'=>array(self::BELONGS_TO,'Term','art_category_id'),
			'subcategory'=>array(self::BELONGS_TO,'Term','art_subcategory_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'art_id' => 'Art',
            'art_title' => '请输入标题关键字',
            'art_source' => 'Art Source',
            'art_category_id' => 'Art Category',
            'art_content' => 'Art Content',
            'art_status' => 'Art Status',
            'art_tags' => 'Art Tags',
            'art_user_id' => 'Art User',
            'art_check_by' => 'Art Check By',
            'art_post_date' => 'Art Post Date',
            'art_modified_date' => 'Art Modified Date',
            'art_recommend' => 'Art Recommend',
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

        $criteria->compare('art_id',$this->art_id);
        $criteria->compare('art_title',$this->art_title,true);
        $criteria->compare('art_source',$this->art_source,true);
        $criteria->compare('art_category_id',$this->art_category_id);
        $criteria->compare('art_content',$this->art_content,true);
        $criteria->compare('art_status',$this->art_status);
        $criteria->compare('art_tags',$this->art_tags,true);
        $criteria->compare('art_user_id',$this->art_user_id);
        $criteria->compare('art_check_by',$this->art_check_by,true);
        $criteria->compare('art_post_date',$this->art_post_date,true);
        $criteria->compare('art_modified_date',$this->art_modified_date,true);
        $criteria->compare('art_recommend',$this->art_recommend);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }
}
