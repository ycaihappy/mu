<?php
class NavigationWidget extends CCacheWidget
{
    public function initWidget()
    {
    }

    public function runWidget()
    {
    	$controller=$this->getController()->getId();
        $this->render('navigation',array('controller'=>$controller));
    }
}
