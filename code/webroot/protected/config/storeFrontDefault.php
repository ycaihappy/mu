<?php
//默认模板展示的配置项目
return array(
	'menu'=>array(
		array('menu_show'=>1,'menu_name'=>'公司首页','menu_order'=>1,'menu_link'=>'/storeFront/default/index'),
		array('menu_show'=>1,'menu_name'=>'关于我们','menu_order'=>2,'menu_link'=>'/storeFront/default/companyProfile'),
		array('menu_show'=>1,'menu_name'=>'现货资源','menu_order'=>3,'menu_link'=>'/storeFront/default/productsList'),
		array('menu_show'=>1,'menu_name'=>'公司动态','menu_order'=>4,'menu_link'=>'/storeFront/default/newsList'),
		array('menu_show'=>1,'menu_name'=>'联系我们','menu_order'=>5,'menu_link'=>'/storeFront/default/mail'),
	),
	'styleimg'=>'',
	'headimage'=>'',
	'flash'=>array(
		'images/enterprise/banner1.jpg',
		'images/enterprise/banner2.jpg',
		'images/enterprise/banner3.jpg',
		'images/enterprise/banner2.jpg',
		'images/enterprise/banner1.jpg',

	),//最多五张图片
	'hometitle'=>'',
	'homekeyword'=>'',
	'homedes'=>'',
);