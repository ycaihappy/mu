<?php
class FriendLinkWidget extends CWidget
{
    public function init()
    {
    }

    public function run()
    {
        $this->render('friend_link',array('name'=>'lizhli'));
    }
}
