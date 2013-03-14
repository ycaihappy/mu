<?php

class PriceController extends BasicAccessController
{
    public $layout = '//layouts/price_main';
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

    public function actionChart()
    {
        $type = isset($_REQUEST['type']) ? $_REQUEST['type'] : 1;
        $title = ($type == 1)? '钼精矿' : '钼酸铵';
        #$product_type = rand(75,89);
        $product_type = rand(31,32);
    
    #    $connection = Yii::app()->db;
    #    $sql = 'select * from mu_price_summary where sum_year='.date('Y').' and sum_product_type='.$product_type;
    #    $price_sum = $connection->createCommand($sql)->queryAll();
    #    foreach ($price_sum as $price)
    #    {
    #        $month_array[] = $price->sum_month;
    #        if ( isset($area_array[$price->sum_product_zone]) )
    #        $area_array[$price->sum_product_zone] += array($price->sum_price);
    #        else
    #        $area_array[$price->sum_product_zone] = array($price->sum_price);
    #    }

#        foreach ($area_array as $area=>$price_data)
#        {
#            $build[] = array('name'=>$area,'data'=>$price_data);
#        }
#
        $data = array(
            'text'=>$title,
            'xAxis'=> array('Jan','Nov'),
            'yAxis'=>'价格',
            'series'=>array(
                array(
                    'name'=>'河南',
                    'data'=>array(1,2,3,8,4,1)
                ),
                array(
                    'name'=>'陕西',
                    'data'=>array(1,2,3,7,9,1)
                ),
                array(
                    'name'=>'黑龙江',
                    'data'=>array(1,2,3,9,8,7)
                )
            )
        );
        
        echo json_encode($data);
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
	public function actionList()
	{
		$newsCategoryId=(int)@$_REQUEST['subcategory_id'];
		if($newsCategoryId)
		{
			$newsCriteria=new CDbCriteria();
			$newsCriteria->select='art_id,art_title,art_post_date';
			$newsCriteria->condition='art_status=1 and art_category_id=16 and art_subcategory_id='.$newsCategoryId;
			$newsCriteria->order='art_post_date desc';
			$count = Article::model()->count($newsCriteria);//
			$pager = new CPagination($count);
			$pager -> pageSize = 25; 
			$pager->applyLimit($newsCriteria);
			$newses=Article::model()->findAll($newsCriteria);
			if($newses)
			{
				foreach ($newses as &$news)
				{//用其他字段封装链接
					$news->art_title=CStringHelper::truncate_utf8_string($news->art_title, 20);
					$news->art_source=$this->createUrl('/price/view',array('art_id'=>$news->art_id));
				}
			}
			$allTerm=CCacheHelper::getAllTerm();
			$categoryName=$allTerm[$newsCategoryId]->term_name;
			$data=compact('newses','pager','categoryName');
		}
		else {
			$this->redirect(array('index'));
		}
		$this->render('list',$data);
	}
}
