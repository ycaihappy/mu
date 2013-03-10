<?php
class SiteMapWidget extends CWidget
{
    public function run()
    {
        $category = Term::model()->getTermsListByGroupId(14);
        $this->render('site_map',array('category'=>$category));
    }
}
