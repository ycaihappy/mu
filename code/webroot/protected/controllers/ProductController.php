<?php

class ProductController extends Controller
{
	public $layout = '//layouts/product_main';
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			'getChildrenTerms'=>array(
				'class'=>'CGetChildrenTermsAction',
				'emptySelect'=>'选择品类',
			),
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
		Yii::import('application.packages.apache_solr.Service');
		$bigType=@$_REQUEST['bigType'];
		$smallType=@$_REQUEST['smallType'];
		$muContent=@$_REQUEST['muContent'];
		$waterContent=@$_REQUEST['waterContent'];
		$enterprise=@$_REQUEST['enterprise'];
		$keyword=@$_REQUEST['keyword'];
		$province=@$_REQUEST['province'];
		$city=@$_REQUEST['city'];
		$query='';
		$params['fl']='product_id';
		if($bigType)
		{
			if($smallType)
			{
				$query="product_type_id:{$smallType}";
			}
			else {
				$typsQuery=$this->_getTermSolrQueryString('product_type_id', 14, $bigType);
				$query=$typsQuery;
			}
		}
		if($muContent)
		{
			$asCriteria->addCondition("product_mu_content:{$muContent}");
			$query.=($query?' AND ':'')."product_mu_content:{$muContent}";
		}
		if($waterContent)
		{
			$query.=($query?' AND ':'')."product_water_content:{$waterContent}";
		}
		if($enterprise || $keyword)
		{
			if($enterprise && $keyword)
			{
				$query.=($query?' AND ':'')."product_enterprise:{$enterprise}";
				$query.=($query?' AND ':'')."product_name:{$keyword}";
			}
			else {
				$keyword=$enterprise?$enterprise:$keyword;
				$query.=($query?' AND ':'')."text:{$keyword}";
			}
			$params['qf']='text';
			$params['defType']='edismax';
		}
		if($province)
		{
			if($city)
			{
				$query.=($query?' AND ':'')."product_city_id:{$city}";
			}
			else {
				$cityQuery=$this->_getCitySolrQueryString('product_city_id',$province);
				$query.=($query?' AND ':'').$cityQuery;
			}
		}
		$query=$query?$query:'*:*';
		$pager=new CPagination();
		$pager->pageSize=48;
		$pager->pageVar='page';
		$result= Yii::app()->searcher->get($query,0,50,$params);
		$response=$result->response;
		$pager->setItemCount($response->numFound);
		$pager->params=$_REQUEST;
		$products=array();
		if($response->numFound>0)
		{
			$products=array();
			foreach ($response->docs as $doc)
			{
				$products[]=$doc->product_id;
			}
			$productCriteria=new CDbCriteria();
			$productCriteria->select='product_id,product_city_id,product_name,product_price,product_quanity,product_join_date';
			$productCriteria->with=array('user.enterprise'=>array('select'=>'ent_name'),
			'type'=>array('select'=>'term_name'),
			'unit'=>array('select'=>'term_name'),
			'muContent'=>array('select'=>'term_name'),
			'waterContent'=>array('select'=>'term_name'),
			);
			$productCriteria->addInCondition('product_id',$products);
			$products=Product::model()->findAll($productCriteria);
			foreach ($products as &$product)
			{
				$product->product_city_id=City::getCityLayer($product->product_city_id,'.','未标明');
			}
		}
		$muCategory=Term::getTermsByGroupId(14,true,null,'全部');
		$allProvince=City::getProvice('全部');
		$allCategory=Term::getTermsByGroupId(14,true,null,'全部');
		$allMuContent=Term::getTermsByGroupId(16,true,null,'全部');
		$allSmallType=array();
		if($bigType)
		{
			$allSmallType=Term::getTermsByGroupId(14,false,$bigType,'全部');
		}
		$baseUrl=$this->createUrl('index');
		$data=compact('baseUrl','pager','products','muCategory',
		'allProvince','allCategory','muContent','allMuContent','allSmallType','province','bigType','smallType','enterprise','keyword');
		$this->render('index',$data);
	}

	public function actionView()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('view');
	}

	public function actionSearchProduct()
	{
		
		
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
		$term=Term::getTermsByGroupId($groupId,false,$parentId,false);
		if(count($term)>1)
		{
			$termKeys=array_keys($term);
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
