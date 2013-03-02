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

	public function actionView()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('view');
	}

	public function actionSearchProduct()
	{
		Yii::import('application.packages.apache_solr.Service');
		$bigType=@$_REQUEST['bigType'];
		$smallType=@$_REQUEST['smallType'];
		$muCotent=@$_REQUEST['muContent'];
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
				$typsQuery=$this->_getSolrQeryString('product_type_id', 14, $bigType);
				$query=$typsQuery;
			}
		}
		if($muCotent)
		{
			$asCriteria->addCondition("product_mu_content:{$muCotent}");
			$query.=($query?' AND ':'')."product_mu_content:{$muCotent}";
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
		$data=compact('pager','products');
		$this->render('index',$data);
		
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
