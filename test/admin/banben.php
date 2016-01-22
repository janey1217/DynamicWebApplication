<?php
	include_once("inc/config.php");
	Isuser();
	Chaoshi();
	$query=$db->query("select * from `banben` where id=1 limit 1");
	$row=$db->fetch_array($query);
	$cn=$db->replace($_REQUEST["cn"]);
	$en=$db->replace($_REQUEST["en"]);
	$tj1=$db->replace($_REQUEST["tj1"]);
	$tj2=$db->replace($_REQUEST["tj2"]);
	$tjmc1=$db->replace($_REQUEST["tjmc1"]);
	$tjmc2=$db->replace($_REQUEST["tjmc2"]);
	$zd1=$db->replace($_REQUEST["zd1"]);
	$zd2=$db->replace($_REQUEST["zd2"]);
	$zd3=$db->replace($_REQUEST["zd3"]);
	$zd4=$db->replace($_REQUEST["zd4"]);
	$zd5=$db->replace($_REQUEST["zd5"]);
	$zd6=$db->replace($_REQUEST["zd6"]);
	$zd7=$db->replace($_REQUEST["zd7"]);
	$zd8=$db->replace($_REQUEST["zd8"]);
	$zd9=$db->replace($_REQUEST["zd9"]);
	$zd10=$db->replace($_REQUEST["zd10"]);
	if(isset($_REQUEST["update"]))
	{
		$db->query("update `banben` set `cn`='$cn',`en`='$en',`tj1`='$tj1',`tj2`='$tj2',`tjmc1`='$tjmc1',`tjmc2`='$tjmc2',`zd1`='$zd1',`zd2`='$zd2',`zd3`='$zd3' ,`zd4`='$zd4',`zd5`='$zd5',`zd6`='$zd6',`zd7`='$zd7',`zd8`='$zd8',`zd9`='$zd9',`zd10`='$zd10' where id=1");
		echo Show_msg("banben.php","设置成功！");
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

<form name="form1" method="post" action="banben.php">
<table border=0 cellspacing=1 align=center class=form>

	<tr>
		<th colspan="2">版本设置</th>
	</tr>
     	  <tr>
  <td width="24%" align="right">是否有中文版：</td>
  <td width="76%"><label>
    <input type="radio" name="cn" value="1" <?php if($row["cn"]=='1') echo "checked"?>>
    是
    <input type="radio" name="cn" value="0" <?php if($row["cn"]=='0') echo "checked"?>>
    否
  </label></td>
  </tr>
  <tr>
  <td align="right">是否有英文版：</td>
  <td><input type="radio" name="en" value="1" <?php if($row["en"]=='1') echo "checked"?>>
    是
      <input type="radio" name="en" value="0" <?php if($row["en"]=='0') echo "checked"?>>      
      否</td>
  </tr>
  <tr>
    <td align="right">推荐一：</td>
    <td><input type="radio" name="tj1" value="1" <?php if($row["tj1"]=='1') echo "checked"?>>
      是
        <input type="radio" name="tj1" value="0" <?php if($row["tj1"]=='0') echo "checked"?>>
        否</td>
  </tr>
  <tr>
    <td align="right">推荐名称：</td>
    <td><input name="tjmc1" type="text" id="tjmc1" value="<?php echo $row["tjmc1"]?>"></td>
  </tr>
  <tr>
    <td align="right">推荐二：</td>
    <td><input type="radio" name="tj2" value="1" <?php if($row["tj2"]=='1') echo "checked"?>>
      是
        <input type="radio" name="tj2" value="0" <?php if($row["tj2"]=='0') echo "checked"?>>
        否</td>
  </tr>
  <tr>
    <td align="right">推荐名称：</td>
    <td><input name="tjmc2" type="text" id="tjmc2" value="<?php echo $row["tjmc2"]?>"></td>
  </tr>
  <tr>
    <td align="right">产品字段一：</td>
    <td><input name="zd1" type="text" id="zd1" value="<?php echo $row["zd1"]?>"></td>
  </tr>
  <tr>
    <td align="right">产品字段二：</td>
    <td><input name="zd2" type="text" id="zd2" value="<?php echo $row["zd2"]?>"></td>
  </tr>
  <tr>
    <td align="right">产品字段三：</td>
    <td><input name="zd3" type="text" id="zd3" value="<?php echo $row["zd3"]?>"></td>
  </tr>
  <tr>
    <td align="right">产品字段四：</td>
    <td><input name="zd4" type="text" id="zd4" value="<?php echo $row["zd4"]?>"></td>
  </tr>
  <tr>
    <td align="right">产品字段五：</td>
    <td><input name="zd5" type="text" id="zd5" value="<?php echo $row["zd5"]?>"></td>
  </tr>
  <tr>
    <td align="right">产品字段六：</td>
    <td><input name="zd6" type="text" id="zd6" value="<?php echo $row["zd6"]?>"></td>
  </tr>
  <tr>
    <td align="right">产品字段七：</td>
    <td><input name="zd7" type="text" id="zd7" value="<?php echo $row["zd7"]?>"></td>
  </tr>
  <tr>
    <td align="right">产品字段八：</td>
    <td><input name="zd8" type="text" id="zd8" value="<?php echo $row["zd8"]?>"></td>
  </tr>
  <tr>
    <td align="right">产品字段九：</td>
    <td><input name="zd9" type="text" id="zd9" value="<?php echo $row["zd9"]?>"></td>
  </tr>
  <tr>
  <td align="right">产品字段十：</td>
  <td><input name="zd10" type="text" id="zd10" value="<?php echo $row["zd10"]?>"></td>
  </tr>
  <tr>
    <td colspan="3" align="center" height='30'>
  <input type="submit" name="update" value="确认修改"/>  </td>  
  </tr>
</table>
</form>
</BODY></HTML>
