<?php
class FriendLinkWidget extends CWidget
{
	private $friendLink;
    public function init()
    {
    	$this->friendLink=FriendLink::model()->siteFriendLink()->findAll();
    }

    public function run()
    {
        $this->render('friend_link',array('siteLinks'=>$this->friendLink));
    }
}
