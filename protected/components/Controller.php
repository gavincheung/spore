<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends SBaseController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

	/**
	 * 初始化方法(用来解除 srbac.css)
	 */
	public function beforeAction($action)
	{
	    parent::beforeAction($action);
	 	
	 	// 解除因继承SBaseController而导致srbac引入的问题
	    Yii::app()->clientscript->scriptMap['srbac.css'] = false;
	 
	    return true;
	}

}