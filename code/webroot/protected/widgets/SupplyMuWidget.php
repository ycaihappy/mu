<?php
class SupplyMuWidget extends CWidget
{
    public $list;
    public $pager;
    public function init()
    {
        $criteria=new CDbCriteria;
        $criteria->order='supply_id DESC';

        $count=Supply::model()->count($criteria);

        $this->pager=new CPagination($count);
        $this->pager->pageSize=9;
        $this->pager->applyLimit($criteria);
        $this->list=Supply::model()->findAll($criteria);
    }

    public function run()
    {
        $this->render('supply_mu',array('data'=>$this->list));
    }
}
