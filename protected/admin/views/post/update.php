<?php
$this->breadcrumbs=array(
	Yii::t('UI', 'Posts')=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	Yii::t('zii', 'Update'),
);

$this->menu=array(
	array('label'=>Yii::t('UI', 'Create Post'), 'icon'=>'icon-plus', 'type'=>'', 'url'=>array('create')),
	array('label'=>Yii::t('UI', 'Manage Posts'), 'icon'=>'icon-cog', 'type'=>'', 'url'=>array('index')),
);
?>

<h1><?php echo Yii::t('UI', 'Update Post'); ?> <?php echo $model->id; ?> <?php echo $model->title; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>