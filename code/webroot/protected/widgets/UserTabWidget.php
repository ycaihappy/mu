<?php
class UserTabWidget extends CWidget
{
    public function init()
    {
    	
    }

    public function run()
    {
        $this->render('user_tab',array('name'=>'lizhli'));
    }
}
