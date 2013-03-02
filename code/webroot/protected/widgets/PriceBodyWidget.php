<?php
class PriceBodyWidget extends CWidget
{
    public $type;
    public function init()
    {
    	#$this->top_mu_news = Article::model()->topMuNews()->findAll();
    }

    public function run()
    {
        $this->render('price_body',array('type'=>$this->type));
    }
}
