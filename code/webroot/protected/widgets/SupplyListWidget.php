<?php
class SupplyListWidget extends CWidget
{
    public $list;
	public $pager;
    public function init()
    {
        $criteria=new CDbCriteria;
        $criteria->order='supply_id DESC';

        $count=Supply::model()->count($criteria);

        $this->pager=new CPagination($count);
        $this->pager->pageSize=15;
        $this->pager->applyLimit($criteria);
        $this->list=Supply::model()->findAll($criteria);
        
    }

    public function run()
    {
        $city  = city::getAllCity();
        $category = Term::model()->getTermsByGroupId(14);
        $status = Term::model()->getTermsByGroupId(11);

        $this->render('supply_list',array('data'=>$this->list,'pager'=>$this->pager,'category'=>$category,'city'=>$city,'status'=>$status));
    }
}
