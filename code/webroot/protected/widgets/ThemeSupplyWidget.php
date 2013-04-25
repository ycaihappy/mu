<?php
class ThemeSupplyWidget extends CWidget
{
    public $type;
    public function run()
    {
        $sup_type = ($this->type == 1) ? 18 : 19;
        $criteria=new CDbCriteria;
        $criteria->order='supply_id DESC';
        $criteria->addCondition('supply_category_id='.$_GET['type'].' and supply_type='.$sup_type);
        $criteria->limit = 8;

        $supply_category_list =Supply::model()->findAll($criteria);
        $supply_type= Term::model()->getTermsByGroupId(11);
        $supply_name = $supply_type[$sup_type];
        $city  = City::getAllCity();
        $category = Term::model()->getTermsListByGroupId(14);
        $category_name = $category[$_GET['type']];
        $this->render('theme_supply',array('data'=>$supply_category_list,'supply_type'=>$supply_type,'category'=>$category,'city'=>$city,'supply_name'=>$supply_name,'category_name'=>$category_name));
    }
}
