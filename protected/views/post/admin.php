<?php
$this->breadcrumbs=array(
	'Posts'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Post','url'=>array('index')),
	array('label'=>'Create Post','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('post-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Posts</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.BootGridView',array(
	'id'=>'post-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		array(
			'name' => 'type_id',
			'value' => 'CHtml::encode(Lookup::item(\'PostType\', $data->type_id))',
			'filter' => Lookup::items('PostType'),
		),
		'title',
		'summary',
		'body',
		array(
			'name' => 'source',
			'value' => 'CHtml::encode(Lookup::item(\'PostSource\', $data->source))',
			'filter' => Lookup::items('PostSource'),
		),
		'hits',
		array(
			'name' => 'status',
			'value' => 'CHtml::encode(Lookup::item(\'PostStatus\', $data->status))',
			'filter' => Lookup::items('PostStatus'),
		),
		'tags',
		/*
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
