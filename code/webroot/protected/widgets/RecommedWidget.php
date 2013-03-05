<?php
class RecommedWidget extends CWidget
{
    public $list;
    public $type;

    public function init()
    {
    	$this->list =Enterprise::model()->with(array('user'=>array('select'=>'user_name')))->recommedEnt()->findAll();
        switch ($this->type)
        {
        case '1':
            break;
        case '2';
            break;
        }
    }

    public function run()
    {
        $this->render('recommend',array('data'=>$this->list));
    }
}
