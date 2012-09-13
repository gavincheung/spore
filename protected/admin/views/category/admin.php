<?php
$this->breadcrumbs=array(
	Yii::t('UI','Categories')=>array('index'),
	Yii::t('UI','Manage'),
);

$this->menu=array();
?>

<h1><?php echo Yii::t('UI','Manage Categories'); ?></h1>

<?php $this->widget('ext.tree.widgets.TreeWidget',array('modelName'=>'Category', 'model'=>$model)); ?>
