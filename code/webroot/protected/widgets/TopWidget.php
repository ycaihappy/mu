<?php
class TopWidget extends CWidget
{
    public function init()
    {
    }

    public function run()
    {
        $this->render('top',array('name'=>'lizhli'));
    }
}
