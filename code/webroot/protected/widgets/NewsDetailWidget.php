<?php
class NewsDetailWidget extends CWidget
{
    public function init()
    {
    }

    public function run()
    {
        $art_detail = Article::model()->findByPk($_GET['art_id']);
        $this->render('news_detail',array('art_detail'=>$art_detail));
    }
}
