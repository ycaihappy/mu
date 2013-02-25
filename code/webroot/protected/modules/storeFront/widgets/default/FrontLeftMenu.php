<?php



class FrontLeftMenu extends CWidget {

	public function run(){
		$user=$this->getController()->user;
		$company=$this->getController()->company;
		$ulink=FriendLink::model()->recentlyFriendLink($this->getController()->user->user_id)->findAll();
		$data=compact('user','company','ulink');
		$this->render('frontLeftMenu',$data);
	}

}

?>