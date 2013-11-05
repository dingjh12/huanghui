<?php
	$page_title="煌辉袜业-首页";
	include("header.php");
	include("connect.php");
									?>
<link rel=stylesheet type=text/css href=css/index.css />

<div id="outer">

<img src="pictures/index.jpg"/>
<div id="text">
<h1>煌辉袜业.Inc</h1>
<span>终于也#高端大气上档次#得有了自己的网站。</span><br/>
<span>还有，我们不只卖袜子。恩，看左边就知道了。</span>
<br/>
<br/>
<h3 style="font-weight:normal;color:#555;">CEO:孙良军</h3>
</div>
</div>

<ul class="nav nav-tabs">
<?php
	$sql="select * from `keywords` limit 10";
	$query=mysql_query($sql);
	while($rs=mysql_fetch_array($query)){
					?>
		<li><a href="product.php"><?php echo $rs['word'] ?></a></li>
		<?php
			}
		?>
	<li><a href="product.php"><i class="icon-tag"></i>更多</a></li>
</ul>
	<?php
		include("footer.php");
		?>
