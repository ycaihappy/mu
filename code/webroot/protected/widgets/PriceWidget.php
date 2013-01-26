<?php
class PriceWidget extends CWidget
{
    public function init()
    {
    }

    public function run()
    {
        $this->render('price',array('name'=>'lizhli'));
    }
}
