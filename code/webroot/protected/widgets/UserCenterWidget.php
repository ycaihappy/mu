<?php
class UserCenterWidget extends CWidget
{
    public function run()
    {
        $user = User::model()->findByPk(Yii::app()->user->getID());
        $this->render('user_center',array('name'=>$user->user_name));
    }
}
