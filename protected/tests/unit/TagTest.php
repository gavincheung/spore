<?php

/**
 * 标签测试
 */
class TagTest extends CDbTestCase
{
	/**
	 * 夹具数据
	 */
	public $fixtures = array(
		'post' => 'Post',
		'tags' => 'Tag',
	);

	/**
	 * 测试标签的添加和删除操作
	 */
	public function testTagsOperation()
	{
		// 测试添加操作
		$tagsToAdd = array("test tag1", "test tag3");

		Tag::model()->addTags($tagsToAdd);

		$tag1 = $this->tags('tag1');
		$this->assertEquals(4, $tag1->frequency);

		$retrievedTag = Tag::model()->findByPk(3);
		$this->assertTrue($retrievedTag instanceof Tag);
		$this->assertEquals(1, $retrievedTag->frequency);

		// 测试删除操作
		$tagsToDelete = array("test tag3");

		Tag::model()->removeTags($tagsToDelete);

		$deletedTag = Tag::model()->findByPk(3);
		$this->assertEquals(NULL, $deletedTag);
	}

	/**
	 * 测试将标签字符串转化成数组
	 */
	public function testStringToArray()
	{
		// 为测试定义一个字符串和目标数组
		$testString = " a,b, ,c";
		$testArray = array(
			0 => "a",
			1 => "b",
			2 => "c",
		);

		$result = Tag::string2array($testString);
		$this->assertTrue(is_array($result));
		$this->assertEquals($testArray, $result);
	}

	/**
	 * 测试将数组转化成字符串
	 */
	public function testArrayToString()
	{
		// 为测试定义一个数组和目标字符串
		$testArray = array(
			0 => "a",
			1 => "b",
			2 => "c",
		);
		$testString = "a,b,c";

		$result = Tag::array2string($testArray);
		$this->assertTrue(is_string($result));
		$this->assertEquals($testString, $result);
	}

}

