<?php
class IndexLoginWidget extends CWidget
{

    public function run()
    {
        $user = User::model()->findbyPk(Yii::app()->user->getID());
        $this->render('index_login',array('user_name'=>$user->user_name));
    }
}
