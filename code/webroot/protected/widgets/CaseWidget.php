<?php
class CaseWidget extends CWidget
{
    public function init()
    {
    }

    public function run()
    {
        $this->render('case',array('name'=>'lizhli'));
    }
}
