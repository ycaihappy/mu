<?php
class IndexAdsWidget extends CWidget
{

    public function run()
    {
    	$advs=CCacheHelper::getAdvertisement(121);
    	$data=compact('advs');
        $this->render('index_ads',$data);
    }
}
