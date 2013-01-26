<?php
class CommonFooterWidget extends CWidget
{
    public function init()
    {
    }

    public function run()
    {
        $this->render('common_footer',array('name'=>'lizhli'));
    }
}
