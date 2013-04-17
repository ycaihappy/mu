<?php
class ThemeProductWidget extends CWidget
{
    public function run()
    {

        $creteria=new CDbCriteria();
        $creteria->condition="re_type=148 and re_name_type='".$_GET['type']."' ";
        $creteria->limit = 7;
        $rePrice=RelativeRePrice::model()->findAll($creteria);
        if($rePrice)
        {
            foreach ($rePrice as &$price)
            {
                switch ($price->re_fallup)
                {
                case 94:
                    $price->re_fallup=' ↑ '.$price->re_margin;
                    break;
                case 95:
                    $price->re_fallup=' ↑ '.$price->re_margin;
                    break;
                case 96:
                    $price->re_fallup=' - ';
                    break;
                }
            }
        }

        $this->render('theme_product',array('data'=>$rePrice));
    }
}
