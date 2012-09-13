<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/css/admin/main.css" />
        <script type="text/javascript">
            function setHeight(){
            	if(document.getElementById("aside"))
                	document.getElementById("aside").style.height = document.documentElement.clientHeight + "px";
                if(document.getElementById("mask"))
                	document.getElementById("mask").style.height = document.documentElement.clientHeight + "px";
                if(document.getElementById("main"))
                	document.getElementById("main").style.height= document.documentElement.clientHeight + "px";
            };
            window.onload = setHeight;
            window.onresize = setHeight;
        </script>
    </head>
    <body>
        <div id="wrapper">
		
            <div class="main" id="mask">
                <div id="main" class="main-cont">
                    <iframe src="<?php echo Yii::app()->createUrl('site/index'); ?>"></iframe>
                </div>
            </div>

            <div id="aside">
                <h1 class="logo">
                    <a href="#" title="<?php echo CHtml::encode(Yii::app()->name); ?>"><?php echo CHtml::encode(Yii::app()->name); ?></a>
                </h1>
                <!-- /Logo -->
                <div class="nav">
                    <?php $this->widget('zii.widgets.CMenu',array(
                        'encodeLabel'=>false,
                        'activateParents'=>true,
                        'items'=>array(
                            array('label'=>'Posts', 'url'=>array('/post'), 'items'=>array(
                                array('label'=>'Manage posts', 'url'=>array('/post/index')),
                                array('label'=>'Create a post', 'url'=>array('/post/create')),
                                )),
                            /*array('label'=>'Comments', 'url'=>array('/comment'), 'items'=>array(
                                array('label'=>'All comments', 'url'=>array('/comment/index')),
                                array('label'=>'Manage comments', 'url'=>array('/comment/admin')),
                                )),*/
                            array('label'=>'Products', 'url'=>array('/product'),'items'=>array(
                                array('label'=>'Manage Products', 'url'=>array('/product/index')),
                                array('label'=>'Create Product', 'url'=>array('/product/create')),
                                array('label'=>'View Product', 'url'=>array('/product/view'), 'itemOptions'=>array('class'=>'hidden')),
                                )),
                            array('label'=>'Categories', 'url'=>array('/category'),'items'=>array(
                                array('label'=>'Manage Categories', 'url'=>array('/category/index')),
                                array('label'=>'Create Category', 'url'=>array('/category/create')),
                                array('label'=>'View Category', 'url'=>array('/category/view'), 'itemOptions'=>array('class'=>'hidden')),
                                )),
                            array('label'=>'Operation Systems', 'url'=>array('/os'),'items'=>array(
                                array('label'=>'Manage Operation Systems', 'url'=>array('/os/index')),
                                array('label'=>'Create Operation System', 'url'=>array('/os/create')),
                                array('label'=>'View Operation System', 'url'=>array('/os/view'), 'itemOptions'=>array('class'=>'hidden')),
                                )),
                            array('label'=>'Colors', 'url'=>array('/color'),'items'=>array(
                                array('label'=>'Manage Colors', 'url'=>array('/color/index')),
                                array('label'=>'Create Color', 'url'=>array('/color/create')),
                                array('label'=>'View Color', 'url'=>array('/color/view'), 'itemOptions'=>array('class'=>'hidden')),
                                )),
                            array('label'=>'Displays', 'url'=>array('/display'),'items'=>array(
                                array('label'=>'Manage Displays', 'url'=>array('/display/index')),
                                array('label'=>'Create Display', 'url'=>array('/display/create')),
                                array('label'=>'View Display', 'url'=>array('/display/view'), 'itemOptions'=>array('class'=>'hidden')),
                                )),
                            array('label'=>'Accessories', 'url'=>array('/accessory'),'items'=>array(
                                array('label'=>'Manage Accessories', 'url'=>array('/accessory/index')),
                                array('label'=>'Create Accessory', 'url'=>array('/accessory/create')),
                                array('label'=>'View Accessory', 'url'=>array('/accessory/view'), 'itemOptions'=>array('class'=>'hidden')),
                                )),
                            array('label'=>'Input/Output', 'url'=>array('/io'),'items'=>array(
                                array('label'=>'Manage Input/Output', 'url'=>array('/io/index')),
                                array('label'=>'Create Input/Output', 'url'=>array('/io/create')),
                                array('label'=>'View Input/Output', 'url'=>array('/io/view'), 'itemOptions'=>array('class'=>'hidden')),
                                )),
                            array('label'=>'Languages', 'url'=>array('/language'),'items'=>array(
                                array('label'=>'Manage Languages', 'url'=>array('/language/index')),
                                array('label'=>'Create Language', 'url'=>array('/language/create')),
                                array('label'=>'View Language', 'url'=>array('/language/view'), 'itemOptions'=>array('class'=>'hidden')),
                                )),
                            array('label'=>'Networks', 'url'=>array('/network'),'items'=>array(
                                array('label'=>'Manage Networks', 'url'=>array('/network/index')),
                                array('label'=>'Create Network', 'url'=>array('/network/create')),
                                array('label'=>'View Network', 'url'=>array('/network/view'), 'itemOptions'=>array('class'=>'hidden')),
                                )),
                            array('label'=>'Sensors', 'url'=>array('/sensor'),'items'=>array(
                                array('label'=>'Manage Sensors', 'url'=>array('/sensor/index')),
                                array('label'=>'Create Sensor', 'url'=>array('/sensor/create')),
                                array('label'=>'View Sensor', 'url'=>array('/sensor/view'), 'itemOptions'=>array('class'=>'hidden')),
                                )),
                        ),
                    )); ?>
                </div>
                <!-- /nav -->
            </div>
            
        </div>
    </body>
</html>         
