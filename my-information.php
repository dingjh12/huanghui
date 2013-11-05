<?php
	include("header-back.php");
	include("connect.php");
	?>

<div class="alert alert-info">
<button type="button" class="close" data-dismiss="alert">&times;</button>
修改信息后要重新生成二维码。请注意。

</div>
<?php
	$sql="select * from `information`";
	$query=mysql_query($sql);
	$rs=mysql_fetch_array($query);
	?>
	<table class="table table-condensed">
		<tr>
			<td><strong>主要手机号</strong></td>
			<td><?php echo $rs['phone'] ?><a href="#"><i class="pull-right icon-remove"></i></a><a href="#"><i class="pull-right icon-edit"></i></a>
		</tr>
		<tr>
			<td><strong>备用手机号</strong></td>
			<td><?php echo $rs['phone1'] ?>
		</tr>
		<tr>
			<td><strong>联系邮箱</strong></td>
			<td><?php echo $rs['email'] ?></td>
		</tr>
		<tr>
			<td><strong>银行卡号<strong></td>
			<td><?php echo $rs['card'] ?></td>
		</tr>

	</table>

<button class="btn btn-danger">批量修改</button>
<button class="btn btn-primary">添加其他信息</button>



<?php
	include("footer-back.php");
	?>
