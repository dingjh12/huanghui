<?php
	include("header-back.php");
	include("connect.php");
	?>

<?php
$sql="select * from `message` order by date desc";
$query=mysql_query($sql);
while($rs=mysql_fetch_array($query)){
	?>
		<div class="talk">
		<strong><?php	echo $rs['name'] ?></strong>在<?php echo $rs['date'] ?>说
		<p><i class="icon-quote-left"></i><?php echo $rs['content'] ?></i></p>
		<strong>联系方式:</strong><?php echo $rs['phone']?>&nbsp;&nbsp;&nbsp;<?php echo $rs['email'] ?>
		</div>
	<?php
		}
		?>


	<br/>










<?php
	include("footer-back.php");
	?>
