<?php

class SupplyController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

    public function actionList()
    {
        if ( isset($_REQUEST['type']) )
        {
            switch ($_REQUEST['type'])
            {
            case '1':
                $criteria=new CDbCriteria;
                $criteria->order='supply_id DESC';
                $criteria->addCondition("supply_type=18");

                $count=Supply::model()->count($criteria);

                $pager=new CPagination($count);
                $pager->pageSize=15;
                $pager->applyLimit($criteria);
                $list=Supply::model()->findAll($criteria);
                break;
            case '2':
                $criteria=new CDbCriteria;
                $criteria->order='supply_id DESC';
                $criteria->addCondition("supply_type=19");

                $count=Supply::model()->count($criteria);

                $pager=new CPagination($count);
                $pager->pageSize=15;
                $pager->applyLimit($criteria);
                $list=Supply::model()->findAll($criteria);
                break;
            }
            $supply_type= Term::model()->getTermsByGroupId(11);
            $city  = city::getAllCity();
            $category = Term::model()->getTermsByGroupId(14);
        }
        $this->render('list',array('data'=>$list,'category'=>$category,'city'=>$city,'supply_type'=>$supply_type,'pager'=>$pager));
    }

	public function actionView()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('view');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
}
