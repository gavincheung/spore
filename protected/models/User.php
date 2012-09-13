<?php

/**
 * This is the model class for table "{{user}}".
 *
 * The followings are the available columns in table '{{user}}':
 * @property integer $id
 * @property string $email
 * @property string $username
 * @property string $salt
 * @property string $password
 * @property integer $last_login_time
 * @property string $create_time
 * @property integer $create_user_id
 * @property string $update_time
 * @property integer $update_user_id
 */
class User extends CommonActiveRecord
{
	/**
	 * @var string 用于密码比对
	 */
	public $password_repeat;

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{user}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email, username, password, password_repeat, password_old_comfirm', 'required'),
			array('email, username, salt, password', 'length', 'max'=>256),
			array('email, username', 'unique'),
			// password_repeat与数据表没有对应关系，必须声明其为安全属性
			array('password_repeat, password_old_comfirm', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, email, username', 'safe', 'on'=>'search'),
			array('password', 'compare'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'posts' => array(self::HAS_MANY, 'Post', 'create_user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' 					=> 'ID',
			'email' 				=> Yii::t('models/User', 'email'),
			'username' 				=> Yii::t('models/User', 'username'),
			'salt' 					=> Yii::t('models/User', 'salt'),
			'password' 				=> Yii::t('models/User', 'password'),
			'password_repeat' 		=> Yii::t('models/User', 'password_repeat'),
			'password_old_comfirm' 	=> Yii::t('models/User', 'password_old_comfirm'),
			'last_login_time' 		=> Yii::t('models/User', 'last_login_time'),
			'create_time' 			=> Yii::t('models/User', 'create_time'),
			'create_user_id' 		=> Yii::t('models/User', 'create_user_id'),
			'update_time' 			=> Yii::t('models/User', 'update_time'),
			'update_user_id' 		=> Yii::t('models/User', 'update_user_id'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('last_login_time',$this->last_login_time);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('create_user_id',$this->create_user_id);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('update_user_id',$this->update_user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * 检验密码合法性
	 * @param string 待验证密码
	 * @return boolean 密码是否合法
	 */
	public function validatePassword($password)
	{
		return $this->hashPassword($password,$this->salt)===$this->password;
	}

	/**
	 * 生成密码散列
	 * @param string 密码
	 * @param string Salt值
	 * @return string 散列值
	 */
	public function hashPassword($password,$salt)
	{
		return md5($salt.$password);
	}

	/**
	 * 随机生成Salt值用于密码加密
	 * @return string Salt值
	 */
	protected function generateSalt()
	{
		return uniqid('',true);
	}

	/**
	 * 模型属性检验后用Salt值生成密码
	 */
	protected function afterValidate()
	{
		parent::afterValidate();
		$this->salt = $this->generateSalt();
		$this->password = $this->hashPassword($this->password,$this->salt);
	}
	
}