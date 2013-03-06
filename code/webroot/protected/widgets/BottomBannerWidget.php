<?php
class BottomBannerWidget extends CWidget
{
    public function init()
    {
    }

    public function run()
    {
    	$bottom_banners=CCacheHelper::getAdvertisement(11);
        $this->render('bottom_banner',array('bottom_banners'=>$bottom_banners));
    }
}
