<?php
$this->breadcrumbs=array(
	Yii::t('UI', 'Posts')=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>Yii::t('UI', 'Create Post'), 'icon'=>'icon-plus', 'type'=>'', 'url'=>array('create')),
	array('label'=>Yii::t('UI', 'Manage Posts'), 'icon'=>'icon-cog', 'type'=>'', 'url'=>array('index')),
	array('label'=>Yii::t('UI', 'Update Post'), 'icon'=>'icon-pencil', 'url'=>array('update','id'=>$model->id)),
	array('label'=>Yii::t('UI', 'Delete Post'), 'icon'=>'icon-trash', 'url'=>'#','htmlOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1><?php echo Yii::t('UI', 'View Post'); ?> #<?php echo $model->id; ?> <?php echo $model->title; ?></h1>

<?php $this->widget('bootstrap.widgets.BootDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		array(
			'name'=>'type_id',
			'value'=>CHtml::encode(Lookup::item('PostType', $model->type_id)),
		),
		'title',
		array(
			'name'=>'source',
			'value'=>CHtml::encode(Lookup::item('PostSource', $model->source)),
		),
		'hits',
		array(
			'name'=>'status',
			'value'=>CHtml::encode(Lookup::item('PostStatus', $model->status)),
		),
		'tags',
		'create_time',
		array(
			'name' => 'create_user_id',
			'value' => CHtml::encode($model->creator->username),
		),
		'update_time',
		array(
			'name' => 'update_user_id',
			'value' => CHtml::encode($model->updater->username),
		),
		'summary',
		'body',
	),
)); ?>
