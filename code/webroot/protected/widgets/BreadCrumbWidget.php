<?php
class BreadCrumbWidget extends CWidget
{
	public $crumbs = array();

    public function init()
    {
        if ( empty($this->crumbs) )
        {
            $this->crumbs=array(
                array('name'=>'Home','url'=>'#'),
                array('name'=>'User','url'=>'#'),
            );
        }
    }

    public function run()
    {
        $this->render('breadcrumb',array('data'=>$this->crumbs));
    }
}
