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
		'application.extensions.ckeditor.*',
		'application.extensions.xheditor.*',
	    'application.extensions.yii-mail.*', 
		'application.extensions.solr.*',
		'application.extensions.image.*',
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
				'alwaysAllowed'=>array('admin-SiteLogin','admin-SiteIndex','admin-SiteCaptcha'),
				'debug'=>false,
				'notAuthorizedView'=>'/admin/site/unauthorized',
		),
		'uehome',
		'storeFront',
		
	),

	// application components
	'components'=>array(
		'user'=>array(
			'class'=>'WebUser',
			'loginUrl'=> array('uehome/user/login'),
		),
		'session'=>array(
			'class'=>'CHttpSession',
			//'savePath'=>'sessions',
			'cookieParams' => array(
	         'domain' => '.mushw.com',
	      ),
			
		),
//		'user'=>array(
			// enable cookie-based authentication
//			'class'=>'WebUser',
//			'loginUrl'=>'uehome/user/login',
//			'allowAutoLogin'=>true,
//		),
//		'session'=>array(
//			'class'=>'CMongodbHttpSession',
//		),
//		"solr" => array(
//	        "class" => "packages.solr.ASolrConnection",
//	        "clientOptions" => array(
//				'path'=>'/solr-keyword/core1',
//	            "hostname" => "192.168.219.103",
//	            "port" => '8080',
//	        ),
//     	),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
            'urlSuffix'=>'.html',
            'showScriptName'=>false,
			'rules'=>array(
				'exhibition/view/<art_id:\d+>'=>'exhibition/view',
				'exhibition/list/<subcategory_id:\d+>'=>'exhibition/list',
				'about/<_a:\w+>'=>'about/<_a>',
				'http://www.mushw.com/<_a:\w+>'=>'/site/<_a>',
				'<_c:\w+>/index'=>'<_c>/index',
				'news/view/<art_id:\d+>'=>'news/view',
				'service/view/<art_id:\d+>'=>'service/view',
				'news/list/<subcategory_id:\d+>'=>'news/list',
				'supply/view/<supply_id:\d+>'=>'supply/view',
				'supply/list/<type:\d+>'=>'supply/list',
				'product/view/<product_id:\d+>'=>'product/view',
				'product/list/<type:\d+>'=>'product/list',
				'price/list/<subcategory_id:\d+>'=>'price/list',
				'price/chart/<type:\d+>'=>'price/chart',
				'knowledge/list/<subcategory_id:\d+>'=>'knowledge/list',
				'knowledge/view/<art_id:\d+>'=>'knowledge/view',
				'theme/special/<type:\d+>'=>'theme/special',
    			'price/query/<type:\d+>'=>'price/query',
				'http://admin.mushw.com/<_c:\w+>/<_a:\w+>'=>'admin/<_c>/<_a>',
				'http://uehome.mushw.com/<_a:\w+>'=>'uehome/user/<_a>',
				'http://<username:\w+>.mushw.com/<_a:\w+>'=>'storeFront/default/<_a>'
			),
		),
		
            /*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
		'mail'=>array(
			'class'=>'application.extensions.yii-mail.YiiMail',
			'transportType'=>'smtp',
			'viewPath'=>'application.views.mail',
			'dryRun'=>false,
		),
		'request'=>array(
			//'enableCsrfValidation'=>true,
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
		'fileCache'=>array(
				'class'=>'CFileCache',
				'cachePath'=>'cache/storeFrontConfigCache',
				'directoryLevel'=>2,
			),
		'widgetFileCache'=>array(
				'class'=>'CFileCache',
				'cachePath'=>'cache/widget',
				'directoryLevel'=>2,
			),
		'clientScript'=>array(
			'coreScriptPosition'=>2,
			'defaultScriptFilePosition'=>2,
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'searcher'=>array(
            'class'=>'CSolrComponent',
            'host'=>'61.163.6.93',
            'port'=>8080,
            'indexPath'=>'/solr/core1/'
        ),
        'image'=>array(
        	'class'=>'application.extensions.image.CImageComponent',
        	'driver'=>'GD',
        ),
		
	#	'log'=>array(
	#		'class'=>'CLogRouter',
	#		'routes'=>array(
	#			array(
	#				'class'=>'CFileLogRoute',
	#				'levels'=>'error, warning',
	#				'logPath'=>'logs',
	#				'logFile'=>'errores.log',
	#			),
	#			// uncomment the following to show log messages on web pages
	#			/*
	#			array(
	#				'class'=>'CWebLogRoute',
	#			),
	#			*/
	#		),
	#	),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);
