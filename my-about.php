<?php
	include("header-back.php");
	?>
<?php
//处理表单上传
	if(isset($_POST['upload-content'])){
		$content=$_POST['details'];
		$sql="update `information` set `me`='$content' where `id`=1";
		$q=mysql_query($sql);
		if($q){
						echo "<div class=\"alert\">";
						echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>";
						echo "更新成功";
						echo "</div>";
		}else{
						echo "砸了";
		}
	}

	$query=mysql_query("select * from `information`");
	$rs=mysql_fetch_array($query);
	?>

<form method=post action=<?php echo $_SERVER['PHP_SELF'] ?> >
	<script id="myEditor" name="details" type="text/plain" style="width:950px;height:400px;margin-bottom:20px;">
		<?php echo $rs['me'] ?>
	</script>
	<input type=submit value="确认上传内容" name="upload-content" class="btn btn-success"/>
	<script type="text/javascript">
		var ue=UE.getEditor("myEditor");
	</script>
		
</form>



<?php
	include("footer-back.php");
	?>
