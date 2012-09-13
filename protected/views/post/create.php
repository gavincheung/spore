<?php
$this->breadcrumbs=array(
	'Posts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Manage Post', 'type'=>'primary', 'url'=>array('admin')),
);
?>

<h1>Create Post</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>