<?php
Yii::import('application.vendors.*');
require_once 'MongodbSession.php';
class CMongodbHttpSession extends CHttpSession {

	//protected static $mongodbSession=null;

	public function init()
	{
		parent::init();
		MongodbSession::init();
		//self::$mongodbSession=new MongodbSession();
	}
	public function regenerateID($deleteOldSession=false)
	{
		$oldID=session_id();
		// if no session is started, there is nothing to regenerate
		if(empty($oldID))
			return;
		parent::regenerateID(false);
		$newID=session_id();
		MongodbSession::RegenerateID($deleteOldSession,$oldID,$newID,$this->getTimeout());
	}
	public function openSession($savePath, $sessionName)
	{
		return true;
	}
	public function readSession($id)
	{
		return MongodbSession::Read($id);
	}
	public function writeSession($id, $data)
	{
		return MongodbSession::Write($id,$data);
	}
	public function destroySession($id)
	{
		MongodbSession::Destroy($id);
		return true;
	}
	public function closeSession()
	{
		return MongodbSession::Close();
	}
	public function gcSession($maxLifetime)
	{
		MongodbSession::GC($max_time);
		return true;
	}
	


}


?>