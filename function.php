<script type="text/javascript" charset="utf-8" src="ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="ueditor/ueditor.all.js"></script>
<script type="text/javascript" charset="utf-8" src="lang/zh-cn/zh-cn.js"></script>


<?php	
include("connect.php");
session_start();
if(isset($_GET['word'])){
					$word=$_GET['word'];
					$sql="insert into `keywords`(`id`,`click`,`word`,`link`) values('',0,'$word','')";
					$query=mysql_query($sql);
					if($query){
					?>
			<div class="s-word"><?php echo $word; ?>
			<span class="pull-right"><i class="icon-remove"></i></span>
			</div>
			<?php
					}else{
									echo "我去，没添加成功";
					}
}


if(isset($_GET['deleteWordId'])){
				$id=$_GET['deleteWordId'];
				$sql="delete from `keywords` where `id`='$id'";
				$query=mysql_query($sql);
				if($query){
				echo "删除成功！";
}else{
				echo "出了点状况，请再试一次。如果仍然失败，请联系网管。";
}
}



if(isset($_GET['firstchoosedid'])){
				$id=$_GET['firstchoosedid'];
				if($id==-10){
								echo "";					
								echo "<input type=text value=".$id." name=selected />";
				}else{
				$sql="select * from `types` where `up`='$id'";
				$query=mysql_query($sql);
				if(mysql_num_rows($query)==0){
								echo "<span class=\"aelrt alert-info\">该分类下没有次级分类</span>";
				}else{
				echo "<select name=\"second\" onchange=\"secondChoosed(this.value)\">";
				echo "<option>请选择次级分类</option>";
					while($rs=mysql_fetch_array($query)){
				?>
					<option value="<?php echo $rs['id'] ?>"><?php echo $rs['name'] ?></option>
					<?php
					}
					echo "</select>";
					echo "<span id=thirdlevel >";
					echo "<input type=hidden value=".$id." name=selected />";
					echo "</span>";
				}
				}
}





if(isset($_GET['secondchoosedid'])){
				$id=$_GET['secondchoosedid'];
				if($id==-10){
								echo "";					
								echo "<input type=hidden value=".$id." name=selected />";
				}else{
				$sql="select * from `types` where `up`='$id'";
				$query=mysql_query($sql);
				if(mysql_num_rows($query)==0){
								echo "<span class=\"aelrt alert-info\">该分类下没有次级分类</span>";
								echo "<input type=hidden value=".$id." name=selected />";
				}else{
				echo "<select name=\"third\" onchange=\"thirdChoosed(this.value)\">";
				echo "<option>请选择三级分类</option>";
					while($rs=mysql_fetch_array($query)){
				?>
					<option value="<?php echo $rs['id'] ?>"><?php echo $rs['name'] ?></option>
					<?php
					}
					echo "</select>";
					echo "<span id=forthlevel>";
					echo "<input type=hidden value=".$id." name=selected />";
					echo "</span>";
				}
				}
}




if(isset($_GET['thirdchoosedid'])){
				$id=$_GET['thirdchoosedid'];
				echo "<input type=hidden value=".$id." name=selected />";
}



if(isset($_GET['addtypeid'])){
				$upper=$_GET['addtypeid'];
				$sql="select * from `types` where `id`='$upper'";
				$query=mysql_query($sql);
				$rs=mysql_fetch_array($query);
				echo "<form action=".$_SERVER['PHP_SELF']." method=post >";
				if($upper==0){
								echo "你要新建一个顶级分类<br/>";
				}else{
				echo "你即将在";
				echo "<strong>".$rs['name']."</strong>分类下建立新的分类<br/>";
				}
				echo "请输入新的分类名称<br/>";
				echo "<input type=text name=new_type_name class=span5 /><br/>";
				echo "<input type=hidden name=upper value=".$upper."/>";
				echo "<input type=submit name=confirm_add value=\"确认添加\" />";
				echo "</form>";
}

if(isset($_POST['confirm_add'])){
				$up=$_POST['upper'];
				$name=$_POST['new_type_name'];
				$sql="insert into `types`(`id`,`up`,`name`) values('','$up','$name')";
				$query=mysql_query($sql);
				if($query){
								echo "添加成功";
				}else{
						echo "除了点状况";
							}
				echo "<br/><a href=edit-types.php>返回</a>";
}

if(isset($_GET['deletetypeid'])){
				$id=$_GET['deletetypeid'];
				$sql="delete from `types` where `id`='$id'";
				$query=mysql_query($sql);
				if($query){
								echo "<script type=text/javascript >";
								echo "location.reload();";
								echo "</script>";
				}else{
								echo "<div class=\"alert alert-warning\">";
								echo "出了点状况";
								echo "</div>";
				}
}



//product.php
if(isset($_GET['typeid'])){
	$id=$_GET['typeid'];
	$perma_id=$id;
	$cur_page=$_GET['page'];

	if($id!=0){
	$sql="select * from `types` where `id`='$id'";
	$query=mysql_query($sql);
	$rs=mysql_fetch_array($query);
	echo "<h2>".$rs['name']."</h2>";
	if($rs['up']==0){
		//这是一个一级菜单
		echo "<div class=\"status\">";
		echo $rs['name'];
		echo "&gt;&gt;";
		$q=mysql_query("select * from `types` where `up`='$id'");
		if(mysql_num_rows($q)==0){
			echo "后面没有了";
			}else{
			echo "[";
			while($rs2=mysql_fetch_array($q)){
				echo " ";
				echo "<a href=\"#\" onclick=\"showProducts(".$rs2['id'].",1)\">";
				echo $rs2['name'];
				echo "</a>";
				}
			echo " ]";
			}
		echo "</div>";
	}else{
		$id1=$rs['up'];
		$sql1="select * from `types` where `id`='$id1'";
		$query1=mysql_query($sql1);
		$rs1=mysql_fetch_array($query1);
		if($rs1['up']==0){
			$id2=$rs1['up'];
			echo "<div class=\"status\">";
			echo "<a href=\"#\" onclick=\"showProducts(".$rs1['id'].",1)\">";
			echo $rs1['name'];
			echo "</a>";
			echo "&gt;&gt;";
			echo $rs['name'];
			// "这是一个二级菜单";
			$q2=mysql_query("select * from `types` where `up`='$id'");
			if(mysql_num_rows($q2)==0){
				echo "&gt;&gt;后面没有了";
			}else{
				echo "&gt;&gt;[";
			while($rs3=mysql_fetch_array($q2)){
				echo "&nbsp;&nbsp;";
				echo "<a href=\"#\" onclick=\"showProducts(".$rs3['id'].",1)\">";
				echo $rs3['name'];
				echo "</a>";
			}
			echo " ]";
			}
				echo "</div>";
			}else{
				$id3=$rs1['up'];
				$sql3="select * from `types` where `id`='$id3'";
				$query3=mysql_query($sql3);
				$rs3=mysql_fetch_array($query3);
				echo "<div class=\"status\">";
				echo "<a href=\"#\" onclick=\"showProducts(".$rs3['id'].",1)\">";
				echo $rs3['name'];
				echo "</a>";
				echo "&gt;&gt;";
				echo "<a href=\"#\" onclick=\"showProducts(".$rs1['id'].",1)\">";
				echo $rs1['name'];
				echo "</a>";
				echo "&gt;&gt;";
				echo $rs['name'];
				echo "</div>";
			}
		}
				//无论点击那层分类，显示相关产品
				$listid=downSearchAllId($id);
				$mainsql="select * from `products` where 0 ";
				foreach($listid AS $id){
							$mainsql.="or `tid`=".$id." ";
				}
	}else{
				$mainsql="select * from `products` where 1 ";
	}




				echo "<hr/>";
				$mainq=mysql_query($mainsql);
				$total_number=mysql_num_rows($mainq);
				//临时定义每页显示数量
				$number_per_page=6;
				$limit_index=($cur_page-1)*$number_per_page;

				$goodsql=$mainsql." order by `date` desc limit $limit_index,$number_per_page ";
				$goodquery=mysql_query($goodsql);
				if(mysql_num_rows($goodquery)==0){
								echo "抱歉，该分类下没有相关商品.<br/>";
								echo "如果你真的真的需要这个，可以<a href=\"contact.php#call\">联系</a>我安排进货。或者给我<a href=\"message.php\">留言。</a>";
				}else{
								echo "<ul class=\"thumbnails\">";
								while($mrs=mysql_fetch_array($goodquery)){
												?>
												<li>
												<a href="single.php?id=<?php echo $mrs['id'] ?>">
												<div class="thumbnail">

<?php	
				$string=$mrs['content'];
				$find=preg_match_all("/(<img)(\s)+[^>]+(\s)*(\/>)/",$string,$out,PREG_SET_ORDER);
				if($find){
					echo $out[0][0];
				}else{
					?>
					<img src="http://placekitten.com/200/250">
				<?php
					}
					?>


													<h4><?php
														echo $mrs['title'] ?>
													</h4>
												</a>
													<p><?php echo $mrs['intro'] ?></p>
												</div>
												</li>
								<?php
								}
								echo "</ul>";
								//显示分页
								echo "<hr/>";
								$pages=($total_number-($total_number % $number_per_page))/$number_per_page+(($total_number % $number_per_page)!=0);
								
					if($pages>1){
					if($cur_page!=1){
					$last=$cur_page-1;
					echo "<a onclick=\"showProducts(".$perma_id.","."$last".")\" class=\"page_index\">";
					echo "上一页";
					echo "</a>";
					}else{
					echo "<span class=\"disabled\">";
					echo "没有了";
					echo "</span>";

					}
	
					for($i=1;$i<=$pages;$i++){
									echo "<a onclick=\"showProducts(".$perma_id.","."$i".")\" class=\"page_index\">";
									echo $i;
									echo "</a>";
					}
					if($cur_page!=$pages){		
					$next=$cur_page+1;
					echo "<a onclick=\"showProducts(".$perma_id.","."$next".")\" class=\"page_index\">";
					echo "下一页";
					echo "</a>";
					}else{
					echo "<span class=\"disabled\">";
					echo "没有了";
					echo "</span>";

					}

			}

}
}



function downSearchAllId($id)
{
	$list=array();
	array_push($list,$id);
	$sql="select * from `types` where `up`='$id'";
	$query=mysql_query($sql);
	if(mysql_num_rows($query)!=0){
				while($rs=mysql_fetch_array($query)){
								array_push($list,$rs['id']);
								$subid=$rs['id'];
								$subsql="select * from `types` where `up`='$subid'";
								$subquery=mysql_query($subsql);
								if(mysql_num_rows($subquery)!=0){
												while($subrs=mysql_fetch_array($subquery)){
																array_push($list,$subrs['id']);
												}
								}
	}
}
return $list;
}

if(isset($_GET['deleteproductid'])){
				$id=$_GET['deleteproductid'];
				$sql="delete from `products` where `id`='$id'";
				$query=mysql_query($sql);
				if($query){
								return 1;
				}else{
								return 0;
								}
				}






if(isset($_GET['like'])){
				$id=$_GET['like'];
				$sql="update `products` set `like`=`like`+1 where `id`='$id'";
				$query=mysql_query($sql);
				if($query){
				echo "<a  class=\"btn disabled\" href=\"#\">已喜欢</a>";
				}
				$count="select * from `products` where `id`='$id'";
				$rs=mysql_fetch_array(mysql_query($count));
				echo "&nbsp;&nbsp;";
				echo "<em class=\"like-number\">";
				echo $rs['like'];
				echo "</em>";
}


if(isset($_POST['confirm_change_name'])){
				$name=$_POST['new_name'];
				$query=mysql_query("update `site` set `name`='$name' where `id`=1");
				if($query){
								echo "<script type=text/javascript>";
								echo "alert(\"更新成功！\");";
								echo "location.replace(\"site-config.php\");";
								echo "</script>";
				}else{
								echo "出了点岔子";
				}
}

if(isset($_GET['updatelogname'])){
					echo "<form method=post action=".$_SERVER['PHP_SELF']." >";
					echo "<input type=text name=new_name placeholder=\"请输入新的登录名称\"	/>";
					echo "<br/>";
					echo "<input type=submit name=confirm_change_name  class=\"btn btn-danger\" value=\"确认修改\" />";
					echo "&nbsp;&nbsp;";
					echo "<input type=button value=\"取消\" onclick=\"cancelChangeLogName()\" class=\"btn\"/>";
					echo "</form>";
}


if(isset($_GET['suretologout'])){
	unset($_SESSION['admin']);
	$b=session_destroy();
	echo $b;
}


if(isset($_POST['confirm_change_password'])){
	$p1=$_POST['new_p'];
	$p2=$_POST['rep'];
	if($p1!=$p2){
				echo "<script type=text/javascript>";
				echo "alert(\"两次输入的密码不一样。\")";
				echo "</script>";
				
	}else{
					$sql="update `site` set `password`= md5('$p1') where `id`=1";
					$q=mysql_query($sql);
					if($q){
							echo "<script type=text/javascript>";
							echo "alert(\"更新成功。\");";
							echo "location.replace(\"site-config.php\");";
							echo "</script>";
	
					}else{
							echo "<script type=text/javascript>";
							echo "alert(\"怎么了？\")";
							echo "</script>";
	

					}
}
}




if(isset($_GET['updatepassword'])){
			echo "<form method=post action=".$_SERVER['PHP_SELF'].">";
			echo "<input type=password id=password1 name=new_p placeholder=\"请输入一个新密码\" />";
			echo "<br/>";
			echo "<input type=password id=password2 name=rep placeholder=\"请重复输入新的密码\" onkeyup=\"checkPassword(this.value)\" />";
			echo "<span id=\"alert-password\"></span>";
			echo "<br/>";
			echo "<input type=submit value=\"确认修改\" class=\"btn btn-danger\" name=confirm_change_password />";
			echo "&nbsp;&nbsp;";
			echo "<input type=button value=\"取消\" class=\"btn\" onclick=\"cancelChangePassword()\"/>";
			echo "</form>";
}



?>



