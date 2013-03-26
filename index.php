<?php
@session_start();
echo "<pre>";
var_dump($_SESSION);
die();
if ($_SERVER['HTTP_HOST'] =='localhost')
{
        $yii=dirname(__FILE__).'/framework/yii.php';
        $config=dirname(__FILE__).'/protected/config/local.php';

        defined('YII_DEBUG') or define('YII_DEBUG',true);
        defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);
}
else
{
        $yii=dirname(__FILE__).'/framework/yii.php';
        $config=dirname(__FILE__).'/protected/config/main.php';
}
require_once($yii);
Yii::createWebApplication($config)->run();
