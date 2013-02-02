<?php
class UserMenuWidget extends CWidget
{
    public function init()
    {
    	
    }

    public function run()
    {
        $this->render('user_menu',array('name'=>'lizhli'));
    }
}
