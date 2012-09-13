<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	<!-- 960 CSS framework -->
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/960/reset.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/960/text.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/960/960.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/default/main.css">
</head>
<body>
	<div id="header" class="container_16">
		<div class="grid_16 head-top">
			<h1 class="logo"><a href="#"><img src="../images/logo.png" alt="冀桥建材有限公司"/></a></h1>
			<!-- /logo -->
		</div>

		<div class="grid_16 banner"><img src="http://placehold.it/940x220/cccccc/e3e3e3" alt="冀桥建材有限公司" /></div>
		<!-- /头图 -->

		<div class="grid_16 nav">
			<ul>
				<li><a href="#">首页</a></li>
				<li class="active"><a href="#">企业简介</a></li>
				<li><a href="#">产品中心</a></li>
				<li><a href="#">新闻资讯</a></li>
				<li><a href="#">井盖技术</a></li>
				<li><a href="#">常见问题</a></li>
				<li><a href="#">联系我们</a></li>
			</ul>
		</div>
		<!-- /主导航 -->

		<div class="search-bar clearfix">
			<div class="grid_4 omega search-box">
				<input type="text"><button class="btn" type="submit"><i class="icon-search"></i> Search</button>
			</div>
			<!-- /搜索框 -->

			<div class="grid_11 hot-keywords">
				<strong>热门搜索：</strong><a href="#">井盖</a>|<a href="#">铸造井盖</a>|<a href="#">铸铁井盖</a>|<a href="#">市政井盖</a>|<a href="#">雨水井盖</a>|<a href="#">热力井盖</a>|<a href="#">自来水井</a>
			</div>
		</div>
	</div>

	<?php echo $content; ?>
	
	<div id="footer">
		<div class="container_16 clearfix">
			<div class="foot-links grid_7"><a href="#">首页</a>|<a href="#">企业简介</a>|<a href="#">产品中心</a>|<a href="#">业界新闻</a>|<a href="#">常见问题</a>|<a href="#">联系我们</a></div>
			<div class="copyright grid_9">
				<p>Copyright &copy; 2011 东莞市冀桥建材有限公司 版权所有 网站备案号：粤ICP备10078293号</p>
				<p>厂址：东莞市大岭山镇 电话：0769-23661007</p>
			</div>
		</div>
	</div>
</body>
</html>