<?php
$this->breadcrumbs=array(
	Yii::t('UI', 'Users')=>array('index'),
	Yii::t('UI', 'Reset Password'),
);
?>

<h1>Change password</h1>

<?php echo $this->renderPartial('_form_reset_password',array('model'=>$model)); ?>