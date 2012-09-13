<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title><?php echo Yii::app()->name . ' - Login'; ?></title>
	<style type="text/css">
	.form { position:absolute; left:50%; top:50%; width:430px; margin:-190px 0 0 -230px; }
	.form h1 { margin-bottom:20px; }
	.form .required span { display:none; }
	.form input { padding:8px; }
	.form .form-actions { border-top:0; padding:0; }
	</style>
</head>
<body>

	<div class="form">

	<?php $form=$this->beginWidget('bootstrap.widgets.BootActiveForm',array(
		'id'=>'login-form',
		'enableClientValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
		),
		'htmlOptions'=>array(
			'class'=>'well',
		),
	)); ?>

		<h1>Login</h1>

		<?php echo $form->textFieldRow($model,'username',array('class'=>'span5','maxlength'=>256)); ?>

		<?php echo $form->passwordFieldRow($model,'password',array('class'=>'span5','maxlength'=>256)); ?>

		<?php echo $form->checkBoxRow($model, 'rememberMe'); ?>

		<div class="form-actions">
			<?php $this->widget('bootstrap.widgets.BootButton', array(
				'buttonType'=>'submit',
				'type'=>'primary',
				'size'=>'large',
				'label'=>'Login',
			)); ?>
		</div>

	<?php $this->endWidget(); ?>
	</div><!-- form -->

</body>
</html>
