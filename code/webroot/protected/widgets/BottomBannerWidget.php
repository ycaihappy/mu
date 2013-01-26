<?php
class BottomBannerWidget extends CWidget
{
    public function init()
    {
    }

    public function run()
    {
        $this->render('bottom_banner',array('name'=>'lizhli'));
    }
}
