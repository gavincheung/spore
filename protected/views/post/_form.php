<?php $form=$this->beginWidget('bootstrap.widgets.BootActiveForm',array(
	'id'=>'post-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->dropDownListRow($model,'type_id',Lookup::items('PostType')); ?>

	<?php echo $form->textFieldRow($model,'title',array('class'=>'span5','maxlength'=>256)); ?>

	<?php echo $form->textAreaRow($model,'summary',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'body',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->dropDownListRow($model,'source',Lookup::items('PostSource')); ?>

	<?php echo $form->dropDownListRow($model,'status',Lookup::items('PostStatus')); ?>

	<?php echo $form->textFieldRow($model,'tags',array('class'=>'span5','maxlength'=>256)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.BootButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
