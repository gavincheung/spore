<?php

// 如果有必要，更改以下路径
$yii=dirname(__FILE__).'/../yii/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

// 生产模式下移除以下代码行
defined('YII_DEBUG') or define('YII_DEBUG',true);
// 指定每个日志消息应该显示的堆栈调用层级数
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
Yii::createWebApplication($config)->run();
