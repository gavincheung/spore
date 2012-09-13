<?php
/**
 * ModifyPasswordForm class.
 */
class ModifyPasswordForm extends CFormModel
{
	public $password;
    public $password_repeat;

    private $_identity;

	/**
	 * @var string 修改密码时用于确认用户权限
	 */
	public $password_old;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
		    array('password, password_repeat, password_old', 'required'),
			array('password, password_repeat', 'length','min'=>6),
			array('password', 'compare', 'compareAttribute'=>'password_repeat'),
			array('password_old', 'authenticate'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'password_old' => Yii::t('models/ModifyPasswordForm', 'password_old'),
			'password' => Yii::t('models/ModifyPasswordForm', 'password'),
			'password_repeat' => Yii::t('models/ModifyPasswordForm', 'password_repeat'),
		);
	}

	/**
	 * 验证输入的密码是否为当前用户密码
	 * 在 rules() 中添加验证规则
	 */
	public function authenticate($attribute,$params)
	{
		$user=User::model()->findByPk(Yii::app()->user->id);

		if(!$this->hasErrors())
		{
			$this->_identity=new UserIdentity($user->username,$this->password_old);
			if(!$this->_identity->authenticate())
				$this->addError('password_old','Incorrect password.');
		}
	}
	
}