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
        $this->render('theme_supply',array('data'=>$supply_category_list));
    }
}
