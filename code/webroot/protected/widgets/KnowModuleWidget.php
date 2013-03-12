<?php
class KnowModuleWidget extends CWidget
{

    public function run()
    {
    	$KnowledgeList01 = Article::model()->knowledgeWorldList()->findAll();
    	$KnowledgeList02 = Article::model()->knowledgeChinaList()->findAll();
    	$KnowledgeList03 = Article::model()->knowledgeUseList()->findAll();
        $this->render('know_module',array('data01'=>$KnowledgeList01,'data02'=>$KnowledgeList02,'data03'=>$KnowledgeList03));
    }
}
