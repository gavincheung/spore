<?php
$this->breadcrumbs=array(
	Yii::t('UI', 'Posts')=>array('index'),
	Yii::t('UI', 'Manage'),
);

$this->menu=array(
	array('label'=>Yii::t('UI', 'Create Post'), 'icon'=>'icon-plus', 'type'=>'', 'url'=>array('create')),
);

?>

<h1><?php echo Yii::t('UI', 'Manage Posts'); ?></h1>

<?php $this->widget('bootstrap.widgets.BootGridView',array(
	'id'=>'post-grid',
	'type'=>'striped bordered',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'template'=>'{items}{pager}{summary}<span class="loading"></span>',
	'columns'=>array(
		/*'id',*/
		'title',
		array(
			'name' => 'type_id',
			'value' => 'CHtml::encode(Lookup::item(\'PostType\', $data->type_id))',
			'filter' => Lookup::items('PostType'),
		),
		/*'summary',
		'body',*/
		array(
			'name' => 'source',
			'value' => 'CHtml::encode(Lookup::item(\'PostSource\', $data->source))',
			'filter' => Lookup::items('PostSource'),
		),
		/*'hits',*/
		array(
			'name' => 'status',
			'value' => 'CHtml::encode(Lookup::item(\'PostStatus\', $data->status))',
			'filter' => Lookup::items('PostStatus'),
		),
		/*'tags',
		'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',
		*/
		array(
			'class'=>'bootstrap.widgets.BootButtonColumn',
		),
	),
)); ?>
