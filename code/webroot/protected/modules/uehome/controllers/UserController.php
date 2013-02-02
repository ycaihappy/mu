<?php

class UserController extends Controller
{
    public $layout='//layouts/user_main';
	public function actionIndex()
	{
		$this->render('index');
	}
}
