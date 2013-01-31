<?php

class AdminModule extends CWebModule
{
	private $_alwaysAllowed = array();
	public $delimeter = "-";
	public $alwaysAllowedPath = "application.components";
	public function init()
	{
	 // this method is called when the module is being created
	 // you may place code here to customize the module or the application
		parent::init();//杩欐鏄皟鐢╩ain.php閲岀殑閰嶇疆鏂囦欢
		// import the module-level models and componen
		$this->setImport(array(
		'admin.models.*',
		'admin.components.*',
		'admin.widgets.*'
		));
		//杩欓噷閲嶅啓鐖剁被閲岀殑缁勪欢
		//濡傛湁闇�杩樺彲浠ュ弬鑰傾PI娣诲姞鐩稿簲缁勪欢
		Yii::app()->setComponents(array(
                   'errorHandler'=>array(
                           'class'=>'CErrorHandler',
                           'errorAction'=>'admin/site/error',
		),
                   'admin'=>array(
                           'class'=>'AdminWebUser',//鍚庡彴鐧诲綍绫诲疄渚�                           'stateKeyPrefix'=>'admin',//鍚庡彴session鍓嶇紑
                           'loginUrl'=>Yii::app()->createUrl('admin/site/login'),
		),
		), false);
		//涓嬮潰杩欎袱琛屾垜涓�洿娌℃悶瀹氬暐鎰忔�锛岃矊浼糃WebModule閲屼篃娌eneratorPaths灞炴�鍜宖indGenerators()鏂规硶
		//$this->generatorPaths[]='admin.generators';
		//$this->controllerMap=$this->findGenerators();
	}
	public function beforeControllerAction($controller, $action){
		if(parent::beforeControllerAction($controller, $action)){
			$route=$controller->id.'/'.$action->id;
			if(!$this->allowIp(Yii::app()->request->userHostAddress) && $route!=='default/error')
			throw new CHttpException(403,"You are not allowed to access this page.");
			$publicPages=array(
                        'site/login',
						'site/captcha',
                        'site/error',
			);
			if(Yii::app()->admin->isGuest && !in_array($route,$publicPages))
			Yii::app()->admin->loginRequired();
			else
			return true;
		}
		return false;
	}
	protected function allowIp($ip)
	{
		if(empty($this->ipFilters))
		return true;
		foreach($this->ipFilters as $filter)
		{
			if($filter==='*' || $filter===$ip || (($pos=strpos($filter,'*'))!==false && !strncmp($ip,$filter,$pos)))
			return true;
		}
		return false;
	}
	public function setAlwaysAllowed($alwaysAllowed) {
		$this->_alwaysAllowed = $alwaysAllowed;
	}
	public function getAlwaysAllowed() {
		$paramAllowed = array();
		if(!is_file($this->getAlwaysAllowedFile())) {
			$handle = fopen($this->getAlwaysAllowedFile(), "wb");
			fwrite($handle, "<?php\n return array();\n?>");
			fclose($handle);
		}
		$guiAllowed = include($this->getAlwaysAllowedFile());
		if(!is_array($guiAllowed)){
			$guiAllowed = array();
		}
		if(is_array($this->_alwaysAllowed)) {
			$paramAllowed = $this->_alwaysAllowed;
		}else if(is_file(Yii::getPathOfAlias($this->_alwaysAllowed).".php")) {
			$paramAllowed = include(Yii::getPathOfAlias($this->_alwaysAllowed).".php");
		} else if(is_string($this->_alwaysAllowed)) {
			$paramAllowed = split(",", $this->_alwaysAllowed);
		}
		return array_merge($guiAllowed, $paramAllowed);
	}

	public function getAlwaysAllowedFile() {
		return Yii::getPathOfAlias($this->alwaysAllowedPath).DIRECTORY_SEPARATOR."allowed.php";
	}
}
?>