<?php
class ThemeWorldWidget extends CWidget
{
    public function run()
    {
        $category = Term::model()->getTermsListByGroupId(14); 
        $criteria=new CDbCriteria;
        $criteria->order='art_id DESC';
        #$criteria->addCondition('art_category_id in (58,59,60,61,62)');
        $criteria->addCondition('art_category_id in (59)');
        $criteria->addCondition('art_title like "%'.$category[$_GET['type']].'%"');
        $criteria->limit = 20;


        $art_list =Article::model()->findAll($criteria);
        $this->render('theme_world',array('data'=>$art_list,'title'=>$category[$_GET['type']]));
    }
}
