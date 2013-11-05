<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	<title><?php 
		echo "欢迎光临煌辉袜业网站"; 
		?>
	</title>
	<link rel=stylesheet type=text/css href=css/mainb.css />
	<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet"/>
	<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet" />
<script type="text/javascript" charset="utf-8" src="ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="ueditor/ueditor.all.js"></script>
<script type="text/javascript" charset="utf-8" src="lang/zh-cn/zh-cn.js"></script>


</head>
<body>
<?php
	include("connect.php");
	session_start();
	if(!isset($_SESSION['admin']) || $_SESSION['admin']!=true){
					$url=$_SERVER['PHP_SELF'];
					if(!preg_match("/(manage)\.(php)/",$url)){
					header("location:manage.php");
					exit;
		}
	}
	?>

<div class="navbar">
	<div class="navbar-inner">
		<a href="manage.php" class="brand"><i class="icon-dashboard"></i>控制中心</a>
		<ul class="nav nav-pills">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-shopping-cart"></i>商品管理<b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li><a href="show-products.php">查看/编辑商品</a></li>
						<li><a href="add-product.php">添加商品</a></li>
						<li><a href="edit-types.php">编辑分类</a></li>
					</ul>
				</li>
				<li><a href="#"><i class="icon-exchange"></i>首页轮播内容</a></li>
				<li><a href="hot-keys.php"><i class="icon-bar-chart"></i>热门词汇</a></li>
				<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i>个人信息<b class="caret"></b>
				</a>
				<ul class="dropdown-menu">
					<li><a href="my-information.php">联络信息</a></li>
					<li><a href="my-about.php">关于我</a></li>
				</ul>
				</li>
				<li><a href="check-messages.php"><i class="icon-comments"></i>查看留言</a></li>
				<li><a href="#"><i class="icon-shield"></i>联系网管</a></li>
				<li class="divider-vertical"></li>
		</ul>
		<ul class="nav nav-tabs pull-right">
			<li><a href="index.php"><i class="icon-home"></i>查看首页</a></li>
			<li><a href="site-config.php"><i class="icon-gear"></i>更改登录信息</a></li>
			<li><a href="#" onclick="logout()"><i class="icon-off"></i>退出登录</a></li>
		</ul>
	</div>
</div>
<div class="main">





