<?php

class AboutController extends Controller {

	public $layout = '//layouts/about_main';
	
	public function actionIndex()
	{
		$this->siteConfig->siteMetaTitle='关于我们';
		$description=new SiteDescription();
    	$description=$description->LoadData();
		$this->render('about',array('description'=>$description->basicDescription,'title'=>'关于我们'));
	}
	public function actionContact()
	{
		$this->siteConfig->siteMetaTitle='联系方式';
		$this->render('index');
	}
	public function actionAgrement()
	{
		$this->siteConfig->siteMetaTitle='使用协议';
		$description=new SiteDescription();
    	$description=$description->LoadData();
		$this->render('about',array('description'=>$description->agrementDescription,'title'=>'使用协议'));
	}
	public function actionCopyRight()
	{
		$this->siteConfig->siteMetaTitle='版权隐私';
		$description=new SiteDescription();
    	$description=$description->LoadData();
		$this->render('about',array('description'=>$description->copyrightDescription,'title'=>'版权隐私'));
	}

}


?>
