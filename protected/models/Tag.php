<?php

/**
 * This is the model class for table "{{tag}}".
 *
 * The followings are the available columns in table '{{tag}}':
 * @property integer $id
 * @property string $name
 * @property integer $frequency
 * @property string $create_time
 * @property integer $create_user_id
 * @property string $update_time
 * @property integer $update_user_id
 *
 * The followings are the available model relations:
 * @property Post[] $tblPosts
 */
class Tag extends CommonActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Tag the static model class
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
		return '{{tag}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('frequency', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>64),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, frequency', 'safe', 'on'=>'search'),
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
			'frequency' => 'Frequency',
			'create_time' => 'Create Time',
			'create_user_id' => 'Create User',
			'update_time' => 'Update Time',
			'update_user_id' => 'Update User',
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
		$criteria->compare('frequency',$this->frequency);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('create_user_id',$this->create_user_id);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('update_user_id',$this->update_user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * 更新标签
	 * @param string 原标签
	 * @param string 要更新的目标标签
	 */
	public function updateFrequency($oldTags, $newTags)
	{
		$oldTags=self::string2array($oldTags);
		$newTags=self::string2array($newTags);
		$this->addTags(array_values(array_diff($newTags, $oldTags)));
		$this->removeTags(array_values(array_diff($oldTags, $newTags)));
	}

	/**
	 * 添加标签
	 * @param array 要添加的标签数组
	 */
	public function addTags($tags)
	{
		// 已存在相应标签，该标签使用频率增加1
		$criteria = new CDbCriteria;
		$criteria->addInCondition('name', $tags);
		$this->updateCounters(array('frequency'=>1), $criteria);

		// 新标签入库
		foreach($tags as $name)
		{
			if(!$this->exists('name=:name', array(':name'=>$name)))
			{
				$tag = new Tag();
				$tag->name = $name;
				$tag->frequency = 1;
				$tag->save();
			}
		}
	}

	/**
	 * 删除标签
	 * @param array 要删除的标签数组
	 */
	public function removeTags($tags)
	{
		if(empty($tags)) return;	

		$criteria = new CDbCriteria;
		$criteria->addInCondition('name', $tags);
		$this->updateCounters(array('frequency'=>-1), $criteria);
		$this->deleteAll('frequency<=0');
	}

	/**
	 * 将标签字符串转化成数组
	 * @param string 要转化的字符串，英文逗号分隔，如：" a, b, ,c"
	 * @return array 转化的目标数组，如上转化为：array(0=>"a",1=>"b",2=>"c")
	 */
	public static function string2array($tags)
	{
		return preg_split("/\s*,\s*/", trim($tags), -1, PREG_SPLIT_NO_EMPTY);
	}

	/**
	 * 将标签数组转化成字符串形式
	 * @param string 要转化的数组，英文逗号分隔，如：array(0=>"a",1=>"b",2=>"c")
	 * @return array 转化的目标字符串，如上转化为："a,b,c"
	 */
	public static function array2string($tags)
	{
		return implode(',', $tags);
	}

}