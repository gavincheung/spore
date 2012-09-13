<?php

/**
 * 文章测试
 */
class PostTest extends CDbTestCase
{
	/**
	 * 夹具数据
	 */
	public $fixtures = array(
		'posts' => 'Post',
		'users' => 'User',
	);

	/**
	 * 测试文章的创建
	 */
	public function testCreate()
	{
		$newPost = new Post;
		$newPostTitle = 'Test Post';

		$newPost->setAttributes(array(
			'type_id' => 0,
			'title' => $newPostTitle,
			'body' => 'This is test post',
			'summary' => 'Test summary',
			'tags' => 'tag1,tag2',
			'source' => 0,
			'hits' => 0,
			'status' => 0,
		));

		// 从夹具中取一个用户用于测试
		Yii::app()->user->setId($this->users('user1')->id);

		$this->assertTrue($newPost->save());

		$retrievedPost = Post::model()->findByAttributes(array('title'=>$newPostTitle));
		$this->assertTrue($retrievedPost instanceof Post);
		$this->assertEquals('tag1,tag2', $retrievedPost->tags);
		// 以下两项需要清空夹具数据
		// $this->assertEquals($newPostTitle, $retrievedPost->title);
		// $this->assertEquals(Yii::app()->user->id, $retrievedPost->create_user_id);

	}

	/**
	 * 测试某篇文章地址的获取
	 * @TODO
	 */
	/*public function testGetUrl()
	{
		// 从夹具取一个数据
		$post1 = $this->posts("post1");

		$testUrl = 'post/1?Test+post+1';

		$generatedUrl = $post1->getUrl();
		//$this->assertEquals($testUrl, $generatedUrl);
	}*/

}