<?php
class IndexLoginWidget extends CWidget
{

    public function run()
    {
        if ( Yii::app()->user->getID())
        {
        $user = User::model()->findbyPk(Yii::app()->user->getID());

        $this->render('index_login',array('user_name'=>$user->user_name));
        }
        else
        {
            
        $this->render('index_login');
        }
    }
}
