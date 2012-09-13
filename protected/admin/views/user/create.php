<?php
$this->breadcrumbs=array(
	Yii::t('UI', 'Users')=>array('index'),
	Yii::t('UI', 'Create'),
);

$this->menu=array(
	array('label'=>Yii::t('UI', 'Manage Users'), 'icon'=>'icon-cog', 'type'=>'', 'url'=>array('index')),
);
?>

<h1><?php echo Yii::t('UI', 'Create User'); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>