<?php
class ThemeChinaWidget extends CWidget
{
    public function run()
    {
        $category = Term::model()->getTermsListByGroupId(14); 
        $criteria=new CDbCriteria;
        $criteria->order='art_id DESC';
        $criteria->addCondition('art_category_id in (36,37)');
        $criteria->addCondition('art_title like "%'.$category[$_GET['type']].'%"');
        $criteria->limit = 20;


        $art_list =Article::model()->findAll($criteria);
        $this->render('theme_china',array('data'=>$art_list,'title'=>$category[$_GET['type']]));
    }
}
