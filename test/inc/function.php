<?php
function Show_msg($url, $show)//弹出信息
{
	echo("<script language='javascript'>alert('".$show."');window.location='".$url."'</script>");
	exit ();
}
/*获取多级类别ID集合
lev: 要取到当前系列下的第几级系列*/
function getclsIdArr($clsid,$data_table)
{
	global $db;
	$tmp_lev=$lev;
	$query=$db->query("select `id` from `$data_table` where `f_id` in ($clsid)");
	$row=$db->fetch_array($query);
	$tmp=$row["id"];

	$qu=$db->query("select `id` from `$data_table` where `f_id` in ($clsid) and `id` not in($tmp)");
	$row2=$db->fetch_array($qu);
	$tmp2=$tmp.$row2["id"];

	return $clsid;
}

$Action=$_REQUEST["Action"];
switch($Action)
{
	//=========留言处理=========
	case "gbook":
		$title=$db->replace($_REQUEST["title"]);
		$name=$db->replace($_REQUEST["name"]);
		$sex=$db->replace($_REQUEST["sex"]);
		$email=$db->replace($_REQUEST["email"]);
		$qq=$db->replace($_REQUEST["qq"]);
		$content=$db->replace($_REQUEST["content"]);
		$date=date("Y-m-d");
		if($db->query("insert into `gbook`(`title`,`name`,`sex`,`email`,`qq`,`content`,`date`)values('$title','$name','$sex','$email','$qq','$content','$date')"))
		{
			Show_msg("../gbook.php","感谢您的留言！");
		}
		break;
}

function sytj($tjid,$lmi1,$lmi2)
{
	global $db;
	global $purl;
	echo "<table width=100% border=0 cellspacing=1 cellpadding=0><tr>";
	$q=$db->query("select * from `products` where `$tjid`=1 order by sorts desc,id desc limit $lmi1");
	for($i=1;$i<count($r=$db->fetch_array($q))+1;$i++){
		if(is_array($r)){
			echo "<td colspan=2 align=left valign=top><table width=205 border=0 cellspacing=0 cellpadding=0><tr><td align=center><a href=products_view.php?id=".$r['id']."><img src=".$purl.$r['picurl']." width=170 border=0 height=170 /></a></td></tr><tr><td height=35 align=center class=text12><a href=products_view.php?id=".$r['id'].">".$r['zd2']."￥".$r['zd4']."</a></td></tr></table></td>";
			if(!($i % $lmi2)) echo "<tr></tr>";
		}}
	echo "</tr></table>";
}

function chkisur()//检测用户是否登录
{
	global $db;
	$query=$db->query("select * from `users` where `id`='$_SESSION[users_idd]'");
	$user=is_array($row=$db->fetch_array($query));
	if($user>0)
	{
		if(md5($row["username"].$row["userpwd"])!=$_SESSION["users_names"])
		{
			echo "<script language='javascript'>window.location='dl.php';alert('请重新登录！')</script>";
			$_SESSION["users_idd"]='';
			$_SESSION["yqjusername"]='';
			$_SESSION["users_names"]='';
			$_SESSION["users_times"]='';
			exit();
		}
	}else
	{
		echo "<script language='javascript'>window.location='dl.php';alert('请登录！')</script>";
		$_SESSION["users_idd"]='';
		$_SESSION["yqjusername"]='';
		$_SESSION["users_names"]='';
		$_SESSION["users_times"]='';
		exit();
	}
}

function userscs()//判断用户登录超时
{
	$newtime=mktime();
	if($newtime-$_SESSION["users_times"]>'5000')
	{
		echo "<script language='javascript'>window.location='dl.php';alert('登录超时！')</script>";
		$_SESSION["users_idd"]='';
		$_SESSION["yqjusername"]='';
		$_SESSION["users_names"]='';
		$_SESSION["users_times"]='';
		exit();
	}else
	{
		$_SESSION["users_times"]=mktime();
	}
}


function yqjad($c_id,$id,$width,$height)
{
	global $db;
	$qu=$db->query("select * from `yqj_ad` where `c_id`='$c_id' and `id`='$id' order by sorts desc, id desc");
	$r=$db->fetch_array($qu);
	switch($r["islink"]){
		case "0":
			echo "<img src='biri/".$r['picurl']."' width='$width' height='$height' border='0' />";
			break;
		case "1":
			echo "<a href='ad_view.php?id=".$r['id']."' target='_blank'><img src='biri/".$r['picurl']."' width='$width' height='$height' border='0' /></a>";
			break;
		case "2":
			echo "<a href='".$r['linkurl']."' target='_blank'><img src='biri/".$r['picurl']."' width='$width' height='$height' border='0' /></a>";
			break;
	}
}
?>