<?php
class KnowMuWidget extends CWidget
{
    public $list;
    public $pager;
    public function init()
    {
        $this->list = Supply::model()->topsupplyIndex()->findAll();
    }

    public function run()
    {
        $this->render('know_mu',array('data'=>$this->list));
    }
}
