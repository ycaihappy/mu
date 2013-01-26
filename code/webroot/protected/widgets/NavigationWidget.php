<?php
class NavigationWidget extends CWidget
{
    public function init()
    {
    }

    public function run()
    {
        $this->render('navigation',array('name'=>'lizhli'));
    }
}
