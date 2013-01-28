<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return array(
    'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    'name'=>'My Console Application',

    // preloading 'log' component
    'preload'=>array('log'),
    'commandPath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'commands'.DIRECTORY_SEPARATOR.'shell',  

    'import'=>array(
        'application.models.*',
        'application.components.*',
    ),
    // application components
    'components'=>array(
        #	'db'=>array(
        #		'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
        #	),
        // uncomment the following to use a MySQL database

        'db'=>array(
			'connectionString' => 'mysql:host=127.0.0.1;dbname=mu',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		    'schemaCachingDuration' => 0,//one day :86400
            'tablePrefix'=> 'mu'
        ),

        'log'=>array(
            'class'=>'CLogRouter',
            'routes'=>array(
                array(
                    'class'=>'CFileLogRoute',
                    'levels'=>'error, warning',
                ),
            ),
        ),
    ),
);
