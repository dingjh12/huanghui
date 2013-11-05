<?php
	include("header-back.php");
	include("connect.php");
	?>

<?php
	include("connect.php");
	if(isset($_GET['id'])){
					$id=$_GET['id'];
					$query=mysql_query("select * from `products` where `id`='$id'");
					$rs=mysql_fetch_array($query);
					?>
	
<form method=post action="<?php echo $_SERVER['PHP_SELF'] ?>">

<a href="show-products.php" class="btn"><i class="icon-chevron-left"></i>&nbsp;返回</a>

<input type=submit value="确认修改" name="subnew" class="btn btn-success span2 pull-right" />
<hr/>
	
标题：	<input type=text name=nname value="<?php echo $rs['title'] ?>" class="span4"/>
<br/>
简介:<input type=text name=intro value="<?php echo $rs['intro'] ?>" class="span7"/>
<input type=hidden name=hid value="<?php echo $rs['id'] ?>"/>
	<script id="myEditor" name="details" type="text/plain" style="width:900px;height:400px;margin-bottom:20px;">
	
	<?php echo $rs['content'] ?>
	</script>
		<hr/>
				<script type="text/javascript">
					var ue=UE.getEditor("myEditor");
				</script>
	</form>


	<?php
	}
//处理后台更新数据
if(isset($_POST['subnew'])){
				$id=$_POST['hid'];
				$title=$_POST['nname'];
				$intro=$_POST['intro'];
				$content=$_POST['details'];
				$sql="update `products` set `title`='$title',`intro`='$intro',`content`='$content' where `id`='$id'";
			//	echo $sql;
				$query=mysql_query($sql);
				if($query){
								echo "修改成功！";
				}else{
								echo "出了点状况";
				}
}
				


?>
<?php
	include("footer-back.php");
	?>
