<?php
	function Chk_user($username,$userpwd,$isval,$url)
	{	
		global $db;
		$query=$db->query("select * from `admin` where `username`='$username'");
		
		$user=is_array($row=$db->fetch_array($query));
		if($_SESSION["code"]==$isval)
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
					Show_msg("login.php","密码错误");
					session_destroy();					
				}
			}else
			{
				Show_msg("login.php","该用户不存在");
				session_destroy();
			}
		}else
		{
			echo Show_msg("login.php","验证码错误");
		}
	}
	
	function Show_msg($url, $show)//������Ϣ
	{
		$msg = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
				<html xmlns="http://www.w3.org/1999/xhtml"><head>
						<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
						<link rel="stylesheet" href="css/common.css" type="text/css" />
						<meta http-equiv="refresh" content="2; URL=' . $url . '" />
						<title>��Ϣ��ʾ</title>
						</head>
						<body>
						<div id="man_zone">
						  <table width="30%" border="1" align="center"  cellpadding="3" cellspacing="0" class="table" style="margin-top:100px;">
							<tr>
							  <th align="center" style="background:#cef; font-size:12px;">��Ϣ��ʾ</th>
							</tr>
							<tr>
							  <td style="line-height:22px; font-size:12px;"><p><font color="#ff0000;"><b>' . $show . '</b></font><br />
							  2��󷵻�ָ��ҳ�棡<br />
							  ���������޷���ת��<a href="' . $url . '">�����˴�</a>��</p></td>
							</tr>
						  </table>
						</div>
						</body>
						</html>';
		echo $msg;
		exit ();
	}
	function Isuser()//�ж��û��Ƿ��¼
	{
		global $db;
		$query=$db->query("select * from `admin` where `id`='$_SESSION[admin_id]'");
		$user=is_array($row=$db->fetch_array($query));
		if($user>0)
		{
			if(md5($row["username"].$row["userpwd"])!=$_SESSION["admin_username"])
			{
				Show_msg("login.php","��������");
				session_destroy();
				exit();
			}
		}else
		{
			Show_msg("login.php","��������");
			session_destroy();
			exit();
		}
	}
	function Chaoshi()//�ж��û���¼��ʱ
	{
		$newtime=mktime();
		if($newtime-$_SESSION["admin_times"]>'10000')
		{
			Show_msg("login.php","��¼��ʱ��");
			session_destroy();
			exit();
		}else
		{
			$_SESSION["admin_times"]=mktime();
		}
	}
	function Deldy($tb,$zd)//ɾ����һ��¼
	{
		global $db;
		$db->query("delete from $tb where `id`=$zd limit 1");		
	}
	function Delall($tb,$zd,$chk)//ɾ����ѡ�еļ�¼
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