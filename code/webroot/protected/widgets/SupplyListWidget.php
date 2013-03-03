<?php
class SupplyListWidget extends CWidget
{
    public $list;

    public function init()
    {
        $criteria=new CDbCriteria;
        $criteria->order='supply_id DESC';

        $count=Supply::model()->count($criteria);

        $pager=new CPagination($count);
        $pager->pageSize=15;
        $pager->applyLimit($criteria);
        $this->list=Supply::model()->findAll($criteria);
    }

    public function run()
    {
        $this->render('supply_list',array('data'=>$this->list));
    }
}
