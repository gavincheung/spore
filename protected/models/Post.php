<?php

/**
 * This is the model class for table "{{post}}".
 *
 * The followings are the available columns in table '{{post}}':
 * @property integer $id
 * @property integer $type_id
 * @property string $title
 * @property string $summary
 * @property string $body
 * @property integer $source
 * @property integer $hits
 * @property integer $status
 * @property string $tags
 * @property string $create_time
 * @property integer $create_user_id
 * @property string $update_time
 * @property integer $update_user_id
 */
class Post extends CommonActiveRecord
{
	/**
	 * 文章类型
	 */
	const TYPE_INDUSTRY = 0; // 业界：关于业界的一些文章、新闻或讨论可以归纳到这个类别
	const TYPE_COMPANY = 1; // 企业：公司的一些通知、政策法规等可以归纳到这个类别
	const TYPE_TECHNICAL = 2; // 技术：关于一些技术性的文章可以归纳到这个类别
	const TYPE_FAQ = 3; // 问答：解答疑难的文章可以归纳到这个类别
	const TYPE_PRODUCT = 4; // 产品：关于产品的一些介绍和周边信息可以归纳到这个类别

	/**
	 * 文章来源
	 */
	const SOURCE_WEB = 0; // 来自互联网
	const SOURCE_ORIGINAL = 1; // 原创

	/**
	 * 文章状态
	 */
	const STATUS_DRAFT = 0; // 文章尚未完成，对外不可见
	const STATUS_AUDIT = 1; // 文章已完成正在被审核，对外不可见
	const STATUS_PUBLISHED = 2; // 文章已发布，对外可见

	/**
	 * @var string 用于临时保存文章原有的标签数据
	 */
	private $_oldTags;

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Post the static model class
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
		return '{{post}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type_id, title', 'required'),
			array('type_id, source, hits, status', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>256),
			array('summary', 'length', 'max'=>2000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, type_id, title, summary, body, source, hits, status', 'safe', 'on'=>'search'),
			array('tags', 'match', 'pattern'=>'/^[\w\s,]+$/', 'message'=>'Tags can only contain word characters.'),
			// 自定义格式化标签过滤器
			array('tags', 'normalizeTags'),
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
			'creator' => array(self::BELONGS_TO, 'User', 'create_user_id'),
			'updater' => array(self::BELONGS_TO, 'User', 'update_user_id'),
			'tags' => array(self::MANY_MANY, 'Tag', '{{post_tag_assignment}}(tag_id, post_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' 				=> 'ID',
			'type_id' 			=> Yii::t('models/Post', 'type'),
			'title' 			=> Yii::t('models/Post', 'title'),
			'summary' 			=> Yii::t('models/Post', 'summary'),
			'body' 				=> Yii::t('models/Post', 'body'),
			'source' 			=> Yii::t('models/Post', 'source'),
			'hits' 				=> Yii::t('models/Post', 'hits'),
			'status' 			=> Yii::t('models/Post', 'status'),
			'tags' 				=> Yii::t('models/Post', 'tags'),
			'create_time' 		=> Yii::t('models/Post', 'create_time'),
			'create_user_id' 	=> Yii::t('models/Post', 'create_user_id'),
			'update_time' 		=> Yii::t('models/Post', 'update_time'),
			'update_user_id' 	=> Yii::t('models/Post', 'update_user_id'),
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
		$criteria->compare('type_id',$this->type_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('summary',$this->summary,true);
		$criteria->compare('body',$this->body,true);
		$criteria->compare('source',$this->source);
		$criteria->compare('hits',$this->hits);
		$criteria->compare('status',$this->status);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('create_user_id',$this->create_user_id);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('update_user_id',$this->update_user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=>Yii::app()->params['pageSize'],
			),
		));
	}

	/**
	 * 格式化标签
	 */
	public function normalizeTags($attribute,$params)
	{
		$this->tags=Tag::array2string(array_unique(Tag::string2array($this->tags)));
	}

	/**
	 * 创建文章链接
	 */
	public function getUrl()
	{
		return Yii::app()->createUrl('post/view', array(
			'id' => $this->id,
			'title' => $this->title,
		));
	}

	/**
	 * 文章保存后，标签做相应的更新操作
	 */
	protected function afterSave()
	{
		parent::afterSave();
		Tag::model()->updateFrequency($this->_oldTags, $this->tags);
	}

	/**
	 * 临时记录文章的原有标签数据
	 */
	protected function afterFind()
	{
		parent::afterFind();
		$this->_oldTags = $this->tags;
	}

}