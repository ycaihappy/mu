<?php
class NewsDetailWidget extends CWidget
{
    public function init()
    {
    }

    public function run()
    {
        $art_detail = Article::model()->findByPk($_GET['art_id']);
        $this->getController()->siteConfig->siteMetaTitle=$art_detail->art_title;
        $this->getController()->siteConfig->siteMetaKeyword=$art_detail->art_tags;
        $this->getController()->siteConfig->siteMetaDescription=$art_detail->art_summary;
        $this->render('news_detail',array('art_detail'=>$art_detail));
    }
}
