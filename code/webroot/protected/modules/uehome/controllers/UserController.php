<?php

class UserController extends Controller
{
    public $layout='//layouts/user_main';
	public function actionIndex()
	{
		$this->render('index');
	}
    public function actionDetail()
    {
        $this->render('detail');
    }
    public function actionCompany()
    {
        $this->render('company');
    }
    public function actionPassword()
    {
        $this->render('password');
    }
    public function actionNews()
    {
        $this->render('news');
    }
    public function actionSupply()
    {
        $this->render('supply');
    }
    public function actionGoods()
    {
        $this->render('goods');
    }
    public function actionCert()
    {
        $this->render('cert');
    }
}
