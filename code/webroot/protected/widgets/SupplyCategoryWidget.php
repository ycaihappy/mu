<?php
class SupplyCategoryWidget extends CWidget
{
    public function run()
    {
        $criteria=new CDbCriteria;
        $criteria->order='supply_id DESC';
        $criteria->addCondition('supply_category_id=1');
        $criteria->limit = 8;

        $supply_category_list =Supply::model()->findAll($criteria);
        
        $city  = city::getAllCity();
        $category = Term::model()->getTermsByGroupId(14);
        $status = Term::model()->getTermsByGroupId(11);

        $this->render('supply_list',array('data'=>$supply_category_list,'category'=>$category,'city'=>$city,'status'=>$status));
    }
}
