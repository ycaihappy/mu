<?php
class NavigationWidget extends CWidget
{
    public function init()
    {
    }

    public function run()
    {
    	$controller=$this->getController()->getId();
        $this->render('navigation',array('controller'=>$controller));
    }
}
