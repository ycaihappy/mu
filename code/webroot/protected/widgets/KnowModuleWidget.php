<?php
class KnowModuleWidget extends CWidget
{

    public function run()
    {
    	#$KnowledgeList01 = Article::model()->knowledgeWorldList()->findAll();
    	$KnowledgeList02 = Article::model()->knowledgeChinaList()->findAll();
    	#$KnowledgeList03 = Article::model()->knowledgeUseList()->findAll();
    	$KnowledgeList04 = Article::model()->knowledgeAppList()->findAll();
    	$KnowledgeList05 = Article::model()->knowledgeMakeList()->findAll();
    	#$KnowledgeList06 = Article::model()->knowledgeProductList()->findAll();
        if ( !empty($KnowledgeList02) && !empty($KnowledgeList05) )
            $this->render('know_module',array('data02'=>$KnowledgeList02,'data04'=>$KnowledgeList04,'data05'=>$KnowledgeList05));
    }
}
