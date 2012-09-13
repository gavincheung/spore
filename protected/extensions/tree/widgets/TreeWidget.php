<?php
class TreeWidget extends CWidget {
	
	public $modelName;
	public $model;
	
	public function init() {
		if($this->modelName===null)
			throw new CException(Yii::t('yii','{class} must specify "modelName" property values.',array('{class}'=>get_class($this))));

	}
	
	public function run() {
		$this->render('treeWidget', array('model'=>$this->model));
	}
	
	public function createUrl($route,$params=array(),$ampersand='&') {
		$params['modelName']=$this->modelName;
		return $this->getController()->createUrl($route,$params,$ampersand);
	}
	
}