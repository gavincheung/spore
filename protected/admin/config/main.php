<?php
/**
 * 后台配置
 */
$backend = dirname(dirname(__FILE__));  
$frontend = dirname($backend);  
Yii::setPathOfAlias('backend',$backend);  
Yii::setPathOfAlias('themes',$frontend.'/themes');  
  
$frontendArray = require_once($frontend.'/config/main.php');  
  
$backendArray=array(  
    'name'=>'Control Center',  
    'basePath'=>$frontend,  
    'homeUrl'=>array('site/login'),

    'preload'=>array(
		'log',
		'bootstrap',
	),

    'viewPath'=>$backend.'/views',  
    'controllerPath'=>$backend.'/controllers',  
    'runtimePath'=>$backend.'/runtime',  

    'import'=>array(   
        'application.models.*',  
        'application.components.*',  
        'backend.models.*',  
        'backend.components.*',  
    ),  

    'modules'=>array(
        'srbac' => array(
            'layout'=>'themes.admin.views.layouts.main',
        ),
    ),

    'components'=>array(
        'urlManager'=>array(
            'showScriptName'=>true, // 显示admin.php
        ),
    ),

    // 使用主题：admin
    'theme'=>'admin',

    // 默认语言：中文
    'language'=>'zh_cn',

    'params'=>CMap::mergeArray(require($frontend.'/config/params.php'),require($backend.'/config/params.php')),  
);

return CMap::mergeArray($frontendArray,$backendArray); 

