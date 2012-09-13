<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/main.css" />
    </head>
    <body>
        
        <div class="operation-bar">
            <?php if(isset($this->menu)): // menu属性定义在view文件里 ?>
                <?php foreach($this->menu as $item): ?>
                    <?php $this->widget('bootstrap.widgets.BootButton', $item); ?>
                <?php endforeach;?>
            <?php endif;?>

            <?php if(isset($this->breadcrumbs)):?>
                <?php $this->widget('bootstrap.widgets.BootBreadcrumbs', array(
                    'separator'=> '<em>&gt;</em>',
                    'links'=> $this->breadcrumbs, // Property 'breadcrumbs' is defined in the view files.
                    'homeLink'=>CHtml::link('<i class="icon-home"></i> '.Yii::t('UI', 'Home'), $this->createUrl('site/dashboard')),
                )); ?>
            <?php endif; ?>
            <!-- /Breadcrumbs -->
        </div>
        <div class="page-contents">
            <div class="page-in">
                <?php echo $content; ?>
            </div>
        </div>
    </body>
</html>         
