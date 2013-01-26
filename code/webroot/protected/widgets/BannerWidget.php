<?php
class BannerWidget extends CWidget
{
    public function init()
    {
    }

    public function run()
    {
        $this->render('banner',array('name'=>'lizhli'));
    }
}
