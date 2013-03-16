<?php
class SupplyDetailWidget extends CWidget
{
    public function init()
    {
    }

    public function run()
    {
        $supply_detail = Supply::model()->find("supply_id=:supply_id", array('supply_id'=>$_REQUEST['supply_id']));
        $user_info     = User::model()->with(array('enterprise'=>array('select'=>'*')))->find('user_id=:user_id', array('user_id'=>$supply_detail->supply_user_id));
        $city  = City::getAllCity();
        $category = Term::model()->getTermsByGroupId(14);
        $this->getController()->siteConfig->siteMetaTitle=$supply_detail->supply_name;
        $this->getController()->siteConfig->siteMetaKeyword=$supply_detail->supply_keyword;
        $this->getController()->siteConfig->siteMetaDescription=$supply_detail->supply_keyword;
        $this->render('supply_detail',array('supply'=>$supply_detail,'user_info'=>$user_info,'category'=>$category, 'city'=>$city));
    }
}
