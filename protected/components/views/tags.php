<?php foreach($labels as $label):?>
	<?php echo CHtml::link(CHtml::encode($label), Yii::app()->createUrl($controllerId.'/index', array('tag'=>$label))); ?>
<?php endforeach;?>