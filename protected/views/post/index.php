<?php
$this->breadcrumbs=array(
	'Posts',
);

$this->menu=array(
	array('label'=>'Create Post','url'=>array('create')),
	array('label'=>'Manage Post','url'=>array('admin')),
);
?>

<h1>Posts<?php if(!empty($_GET['tag'])):?> tagged with <i><?php echo CHtml::encode($_GET['tag']);?></i><?php endif; ?></h1>

<?php $this->widget('bootstrap.widgets.BootListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'template' => "{items}\n{pager}"
)); ?>
