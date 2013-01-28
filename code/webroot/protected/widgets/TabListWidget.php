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
            $this->newlist = Product::model()->topSpecial()->findAll();
            break;
        case 'supply':
            $this->newlist = Supply::model()->topsupply()->findAll();
            break;
        case 'product':
            $this->newlist = Product::model()->topProduct()->findAll();
            break;
        }
    }

    public function run()
    {
        $this->render('tab_list',array('type'=>$this->type, 'data'=>$this->newlist));
    }
}
