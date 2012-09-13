<?php

/**
 * 字典数据测试
 */
class LookupTest extends CDbTestCase
{
	/**
	 * 夹具数据
	 */
	public $fixtures = array(
		'lookups' => 'Lookup',
	);

	/**
	 * 测试获取属于指定类型的字符串列表
	 */
	public function testLookupItems()
	{
		// 设定测试目标数组
		$testItems = array(
			0 => 'Industry News',
			1 => 'Company News',
			2 => 'Technical Documentation',
			3 => 'FAQ',
			4 => 'Product Related',
		);

		$result = Lookup::items('PostType');

		$this->assertTrue(is_array($result));
		$this->assertEquals($testItems, $result);
	}

	/**
	 * 按指定的类型和指定的值返回一个具体的字符串
	 */
	public function testLookupItem()
	{
		// 设定测试目标字串
		$testItem = 'Company News';

		$result = Lookup::item('PostType', Post::TYPE_COMPANY);

		$this->assertTrue(is_string($result));
		$this->assertEquals($testItem, $result);
	}
}