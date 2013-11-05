<div id="outer">
<?php
	$sql="select * from `products`";
	$query=mysql_query($sql);
	$i=1;
	$rs=mysql_fetch_array($query);
	$string=$rs['content'];
	echo $find=preg_match_all("/(<img)(\s)+[^>]+(\s)*(\/>)/",$string,$out,PREG_SET_ORDER);
	$find_url=preg_match_all("/(src=\")([^\"]+)(\")/",$out[0][0],$url,PREG_SET_ORDER);
	?>
			<?php
			echo $url[0][2]; 
			echo "<br/>";
			list($width,$height,$type,$attr)=getimagesize($url[0][2]);
			echo $width;
			echo "<br/>";
			echo $height;



			$image=imagecreatetruecolor(240px,160px);
			?>
</div>	






















<div id="myCarousel" class="carousel slide">
                <ol class="carousel-indicators">
                  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarousel" data-slide-to="1"></li>
                  <li data-target="#myCarousel" data-slide-to="2"></li>
								  <li data-target="#myCarousel" data-slide-to="3"></li>
								  <li data-target="#myCarousel" data-slide-to="4"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="item active">
                    <img src="pictures/l1.png" alt="">
                    <div class="carousel-caption">
                      <h4>在新增商品时如果设置到首页轮播这里将会显示标题</h4>
                      <p>而这里则会显示你添加的商品简要介绍。这里就是模板。做多设置五个。</p>
                    </div>
                  </div>

                  <div class="item">
                    <img src="pictures/l2.png" alt="">
                    <div class="carousel-caption">
                      <h4>Second Thumbnail label</h4>
                      <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    </div>
                  </div>

				
									<div class="item">
                    <img src="pictures/l3.png" alt="">
                    <div class="carousel-caption">
                      <h4>Third Thumbnail label</h4>
                      <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    </div>
                  </div>
		<div class="item">
                    <img src="pictures/l4.png" alt="">
                    <div class="carousel-caption">
                      <h4>Third Thumbnail label</h4>
                      <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    </div>
                  </div>
		<div class="item">
                    <img src="pictures/l5.png" alt="">
                    <div class="carousel-caption">
                      <h4>Second Thumbnail label</h4>
                      <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    </div>
                  </div>
                </div>
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
              </div>

