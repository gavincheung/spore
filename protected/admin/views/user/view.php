<?php
$this->breadcrumbs=array(
	Yii::t('UI', 'Users')=>array('index'),
	$model->username,
);

$this->menu=array(
	array('label'=>Yii::t('UI', 'Create User'), 'icon'=>'icon-plus', 'type'=>'', 'url'=>array('create')),
	array('label'=>Yii::t('UI', 'Manage Users'), 'icon'=>'icon-cog', 'type'=>'', 'url'=>array('index')),
	array('label'=>Yii::t('UI', 'Delete User'), 'icon'=>'icon-trash', 'url'=>'#','htmlOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1><?php echo Yii::t('UI', 'View User'); ?> #<?php echo $model->id; ?> <?php echo $model->username; ?></h1>

<?php $this->widget('bootstrap.widgets.BootDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'email',
		'username',
		'password',
		'salt',
		'last_login_time',
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
