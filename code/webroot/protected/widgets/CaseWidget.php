<?php
class CaseWidget extends CWidget
{
	private $recenltyCase=array();
    public function init()
    {
    	$this->recenltyCase=SuccessCase::model()->recenltyCase()->findAll();
    }

    public function run()
    {
        $this->render('case',array('data'=>$this->recenltyCase));
    }
}
