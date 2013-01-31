<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Web Application',
    'theme'=>'classic',

	// preloading 'log' component
	'preload'=>array('log'),
	"aliases" => array(
	    "packages" => dirname(__DIR__)."/packages/",
	),
	'language'=>'en',

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.widgets.*',
		//'application.extensions.*',
		//'packages.solr.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123456',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		'admin'=>array(
				'alwaysAllowedPath'=>'application.components',
				'alwaysAllowed'=>array(),
		),
		'uehome'=>array(
				'alwaysAllowedPath'=>'application.components',
				'alwaysAllowed'=>array(),
		),
		'srbac' => array(
		        'userclass'=>'User',
		        'userid'=>'user_id',
		        'username'=>'user_name',
		        'debug'=>true,
		        'pageSize'=>10,
		        'superUser' =>'Authority',
		        'css'=>'srbac.css',
		        'layout'=>'application.views.layouts.main',
		        'notAuthorizedView'=>'srbac.views.authitem.unauthorized',
		        'alwaysAllowed'=>array('SiteLogin','SiteLogout','SiteIndex','SiteAdmin','SiteError', 'SiteContact'),
		        'userActions'=>array('Show','View','List'),
		        'listBoxNumberOfLines' => 15,
		        'imagesPath' => 'srbac.images',
		        'imagesPack'=>'noia',
		        'iconText'=>true,
		        'header'=>'srbac.views.authitem.header',
		        'footer'=>'srbac.views.authitem.footer',
		        'showHeader'=>true,
		        'showFooter'=>true,
		        'alwaysAllowedPath'=>'srbac.components',
		    ),
		
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'class'=>'WebUser',
			'allowAutoLogin'=>true,
		),
//		'session'=>array(
//			'class'=>'CMongodbHttpSession',
//		),
//		"solr" => array(
//	        "class" => "packages.solr.ASolrConnection",
//	        "clientOptions" => array(
//	            "hostname" => "localhost",
//	            "port" => 8983,
//	        ),
//     	),
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/
            /*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
		'request'=>array(
			'enableCsrfValidation'=>true,
			'csrfTokenName'=>'MU_CSRF_TOKEN',
			'enableCookieValidation'=>true,	
		),
		// uncomment the following to use a MySQL database
		 'authManager'=>array(
		        'class'=>'CDbAuthManager',
		        'connectionID'=>'db',
		        'itemTable'=>'mu_right_item',
		        'assignmentTable'=>'mu_right_assignment',
		        'itemChildTable'=>'mu_right_itemchildren',
		    ),
		'db'=>array(
			'connectionString' => 'mysql:host=127.0.0.1;dbname=mu',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		    'schemaCachingDuration' => 0,//one day :86400
            'tablePrefix'=> 'mu'
		),
		'cache'=>array(
			'class'=>'CXCache',
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
					'logPath'=>'logs',
					'logFile'=>'errores.log',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);
