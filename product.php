<!DOCTYPE html>
<html>
<head>
	<title><?php 
		echo "煌辉袜业-产品列表"; 
		?>
	</title>
	<link rel=stylesheet type=text/css href=css/main.css />
	<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet"/>
	<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet" />
		<link rel=stylesheet type=text/css href=css/product.css />
	<script type=text/javascript >
	function showProducts(id,page)
		{
		var xmlhttp;
		if(window.XMLHttpRequest)
			{
				xmlhttp=new XMLHttpRequest();
			}else{
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
		xmlhttp.onreadystatechange=function()
		{
				if(xmlhttp.readyState==4 && xmlhttp.status==200)
				{
					document.getElementById("shelf").innerHTML=xmlhttp.responseText;
				}
		}
		xmlhttp.open("GET","function.php?typeid="+id+"&page="+page+"&sid="+Math.random(),true);
		xmlhttp.send();
		}


	</script>

</head>
<body 
<?php
	$number_per_page=2;
	if(isset($_GET['tid'])){
					$id=$_GET['tid'];
					settype($id,integer);
					echo "onload=\"showProducts(".$id.",1)\"";
	}else{
					echo "onload=\"showProducts(0,1)\"";
	}
?>>
<div class="wrapper">
<?php
	include("connect.php");
	?>

<!--
<header>
<h1><?php	
	echo "煌辉袜业";
	?>
</h1>

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
		<input type="text" class="span2" placeholder="您想要什么，试试搜索" accesskey="s" />
		<button type="submit" class="btn">搜索</button>
	</form>
	</div>
</div>

<div style="position:relative;" >
<div id="nav-panel">
		<?php
			$sql="select * from `types` where `up`=0";
			$query=mysql_query($sql);
			if(mysql_num_rows($query)==0){
							echo "暂时没有最顶级分类";
			}else{
				echo  "<ul class=\"nav nav-list\">";
				echo "<li class=\"nav-header\">请选择一个分类</li>";
				while($rs=mysql_fetch_array($query)){
							?>
		<li class="first_level"><a href="#" onclick="showProducts(<?php echo $rs['id'] ?>,1)"><?php echo $rs['name'] ?></a></li>
		<?php
			$up=$rs['id'];
			$query2=mysql_query("select * from `types` where `up`='$up'");
					echo "<ul class=\"nav nav-list\">";
			if(mysql_num_rows($query2)!=0){
							while($rs2=mysql_fetch_array($query2)){
							?>
							<li class="second_level"><a href="#" onclick="showProducts(<?php echo $rs2['id'] ?>,1)"><?php echo $rs2['name'] ?></a></li>
				<?php
				$upper=$rs2['id'];
				$query3=mysql_query("select * from `types` where `up`='$upper'");
				if(mysql_num_rows($query3)!=0){
								echo "<ul class=\"nav nav-list\">";
								while($rs3=mysql_fetch_array($query3)){
							?>
											<li class="third_level"><a href="#" onclick="showProducts(<?php echo $rs3['id'] ?>,1)"><?php echo $rs3['name'] ?></a></li>
							<?php
									}
								echo "</ul>";
								}
							}
							echo "</ul>";

						}
					}
				echo "</ul>";
				}
?>

<hr/>
<div class="info">
如果这里没有列出你想要的东西，请给我<a href="message.php">留言</a>。
</div>

	</div>
	<div id="content-panel">
		<div id="choose">
		</div>
		<div id="shelf">

		</div>
		
	</div>

</div>


<?php
	include("footer.php");
	?>
