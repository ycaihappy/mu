<?php
class KnowNewsWidget extends CWidget
{
    public function run()
    {
    	$KnowledgeList01 = Article::model()->knowledgeProductList()->findAll();
    	$KnowledgeList02 = Article::model()->knowledgeAppList()->findAll();
    	$KnowledgeList03 = Article::model()->knowledgeMakeList()->findAll();
    	$KnowledgeList04 = Article::model()->knowledgeUseList()->findAll();
        $this->render('know_news',array('data01'=>$KnowledgeList01,'data02'=>$KnowledgeList02,'data03'=>$KnowledgeList03,'data04'=>$KnowledgeList04));
    }
}
