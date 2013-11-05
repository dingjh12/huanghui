<?php
	$user="root";
	$host="localhost";
	$pswd="I50914051slh";
	@$con=mysql_connect($host,$user,$pswd);
	if(!$con){
					echo "哎哟我去，系统出故障了。";
	}
	mysql_select_db("hh");
	mysql_set_charset('utf8');
?>

