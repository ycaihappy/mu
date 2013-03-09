<?php
class PriceTodayWidget extends CWidget
{
    public $today_price;
    public $area;
    public function init()
    {
        $unit_type= Term::model()->getTermsListByGroupId(2);

        $connection = Yii::app()->db;
        $sql = 'select sum_unit,sum_product_type,sum_product_zone,sum_price from mu_price_summary 
            group by sum_product_type,sum_product_zone';
        $day_price = $connection->createCommand($sql)->queryAll();
        foreach ($day_price as $price)
        {
            $this->today_price[$price['sum_product_type']][] = $price['sum_price'].'('.$unit_type[$price['sum_unit']].")";
            $this->area[$price['sum_product_zone']]= $price['sum_product_zone'];
        }
    }

    public function run()
    {
        $city  = City::getCityList();
        $category = Term::model()->getTermsListByGroupId(14);

        $this->render('price_today',array('data'=>$this->today_price,'area'=>$this->area,'category'=>$category,'city'=>$city));
    }
}
