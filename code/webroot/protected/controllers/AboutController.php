<?php

class AboutController extends Controller {

	
	
	public function actionIndex()
	{
		$this->siteConfig->siteMetaTitle='关于我们';
		$this->render('about');
	}
	public function actionContact()
	{
		$this->siteConfig->siteMetaTitle='联系方式';
		$this->siteConfig->csHotline2='<p>'.implode('<p></p>',array_diff(array($this->siteConfig->csHotline2,$this->siteConfig->csHotline3,$this->siteConfig->csHotline4),array(''))).'</p>';
		$this->render('index');
	}
	public function actionAgrement()
	{
		$this->siteConfig->siteMetaTitle='使用协议';
		$this->render('about');
	}
	public function actionCopyRight()
	{
		$this->siteConfig->siteMetaTitle='版权隐私';
		$this->render('about');
	}

}


?>