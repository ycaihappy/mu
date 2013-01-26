<?php
class FunctionBlockWidget extends CWidget
{
    public function init()
    {
    }

    public function run()
    {
        $this->render('function_block',array('name'=>'lizhli'));
    }
}
