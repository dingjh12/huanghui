<?php
	include("header-back.php");
	include("connect.php");
	?>
<?php
//这里代码处理将编辑的商品详细信息上传到后台；
if(isset($_POST['upload-content'])){
				$title=$_POST['title'];
				$content=$_POST['details'];
				$tid=$_POST['selected'];
				$intro=$_POST['simpleintro'];
				$sql="insert into `products`(`id`,`tid`,`title`,`intro`,`content`,`date`) values('','$tid','$title','$intro','$content',now())";
				$query=mysql_query($sql);
				if($query){
								echo "插入成功";
				}else{
								echo "我去咋了";
				}
}
//--------------------------------------------
?>
		<form action=<?php echo $_SERVER['PHP_SELF'] ?> method=post >
		<h4 class="steps">第一步 给商品选择一个分类</h4>
			<div id="types">
				<strong>选择分类</strong>
				<select name="first" onchange="firstChoosed(this.value)">
					<option value="-10">请选择大类</span>
					<?php
						$sql="select * from `types` where `up`=0";
						$query=mysql_query($sql);
						while($rs=mysql_fetch_array($query))
							{
					?>
					<option value=<?php echo $rs['id'] ?>><?php echo $rs['name'] ?></option>
					<?php
						}
					?>
				</select>
				<span id="secondlevel"></span>
			</div>
		<hr/>

		<h4 class="steps">第二步 插入一个醒目的标题</h4>
				<input type=text name=title placeholder="在这里输入标题" class="span6"/>
		<hr/>
		<h4 class="steps">第三步 这里写一些简要的描述信息</h4>
			<textarea class="span6" name="simpleintro"></textarea>
		<hr/>
			



		<h4 class="steps">第四步 如有需要，可插入一张大图</h4>
				<div id="pic-div"><input type=file name="pic" /><a href="#" class="btn">确认上传</a></div>
				<?php
					if(is_uploaded_file($_FILES['pic']['tmp_name'])){
									$uf="pictures/".basename($_FILES['pic']['tmp_name']);
									if(move_uploaded_file($_FILES['pic']['tmp_name'],$uf)){
													echo "上传成功";
									}else{
									echo "砸了砸了砸了";
									}
					}
				?>
		<hr/>

		<h4 class="steps">第五步 现在详细介绍这款商品</h4>
				<script id="myEditor" name="details" type="text/plain" style="width:900px;height:400px;margin-bottom:20px;"></script>
		<hr/>
		<h4 class="steps">最后 上传吧</h4>
				<input type=submit value="确认上传内容" name="upload-content" class="btn btn-success"/>
				<script type="text/javascript">
					var ue=UE.getEditor("myEditor");
				</script>
		<hr/>
		</form>





<?php
	include("footer-back.php");
	?>
