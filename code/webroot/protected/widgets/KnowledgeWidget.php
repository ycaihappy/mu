<?php
class KnowledgeWidget extends CWidget
{
	private $KnowledgeList=array();
    public function init()
    {
    	$this->KnowledgeList = Article::model()->knowledgeList()->findAll();
    }

    public function run()
    {
        $this->render('knowledge',array('data'=>$this->KnowledgeList));
    }
}
