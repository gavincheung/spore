<?php
/**
* 分类测试
*/
class CategoryTest extends CDbTestCase
{
	public $fixtures = array(
		'categories' => 'Category',
	);

	public function testGetAttribute()
	{
		$category1 = $this->categories('category1');
        var_dump($category1->getAttributes(array('name')));

        // $this->assertEquals(array('产品分类'), $category1->getAttributes(array('name')));
	}

	public function testCountChildren()
	{
		$category1 = $this->categories('category1');
		$this->assertEquals(3, $category1->count);
	}
}