<?php
class RecommedWidget extends CWidget
{
    public $type;
    public function init()
    {
        switch ($this->type)
        {
        case '1':
            break;
        case '2';
            break;
        }
    }

    public function run()
    {
        $this->render('recommend',array('type'=>$this->type));
    }
}
