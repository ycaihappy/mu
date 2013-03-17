<?php
class NewsDetailWidget extends CWidget
{
    public function init()
    {
    }

    public function run()
    {
        $art_detail = Article::model()->findByPk((int)$_GET['art_id']);
        $pre_art = Article::model()->findByPk((int)$_GET['art_id']-1);
        $next_art = Article::model()->findByPk((int)$_GET['art_id']+1);
        //set title for seo
        $this->getController()->siteConfig->siteMetaTitle=$art_detail->art_title.'-'.$this->getController()->siteConfig->siteMetaTitle;
        $this->getController()->siteConfig->siteMetaKeyword=$art_detail->art_tags;
        $this->getController()->siteConfig->siteMetaDescription=$art_detail->art_summary;
        //update counter
        Article::model()->updateCounters(array('art_click_count'=>1),'art_id='.(int)$_GET['art_id']);
        $this->render('news_detail',array('art_detail'=>$art_detail,'pre_art'=>$pre_art,'next_art'=>$next_art));
    }
}
