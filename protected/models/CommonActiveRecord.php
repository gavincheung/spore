<?php

/**
 * 用来更新相关公共字段逻辑
 */
abstract class CommonActiveRecord extends CActiveRecord 
{
	/**
	 * 在验证开始之前自动设置创建时间、创建者、更新时间、更新者
	 */
	protected function beforeValidate()
	{
		if($this->isNewRecord)
		{
			$this->create_time = $this->update_time = new CDbExpression('NOW()');
			$this->create_user_id = $this->update_user_id = Yii::app()->user->id;
		}
		else
		{
			$this->update_time = new CDbExpression('NOW()');
			$this->update_user_id = Yii::app()->user->id;
		}

		return parent::beforeValidate();
	}

	/**
	 * 获取创建者用户名
	 */
	public function getCreator()
	{
		if(isset($this->create_user_id))
		{
			return User::model()->findByPk($this->create_user_id);
		}
	}

	/**
	 * 获取更新者用户名
	 */
	public function getUpdater()
	{
		if(isset($this->update_user_id))
		{
			return User::model()->findByPk($this->update_user_id);
		}
	}
}