<?php
	function Chk_user($username,$userpwd,$isval,$url)
	{	
		global $db;
		$query=$db->query("select * from `admin` where `username`='$username'");
		
		$user=is_array($row=$db->fetch_array($query));
		if($_SESSION["code"]==$isval)//判断用户登录
		{
			if($user>0)
			{
				if($row["userpwd"]==$userpwd)
				{
					
					$_SESSION["admin_id"]=$row["id"];
					$_SESSION["admin_username"]=md5($row["username"].$row["userpwd"]);
					$_SESSION["admin_times"]=mktime();
					echo "<script language='javascript'>location.href='".$url."';</script>";
				}
				else
				{
					Show_msg("login.php","密码错误！");
					session_destroy();					
				}
			}else
			{
				Show_msg("login.php","该用户名不存在！");
				session_destroy();
			}
		}else
		{
			echo Show_msg("login.php","验证码错误！");			
		}
	}
	
	function Show_msg($url, $show)//弹出信息
	{
		$msg = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
				<html xmlns="http://www.w3.org/1999/xhtml"><head>
						<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
						<link rel="stylesheet" href="css/common.css" type="text/css" />
						<meta http-equiv="refresh" content="2; URL=' . $url . '" />
						<title>信息提示</title>
						</head>
						<body>
						<div id="man_zone">
						  <table width="30%" border="1" align="center"  cellpadding="3" cellspacing="0" class="table" style="margin-top:100px;">
							<tr>
							  <th align="center" style="background:#cef; font-size:12px;">信息提示</th>
							</tr>
							<tr>
							  <td style="line-height:22px; font-size:12px;"><p><font color="#ff0000;"><b>' . $show . '</b></font><br />
							  2秒后返回指定页面！<br />
							  如果浏览器无法跳转，<a href="' . $url . '">请点击此处</a>。</p></td>
							</tr>
						  </table>
						</div>
						</body>
						</html>';
		echo $msg;
		exit ();
	}
	function Isuser()//判断用户是否登录
	{
		global $db;
		$query=$db->query("select * from `admin` where `id`='$_SESSION[admin_id]'");
		$user=is_array($row=$db->fetch_array($query));
		if($user>0)
		{
			if(md5($row["username"].$row["userpwd"])!=$_SESSION["admin_username"])
			{
				Show_msg("login.php","操作错误！");
				session_destroy();
				exit();
			}
		}else
		{
			Show_msg("login.php","操作错误！");
			session_destroy();
			exit();
		}
	}
	function Chaoshi()//判断用户登录超时
	{
		$newtime=mktime();
		if($newtime-$_SESSION["admin_times"]>'10000')
		{
			Show_msg("login.php","登录超时！");
			session_destroy();
			exit();
		}else
		{
			$_SESSION["admin_times"]=mktime();
		}
	}
	function Deldy($tb,$zd)//删除单一记录
	{
		global $db;
		$db->query("delete from $tb where `id`=$zd limit 1");		
	}
	function Delall($tb,$zd,$chk)//删除所选中的记录
	{
		global $db;
		$ID_Dele=implode(",",$chk);
		$query="delete from $tb where $zd in ($ID_Dele)";
		$db->query($query);
	}
	function Edsorts($tb,$sorts,$id)
	{
		global $db;
		$db->query("update $tb set `sorts`=$sorts where `id`=$id limit 1");
	}
?>