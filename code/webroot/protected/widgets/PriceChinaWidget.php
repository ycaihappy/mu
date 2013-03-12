<?php
class PriceChinaWidget extends CWidget
{
    public $top_news;
    public $type;
    public function init()
    {
    	$this->top_news = Article::model()->PriceChinaList()->findAll();

        if ( $this->type == 2)
        {
            $this->top_news = Supply::model()->topsupplyIndex()->findAll();
        }
        if ( $this->type == 3)
        {
            $entCriteria=new CDbCriteria();
            $entCriteria->select='ent_name,ent_website,ent_update_time';
            $entCriteria->join='inner join mu_recommend b on t.ent_id=b.recommend_object_id and b.recommend_status=1 and b.recommend_type=24 and b.recommend_position=55';
            $entCriteria->condition='ent_status=1';
            $entCriteria->with=array('user'=>array('select'=>'user_telephone,user_mobile_no,user_first_name'));
            $entCriteria->limit=15;
            $recEnt=Enterprise::model()->findAll($entCriteria);
            if($recEnt)
            {
                foreach ($recEnt as &$ent)
                {
                    $ent->ent_id=$ent->ent_website?$ent->ent_website:$this->getController()->createUrl('/storeFront/default/default',array('username'=>$ent->user->user_name));
                }
            }
            $this->top_news = $recEnt;
        }
    }

    public function run()
    {
        $this->render('price_china',array('data'=>$this->top_news,'type'=>$this->type));
    }
}
