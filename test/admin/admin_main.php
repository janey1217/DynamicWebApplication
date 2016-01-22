<?php
	include_once("inc/config.php");
	Isuser();
	Chaoshi();
	$querybb=$db->query("select * from `banben` where id=1");
	$banben=$db->fetch_array($querybb);
	$query=$db->query("select * from `web_config` where id=1");
	$row=$db->fetch_array($query);
	$web_title=$db->replace($_REQUEST["web_title"]);
	$en_web_title=$db->replace($_REQUEST["en_web_title"]);
	$web_url=$db->replace($_REQUEST["web_url"]);
	$web_key1=$db->replace($_REQUEST["web_key1"]);
	$en_web_key1=$db->replace($_REQUEST["en_web_key1"]);
	$web_key2=$db->replace($_REQUEST["web_key2"]);
	$en_web_key2=$db->replace($_REQUEST["en_web_key2"]);
	$web_copy=$db->replace($_REQUEST["web_copy"]);
	$en_web_copy=$db->replace($_REQUEST["en_web_copy"]);
	if(isset($_REQUEST["update"]))
	{
		$db->query("update `web_config` set `web_title`='$web_title',`en_web_title`='$en_web_title',`web_url`='$web_url',`web_key1`='$web_key1',`en_web_key1`='$en_web_key1',`web_key2`='$web_key2',`en_web_key2`='$en_web_key2',`web_copy`='$web_copy',`en_web_copy`='$en_web_copy' where id=1");
		echo Show_msg("admin_main.php","修改成功！");
	}
	if(!empty($_REQUEST["action"]))
	{
		$_SESSION["admin_id"]="";
		$_SESSION["admin_username"]="";
		session_destroy();
		Show_msg("login.php","退出成功！");
	}
	?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD><TITLE>后台管理系统</TITLE><link rel="stylesheet" type="text/css" href="images/css.css">
<META http-equiv=Content-Type content="text/html; charset=gb2312">
<META content=Alan name=Author><LINK href="images/private.css"
type=text/css rel=stylesheet>
<META content="MSHTML 6.00.6000.16890" name=GENERATOR></HEAD>
<BODY>
<BR>

<form name="form1" method="post" action="admin_main.php">
<table border=0 cellspacing=1 align=center class=form>

	<tr>
		<th colspan="2">系统设置</th>
	</tr>
	<?php if($banben["cn"]=='1'){?>
     	  <tr>
  <td width="24%" align="right">网站名称：</td>
  <td width="76%"><input name="web_title" type="text" id="web_title" value="<?php echo $row["web_title"]?>" size="50"/>  </td>
  </tr><?php }
   if($banben["en"]=='1'){
  ?>
       	  <tr>
       	    <td align="right">网站名称(en)：</td>
       	    <td><input name="en_web_title" type="text" id="en_web_title" size="50" value="<?php echo $row["en_web_title"]?>"></td>
    </tr><?php }?>
       	  <tr>
  <td align="right">网站地址：</td>
  <td><input name="web_url" type="text" id="web_url" value="<?php echo $row["web_url"]?>" size="50"/>  </td>
  </tr>
  <?php if($banben["cn"]=='1'){?>
  <tr>
  <td align="right">关键字1：</td>
  <td><textarea name="web_key1" cols="60" rows="7" id="web_key1"><?php echo $row["web_key1"]?></textarea>  </td>
  </tr>
  <?php }
	if($banben["en"]=='1'){?>
           	  <tr>
           	    <td align="right">关键字1(en)：</td>
           	    <td><textarea name="en_web_key1" cols="60" rows="7" id="en_web_key1"><?php echo $row["en_web_key1"]?></textarea></td>
    </tr>
	<?php }
	if($banben["cn"]=='1'){
	?>
           	  <tr>
  <td align="right">关键字2：</td>
  <td><textarea name="web_key2" cols="60" rows="7" id="web_key2"><?php echo $row["web_key2"]?></textarea>  </td>
  </tr><?php }
  if($banben["en"]=='1'){
  ?>
             	  <tr>
             	    <td align="right">关键字2(en)：</td>
             	    <td><textarea name="en_web_key2" cols="60" rows="7" id="en_web_key2"><?php echo $row["en_web_key2"]?></textarea></td>
           	    </tr>
				<?php }
				if($banben["cn"]=='1'){
				?>
             	  <tr>
  <td align="right">版权信息：</td>
  <td><textarea name="web_copy" cols="60" rows="7" id="web_copy"><?php echo $row["web_copy"]?></textarea>  </td>
  </tr>
  <?php }
  if($banben["en"]=='1'){
  ?>
  <tr>
  <td align="right">版权信息2(en)：</td>
  <td><textarea name="en_web_copy" cols="60" rows="7" id="en_web_copy"><?php echo $row["en_web_copy"]?></textarea>  </td>
  </tr>
  <?php }?>
  <tr>
    <td colspan="3" align="center" height='30'>
  <input type="submit" name="update" value="确认修改"/>  </td>  
  </tr>
</table>
</form>
</BODY></HTML>
