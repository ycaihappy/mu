<?php

class ProductController extends Controller
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
        $this->layout = '//layouts/ajax_main';
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	public function actionView()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('view');
	}

	public function actionSearchProduct()
	{
		$bigType=@$_REQUEST['bigType'];
		$smallType=@$_REQUEST['smallType'];
		$muCotent=@$_REQUEST['muContent'];
		$waterContent=@$_REQUEST['waterContent'];
		$enterprise=@$_REQUEST['enterprise'];
		$province=@$_REQUEST['province'];
		$city=@$_REQUEST['city'];
		$asCriteria=new ASolrCriteria();
		$asCriteria->setParam('wt','json');
		$asCriteria->setParam('fq',0);
		$asCriteria->addField('product_id');
		$asCriteria->setOrder('product_join_date desc');
		if($bigType)
		{
			if($smallType)
			{
				$asCriteria->addCondition("product_type_id:{$smallType}");
			}
			else {
				$typsQuery=$this->_getSolrQeryString('product_type_id', 14, $bigType);
				$asCriteria->addCondition($typsQuery);
			}
		}
		if($muCotent)
		{
			$asCriteria->addCondition("product_mu_content:{$muCotent}");
		}
		if($waterContent)
		{
			$asCriteria->addCondition("product_water_content:{$waterContent}");
		}
		if($enterprise)
		{
			$asCriteria->query="product_enterprise:{$enterprise}";
			//$asCriteria->addCondition("product_enterprise:{$enterprise}");
			$asCriteria->setParam('defType','edismax');
			$asCriteria->setParam('pf','product_enterprise');
		}
		if($province)
		{
			if($city)
			{
				$asCriteria->addCondition("product_city_id:{$city}");
			}
			else {
				$cityQuery=$this->_getCitySolrQueryString('product_city_id',$province);
				$asCriteria->addCondition($cityQuery);
			}
		}
		$models=SolrProduct::model()->findAll($asCriteria);
		echo count($models);
		exit;
		$dataProvider=new ASolrDataProvider('SolrProduct',array(
			'criteria'=>$asCriteria,
			'pagination'=>array(
				'pageSize'=>48,
				'pageVar'=>'page',
			),
		));
		var_dump($dataProvider);
		exit;
		
		
	}
	private function _getCitySolrQueryString($fieldName,$province)
	{
		$citys=City::getAllCity($province);
		if($citys)
		{
			return $fieldName.':('.implode(' ',array_keys($citys)).')';
		}
		
	}
	private function _getTermSolrQueryString($fieldName,$groupId,$parentId)
	{
		$term=Term::getTermsByGroupId($groupId,false,$parentId);
		if(count($term)>1)
		{
			$termKeys=array_keys(array_shift($term));
			return $fieldName.':('.implode(' ',$termKeys).')';
		}
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
