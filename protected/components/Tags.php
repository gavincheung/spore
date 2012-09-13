<?php
/**
 * 标签组件类
 */
class Tags extends CWidget
{
	/**
	 * @var array 标签名称
	 */
	public $labels;

	public function init()
	{
		# code...
	}

	public function run()
	{
		$this->render('tags', array(
			'labels'=>$this->labels,
			'controllerId'=>$this->controller->id,
		));
	}
}