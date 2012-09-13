<?php $form=$this->beginWidget('bootstrap.widgets.BootActiveForm',array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php $this->widget('bootstrap.widgets.BootAlert'); ?>

	<p class="alert alert-block alert-info help-block"><?php echo Yii::t('UI','Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('UI','are required'); ?>.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->passwordFieldRow($model,'password_old',array('class'=>'span5','maxlength'=>256)); ?>

	<?php echo $form->passwordFieldRow($model,'password',array('class'=>'span5','maxlength'=>256)); ?>

	<?php echo $form->passwordFieldRow($model,'password_repeat',array('class'=>'span5','maxlength'=>256)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.BootButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>Yii::t('UI', 'Save'),
		)); ?>
	</div>

<?php $this->endWidget(); ?>
