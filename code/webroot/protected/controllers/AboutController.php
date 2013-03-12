<?php

class AboutController extends Controller {

	
	
	public function actionIndex()
	{
		$this->siteConfig->siteMetaTitle='关于我们';
		$this->siteConfig->csHotline2='<p>'.implode('<p></p>',array_diff(array($this->siteConfig->csHotline2,$this->siteConfig->csHotline3,$this->siteConfig->csHotline4),array(''))).'</p>';
	}
	public function actionContact()
	{
		$this->siteConfig->siteMetaTitle='使用协议';
	}
	public function actionAgrement()
	{
		$this->siteConfig->siteMetaTitle='使用协议';
	}
	public function actionCopyRight()
	{
		$this->siteConfig->siteMetaTitle='版权隐私';
	}

}


?>