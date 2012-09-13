<?php
$this->breadcrumbs=array(
	Yii::t('UI', 'Posts')=>array('index'),
	Yii::t('UI', 'Create'),
);

$this->menu=array(
	array('label'=>Yii::t('UI', 'Manage Posts'), 'icon'=>'icon-cog', 'type'=>'', 'url'=>array('index')),
);
?>

<h1><?php echo Yii::t('UI', 'Create Post'); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>