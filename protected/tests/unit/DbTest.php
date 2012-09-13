<?php 

/**
* 测试数据库连接
*/
class DbTest extends CTestCase
{
	public function testConnection()
	{
		$this->assertNotEquals(NULL, Yii::app()->db);
	}
}