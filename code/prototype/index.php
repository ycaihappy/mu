<?php

/*
[{'image_title':'xxx','image_src':'','image_thumb_src':'xx'},...]
 
{'pageCount',2,'imageCount':20,'currentPage':2,'imageList':[刚才那个结构]}
*/
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

echo json_encode($data);

?>