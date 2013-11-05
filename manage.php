<?php
	include("header-back.php");
	?>
<?php
	//处理登录表单提交及创建session
	if(isset($_POST['submit_log'])){
					$n=trim($_POST['name_log']);
					$p=md5(trim($_POST['password_log']));
					$q=mysql_query("select * from `site` where `name`='$n' AND `password`='$p'");
					if(mysql_num_rows($q)==1){
									$_SESSION['admin']=true;
									header("location:manage.php");
					}else{
									echo "<script type=text/javascript >";
									echo "alert(\"登录名或密码错误\");";
									echo "</script>";
					}
		}
	?>
<div class="left-main">
<?php
	if(isset($_SESSION['admin']) && $_SESSION['admin']===true){
					$query=mysql_query("select * from `site` where `id`=1");
					$rs=mysql_fetch_array($query);
?>
				<h3>管理员<b><?php echo $rs['name'] ?></b> 你好<br/>欢迎登录系统控制面板</h3>
				今天是<?php echo date("Y/m/d-星期w 现在时间G:i"); ?>
			<hr/>
			<h4>系统状况</h4>
			访问量：<br/>
			留言数量：<br/>
			商品数量：<br/>
			热门词汇：<br/>
			分类：<br/>
			<div class="update-info">
			<h4>下一步开发计划</h4>
			<ul>
				<li>上面的系统运行状况统计</li>
				<li>加入淘宝购买链接</li>
				<li>批发客户区域分布</li>
				<li>会员中心</li>
				<li>销量排行</li>
			</ul>
			<b>敬请期待</b>
			</div>
<?php
}else{
				?>
<form action="<?php echo $SERVER['PHP_SELF'] ?>" method=post >
<label>登录名</label><input type=text name="name_log"/><br/>
<label>密码</label><input type=password name="password_log" /><br/>
<input type=submit value="OK登录" name="submit_log" class="btn btn-primary text-center"/>
</form>
<div>
<h4>如果你不是管理员，这里就不要看了，去看看我们的<a href="product.php">产品</a>。</h4>
</div>
<script type=text/javascript >
	document.querySelectorAll(".dis").href="#"
</script>
<?php
	}
?>
</div>

<div class="right-panel" id="need_control">
<h3>请选择一个操作</h3>
<ul class="nav nav-list disabled">
<li class="nav-header">商品管理</li>
<li><a href="show-products.php" class="dis">查看/编辑商品</a></li>
<li><a href="add-product.php" class="dis">添加商品</a></li>
<li><a href="edit-types.php" class="dis">编辑分类</a></li>
<li class="nav-header">页面管理</li>
<li><a href="index-ppt.php" class="dis">首页轮播内容</a></li>
<li><a href="hot-keys.php" class="dis">热门词汇</a></li>
<li><a href="my-information.php" class="dis">个人信息</a></li>
<li><a href="check-messages.php" class="dis">查看留言</a></li>
<li class="nav-header">其他</li>
<li><a href="site-config.php" class="dis">更改登录信息</a></li>
<li><a href="#" class="dis">联系网管</a></li>
</ul>
</div>


<?php
	include("footer-back.php");
	?>
