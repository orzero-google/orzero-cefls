<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/../yii/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following line when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',false);
defined('YII_DEBUG_CACHE') or define('YII_DEBUG_CACHE',true);

require_once($yii);
Yii::createWebApplication($config)->run();
