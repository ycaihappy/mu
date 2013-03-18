<?php


class ServiceController extends Controller {


	public $layout = '//layouts/service_main';
	public function actionIndex()
	{
		$services=Article::model()->service()->findAll();
		$subCatService=array();
		if($services)
		{
			foreach ($services as $service)
			{
				$subCatService[$service->art_subcategory_id]=$service;
			}
		}
		$this->siteConfig->siteMetaTitle='客户服务';
		$data=compact('subCatService');
		$this->render('index',$data);
	}
	public function actionView()
    {
        $this->layout = '//layouts/ajax_main';
        $artId=(int)Yii::app()->request->getParam('art_id');
        $service=new Article();
		if($artId)
		{
			$service=$service->findByPk($artId);
			$this->siteConfig->siteMetaTitle=$service->art_title;
		}
		else
		{
			$this->redirect(array('/service/index'));
		}
		$this->siteConfig->siteMetaTitle=$service->art_title;
        $this->siteConfig->siteMetaKeyword=$service->art_tags;
        $this->siteConfig->siteMetaDescription=$service->art_summary;
		$data=compact('service');
		$this->render('view',$data);
	}
}


?>
