<?php
	include("header-back.php");
	include("connect.php");
	?>
<?php
	$sql="select * from `site` where `id`=1";
				$query=mysql_query($sql);
				if($query){
					$rs=mysql_fetch_array($query);
				}

	?>

<div class=" normal">
<h3>当前登录名称</h3>
<h4>	<?php echo $rs['name'] ?></h4>
	<div id="logname">
		<button type="button" class="btn" onclick="changeLogName()">修改登录名</button>
	</div>



<h3>当前登录密码</h3>
<h4>********</h4>
<div id="password"><a href="#" class="btn" onclick="changePassword()" >修改密码</a></div>



</div>
<?php
	include("footer-back.php");
	?>
