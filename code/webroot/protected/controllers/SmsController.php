<?php

class SmsController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
		);
	}

	public function actionSend()
	{
        $smscode = new SmsCode();
        $smscode->mobile_no  = '18665900046';
        $smscode->sms_code   = '123456';
        $smscode->sms_status = 0;
        $smscode->sms_send_date = '2013-01-09 09:00:30';
        $smscode->save();
        echo json_encode(array('status'=>1,'data'=>array()));
        exit;
	}

	public function actionCheck()
	{
        $_GET['sms_code'] = '123456';
        $_GET['mobile_no'] = '18665900046';
        $model = new SmsCode();
        $ok = $model->find("mobile_no=:mobile_no and sms_code=:sms_code and sms_status=0", array('sms_code'=>$_GET['sms_code'], 'mobile_no'=>$_GET['mobile_no']));
        if ( $ok )
        {
            $ok->sms_status = 1;
            $ok->save();
            echo json_encode(array('status'=>1,'data'=>array()));
        }
        else
        {
            echo json_encode(array('status'=>0,'data'=>array()));
        }
        exit;
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
