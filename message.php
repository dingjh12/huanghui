<?php
	$page_title="煌辉袜业-给我留言";
	include("header.php");
	include("connect.php");
	if(isset($_POST['sub'])){
					$email=$_POST['email'];
					$phone=$_POST['phone'];
					$name=$_POST['name'];
					$content=$_POST['content'];
					$sql="insert into `message`(`id`,`phone`,`email`,`name`,`date`,`content`) values('','$phone','$email','$name',now(),'$content')";
					$i=mysql_query($sql);
					if($i){
									echo "更新成功";
					}else{
									echo "怎么了?";
					}
	}
	?>
<div class="alert alert-block">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<h4>提醒</h4>
	我有可能都没时间来回复<i class="icon-frown"></i>,所以我建议你直接call我。<i class="icon-phone"></i>13564962503。更多联系方式请参考<a href="contact.php#call">这里</a><hr/>
	除了咨询产品外，如果您有任何意见或者建议，请在此给我留言。谢谢！
</div>

<h3>留言板</h3>
<form method=post action=<?php echo $_SERVER['PHP_SELF'];?> >
	<textarea name="content" rows="5" class="span6"></textarea><br/>
	<i class="icon-envelope icon-2x"></i>&nbsp;&nbsp;<input type=email name="email" placeholder="请输入您的邮箱" class="span3"/>
		<span class="alert alert-info">不是必须的。毕竟用的人不多。</span><br/>
	<i class="icon-phone icon-2x"></i>&nbsp;&nbsp;&nbsp;<input type=text name="phone" placeholder="请输入您的手机号码" class="span3" required />
		<span class="alert alert-info">必填项。不然我上哪儿找你去～</span><br/>
	<i class="icon-user icon-2x"></i>&nbsp;&nbsp;&nbsp;<input type=text name="name" placeholder="请输入您的称呼" class="span3" required/>
		<span class="alert alert-info">必填项。我总不能叫你路人甲吧.</span><br/>
	<input type=submit  class="btn btn-success" value="确认留言" name="sub"/>
</form>
<?php
	include("footer.php");
	?>
