<?php

$act = isset($_REQUEST['act']) ? $_REQUEST['act'] : 'from';

if($act == 'from'){
	$data = array(
		array(
			'text'=>'添加新闻',
			'value'=>'1'
		),
		array(
			'text'=>'管理新闻',
			'value'=>'2'
		),
		array(
			'text'=>'添加会员',
			'value'=>'4'
		),
		array(
			'text'=>'删除会员',
			'value'=>'5'
		),
		array(
			'text'=>'删除管理员',
			'value'=>'6'
		)
	);
}else{

	$data = array(
		array(
			'text'=>'添加供应',
			'value'=>'7'
		),
		array(
			'text'=>'管理供应',
			'value'=>'8'
		),
		array(
			'text'=>'添加商家',
			'value'=>'9'
		)
	);
}

echo json_encode($data);