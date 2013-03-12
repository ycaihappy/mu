<?php


$data = array(
	'text'=>'行情走势图',
	'xAxis'=>array('一','二','三','四','五'),
	'yAxis'=>'价格',
	'series'=>array(
		array(
			'name'=>'上海',
			'data'=>array(1,2,3,8,4,1)
		),
		array(
			'name'=>'深圳',
			'data'=>array(1,2,3,7,9,1)
		),
		array(
			'name'=>'北京',
			'data'=>array(1,2,3,9,8,7)
		)
	)
);

echo json_encode($data);