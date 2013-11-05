<?php
	include("header-back.php");
	include("connect.php");
	?>
<div class="alert alert-info">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<h5>提醒</h5>
	<div id="word-deleted">
	关键词会显示在首页
	</div>
</div>
<?php
	$sql="select * from `keywords`";
	$query=mysql_query($sql);
	if(!mysql_num_rows($query)){
	?>
	<div class="alert alert-warning">暂时还没有添加热门词汇</div>
	<?php
	}
	else{
			while($rs=mysql_fetch_array($query)){
		?>
		<div class="s-word"><?php echo $rs['word'] ?><span class="pull-right"><a href="#" onclick="deleteWord(<?php echo $rs['id'] ?>)"><i class="icon-remove"></i></a></span></div>
		<?php
			}
	}
?>
<div id="add-word">
</div>
<strong>如果需要添加新的关键词，请在此输入:</strong><input type=text id="word" class="span4" placeholder="请输入新的关键词"/>
<button class="btn" onclick="addKeyWord(document.getElementById('word').value)">确认添加</button>





<?php
	include("footer-back.php");
	?>
