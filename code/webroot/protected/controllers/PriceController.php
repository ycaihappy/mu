<?php

class PriceController extends BasicAccessController
{
    public $layout = '//layouts/price_main';
	/**
	 * Declares class-based actions.
	 */
    public $adv;
	public function actions()
	{
		return array(
		);
	}
	public function init()
	{
		$this->adv=CCacheHelper::getAdvertisement(130);//行情中心头部横幅
		parent::init();
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->siteConfig->siteMetaTitle='行情中心';
		$adv=CCacheHelper::getAdvertisement(131);//中部横幅
		$adv1=CCacheHelper::getAdvertisement(132);//左底
		$data=compact('adv','adv1');
		$this->render('index',$data);
	}
	
	public function actionSpecial() {
		$data = array();
		$this->render('special',$data);
	}
	
    public function actionQuery()
    {
        $creteria=new CDbCriteria();
        $creteria->condition="city_mu=1 and city_level=2";
        $city_mu=City::model()->findAll($creteria);

        $category = Term::model()->getTermsListByGroupId(14);

        $current_year = date('Y');
        for($i=$current_year-2;$i<=$current_year;$i++)
        {
            $year[$i] = $i;
        }
        for($j=1;$j<13;$j++)
        {
            $month[$j] = $j;
        }
        $data = array('city_mu'=>$city_mu,'category'=>$category,'year'=>$year, 'month'=>$month);
        $this->render('query',$data);
    }

    public function actionChart()
    {
        $category = Term::model()->find("term_id=:term_id", array(':term_id'=>$_REQUEST['type']));
        $title = $category->term_name;
        $product_type = isset($_REQUEST['type']) ? $_REQUEST['type'] : 31;

        if  ( isset($_REQUEST['city']) ) 
        {
            foreach ($_REQUEST['city'] as $p_city_id)
            {
                $city_info = City::model()->find("city_id=:city_id",array(':city_id'=>$p_city_id));
                $select_city[$city_info->city_name] = $p_city_id;
            }
        }
        else
        {
            $creteria=new CDbCriteria();
            $creteria->condition="city_mu=1 and city_level=2";
            $creteria->limit =3;
            $city_three=City::model()->findAll($creteria);
            foreach ($city_three as $city_one)
            {
                $sum_city[$city_one->city_id] = array('name'=>$city_one->city_name);
                $select_city[$city_one->city_name] = $city_one->city_id;
            }
        }

        if ( $_REQUEST['year'] == $_REQUEST['to_year'] )
        {/*{{{*/
            $select_year = array($_REQUEST['year']);
            $day_sql = '';
            if ( $_REQUEST['month'] == $_REQUEST['to_month'] )
            {
                if ($_REQUEST['month'] == date('n') )
                    $month_day = date('d');
                else
                    $month_day = date("t",strtotime($_REQUEST['year'].$_REQUEST['month']));
                for($i=1;$i<$month_day;$i++)
                {
                    $select_day[] = $i;
                    $select_month_name[] = $_REQUEST['month']."-".$i;
                }
                $select_month  = array($_REQUEST['month']+1);

                $total_day = count($select_day);
                if ( isset($_REQUEST['day']) )
                {
                    $select_day = $select_month_name =array();
                    for($n=$_REQUEST['day']; $n>$_REQUEST['day']-5; $n--)
                    {
                        $select_day[] = $n;
                        $select_month_name[] = $n;
                    }
                    $day_sql = 'and sum_day in ('.implode(',',$select_day).')';
                }
                else
                {
                    $day_sql = 'and sum_day in ('.implode(',',$select_day).')';
                }
                
                $sql = 'select sum_year,sum_product_zone,sum_month,sum_price as price from mu_price_summary
                    where sum_year in ('.implode(',',$select_year).') 
                    and sum_product_type ='.$product_type.' 
                    and sum_month in ('.implode(',',$select_month).') '.$day_sql.'
                    and sum_product_zone in ('.implode(',',$select_city).') 
                    order by sum_product_zone,sum_month';
            }
            else
            {
                $select_month = array();
                for($j=$_REQUEST['month']; $j<= $_REQUEST['to_month']; $j++)
                {
                    $select_month[] = $j+1;
                    $select_month_name[] = $j;
                }
                $sql = 'select sum_year,sum_product_zone,sum_month,sum_price as price from mu_price_summary
                    where sum_year in ('.implode(',',$select_year).') 
                    and sum_product_type ='.$product_type.' 
                    and sum_month in ('.implode(',',$select_month).')
                    and sum_product_zone in ('.implode(',',$select_city).') 
                    group by sum_year,sum_month,sum_product_zone order by sum_product_zone,sum_month';
            }
        }/*}}}*/
        else
        {/*{{{*/
            $sub_sql = "";
            for($m=$_REQUEST['year'];$m<=$_REQUEST['to_year'];$m++)
            {
                $select_year[] = $m;
                if ($m == $_REQUEST['year'])
                {
                    for($i=$_REQUEST['month']; $i<= 12; $i++)
                    {
                        $select_month[] = $i;
                        $select_month_name[] = $m."-".($i);
                    }
                    $sub_sql = "(sum_year =".$m." and sum_month in(".implode(',',$select_month).") and sum_product_zone in (".implode(',',$select_city).") ) or ";
                }
                elseif ( $m == $_REQUEST['to_year'] )
                {
                    $select_month = array();
                    for($j=1;$j<=$_REQUEST['to_month'];$j++)
                    {
                        $select_month[] = $j;
                        $select_month_name[] = $m."-".($j);
                    }
                    $sub_sql .= "(sum_year =".$m." and sum_month in(".implode(',',$select_month).") and sum_product_zone in (".implode(',',$select_city).") ) ";
                }
                else
                {
                    $select_month = array();
                    for($k=1;$k<13;$k++)
                    {
                        $select_month[] = $k;

                        $select_month_name[] = $m."-".($k);
                    }
                    $sub_sql .= "(sum_year =".$m." and sum_month in(".implode(',',$select_month).") and sum_product_zone in (".implode(',',$select_city).") ) or ";
                }

                $total_month = count($select_month);
            }

            $sql='select sum_year,sum_product_zone,sum_month,sum_day,(sum_price) as price from mu_price_summary
                where '.$sub_sql.'
                and sum_product_type = '.$product_type.'
                group by sum_year,sum_month,sum_product_zone 
                order by sum_product_zone,sum_month';
        }/*}}}*/
        
        $connection = Yii::app()->db;
        $price_sum = $connection->createCommand($sql)->queryAll();
        foreach ($select_city as $city_name=>$city_id)
        {
            $data = array();
            foreach ($price_sum as $price_one)
            {
                if ( $price_one['sum_product_zone'] == $city_id)
                {
                    $data[] = (int)$price_one['price'];
                }
            }
            $build[] = array('name'=>$city_name,'data'=>$data);
        }

        $data = array(
            'text'=>$title,
            'xAxis'=> $select_month_name,
            'yAxis'=>'价格',
            'series'=>$build
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
					$news->art_source=$this->createUrl('/news/view',array('art_id'=>$news->art_id));
				}
			}
			$allTerm=CCacheHelper::getAllTerm();
			$categoryName=$allTerm[$newsCategoryId]->term_name;
			$data=compact('newses','pager','categoryName');
			$this->siteConfig->siteMetaTitle=$categoryName;
		}
		else {
			$this->redirect(array('index'));
		}
		$this->render('list',$data);
	}
}
