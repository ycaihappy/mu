<?php
class BreadCrumbWidget extends CWidget
{
	private $_crumb;
    public function init()
    {
    	$this->_crumb='';
    }

    public function run()
    {
        $this->render('breadcrumb',array('data'=>$this->_crumb));
    }
}
