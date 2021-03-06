<?php
if($_SERVER['HTTP_HOST'] != 'localhost') 
        include_once('../connect_utf8.php');

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Web Application',
        'language'=>'ru',
        'defaultController'=>'student',

	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
                //'login',
	),

	'components'=>array(
                'clientScript'=>array(
                        'scriptMap'=>array(
                                'jquery.js'=>false,
                        ),
                ),
                'cache'=>array(
                        'class'=>'system.caching.CFileCache',
                ),
                'request'=>array(
                        'enableCsrfValidation'=>true,
                        'enableCookieValidation'=>true,
                ),
		'user'=>array(
                        //'allowAutoLogin'=>true,
                        'loginUrl'=>array('/student/noAccess'),
		),
		'urlManager'=>array(
                        //'showScriptName'=>false,
			'urlFormat'=>'path',
			'rules'=>array(
                                '/'=>'student/admin',
                                'student'=>'student/admin',
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		'db'=>array(
			'connectionString' => 'mysql:host='.$h.';dbname=po4tacz',
			'emulatePrepare' => true,
			'username' => $u,
			'password' => $p,
			'charset' => 'utf8',
                        //'schemaCachingDuration'=>3600*24,
		),
		'errorHandler'=>array(
			'errorAction'=>'site/error',
		),
	),
	'params'=>array(
		'adminEmail'=>'webmaster@example.com',
	),
);
