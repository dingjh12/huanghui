function addKeyWord(str)
		{
		var xmlhttp;
		if(window.XMLHttpRequest)
			{
							xmlhttp=new XMLHttpRequest();
			}else{
							xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
		xmlhttp.onreadystatechange=function()
		{
						if(xmlhttp.readyState==4 && xmlhttp.status==200)
						{
										document.getElementById("add-word").innerHTML+=xmlhttp.responseText;
						}
		}
		xmlhttp.open("GET","function.php?word="+str+"&sid="+Math.random(),true);
		xmlhttp.send();
		}


		function deleteWord(id)
		{
		var $flag=confirm("确定删除这个关键词?");
		if($flag){
		var xmlhttp;
		if(window.XMLHttpRequest)
			{
							xmlhttp=new XMLHttpRequest();
			}else{
							xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
		xmlhttp.onreadystatechange=function()
		{
						if(xmlhttp.readyState==4 && xmlhttp.status==200)
						{
										document.getElementById("word-deleted").innerHTML=xmlhttp.responseText;
						}
		}
		xmlhttp.open("GET","function.php?deleteWordId="+id,true);
		xmlhttp.send();
		}else{
						return;
		}
				}
		function firstChoosed(id)
		{
		var xmlhttp;
		if(window.XMLHttpRequest)
			{
							xmlhttp=new XMLHttpRequest();
			}else{
							xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
		xmlhttp.onreadystatechange=function()
		{
						if(xmlhttp.readyState==4 && xmlhttp.status==200)
						{
										document.getElementById("secondlevel").innerHTML=xmlhttp.responseText;
						}
		}
		xmlhttp.open("GET","function.php?firstchoosedid="+id+"&sid="+Math.random(),true);
		xmlhttp.send();
		}


function secondChoosed(id)
		{
		var xmlhttp;
		if(window.XMLHttpRequest)
			{
							xmlhttp=new XMLHttpRequest();
			}else{
							xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
		xmlhttp.onreadystatechange=function()
		{
						if(xmlhttp.readyState==4 && xmlhttp.status==200)
						{
										document.getElementById("thirdlevel").innerHTML=xmlhttp.responseText;
						}
		}
		xmlhttp.open("GET","function.php?secondchoosedid="+id+"&sid="+Math.random(),true);
		xmlhttp.send();
		}



function thirdChoosed(id)
		{
		var xmlhttp;
		if(window.XMLHttpRequest)
			{
							xmlhttp=new XMLHttpRequest();
			}else{
							xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
		xmlhttp.onreadystatechange=function()
		{
						if(xmlhttp.readyState==4 && xmlhttp.status==200)
						{
										$k=xmlhttp.responseText;
										document.getElementById("forthlevel").innerHTML=$k;
						}
		}
		xmlhttp.open("GET","function.php?thirdchoosedid="+id+"&sid="+Math.random(),true);
		xmlhttp.send();
		}

function addType(id)
		{
		var xmlhttp;
		if(window.XMLHttpRequest)
			{
							xmlhttp=new XMLHttpRequest();
			}else{
							xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
		xmlhttp.onreadystatechange=function()
		{
						if(xmlhttp.readyState==4 && xmlhttp.status==200)
						{
										$k=xmlhttp.responseText;
										document.getElementById("edit-tips").innerHTML=$k;
						}
		}
		xmlhttp.open("GET","function.php?addtypeid="+id+"&sid="+Math.random(),true);
		xmlhttp.send();
		}

function deleteType(id)
		{
						var sure=confirm("确认要删除改分类?");
						if(sure){
		var xmlhttp;
		if(window.XMLHttpRequest)
			{
							xmlhttp=new XMLHttpRequest();
			}else{
							xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
		xmlhttp.onreadystatechange=function()
		{
						if(xmlhttp.readyState==4 && xmlhttp.status==200)
						{
										document.getElementById("edit-tips").innerHTML=xmlhttp.responseText;
						}
		}
		xmlhttp.open("GET","function.php?deletetypeid="+id+"&sid="+Math.random(),true);
		xmlhttp.send();
		}else{
				return;
		}
		}

function deleteProduct(id)
		{
						var sure=confirm("确认要删除改该商品?");
						if(sure){
		var xmlhttp;
		if(window.XMLHttpRequest)
			{
							xmlhttp=new XMLHttpRequest();
			}else{
							xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
		xmlhttp.onreadystatechange=function()
		{
						if(xmlhttp.readyState==4 && xmlhttp.status==200)
						{
										var sure=xmlhttp.responseText;
										if(sure){
														alert("删除成功.刷新查看");
														location.assign("show-products.php");
										}
						}
		}
		xmlhttp.open("GET","function.php?deleteproductid="+id+"&sid="+Math.random(),true);
		xmlhttp.send();
		}else{
				return;
		}
		}


function editProduct(id)
		{
		var xmlhttp;
		if(window.XMLHttpRequest)
			{
							xmlhttp=new XMLHttpRequest();
			}else{
							xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
		xmlhttp.onreadystatechange=function()
		{
						if(xmlhttp.readyState==4 && xmlhttp.status==200)
						{
										document.getElementById("edit-product").innerHTML=xmlhttp.responseText;
						}
		}
		xmlhttp.open("GET","function.php?editproductid="+id+"&sid="+Math.random(),true);
		xmlhttp.send();
		}


function changeLogName()
		{
		var xmlhttp;
		if(window.XMLHttpRequest)
			{
							xmlhttp=new XMLHttpRequest();
			}else{
							xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
		xmlhttp.onreadystatechange=function()
		{
						if(xmlhttp.readyState==4 && xmlhttp.status==200)
						{
										document.getElementById("logname").innerHTML=xmlhttp.responseText;
						}
		}
		xmlhttp.open("GET","function.php?updatelogname=1"+"&sid="+Math.random(),true);
		xmlhttp.send();
		}



function cancelChangeLogName()
	{
	document.getElementById("logname").innerHTML="<button type=\"button\" class=\"btn\" onclick=\"changeLogName()\">修改登录名</button>";
	}

function cancelChangePassword()
	{
	document.getElementById("password").innerHTML="<a class=\"btn\" onclick=\"changePassword()\" >修改密码</a>";
	}

function checkPassword()
		{
			var p1=document.getElementById("password1").value;
			var p2=document.getElementById("password2").value;
			if(p2!=p1){
				document.getElementById("alert-password").innerHTML="&nbsp;&nbsp;<i style=\"color:red;\" class=\"icon-remove-circle\"></i>";
			}else{
				document.getElementById("alert-password").innerHTML="&nbsp;&nbsp;<i stlye=\"color:#0f0;\" class=\"icon-ok-circle\"></i>";
		}
}


function changePassword()
		{
		var xmlhttp;
		if(window.XMLHttpRequest)
			{
							xmlhttp=new XMLHttpRequest();
			}else{
							xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
		xmlhttp.onreadystatechange=function()
		{
						if(xmlhttp.readyState==4 && xmlhttp.status==200)
						{
										document.getElementById("password").innerHTML=xmlhttp.responseText;
						}
		}
		xmlhttp.open("GET","function.php?updatepassword=1"+"&sid="+Math.random(),true);
		xmlhttp.send();
		}




function logout()
{
	var sure=confirm("确认退出管理？");
	if(sure){
	var xmlhttp;
	if(window.XMLHttpRequest)
	{
		xmlhttp=new XMLHttpRequest();
	}else{
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function()
	{
		if(xmlhttp.readyState==4 && xmlhttp.status==200)
		{
					var b=xmlhttp.responseText;
					if(b){
									alert("退出成功");
									location.replace("manage.php");
					}
		}
	}
	xmlhttp.open("GET","function.php?suretologout=1"+"&sid="+Math.random(),true);
	xmlhttp.send();
}else{
				return;
}
}


