<?php
	include("header-back.php");
	include("connect.php");
	?>
<ul class="thumbnails">
	<?php
		$sql="select * from `products` order by `date`desc limit 12";
		$query=mysql_query($sql);
		while($rs=mysql_fetch_array($query)){
		?>
		<li>
		<a href="single.php?id=<?php echo $rs['id'] ?>" alt="<?php echo $rs['intro'] ?>">
			<div class="thumbnail">
			<?php	
				$string=$rs['content'];
				$find=preg_match_all("/(<img)(\s)+[^>]+(\s)*(\/>)/",$string,$out,PREG_SET_ORDER);
				if($find){
					echo $out[0][0];
				}else{
					?>
					<img src="http://placekitten.com/180/160">
				<?php
					}
					?>
				<div class="button-position">
				<h4><?php echo $rs['title'] ?></h4>
				<a href="single.php?id=<?php echo $rs['id'] ?>" class="btn">查看</a>
				<a class="btn btn-warning" href="edit.php?id=<?php echo $rs['id'] ?>">修改</a>
				<a href="#" class="btn btn-danger" onclick="deleteProduct(<?php echo $rs['id'] ?>)">删除</a>
				</div>
			</div>
		</a>
		</li>
		<?php
			}
		?>
		</ul>





<?php
	include("footer-back.php");
	?>
