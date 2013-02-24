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
            "'" . $model->name . "' " .'创建成功！');
					$model->data = unserialize($model->data);
					$this->renderPartial('update', array('model' => $model));
				} else {
					$this->renderPartial('create', array('model' => $model));
				}
			} catch (CDbException $exc) {
				Yii::app()->admin->setFlash('updateError', '创建错误：'
				. ' ' . $model->name . "<br />" .'该权限项同名！');
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
				Yii::app()->admin->setFlash('updateSuccess',
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
	public function actionDelete()
	{
		if (Yii::app()->request->isAjaxRequest) {
			$this->loadAuthItem()->delete();
		} else {
			throw new CHttpException(400, '无效的请求，请不要重试，立即与开发人员取得联系.');
		}
	}
	public function loadAuthItem($id=null) {
		$r_id = urldecode(Yii::app()->getRequest()->getParam("name", ""));
		$model=new AuthItem();
		if ($id !== null || $r_id != "")
		{
			$model = AuthItem::model()->findbyPk($id !== null ? $id : $r_id);
			if($model)
			{
				$model->setIsNewRecord(false);
			}
		}
		if ($model === null)
		throw new CHttpException(404, '请求错误，该请求不存在！');
		return $model;
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


	public function actionGenerateNewRightOpers()
	{
		if(Yii::app()->request->isPostRequest)
		{
			//$selectedAddActions=Yii::app()->request->getParam('addAction',false);
			$selectedAddActions=@$_REQUEST['name'];
			if(is_array($selectedAddActions) && $selectedAddActions)
			{

				foreach ($selectedAddActions as $addAction)
				{
					$model=new AuthItem();
					$model->type=0;
					$model->name=$addAction;
					$model->save();
				}

			}
			else {
				echo json_encode(array('message'=>'请选择要保存的功能！'));
			}
		}
		else {
			$newRightActions=$this->_getNewRightActions();
			if($newRightActions)
			{
				$opers=array();
				foreach ($newRightActions as $controllerKey=>$actions)
				{
					$moduleAndController=explode($this->getModule()->delimeter,$controllerKey);
					foreach ($actions as $action)
					{
						$opers[]=array('module'=>$moduleAndController[0],'controller'=>$moduleAndController[1],'name'=>$action);
					}
				}
			}
				
			$dataProvider=new CArrayDataProvider($opers,array(
				'keyField'=>false,
				'pagination'=>array(
		        'pageSize'=>10,
			),
			));
			$this->render('autoGenerateOpers',array('dataProvider'=>$dataProvider));
		}
	}
	public function actionGenerateAllRightOpers()
	{
		$allRightActions=$this->_getAllRightActions();
		if($newRightActions)
		{
			$opers=array();
			foreach ($newRightActions as $controllerKey=>$actions)
			{
				$moduleAndController=explode($this->getModule()->delimeter,$controllerKey);
				foreach ($actions as $action)
				{
					$opers[]=array('module'=>$moduleAndController[0],'controller'=>$moduleAndController[1],'name'=>$action);
				}
			}
		}
			
		$dataProvider=new CArrayDataProvider($opers,array(
				'keyField'=>false,
				'pagination'=>array(
		        'pageSize'=>10,
		),
		));
		$this->render('autoGenerateOpers',array('dataProvider'=>$dataProvider));
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
		//$contPath = Yii::app()->getControllerPath();
		$controllers = array();//$this->_scanDir($contPath);
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
		$del = Helper::findModule('admin')->delimeter;
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
		if (is_a($cont,'SBaseController')) {
			return true;
		}
		return false;
	}
	
	/**
	 * Getting a controllers actions and also th actions that are always allowed
	 * return array
	 * */
	private function _getControllerInfo($controller, $getAll = false) {
		$del = $this->getModule()->delimeter;
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
	 * Gets the assigned and not assigned tasks of the selected user
	 */
	private function _getTheTasks() {
		$model = new AuthItem();
		$rolename = $_REQUEST['id'];
		$act = $_REQUEST['act'];
		if($act=='assigned')
		{
			$data = Helper::getRoleAssignedTasks($rolename);
		}
		else {
			$data = Helper::getRoleNotAssignedTasks($rolename);
		}
		$returnData=array();
		if($data)
		{
			foreach($data as $row)
			{
				$returnData[]=array('text'=>$row->zh_name,'value'=>$row->name);
			}
		}
		echo json_encode($returnData);

	}

	/**
	 * Gets the assigned and not assigned operations of the selected user
	 */
	private function _getTheOpers() {
		$model = new AuthItem();
		$taskname = $_REQUEST['id'];
		$act = $_REQUEST['act'];
		if($act=='assigned')
		{
			$data = Helper::getTaskAssignedOpers($taskname);
		}
		else {
			$data = Helper::getTaskNotAssignedOpers($taskname);
		}
		$returnData=array();
		if($data)
		{
			foreach($data as $row)
			{
				$returnData[]=array('text'=>$row->name,'value'=>$row->name);
			}
		}
		echo json_encode($returnData);
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
				$returnData[]=array('text'=>$row->zh_name,'value'=>$row->name);
			}
		}
		echo json_encode($returnData);
	}
	

	/**
	 * Assigns child items to a parent item
	 * @param String $parent The parent item
	 * @param String $children The child items
	 */
	private function _assignChild($parent, $children,$deleteold=true) {
		if ($parent) {
			$auth = Yii::app()->authManager;
			if($deleteold)
			{
				$this->_revokeAllChild($parent);
			}
			if($children)
			{
				/* @var $auth CDbAuthManager */
				foreach ($children as $child) {
					$auth->addItemChild($parent, $child);
				}
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
	private function _revokeAllChild($parent)
	{
		if($parent)
		{
			$auth = Yii::app()->authManager;
			return Yii::app()->db->createCommand()
			->delete(Yii::app()->authManager->itemChildTable, 'parent=:parent', array(
				':parent'=>$parent,
			)) >= 0;
		}
		return false;
	}
	/**
	 * Assigns roles to a user
	 *
	 * @param int $userid The user's id
	 * @param String $roles The roles to assign
	 * @param String $bizRules Not used yet
	 * @param String $data Not used yet
	 */
	private function _assignUser($userid, $roles,$deleteold=true) {
		if ($userid) {
			$auth = Yii::app()->authManager;
			if($deleteold)
			{
				/* @var $auth CDbAuthManager */
				$this->_revokeAllRoles($userid);
			}
			if($roles)
			{
				foreach ($roles as $role) {
					$auth->assign($role, $userid);
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
		$userCriteria->select='user_id,user_name,user_first_name,user_nickname,user_email,user_join_date,user_last_login_date';
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
		$this->render('manageUser',array('dataProvider'=>$dataProvider,'model'=>$model,'userStatus'=>$userStatus,'adminUser'=>!$userType));
	}
	public function actionUpdateUser()
	{
		$model=new User();
		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->user_id)$model->setIsNewRecord(false);
			
			if($model->save())
			{
				$this->redirect(array('manageUser'));
			}
		}
		$userId=@$_GET['user_id'];
		$this->_loadCurrentUser($model, $userId);
			
	}
	public function actionUpdateAdminUser()
	{
		$model=new User();
		$model->user_type=0;
		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->user_id)$model->setIsNewRecord(false);
			if($pwd=@$_REQUEST['user_pwd_1'])$model->user_pwd=md5($pwd);
			if($model->save())
			{
				$this->redirect(array('manageAdminUser'));
			}
		}
		if($userId=@$_GET['user_id'])
		{
			$model=$model->findByPk($userId);
		}
		$allCity=City::getAllCity();
		$userStatus=Term::getTermsByGroupId(1);
		$this->render('updateAdminUser',array('model'=>$model,'userStatus'=>$userStatus,'allCity'=>$allCity));
	}
	private function _loadCurrentUser($model,$userId)
	{
		if($userId)
			$model=$model->with(array('enterprise'=>array('select'=>'ent_name'),'status'=>array('select'=>'term_name'),'role'=>array('select'=>'name')))->findByPK($userId);
		if($model)
		{
			$allCity=City::getAllCity();
			$userStatus=Term::getTermsByGroupId(1);
			$userTemplate=UserTemplate::getAllTemplate();
			$this->render('updateUser',
			array('model'=>$model,
			'userStatus'=>$userStatus,
			'allCity'=>$allCity,
			'userTemplate'=>$userTemplate,
			));
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
			case 2:
				$this->_assignUser($owner, $assignItems);
				break;
			case 1:
				$this->_assignChild($owner, $assignItems);
				break;
			case 0:
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
		$model=new AuthItem();
		$model->type=@$_REQUEST['AuthItem']['type'];
		$model->name=@$_REQUEST['AuthItem']['name'];
		$criteria = new CDbCriteria;
		$criteria->order='type desc';
		if ($model->type!==false) {
			$criteria->compare('type', '='.$model->type);
		}
		if ($model->name) {
			$criteria->addSearchCondition('name', $model->name,true);
		}
		$dataProvider=new CActiveDataProvider('AuthItem',array(
			'criteria'=>$criteria,
			'pagination'=>array(
		        'pageSize'=>10,
				'pageVar'=>'page',
				'params'=>array('AuthItem[type]'=>$model->type,'AuthItem[name]'=>$model->name),
		),
		));
		if(Yii::app()->request->isAjaxRequest)
		{
			$this->renderPartial('authItemList',array('dataProvider'=>$dataProvider));
		}
		else{
			$type=AuthItem::$TYPES;
			$this->render('manageRole',array('dataProvider'=>$dataProvider,'model'=>$model,'type'=>$type));
		}
	}
	public function actionGetAuthItem()
	{
		$actType=@$_REQUEST['actType'];
		switch($actType)
		{
			case 2:
				$this->_getTheRoles();
				break;
			case 1:
				$this->_getTheTasks();
				break;
			case 0:
				$this->_getTheOpers();
				break;
		}
	}
	/**
	 * The auth items that access is always  allowed. Configured in srbac module's
	 * configuration
	 * @return The always allowed auth items
	 */
	protected function allowedAccess() {
		return $this->getModule()->getAlwaysAllowed();
	}
	public function actionDeleteAuthItem()
	{
		$deleteAuthItem=@$_REQUEST['name'];
		if($deleteAuthItem && is_array($deleteAuthItem))
		{
			$criteria=new CDbCriteria();
			$criteria->addInCondition('name', $deleteAuthItem);
			$deleteAuthItem=AuthItem::model()->findAll($criteria);
			if($deleteAuthItem)
			{
				foreach ($deleteAuthItem as $authItem)
				{
					$authItem->delete();
				}
			}
		}
		else {
			echo json_encode(array('message'=>'请选择你要删除的权限项目！'));
		}
	}
	public function actionManageUserTemplate()
	{
		$model=new UserTemplate();
		$model->temp_status=@$_REQUEST['UserTemplate']['temp_status'];
		$model->temp_name=@$_REQUEST['UserTemplate']['temp_name'];
		$templdateCriteria=new CDbCriteria();
		if($model->temp_status)
		{
			$templdateCriteria->addCondition('temp_status=:status');
			$templdateCriteria->params[':status']=$model->temp_status;
		}
		if($model->temp_name)
		{
			$templdateCriteria->addSearchCondition('temp_name',$model->temp_name,true);
		}
		$templdateCriteria->with=array('status'=>array('select'=>'term_name'));
		$dataProvider=new CActiveDataProvider('UserTemplate',array(
			'criteria'=>$templdateCriteria,
			'pagination'=>array(
		        'pageSize'=>10,
				'pageVar'=>'page',
				'params'=>array('UserTemplate[temp_status]'=>$model->temp_status,
								'UserTemplate[temp_name]'=>$model->temp_name),
		),
		));
		$templateStatus=Term::getTermsByGroupId(1);
		$this->render('manageUserTemplate',array('dataProvider'=>$dataProvider,'model'=>$model,'templateStatus'=>$templateStatus));
	}
	public function actionChangeUserTemplateStatus()
	{
		$toStatus=@$_REQUEST['toStatus'];
		$templateId=@$_REQUEST['temp_id'];
		if(!$templateId && in_array($toStatus,array(1,2)))
		{
				
			Yii::app()->admin->setFlash('changeStatusError','请选择要更新状态的模板信息，以及改变的状态');
			$this->redirect(array($redirectPage));
				
		}
		$updateStatusCriteria=new CDbCriteria();
		$updateStatusCriteria->addInCondition('temp_id', $templateId);
		$updateRows=UserTemplate::model()->updateAll(array('temp_status'=>$toStatus),$updateStatusCriteria);
		if($updateRows>0)
		{
			Yii::app()->admin->setFlash('changeStatus','更新状态成功！');
		}
		else {
			Yii::app()->admin->setFlash('changeStatusError','更新异常');
		}
		$this->redirect(array('manageUserTemplate','page'=>Yii::app()->request->getParam('page',1)));

	}
	public function actionDeleteUserTemplate()
	{
		$result=array();
		if(Yii::app()->request->isAjaxRequest && $templateId=@$_GET['temp_id'])
		{
			$deleteRow=UserTemplate::model()->deleteByPk($templateId);
			if($deleteRow)
			{
				$result['status']=1;
				$result['message']='模板删除成功！';
			}
			else {
				$result['status']=0;
				$result['message']='模板删除失败！';
			}
		}
		else {
			$result['status']=0;
			$result['message']='非法请求！';
		}
		echo json_encode($result);
	}
	public function actionUpdateUserTemplate()
	{
		$model=new UserTemplate();
		if(isset($_POST['UserTemplate']))
		{
			$model->attributes=$_POST['UserTemplate'];
			if($model->temp_id)$model->setIsNewRecord(false);
			if($model->save())
			{
				$this->redirect(array('manageUserTemplate','page'=>Yii::app()->request->getParam('page',1)));
			}
		}
		if($tempId=@$_GET['temp_id']){
			$model=$model->findByPk($tempId);
		}
		$templateStatus=Term::getTermsByGroupId(1);
		$this->render('updateUserTemplate',array('model'=>$model,'templateStatus'=>$templateStatus));
	}

}
