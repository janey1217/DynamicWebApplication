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
		echo Show_msg("banben.php","���óɹ���");
	}
	?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD><TITLE>��̨����ϵͳ</TITLE><link rel="stylesheet" type="text/css" href="images/css.css">
<META http-equiv=Content-Type content="text/html; charset=gb2312">
<META content=Alan name=Author><LINK href="images/private.css"
type=text/css rel=stylesheet>
<META content="MSHTML 6.00.6000.16890" name=GENERATOR></HEAD>
<BODY>
<BR>

<form name="form1" method="post" action="banben.php">
<table border=0 cellspacing=1 align=center class=form>

	<tr>
		<th colspan="2">�汾����</th>
	</tr>
     	  <tr>
  <td width="24%" align="right">�Ƿ������İ棺</td>
  <td width="76%"><label>
    <input type="radio" name="cn" value="1" <?php if($row["cn"]=='1') echo "checked"?>>
    ��
    <input type="radio" name="cn" value="0" <?php if($row["cn"]=='0') echo "checked"?>>
    ��
  </label></td>
  </tr>
  <tr>
  <td align="right">�Ƿ���Ӣ�İ棺</td>
  <td><input type="radio" name="en" value="1" <?php if($row["en"]=='1') echo "checked"?>>
    ��
      <input type="radio" name="en" value="0" <?php if($row["en"]=='0') echo "checked"?>>      
      ��</td>
  </tr>
  <tr>
    <td align="right">�Ƽ�һ��</td>
    <td><input type="radio" name="tj1" value="1" <?php if($row["tj1"]=='1') echo "checked"?>>
      ��
        <input type="radio" name="tj1" value="0" <?php if($row["tj1"]=='0') echo "checked"?>>
        ��</td>
  </tr>
  <tr>
    <td align="right">�Ƽ����ƣ�</td>
    <td><input name="tjmc1" type="text" id="tjmc1" value="<?php echo $row["tjmc1"]?>"></td>
  </tr>
  <tr>
    <td align="right">�Ƽ�����</td>
    <td><input type="radio" name="tj2" value="1" <?php if($row["tj2"]=='1') echo "checked"?>>
      ��
        <input type="radio" name="tj2" value="0" <?php if($row["tj2"]=='0') echo "checked"?>>
        ��</td>
  </tr>
  <tr>
    <td align="right">�Ƽ����ƣ�</td>
    <td><input name="tjmc2" type="text" id="tjmc2" value="<?php echo $row["tjmc2"]?>"></td>
  </tr>
  <tr>
    <td align="right">��Ʒ�ֶ�һ��</td>
    <td><input name="zd1" type="text" id="zd1" value="<?php echo $row["zd1"]?>"></td>
  </tr>
  <tr>
    <td align="right">��Ʒ�ֶζ���</td>
    <td><input name="zd2" type="text" id="zd2" value="<?php echo $row["zd2"]?>"></td>
  </tr>
  <tr>
    <td align="right">��Ʒ�ֶ�����</td>
    <td><input name="zd3" type="text" id="zd3" value="<?php echo $row["zd3"]?>"></td>
  </tr>
  <tr>
    <td align="right">��Ʒ�ֶ��ģ�</td>
    <td><input name="zd4" type="text" id="zd4" value="<?php echo $row["zd4"]?>"></td>
  </tr>
  <tr>
    <td align="right">��Ʒ�ֶ��壺</td>
    <td><input name="zd5" type="text" id="zd5" value="<?php echo $row["zd5"]?>"></td>
  </tr>
  <tr>
    <td align="right">��Ʒ�ֶ�����</td>
    <td><input name="zd6" type="text" id="zd6" value="<?php echo $row["zd6"]?>"></td>
  </tr>
  <tr>
    <td align="right">��Ʒ�ֶ��ߣ�</td>
    <td><input name="zd7" type="text" id="zd7" value="<?php echo $row["zd7"]?>"></td>
  </tr>
  <tr>
    <td align="right">��Ʒ�ֶΰˣ�</td>
    <td><input name="zd8" type="text" id="zd8" value="<?php echo $row["zd8"]?>"></td>
  </tr>
  <tr>
    <td align="right">��Ʒ�ֶξţ�</td>
    <td><input name="zd9" type="text" id="zd9" value="<?php echo $row["zd9"]?>"></td>
  </tr>
  <tr>
  <td align="right">��Ʒ�ֶ�ʮ��</td>
  <td><input name="zd10" type="text" id="zd10" value="<?php echo $row["zd10"]?>"></td>
  </tr>
  <tr>
    <td colspan="3" align="center" height='30'>
  <input type="submit" name="update" value="ȷ���޸�"/>  </td>  
  </tr>
</table>
</form>
</BODY></HTML>
