<?php
class KnowledgeWidget extends CWidget
{

    public function run()
    {
    	$KnowledgeList01 = Article::model()->knowledgeWorldList()->findAll();
    	$KnowledgeList02 = Article::model()->knowledgeChinaList()->findAll();
    	$KnowledgeList03 = Article::model()->knowledgeMakeList()->findAll();
    	$KnowledgeList04 = Article::model()->knowledgeUseList()->findAll();
        $this->render('knowledge',array('data01'=>$KnowledgeList01,'data02'=>$KnowledgeList02,'data03'=>$KnowledgeList03,'data04'=>$KnowledgeList04));
    }
}
