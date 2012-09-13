<?php
$this->breadcrumbs=array(
	'Posts'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Post','url'=>array('index')),
	array('label'=>'Create Post','url'=>array('create')),
	array('label'=>'Update Post','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Post','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Post','url'=>array('admin')),
);
?>

<h1>View Post #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.BootDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		array(
			'name'=>'type_id',
			'value'=>CHtml::encode(Lookup::item('PostType', $model->type_id)),
		),
		'title',
		'summary',
		'body',
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
	),
)); ?>
