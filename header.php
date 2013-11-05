<!DOCTYPE html>
<html>
<head>
	<title>
	<?php	
	if($page_title!=null){
		echo $page_title;
	}else{
		echo "煌辉袜业";
	}
	?>
	</title>
	<link rel=stylesheet type=text/css href=css/main.css />
	<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet"/>
	<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet" />
	
</head>
<body>
<div class="wrapper">

<!--
<header>
<h1></h1>

<a href="http://shop61924408.taobao.com" class="btn">转到我的淘宝店</a>
</header>
-->
<br/>
<div class="navbar">
	<div class="navbar-inner">
	<ul class="nav nav-tabs">
		<li><a href="index.php"><i class="icon-home"></i>煌辉袜业</a></li>
		<li><a href="product.php"><i class="icon-list"></i>产品列表</a></li>
		<li><a href="contact.php"><i class="icon-phone"></i>联系方式</a></li>
		<li><a href="message.php"><i class="icon-comments"></i>留言</a></li>
		<li><a href="aboutme.php"><i class="icon-user"></i>关于我</a></li>
		<li><a href="http://shop61924408.taobao.com"><i class="icon-shopping-cart"></i>淘宝</a></li>
	</ul>
	<form class="navbar-form pull-right">
		<input type="text" class="span2" placeholder="您想要什么，试试搜索" accesskey="s"/>
		<button type="submit" class="btn">搜索</button>
	</form>
	</div>
</div>




