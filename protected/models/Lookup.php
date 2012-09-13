<?php

/**
 * 表 {{lookup}} 的模型类
 *
 * 以下为表的列：
 * @property integer $id
 * @property string $name
 * @property integer $code
 * @property string $type
 * @property integer $position
 */
class Lookup extends CommonActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Lookup the static model class
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
		return '{{lookup}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, code, type, position', 'required'),
			array('code, position', 'numerical', 'integerOnly'=>true),
			array('name, type', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, code, type, position', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'code' => 'Code',
			'type' => 'Type',
			'position' => 'Position',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('code',$this->code);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('position',$this->position);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * @param array 用于临时存储某个类型的键值对数据
	 */
	private static $_items=array();

	/**
	 * 返回一个属于指定类型的字符串列表
	 * @param string 键值对类型
	 */
	public static function items($type)
	{
		if(!isset(self::$_items[$type])) //! here!!!!
			self::loadItems($type);
		return self::$_items[$type];
	}

	/**
	 * 按指定的类型和指定的值返回一个具体的字符串
	 * @param string 指定的类型
	 * @param integer 指定的值
	 */
	public static function item($type,$code)
	{
		if(!isset(self::$_items[$type]))//! here !!!!
			self::loadItems($type);
		return isset(self::$_items[$type][$code]) ? self::$_items[$type][$code] : false;
	}
	
	/**
	 * 加载指定的类型的键值对数据
	 * @param string 指定的类型
	 */
	private static function loadItems($type)
	{
		self::$_items[$type]=array();

		$models=self::model()->findAll(array(
			'condition' => 'type=:type',
			'params' => array(':type'=>$type),
			'order' => 'position',
		));

		foreach($models as $model)
			self::$_items[$type][$model->code]=Yii::t('models/Post', $model->name);
	}
}