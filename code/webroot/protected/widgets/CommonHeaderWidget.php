<?php
class CommonHeaderWidget extends CWidget
{
    public function init()
    {
    }

    public function run()
    {
        $this->render('common_header',array('name'=>'lizhli'));
    }
}
