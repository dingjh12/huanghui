<?php
	include("header-back.php");
	include("connect.php");
	?>

<div class="relative">
		<div id="edit-type-left">
		<?php
			$sql="select * from `types` where `up`=0";
			$query=mysql_query($sql);
			if(mysql_num_rows($query)==0){
							echo "暂时没有最顶级分类";
			}else{
				echo "<a href=\"#\" onclick=\"addType(0)\">添加顶级分类</a>";
				while($rs=mysql_fetch_array($query)){
							?>
		<div class="first_level"><?php echo $rs['name'] ?><a href="#" onclick="deleteType(<?php echo $rs['id'] ?>)"><i class="icon-remove pull-right"></i></a></div>
		<?php
			$up=$rs['id'];
			$query2=mysql_query("select * from `types` where `up`='$up'");
							echo "<a href=\"#\" onclick=\"addType(".$rs['id'].")\" class=\"add_second\">添加次级分类</a>";
			if(mysql_num_rows($query2)!=0){
							while($rs2=mysql_fetch_array($query2)){
							?>
							<div class="second_level"><?php echo $rs2['name'] ?><a href="#" onclick="deleteType(<?php echo $rs2['id'] ?>)"><i class="icon-remove pull-right"></i></a></div>
				<?php
				$upper=$rs2['id'];
				$query3=mysql_query("select * from `types` where `up`='$upper'");
								echo "<a href=\"#\" onclick=\"addType(".$rs2['id'].")\"  class=\"add_third\">添加三级分类</a>";
				if(mysql_num_rows($query3)!=0){
								while($rs3=mysql_fetch_array($query3)){
							?>
											<div class="third_level"><?php echo $rs3['name'] ?><a href="#" onclick="deleteType(<?php echo $rs3['id'] ?>)"><i class="icon-remove pull-right"></i></a></div>
							<?php
									}
								}
							}

						}
					}
				}
				?>

				</div><!--end of #edit-type-left div-->
				<div id="edit-type-panel">
				<div id="edit-tips">
					<strong>1.删除分类</strong><br/>
					请点击要删除的分类右侧的X。<br/>
					<strong>2.添加</strong><br/>
					在需要添加的位置选择<br/>
				</div>
				</div>
</div>


<?php
	include("footer-back.php");
	?>
