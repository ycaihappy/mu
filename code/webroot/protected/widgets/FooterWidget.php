<?php
class FooterWidget extends CWidget
{
    public function init()
    {
    }

    public function run()
    {
        $this->render('footer',array('name'=>'lizhli'));
    }
}
