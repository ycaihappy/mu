<?php
class ThemeSupplyWidget extends CWidget
{
    public function run()
    {
        $criteria=new CDbCriteria;
        $criteria->order='supply_id DESC';
        $criteria->addCondition('supply_category_id='.$_GET['type']);
        $criteria->limit = 20;

        $supply_category_list =Supply::model()->findAll($criteria);
        $supply_type= Term::model()->getTermsByGroupId(11);
        $city  = City::getAllCity();
        $category = Term::model()->getTermsByGroupId(14);
        $this->render('theme_supply',array('data'=>$supply_category_list,'supply_type'=>$supply_type,'category'=>$category,'city'=>$city));
    }
}
