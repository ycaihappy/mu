<?php
class TabListWidget extends CWidget
{
    public $type;
    public $newlist;
    public function init()
    {

        switch ($this->type)
        {
        case 'news':
            $this->newlist = Article::model()->NewsList()->findAll();
            break;
        case 'special':
            break;
        case 'supply':
            $this->newlist = Supply::model()->topsupply()->findAll();
            break;
        case 'product':
            break;
        }
    }

    public function run()
    {
        $this->render('tab_list',array('type'=>$this->type, 'data'=>$this->newlist));
    }
}
