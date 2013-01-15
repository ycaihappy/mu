<?php

class UserController extends SBaseController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new User;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->save())
			$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->save())
			$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
		$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('User');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
		$model->attributes=$_GET['User'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);
		if($model===null)
		throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	public function actionViewRoles()
	{
		$result=$this->_getRightItemByType(2);

	}
	private function _getRightItemByType($type=0)
	{
		if (!Yii::app()->request->isAjaxRequest) {
			Yii::app()->admin->setState("currentPage", Yii::app()->request->getParam('page', 0) - 1);
		}
		$criteria = new CDbCriteria;
		$criteria->condition = 'type=2';
		$pages = new CPagination(AuthItem::model()->count($criteria));
		$pages->route = "viewRoles";
		$pages->pageSize = 20;
		$pages->applyLimit($criteria);
		$pages->setCurrentPage(Yii::app()->admin->getState('currentPage'));
		$sort = new CSort('AuthItem');
		$sort->applyOrder($criteria);
		$models = AuthItem::model()->findAll($criteria);
		return array('modles'=>$models,'sort'=>$sort,'pages'=>$pages);
	}
	public function actionViewTasks()
	{
		$result=$this->_getRightItemByType(1);
	}
	public function actionViewOperas()
	{
		$result=$this->_getRightItemByType(0);
	}
	public function actionAutoAll()
	{
		$controllers=$this->_getControllers();
		if($controllers && is_array($controllers))
		{
			$opers=array();
			foreach ($controllers as $controller)
			{
				$controllerInfo=$this->_getControllerInfo($controller);
				$opers[$controller]=$controllerInfo[0];
			}
		}
	}
	public function actionAutoNew()
	{
		if(Yii::app()->request->isPostRequest)
		{
			$selectedAddActions=Yii::app()->request->getParam('addAction',false);
			if($selectedAddActions)
			{
				foreach ($selectedAddActions as $addAction)
				{
					$model=new AuthItem();
					$model->type=0;
					$model->name=$addAction;
					if($model->save())
					{
						
					}
					else {
						
					}
				}
			}
		}
		else {
			$newRightActions=$this->_getNewRightActions();
		}
	}
	public function actionAutoAddNew()
	{
		$controll2Action=$this->_getNewRightActions();
		if($controll2Action && is_array($controll2Action))
		{
			$mergeActions=array();
			foreach ($controll2Action as $actions)
			{
				$mergeActions+=$actions;
			}
			foreach ($mergeActions as $action)
			{
				$model=new AuthItem();
				$model->type=0;
				$model->name=$action;
				if($model->save())
				{
					echo 'success|'.$action.'<br>';
				}
				else {
					echo 'failed|'.$action.'<br>';
				}
			}
		}
	}
	private function _getAllRightActions()
	{
		$opers=array();
		$controllers=$this->_getControllers();
		if($controllers && is_array($controllers))
		{
			foreach ($controllers as $controller)
			{
				$controllerInfo=$this->_getControllerInfo($controller);
				$opers[$controller]=$controllerInfo[0];
			}
		}
		return $opers;
	}
	private function _getNewRightActions()
	{
		$allOpers=$this->_getAllRightActions();
		$criteria=new CDbCriteria;
		$criteria->select='name';  // 只选择 'title' 列
		$criteria->condition='type=:type';
		$criteria->params=array(':type'=>0);
		$addedOpers=AuthItem::model()->findAll($criteria);
		if($addedOpers && is_array($addedOpers))
		{
			foreach ($addedOpers as $dbOper){
				$tempAddedOpers[]=$dbOper['name'];
			}
			$addedOpers=$tempAddedOpers;
			unset($tempAddedOpers);
		}
		if($allOpers && is_array($allOpers))
		{
			foreach ($allOpers as &$oper)
			{
				$oper=array_diff((array)$oper,(array)$addedOpers);
			}
		}
		return $allOpers;
	}
	/**
	 * Geting all the application's and  modules controllers
	 * @return array The application's and modules controllers
	 */
	private function _getControllers() {
		$contPath = Yii::app()->getControllerPath();
		$controllers = $this->_scanDir($contPath);
		//Scan modules
		$modules = Yii::app()->getModules();
		$modControllers = array();
		foreach ($modules as $mod_id => $mod) {
			$moduleControllersPath = Yii::app()->getModule($mod_id)->controllerPath;
			$modControllers = $this->_scanDir($moduleControllersPath, $mod_id, "", $modControllers);
		}
		return array_merge($controllers, $modControllers);
	}

	private function _scanDir($contPath, $module="", $subdir="", $controllers = array()) {
		$handle = opendir($contPath);
		$del = Helper::findModule('srbac')->delimeter;
		while (($file = readdir($handle)) !== false) {
			$filePath = $contPath . DIRECTORY_SEPARATOR . $file;
			if (is_file($filePath)) {
				if (preg_match("/^(.+)Controller.php$/", basename($file))) {
					if ($this->_extendsSBaseController($filePath)) {
						$controllers[] = (($module) ? $module . $del : "") .
						(($subdir) ? $subdir . "." : "") .
						str_replace(".php", "", $file);
					}
				}
			} else if (is_dir($filePath) && $file != "." && $file != "..") {
				$controllers = $this->_scanDir($filePath, $module, $file, $controllers);
			}
		}
		return $controllers;
	}
	private function _extendsSBaseController($controller) {
		$c = basename(str_replace(".php", "", $controller));
		if (!class_exists($c, false)) {
			include_once $controller;
		} else {

		}
		$cont = new $c($c);

		if ($cont instanceof SBaseController) {
			return true;
		}
		return false;
	}
	/**
	 * Scans applications controllers and find the actions for autocreating of
	 * authItems
	 */
	public function actionScan() {
		 
		if (Yii::app()->request->getParam('module') != '') {
			$controller = Yii::app()->request->getParam('module') .
			Helper::findModule('admin')->delimeter
			. Yii::app()->request->getParam('controller');
		} else {
			$controller = Yii::app()->request->getParam('controller');
		}

		$controllerInfo = $this->_getControllerInfo($controller);
	}
	/**
	 * Getting a controllers actions and also th actions that are always allowed
	 * return array
	 * */
	private function _getControllerInfo($controller, $getAll = false) {
		$del = Helper::findModule('srbac')->delimeter;
		$actions = array();
		$allowed = array();
		$auth = Yii::app()->authManager;

		//Check if it's a module controller
		if (substr_count($controller,$del )) {
			$c = explode($del, $controller);
			$controller = $c[1];
			$module = $c[0] .$del;
			$contPath = Yii::app()->getModule($c[0])->getControllerPath();
			$control = $contPath . DIRECTORY_SEPARATOR . str_replace(".", DIRECTORY_SEPARATOR, $controller) . ".php";
		} else {
			$module = "";
			$contPath = Yii::app()->getControllerPath();
			$control = $contPath . DIRECTORY_SEPARATOR . str_replace(".", DIRECTORY_SEPARATOR, $controller) . ".php";
		}

		$task = $module . str_replace("Controller", "", $controller);
		$delete = Yii::app()->request->getParam('delete');

		$h = file($control);
		for ($i = 0; $i < count($h); $i++) {
			$line = trim($h[$i]);
			if (preg_match("/^(.+)function( +)action*/", $line)) {
				$posAct = strpos(trim($line), "action");
				$posPar = strpos(trim($line), "(");
				$action = trim(substr(trim($line),$posAct, $posPar-$posAct));
				$patterns[0] = '/\s*/m';
				$patterns[1] = '#\((.*)\)#';
				$patterns[2] = '/\{/m';
				$replacements[2] = '';
				$replacements[1] = '';
				$replacements[0] = '';
				$action = preg_replace($patterns, $replacements, trim($action));
				$itemId = $module . str_replace("Controller", "", $controller) .
				preg_replace("/action/", "", $action,1);
				if ($action != "actions") {
					if ($getAll) {
						$actions[$module . $action] = $itemId;
						if (in_array($itemId, $this->allowedAccess())) {
							$allowed[] = $itemId;
						}
					} else {
						if (in_array($itemId, $this->allowedAccess())) {
							$allowed[] = $itemId;
						} else {
							if ($auth->getAuthItem($itemId) === null && !$delete) {
								if (!in_array($itemId, $this->allowedAccess())) {
									$actions[$module . $action] = $itemId;
								}
							} else if ($auth->getAuthItem($itemId) !== null && $delete) {
								if (!in_array($itemId, $this->allowedAccess())) {
									$actions[$module . $action] = $itemId;
								}
							}
						}
					}
				} else {
					//load controller
					if (!class_exists($controller, false)) {
						require($control);
					}
					$tmp = array();
					$controller_obj = new $controller($controller, $module);
					//Get actions
					$controller_actions = $controller_obj->actions();
					foreach ($controller_actions as $cAction => $value) {
						$itemId = $module . str_replace("Controller", "", $controller) . ucfirst($cAction);
						if ($getAll) {
							$actions[$cAction] = $itemId;
							if (in_array($itemId, $this->allowedAccess())) {

								$allowed[] = $itemId;
							}
						} else {
							if (in_array($itemId, $this->allowedAccess())) {
								$allowed[] = $itemId;
							} else {
								if ($auth->getAuthItem($itemId) === null && !$delete) {
									if (!in_array($itemId, $this->allowedAccess())) {
										$actions[$cAction] = $itemId;
									}
								} else if ($auth->getAuthItem($itemId) !== null && $delete) {
									if (!in_array($itemId, $this->allowedAccess())) {
										$actions[$cAction] = $itemId;
									}
								}
							}
						}
					}
				}
			}
		}
		return array($actions, $allowed, $delete, $task);
	}
}
