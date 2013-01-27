<?php
class KnowledgeWidget extends CWidget
{
	private $recenltyCase=array();
    public function init()
    {
    	$this->recenltyCase=SuccessCase::model()->recenltyCase()->findAll();
    }

    public function run()
    {
        $this->render('knowledge',array('data'=>$this->recenltyCase));
    }
}
