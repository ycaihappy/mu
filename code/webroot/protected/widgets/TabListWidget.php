<?php
class TabListWidget extends CWidget
{
    public $type;
    public function init()
    {
        switch ($this->type)
        {
        case 'news':
            break;
        case 'special':
            break;
        case 'supply':
            break;
        case 'product':
            break;
        }
    }

    public function run()
    {
        $this->render('tab_list',array('type'=>$this->type));
    }
}
