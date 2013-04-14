<?php
class ThemeProductWidget extends CWidget
{
    public function run()
    {
        $unit_type= Term::model()->getTermsListByGroupId(2);

        $creteria=new CDbCriteria();
        $creteria->condition="city_mu=1 and city_level=2";
        $creteria->limit =3;
        $city_three=City::model()->findAll($creteria);
        foreach ($city_three as $city_one)
        {
            $select_city[$city_one->city_name] = $city_one->city_id;
        }
        $connection = Yii::app()->db;
        $sql = 'select sum_unit,sum_product_type,sum_product_zone,sum_price from mu_price_summary where sum_product_zone in ('.implode(',',$select_city).' and sum_product_type='.$_GET['type'].')
            group by sum_product_type,sum_product_zone';
        $day_price = $connection->createCommand($sql)->queryAll();
        $this->render('theme_product',array('data'=>$day_price));
    }
}
