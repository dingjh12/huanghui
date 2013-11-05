<?php
	$page_title="煌辉袜业-关于我";
	include("header.php");
	include("connect.php");

	$sql="select * from `information` where `id`=1";
	$q=mysql_query($sql);
	$rs=mysql_fetch_array($q);
	echo $rs['me'];


	include("footer.php");
	?>
