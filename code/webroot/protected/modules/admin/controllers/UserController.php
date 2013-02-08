<?php

class UserController extends AdminController
{

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
		$model = new AuthItem;
		if (isset($_POST['AuthItem'])) {
			$model->attributes = $_POST['AuthItem'];
			try {
				if ($model->save()) {
					Yii::app()->admin->setFlash('updateSuccess',
            "'" . $model->name . "' " .'created successfully');
					$model->data = unserialize($model->data);
					$this->renderPartial('update', array('model' => $model));
				} else {
					$this->renderPartial('create', array('model' => $model));
				}
			} catch (CDbException $exc) {
				Yii::app()->admin->setFlash('updateError', 'Error while creating'
				. ' ' . $model->name . "<br />" .'Possible there\'s already an item with the same name');
				$this->renderPartial('create', array('model' => $model));
			}
		} else {
			$this->renderPartial('create', array('model' => $model));
		}
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate()
	{
		$id=@$_REQUEST['name'];
		$model = AuthItem::model()->findbyPk($id);
		if (isset($_POST['AuthItem'])) {
			$model->oldName = isset($_POST["oldName"]) ? $_POST["oldName"] : $_POST["name"];
			$model->attributes = $_POST['AuthItem'];

			if ($model->save()) {
				Yii::app()->user->setFlash('updateSuccess',
	          "'" . $model->name . "' " .'修改成功！');
			} else {

			}
		}
		$this->renderPartial('update', array('model' => $model));
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
	/**
	 * Used by Ajax to get the tasks of a role when it is selected in the Assign
	 * tasks to roles tab
	 */
	public function actionGetTasks() {
		$this->_setMessage("");
		$tasks=$this->_getTheTasks();
	}

	/**
	 * Gets the assigned and not assigned tasks of the selected user
	 */
	private function _getTheTasks() {
		$model = new AuthItem();
		$name = isset($_POST["AuthItem"]["name"][0]) ? $_POST["AuthItem"]["name"][0] : "";
		$data['roleAssignedTasks'] = Helper::getRoleAssignedTasks($name);
		$data['roleNotAssignedTasks'] = Helper::getRoleNotAssignedTasks($name);
		if ($data['roleAssignedTasks'] == array()) {
			$data['revoke'] = array("name" => "revokeTask", "disabled" => true);
		} else {
			$data['revoke'] = array("name" => "revokeTask");
		}
		if ($data['roleNotAssignedTasks'] == array()) {
			$data['assign'] = array("name" => "assignTasks", "disabled" => true);
		} else {
			$data['assign'] = array("name" => "assignTasks");
		}
		return $data;
	}
	public function actionGetOpers()
	{
		$opers=$this->_getTheOpers();
	}
	/**
	 * Gets the assigned and not assigned operations of the selected user
	 */
	private function _getTheOpers() {
		$model = new AuthItem();
		$data['taskAssignedOpers'] = array();
		$data['taskNotAssignedOpers'] = array();
		$name = isset($_POST["Assignments"]["itemname"]) ?
		$_POST["Assignments"]["itemname"] :
		Yii::app()->getGlobalState("cleverName");
		if (Yii::app()->getGlobalState("cleverAssigning") && $name) {
			$data['taskAssignedOpers'] = Helper::getTaskAssignedOpers($name, true);
			$data['taskNotAssignedOpers'] = Helper::getTaskNotAssignedOpers($name, true);
		} else if ($name) {
			$data['taskAssignedOpers'] = Helper::getTaskAssignedOpers($name, false);
			$data['taskNotAssignedOpers'] = Helper::getTaskNotAssignedOpers($name, false);
		}
		if ($data['taskAssignedOpers'] == array()) {
			$data['revoke'] = array("name" => "revokeOpers", "disabled" => true);
		} else {
			$data['revoke'] = array("name" => "revokeOpers");
		}
		if ($data['taskNotAssignedOpers'] == array()) {
			$data['assign'] = array("name" => "assignOpers", "disabled" => true);
		} else {
			$data['assign'] = array("name" => "assignOpers");
		}
		return $data;
	}
	/**
	 * Used by Ajax to get the roles of a user when he is selected in the Assign
	 * roles to user tab
	 */
	public function actionGetRoles() {
		$this->_setMessage("");
		$roles=$this->_getTheRoles();
	}

	/**
	 * Gets the assigned and not assigned roles of the selected user
	 */
	private function _getTheRoles() {
		$model = new AuthItem();
		$userid = $_REQUEST['id'];
		$act = $_REQUEST['act'];
		if($act=='assigned')
		{
			$data = Helper::getUserAssignedRoles($userid);
		}
		else {
			$data = Helper::getUserNotAssignedRoles($userid);
		}
		$returnData=array();
		if($data)
		{
			foreach($data as $row)
			{
				$returnData[]=array('text'=>$row->name,'value'=>$row->name);
			}
		}
		/*if ($data['userAssignedRoles'] == array()) {
			$data['revoke'] = array("name" => "revokeUser", "disabled" => true);
			} else {
			$data['revoke'] = array("name" => "revokeUser");
			}
			if ($data['userNotAssignedRoles'] == array()) {
			$data['assign'] = array("name" => "assignUser", "disabled" => true);
			} else {
			$data['assign'] = array("name" => "assignUser");
			}*/
		echo json_encode($returnData);
	}
	/**
	 * Creates a role .
	 * If creation is successful, the browser will be redirected to the 'show' page.
	 */
	public function actionCreateRole() {
		$this->_createAuthItem(2);
	}
	/**
	 * Creates a task .
	 * If creation is successful, the browser will be redirected to the 'show' page.
	 */
	public function actionCreateTask() {
		$this->_createAuthItem(1);
	}
	/**
	 * Creates a operation .
	 * If creation is successful, the browser will be redirected to the 'show' page.
	 */
	public function actionCreateOper() {
		$this->_createAuthItem(0);
	}

	private function _createAuthItem($type=0)
	{
		$model = new AuthItem;
		$model->type=$type;
		if (isset($_POST['AuthItem'])) {
			$model->attributes = $_POST['AuthItem'];
			try {
				if ($model->save()) {
					Yii::app()->admin->setFlash('updateSuccess',
            "'" . $model->name . "' " .
					Helper::translate('srbac', 'created successfully'));
					$model->data = unserialize($model->data);
					//redirect to success page
				} else {
					//redirect to create page
				}
			} catch (CDbException $exc) {
				Yii::app()->admin->setFlash('updateError',
				Helper::translate('srbac', 'Error while creating')
				. ' ' . $model->name . "<br />" .
				Helper::translate('srbac', 'Possible there\'s already an item with the same name'));
				//redirect to create page
			}
		} else {
			//redirect to create page
		}
	}

	/**
	 * Assigns child items to a parent item
	 * @param String $parent The parent item
	 * @param String $children The child items
	 */
	private function _assignChild($parent, $children) {
		if ($parent) {
			$auth = Yii::app()->authManager;
			/* @var $auth CDbAuthManager */
			foreach ($children as $child) {
				$auth->addItemChild($parent, $child);
			}
		}
	}

	/**
	 * Revokes child items from a parent item
	 * @param String $parent The parent item
	 * @param String $children The child items
	 */
	private function _revokeChild($parent, $children) {
		if ($parent) {
			$auth = Yii::app()->authManager;
			/* @var $auth CDbAuthManager */
			foreach ($children as $child) {
				$auth->removeItemChild($parent, $child);
			}
		}
	}
	/**
	 * Assigns roles to a user
	 *
	 * @param int $userid The user's id
	 * @param String $roles The roles to assign
	 * @param String $bizRules Not used yet
	 * @param String $data Not used yet
	 */
	private function _assignUser($userid, $roles, $bizRules='', $data='') {
		if ($userid) {
			$auth = Yii::app()->authManager;
			if($this->_revokeAllRoles($userid))
			{
				/* @var $auth CDbAuthManager */
				foreach ($roles as $role) {
					$auth->assign($role, $userid, $bizRules, $data);
				}
			}
		}
	}
	private function _revokeAllRoles($userid)
	{
		return Yii::app()->db->createCommand()
		->delete(Yii::app()->authManager->assignmentTable, 'userid=:userid', array(
				':userid'=>$userid
		)) > 0;
	}

	/**
	 * Revokes roles from a user
	 * @param int $userid The user's id
	 * @param String $roles The roles to revoke
	 */
	private function _revokeUser($userid, $roles) {
		if ($userid) {
			$auth = Yii::app()->authManager;
			/* @var $auth CDbAuthManager */
			foreach ($roles as $role) {
				$auth->revoke($role, $userid);
				return true;
			}
		}
	}
	public function actionManageAdminUser()
	{
		$this->_actionManageUser(0);
	}
	public function actionManageUser()
	{
		$this->_actionManageUser(1);
	}
	private function _actionManageUser($userType)
	{
		$model=new User();
		$model->user_status=@$_REQUEST['User']['user_status'];
		$model->user_name=@$_REQUEST['User']['user_name'];
		$userCriteria=new CDbCriteria();
		$userCriteria->select='user_id,user_name,user_nickname,user_email,user_join_date,user_last_login_date';
		$userCriteria->with=array('enterprise'=>array('select'=>'ent_name'),'status'=>array('select'=>'term_name'),'role'=>array('select'=>'name'));
		$userCriteria->order='user_join_date desc';
		$userCriteria->addCondition('user_type=:user_type');
		$userCriteria->params[':user_type']=$userType;
		if($model->user_status)
		{
			$userCriteria->compare('user_status', '='.$model->user_status);
		}
		if($model->user_name)
		{
			$userCriteria->addSearchCondition('user_name', $model->user_name,true);
		}
		$dataProvider=new CActiveDataProvider('User',array(
			'criteria'=>$userCriteria,
			'pagination'=>array(
		        'pageSize'=>20,
				'pageVar'=>'page',
		),
		));
		$users=$dataProvider->data;
		if($users)
		{
			foreach ($users as &$user)
			{
				if($user->role)
				{
					$roles=array();
					foreach ($user->role as $role)
					{
						$roles[]=$role->name;
					}
					$user->user_type=implode('， ', $roles);
				}
				else
				{
					$user->user_type='未分配';
				}
			}
		}
		$userStatus=Term::getTermsByGroupId(1);
		$this->render('manageUser',array('dataProvider'=>$dataProvider,'model'=>$model,'userStatus'=>$userStatus));
	}
	public function actionUpdateUser()
	{
		$model=new User();
		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			$model->setIsNewRecord(false);
			if($model->save())
			{
				$this->redirect(array('manageUser'));
			}
			else {
				$this->_loadCurrentUser($model->user_id);
			}
		}
		elseif($userId=$_GET['user_id'])
		{
			$this->_loadCurrentUser($userId);
		}
		else {
			$this->redirect(array('manageUser'));
		}
			
	}
	private function _loadCurrentUser($userId)
	{
		$model=User::model()->with(array('enterprise'=>array('select'=>'ent_name'),'status'=>array('select'=>'term_name'),'role'=>array('select'=>'name')))->findByPK($userId);
		if($model)
		{
			$allCity=City::getAllCity();
			$userStatus=Term::getTermsByGroupId(1);
			if($model->role)
			{
				foreach ($model->role as $role)
				{
					$roles[]=$role->name;
				}
				$model->user_type=implode('， ', $roles);
			}
			else
			{
				$model->user_type='未分配';
			}
			$this->render('updateUser',array('model'=>$model,'userStatus'=>$userStatus,'allCity'=>$allCity));
		}
	}
	/**
	 * The assignment action
	 * First checks if the user is authorized to perform this action
	 * Then initializes the needed variables for the assign view.
	 * If there's a post back it performs the assign action
	 */
	public function actionAssign() {
		//CVarDumper::dump($_POST, 5, true);
			
		$this->_setMessage("");
		/* @var $auth CDbAuthManager */
		/*$authItemAssignName = isset($_POST['AuthItem']['name']['assign']) ?
		 $_POST['AuthItem']['name']['assign'] : "";


		 $assBizRule = isset($_POST['Assignments']['bizrule']) ?
		 $_POST['Assignments']['bizrule'] : "";
		 $assData = isset($_POST['Assignments']['data']) ?
		 $_POST['Assignments']['data'] : "";


		 $authItemRevokeName = isset($_POST['AuthItem']['name']['revoke']) ?
		 $_POST['AuthItem']['name']['revoke'] : "";

		 if (isset($_POST['AuthItem']['name'])) {
		 if (isset($_POST['AuthItem']['name'][0])) {
		 $authItemName = $_POST['AuthItem']['name'][0];
		 } else {
		 $authItemName = $_POST['AuthItem']['name'];
		 }
		 }

		 $assItemName = isset($_POST['Assignments']['itemname']) ? $_POST['Assignments']['itemname'] : "";

		 $assignRoles = Yii::app()->request->getParam('assignRoles', 0);
		 $revokeRoles = Yii::app()->request->getParam('revokeRoles', 0);
		 $assignTasks = isset($_GET['assignTasks']) ? $_GET['assignTasks'] : 0;
		 $revokeTasks = isset($_GET['revokeTasks']) ? $_GET['revokeTasks'] : 0;
		 $assignOpers = isset($_GET['assignOpers']) ? $_GET['assignOpers'] : 0;
		 $revokeOpers = isset($_GET['revokeOpers']) ? $_GET['revokeOpers'] : 0;
		 */
		$actType=@$_REQUEST['actType'];
		$owner=@$_REQUEST['ownerid'];
		$assignItems=@$_REQUEST['ids'];
		switch ($actType)
		{
			case 'assignRoles':
				$this->_assignUser($owner, $assignItems);
				break;
			case 'assignTasks':
				$this->_assignChild($owner, $assignItems);
				break;
			case 'assignOpers':
				$this->_assignChild($owner, $assignItems);
				break;
		}


		/*if ($assignRoles && is_array($authItemAssignName)) {

		$this->_assignUser($userid, $authItemAssignName, $assBizRule, $assData);
		$this->_setMessage('Role(s) Assigned');
		} else if ($revokeRoles && is_array($authItemRevokeName)) {
		$revoke = $this->_revokeUser($userid, $authItemRevokeName);
		if ($revoke) {
		$this->_setMessage('Role(s) Revoked');
		} else {
		$this->_setMessage('Can\'t revoke this role');
		}
		} else if ($assignTasks && is_array($authItemAssignName)) {
		$this->_assignChild($authItemName, $authItemAssignName);
		$this->_setMessage('Task(s) Assigned');
		} else if ($revokeTasks && is_array($authItemRevokeName)) {
		$this->_revokeChild($authItemName, $authItemRevokeName);
		$this->_setMessage('Task(s) Revoked');
		} else if ($assignOpers && is_array($authItemAssignName)) {
		$this->_assignChild($assItemName, $authItemAssignName);
		$this->_setMessage('Operation(s) Assigned');
		} else if ($revokeOpers && is_array($authItemRevokeName)) {
		$this->_revokeChild($assItemName, $authItemRevokeName);
		$this->_setMessage('Operation(s) Revoked');
		}
		//If not ajax show the assign page
		if (!Yii::app()->request->isAjaxRequest) {
		$this->render('assign', array(
		'model' => $model,
		'message' => $this->_getMessage(),
		'userid' => $userid,
		'data' => $data
		));
		} else {
		// assign to user show the user tab
		if ($userid != "") {
		$this->_getTheRoles();
		} else if ($assignTasks != 0 || $revokeTasks != 0) {
		$this->_getTheTasks();
		} else if ($assignOpers != 0 || $revokeOpers != 0) {
		$this->_getTheOpers();
		}
		}*/
	}
	private function _setMessage($mess) {
		Yii::app()->admin->setState("message", $mess);
	}
	public function actionManageAuthItem()
	{
		$selectedType = Yii::app()->request->getParam('selectedType', 2);
		$criteria = new CDbCriteria;
		$criteria->order='type desc';
		if ($selectedType != "") {
			$criteria->condition = "type = " . $selectedType;
		}
		$dataProvider=new CActiveDataProvider('AuthItem',array(
			'criteria'=>$criteria,
			'pagination'=>array(
		        'pageSize'=>10,
				'pageVar'=>'page',
		),
		));
		if(Yii::app()->request->isAjaxRequest)
		{
			$this->renderPartial('authItemList',array('dataProvider'=>$dataProvider));
		}
		else{
			$this->render('manageRole',array('dataProvider'=>$dataProvider,));
		}
	}

}
