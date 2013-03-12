<?php
class KnowUseWidget extends CWidget
{

    public function run()
    {
    	$KnowledgeList = Article::model()->knowledgeUseList()->findAll();
        $this->render('know_use',array('data'=>$KnowledgeList));
    }
}
