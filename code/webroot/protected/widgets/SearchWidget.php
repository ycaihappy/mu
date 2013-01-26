<?php
class SearchWidget extends CWidget
{
    public function init()
    {
    }

    public function run()
    {
        $this->render('search',array('name'=>'lizhli'));
    }
}
