<?php $form=$this->beginWidget('bootstrap.widgets.BootActiveForm',array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="alert alert-block alert-info help-block"><?php echo Yii::t('UI','Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('UI','are required'); ?>.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>256)); ?>

	<?php echo $form->textFieldRow($model,'username',array('class'=>'span5','maxlength'=>256)); ?>

	<?php echo $form->passwordFieldRow($model,'password',array('class'=>'span5','maxlength'=>256)); ?>

	<?php echo $form->passwordFieldRow($model,'password_repeat',array('class'=>'span5','maxlength'=>256)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.BootButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? Yii::t('UI', 'Create') : Yii::t('UI', 'Save'),
		)); ?>
	</div>

<?php $this->endWidget(); ?>
