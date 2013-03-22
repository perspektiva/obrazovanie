<?php
return CMap::mergeArray(
        require(dirname(__FILE__).'/main.php'),
        array(
                //'preload'=>array('log'),
                'modules'=>array(
                        'gii'=>array(
                                'class'=>'system.gii.GiiModule',
                                'password'=>'123',
                                'ipFilters'=>array('127.0.0.1','::1'),
                        ),
                ),
                'components'=>array(
                        'db'=>array(
                                'connectionString' => 'mysql:host=localhost;dbname=obrazovanie',
                                'emulatePrepare' => true,
                                'username' => 'root',
                                'password' => '123759',
                                'charset' => 'utf8',
                                'enableProfiling'=>true,
                                'enableParamLogging'=>true,
                        ),
                        //'log'=>array(
                                //'class'=>'CLogRouter',
                                //'routes'=>array(
                                        //array(
                                                //'class'=>'CProfileLogRoute',
                                        //),
                                //),
                        //),
                ),
        )
);
