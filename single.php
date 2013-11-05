<?php
	include("header.php");
	include("connect.php");
	if(isset($_GET['id'])){
					$id=$_GET['id'];
	}
	$sql="select * from `products` where `id`='$id'";
	$query=mysql_query($sql);
	$rs=mysql_fetch_array($query);
	?>
<link rel=stylesheet type=text/css href=css/single.css />
<script type="text/javascript">
		function like(id)
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
										document.getElementById("like").innerHTML=xmlhttp.responseText;
						}
		}
		xmlhttp.open("GET","function.php?like="+id+"&sid="+Math.random(),true);
		xmlhttp.send();
		}
</script>

<div>

<div class="nav">
<?php
	$nid=$rs['tid'];
	$nsql="select * from `types` where `id`='$nid'";
	$nq=mysql_query($nsql);
	$nrs=mysql_fetch_array($nq);
	if($nrs['up']!=0){
					$up=$nrs['up'];
					$upq=mysql_query("select * from `types` where `id`='$up'");
					$uprs=mysql_fetch_array($upq);
					if($uprs['up']!=0){
							$uppid=$uprs['up'];
							$upp=mysql_query("select * from `types` where `id`='$uppid'");
							$upprs=mysql_fetch_array($upp);
							echo "<a href=\"product.php?tid=".$upprs['id']."\">";
							echo $upprs['name'];
							echo "</a>";
							echo "&gt;&gt;";
					}
						echo "<a href=\"product.php?tid=".$uprs['id']."\">";
						echo $uprs['name'];
						echo "</a>";
						echo "&gt;&gt;";
						echo "</a>";
	}
			echo "<a href=\"product.php?tid=".$nrs['id']."\">";
			echo $nrs['name'];
			echo "</a>";
			echo "&gt;&gt;";
			echo $rs['title'];
?>
<a href="#" class="btn btn-primary pull-right">返回</a>

</div>


<div class="simple">
	<?php	
				$string=$rs['content'];
				$find=preg_match_all("/(<img)(\s)+[^>]+(\s)*(\/>)/",$string,$out,PREG_SET_ORDER);
				if($find){
					echo $out[0][0];
				}else{
					?>
					<img src="http://placekitten.com/300/200">
				<?php
					}
					?>
	<h2><?php echo $rs['title'] ?></h2>
	<hr/>
<p><?php echo $rs['intro'] ?></p>
<span id="like">
	<a href="#" class="btn" onclick="like(<?php echo $rs['id'] ?>)"><i class="icon-heart"></i>喜欢+1</a>
	<em class="like-number"><?php echo $rs['like'] ?></em>
</span>
<div class="time">
最后更新:<?php echo $rs['date']; ?>
</div>
</div>

<div class="detail">
<?php echo $rs['content'] ?>
</div>
<hr/>










</div>
<?php
	include("footer.php");
	?>
