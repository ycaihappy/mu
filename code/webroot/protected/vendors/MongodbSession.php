<?php
Yii::import('application.vendors.*');
require_once 'mongodb/ActiveMongo.php';

class MongodbSession extends ActiveMongo {
	protected static $session;

	public $data;
	public $sid;
	public $valid;
	public $ts;

	function getCollectionName()
	{
		return 'session';
	}

	function setup()
	{
		$this->addIndex(array("sid" => 1, "valid" => 1));
		$this->addIndex(array("ts" => 1));
	}

	function before_create(&$document)
	{
		$document['ts'] = new MongoDate();
	}

	final public static function init()
	{
		$class = get_called_class();
//		session_set_save_handler(
//		array($class, "Open"),
//		array($class, "Close"),
//		array($class, "Read"),
//		array($class, "Write"),
//		array($class, "Destroy"),
//		array($class, "GC")
//		);
		ActiveMongo::connect("mu");
		
		/* Should be done just once */
		ActiveMongo::install();
		self::$session = new $class;
	}
	
	final public static function RegenerateID($deleteOldSession=false,$oldID,$newID,$timeout=0)
	{
		
		$session = self::$session;
		$session->where('sid', $oldID)->where('valid', TRUE);
        if ($session->count() != 0) {
        	if($deleteOldSession)
        	{
        		$session->sid=$newID;
        		$session->save();
        	}
        	else {
        		$class = get_called_class();
        		$data=$session->data;
        		$ts=$session->ts;
        		$session=self::$session=new $class;
        		$session->sid=$newID;
        		$session->valid=true;
        		$session->data=$data;
        		$session->ts=$ts;
        		$session->save();
        	}
        }
        else {
        	$session->ts=new MongoDate(time()+$timeout);
        	$session->sid=$newID;
        	$session->valid=true;
        	$session->save();
        	
        }
	}


	final public static function Open($path, $name)
	{
		return TRUE;
	}

	final public static function Close()
	{
		self::$session = null;
		return TRUE;
	}

	final public static function Read($id)
	{
		$session = self::$session;
		$session->where('sid', $id)->where('valid', TRUE);
		if ($session->count() == 0) {
			$session->sid   = $id;
			$session->valid = TRUE;
			$session->save();
		}
		return $session->data;
	}

	final public static function Write($id, $ses_data)
	{
		$session = self::$session;
		$session->data = $ses_data;
		$session->ts   = new MongoDate();
		$session->save(FALSE);

		return TRUE;
	}

	final public static function Destroy($id)
	{
		$session = self::$session;
		$session->delete();
	}

	final public static function GC($max_time)
	{
		$class    = get_called_name();
		$sessions = new $class;
		$session->delete_old_sessions($max_time);
	}

	function delete_old_sessions($max_time)
	{
		$filter = array(
            'ts' => array(
                '$lt' => new MongoDate(time()-$max_time),
		)
		);
		$this->_getCollection->remove($filter);
	}
}


?>