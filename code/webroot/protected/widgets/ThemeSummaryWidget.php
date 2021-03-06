<?php
class ThemeSummaryWidget extends CWidget
{
	public $type;
	public $newlist=array();
	public $proTypes=array();

	public function run()
    {

        $typies=Term::getTermsListByGroupId(14);

        $creteria=new CDbCriteria();
        $creteria->condition="re_type=148 and re_name_type='".$_GET['type']."' and re_status=1 ";
        $creteria->order = "re_id desc";
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
                $price->re_name = $typies[$price->re_name_type];
            }
        }
        $creteria=new CDbCriteria();
        $creteria->condition="re_type=149 and re_name_type='".$_GET['type']."' and re_status=1 ";
        $creteria->order = "re_id desc";
        $creteria->limit = 7;
        $otherPrice=RelativeRePrice::model()->findAll($creteria);
        if($otherPrice)
        {
            foreach ($otherPrice as &$price)
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
                $price->re_name = $typies[$price->re_name_type];
            }
        }
        $category = Term::model()->getTermsListByGroupId(14); 
        $creteria=new CDbCriteria();
        $creteria->condition="re_type=163 and re_name like '%".$category[$_GET['type']]."%' and re_status=1 ";
        $creteria->order = "re_id desc";
        $creteria->limit = 7;
        $thirdPrice=RelativeRePrice::model()->findAll($creteria);
        if($thirdPrice)
        {
        	foreach ($thirdPrice as &$price)
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
        $this->render('theme_summary',array('otherPrice'=>$otherPrice,'rePrice'=>$rePrice,'thirdPrice'=>$thirdPrice));
	}
}
