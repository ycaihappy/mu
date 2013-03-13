<?php

/*
[{'image_title':'xxx','image_src':'','image_thumb_src':'xx'},...]
 
{'pageCount',2,'imageCount':20,'currentPage':2,'imageList':[刚才那个结构]}
*/
/*
$data = array(
	'pageCount'=>1,
	'imageCount'=>20,
	'currentPage'=>1,
	'imageList'=>array(
		array(
			'image_title'=>'aaa',
			'image_src'=>'images/290x287_1.gif',
			'image_thumb_src'=>'images/290x287_1.gif'
		),
		array(
			'image_title'=>'bbbb',
			'image_src'=>'images/290x287_1.gif',
			'image_thumb_src'=>'images/290x287_1.gif'
		),
		array(
			'image_title'=>'cccc',
			'image_src'=>'images/290x287_1.gif',
			'image_thumb_src'=>'images/290x287_1.gif'
		),array(
			'image_title'=>'dddd',
			'image_src'=>'images/290x287_1.gif',
			'image_thumb_src'=>'images/290x287_1.gif'
		),
		array(
			'image_title'=>'dddd',
			'image_src'=>'images/290x287_1.gif',
			'image_thumb_src'=>'images/290x287_1.gif'
		)
	)
);
*/

/*chart data*/

$data = array(
	'text'=>'行情走势图',
	'xAxis'=>array('Jan','Feb','Mar','aa','yy'),
	'yAxis'=>'价格',
	'series'=>array(
		array(
			'name'=>'a',
			'data'=>array(1,2,3,8,4,1)
		),
		array(
			'name'=>'b',
			'data'=>array(1,2,3,7,9,1)
		),
		array(
			'name'=>'c',
			'data'=>array(1,2,3,9,8,7)
		)
	)
);

/*
//站内信autocomplete
$data = array(
	array(
		'id'=>'xxx',
		'label'=>'aaaa',
		'value'=>'11111'
	),
	array(
		'id'=>'xxx',
		'label'=>'bbbb',
		'value'=>'2222'
	),
	array(
		'id'=>'xxx',
		'label'=>'ccc',
		'value'=>'3333'
	)
);
*/
echo json_encode($data);

?>