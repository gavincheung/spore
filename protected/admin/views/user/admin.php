<?php
$this->breadcrumbs=array(
	Yii::t('UI', 'Users')=>array('index'),
	Yii::t('UI', 'Manage'),
);

$this->menu=array(
	array('label'=>Yii::t('UI', 'Create User'), 'icon'=>'icon-plus', 'type'=>'', 'url'=>array('create')),
);

?>

<h1><?php echo Yii::t('UI', 'Manage Users'); ?></h1>

<?php $this->widget('bootstrap.widgets.BootGridView',array(
	'id'=>'user-grid',
	'type'=>'striped bordered',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'template'=>'{items}{pager}{summary}<span class="loading"></span>',
	'columns'=>array(
		'id',
		'email',
		'username',
		'last_login_time',
		/*'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',
		*/
		array(
			'class'=>'bootstrap.widgets.BootButtonColumn',
			'template'=>'{view}{delete}',
		),
	),
)); ?>
