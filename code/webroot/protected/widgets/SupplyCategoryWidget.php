<?php
class SupplyCategoryWidget extends CWidget
{
    public function run()
    {
        $cur_supply = Supply::model()->find('supply_id=:supply_id', array(':supply_id'=>$_REQUEST['supply_id']));
        $criteria=new CDbCriteria;
        $criteria->order='supply_id DESC';
        $criteria->addCondition('supply_category_id='.$cur_supply->supply_category_id);
        $criteria->limit = 8;

        $supply_category_list =Supply::model()->findAll($criteria);
        
        $city  = city::getAllCity();
        $category = Term::model()->getTermsByGroupId(14);
        $status = Term::model()->getTermsByGroupId(11);

        $this->render('supply_list',array('data'=>$supply_category_list,'category'=>$category,'city'=>$city,'status'=>$status));
    }
}
