<?php
	$page_title="煌辉袜业-我的联系方式";
	include("header.php");
	include("connect.php");
	?>
<link rel=stylesheet type=text/css href=css/contact.css />

<ul class="nav nav-tabs">
<li><a href="contact.php#address"><i class="icon-location-arrow"></i>&nbsp;&nbsp;我的地址</a></li>
<li><a href="contact.php#call"><i class="icon-mobile-phone"></i>&nbsp;&nbsp;通讯方式</a></li>
<li><a href="contact.php#transfer"><i class="icon-credit-card"></i>&nbsp;&nbsp;汇款方式</a></li>
</ul>

<div class="address" id="address">
<div class="title"><i class="icon-location-arrow"></i>&nbsp;&nbsp;我的地址</div>
<a href="#"><img src=images/map-small.png />
<div class="map_note">点击图片查看大图</div></a>
<address>
<strong>煌辉袜业.Inc</strong><br/>
上海市黄浦区人民路399号<br/>
福都商厦1楼016号商铺<br/>
</address>
<br/>
<strong>附近公交路线:</strong>
	<ul class="bus">
	<li>123到老西门</li>
	<li>321到真北路</li>
	<li>805到新北门</li>
	</ul>
<strong>地铁线路</strong>
	<ul class="bus">
		<li>10号线至豫园</li>
	</ul>
</div>



<div class="call" id="call">

	
	<div class="title"><i class="icon-mobile-phone"></i>&nbsp;&nbsp;通讯方式</div>
	
	<div class="qq-contact">
		<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=394151335&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:394151335:53" alt="点击这里给我发消息" title="点击这里给我发消息"/></a>
		</div>


	<img src=images/barcode.png />
	<div class="phonecall">
	<address>
	<strong>孙先生</strong><br/>
	<?php
		$sql="select * from `information`";
		$query=mysql_query($sql);
		$rs=mysql_fetch_array($query);
		if(!empty($rs['phone'])){
		?>
		<i class="icon-phone"></i><?php echo $rs['phone'] ?>（7X24小时服务<i class="icon-smile"></i>）<br/>
		<?php
			}
		if(!empty($rs['email'])){
		?>
		<i class="icon-envelope"></i><?php echo $rs['email'] ?>（<a href="mailto:<?php echo $rs['email'] ?>">发邮件</a>）<br/>
		<i class="icon-comment"></i><?php echo $rs['qq'] ?>（点击右边QQ对话）


	
		<?php
			}
			if(!empty($rs['phone1'])){
			?>
		<span>备用联系方式</span>
		<i class="icon-share-alt"></i><?php echo $rs['phone1'] ?>
		<?php
			}
			?>
	</div>
	</address>
	<div class="takephoto alert alert-info">
		<i class="icon-hand-right"></i>
	拿笔手写记名片信息弱爆了，直接用你的<i class="icon-android"/></i>或<i class="icon-apple"></i>手机扫描左边的二维码才叫高端大气上档次。地址也在里边。
	</div>
</div>


<div class="transfer" id="transfer">
	<div class="title">
		<i class="icon-credit-card"></i>&nbsp;&nbsp;汇款方式
	</div>
	<div class="money">
		<label>银行</label><?php echo $rs['card'] ?><br/>
		<label>支付宝</label><?php echo $rs['alipay'] ?><br/><br/>
		<strong>此处也要插入二维码</strong>
	</div>
</div>
<?php
	include("footer.php");
	?>
