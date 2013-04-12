<?php
class IndexLoginWidget extends CWidget
{

    public function run()
    {
    	$adv=CCacheHelper::getAdvertisement(144);
        if ( Yii::app()->user->getID())
        {
        $user = User::model()->findbyPk(Yii::app()->user->getID());

        $this->render('index_login',array('user_name'=>$user->user_name,'adv'=>$adv));
        }
        else
        {
            
        $this->render('index_login',array('adv'=>$adv));
        }
    }
}
