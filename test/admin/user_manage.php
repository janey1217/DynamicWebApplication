<?php
	include_once("inc/config.php");
	Isuser();
	Chaoshi();
	$username1=$db->replace($_REQUEST["username1"]);
	$userpwd1=md5($db->replace($_REQUEST["userpwd1"]).BR);
	
	if(isset($_REQUEST["useradd"]))
	{	
		$isuser=is_array($db->fetch_array($db->query("select * from `admin` where `username`='$username1'")));
		if($isuser>0)
		{
			Show_msg("user_manage.php","�û����Ѵ��ڣ�");
		}else
		{
			$db->query("insert into `admin`(`username`,`userpwd`)values('$username1','$userpwd1')");
			Show_msg("user_manage.php","��ӳɹ���");
		}		
	}
	
	if(!empty($_REQUEST["did"]))
	{
		$did=$_REQUEST["did"];
		$db->query("delete  from `admin` where `id`='$did' limit 1");
		Show_msg("user_manage.php","ɾ���ɹ���");
	}
	?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD><TITLE>��̨����ϵͳ</TITLE><link rel="stylesheet" type="text/css" href="images/css.css">
<META http-equiv=Content-Type content="text/html; charset=gb2312">
<META content=Alan name=Author><LINK href="images/private.css"
type=text/css rel=stylesheet>
<META content="MSHTML 6.00.6000.16890" name=GENERATOR></HEAD>
<script language="javascript">
function chkf()
{
	if(form1.username1.value=="")
	{
		alert("�������û�����");
		form1.username1.focus();
		return false;
	}
	if(form1.userpwd1.value=="")
	{
		alert("���������룡");
		form1.userpwd1.focus();
		return false;
	}
	if(form1.userpwd1.value!=form1.rguserpwd1.value)
	{
		alert("������������벻һ�£�");
		form1.userpwd1.focus();
		return false;
	}
}

function chkf2()
{
	if(form2.userpwd2.value=="")
	{
		alert("���������룡");
		form2.userpwd2.focus();
		return false;
	}
	if(form2.userpwd2.value!=form2.rguserpwd2.value)
	{
		alert("������������벻һ�£�");
		form2.rguserpwd2.focus();
		return false;
	}
}
</script>
<BODY>
<BR>

<table border=0 cellspacing=1 align=center class=form>

	<tr>
		<th colspan="3">�û�����</th>
	</tr>
     	  <tr>
     	    <td align="center"><strong>�û���</strong></td>
     	    <td width="12%" align="center"><strong>����һ</strong></td>
   	        <td width="12%" align="center"><strong>������</strong></td>
   	    </tr>
		<?php
		$query=$db->query("select * from `admin` where `qx`=0 order by id desc");
		while($row=$db->fetch_array($query))
		{
		?>
     	  <tr>
  <td width="76%" align="center"><?php echo $row["username"]?></td>
  <td align="center"><a href="?eid=<?php echo $row["id"]?>">�� ��</a></td>
  <td align="center"><?php $result=$db->query("select `id` from `admin` where `qx`=0");
  $num=$db->num_rows($result);
   if ($num=='1')
  {
	  
  ?><font color="#ff0000">����ɾ��</font><?php  }else{ if ($row["id"]==$_SESSION["admin_id"])
	  {?><font color="#ff0000">����ɾ��</font><? }else{ ?><a onClick="return confirm('ȷ��Ҫɾ���˹���Ա��')" href="?did=<?php echo $row["id"]?>">ɾ ��</a><?php }}?></td>
  </tr>   
  <?php }?>    	
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="20">&nbsp;</td>
  </tr>
</table>
<?php
	$edid=$_REQUEST["edid"];
	$username2=$db->replace($_REQUEST["username2"]);
	$userpwd2=md5($db->replace($_REQUEST["userpwd2"]).BR);
	if(isset($_REQUEST["useredit"]))
	{
		$db->query("update `admin` set `userpwd`='$userpwd2' where `id`='$edid' limit 1");
		Show_msg("User_Manage.php","�����޸ĳɹ�");
	}

if(!empty($_REQUEST["eid"]))
{
	$eid=$_REQUEST["eid"];
	$query=($db->query("select `username`,`userpwd` from `admin` where `id`='$eid' limit 1"));
	$row=$db->fetch_array($query);	
?>
<form name="form2" method="post" action="user_manage.php">
<table border=0 cellspacing=1 align=center class=form>

	<tr>
		<th colspan="2">�޸��û�</th>
	</tr>
     	  <tr>
  <td width="25%" align="right">�û�����</td>
  <td width="75%"><input name="username2" type="text" id="username2" size="30" readonly value="<?php echo $row["username"]?>"/>
  (�û��������޸�)  </td>
  </tr>
       	  <tr>
       	    <td align="right">�� �룺</td>
       	    <td><input name="userpwd2" type="password" id="userpwd2" size="30"></td>
    </tr>
       	  <tr>
  <td align="right">ȷ�����룺</td>
  <td><input name="rguserpwd2" type="password" id="rguserpwd2" size="30"/>  </td>
  </tr>
  <tr>
    <td colspan="3" align="center" height='30'>
  <input name="edid" type="hidden" id="edid" value="<?php echo $_REQUEST["eid"]?>">
  <input name="useredit" type="submit" id="useredit" value="ȷ���޸�" onClick="return chkf2();"/> 
   <input type="reset" name="Submit" value="����"></td>  
  </tr>
</table>
</form>
<? }else{?>
<form name="form1" method="post" action="user_manage.php">
<table border=0 cellspacing=1 align=center class=form>

	<tr>
		<th colspan="2">�û����</th>
	</tr>
     	  <tr>
  <td width="25%" align="right">�û�����</td>
  <td width="75%"><input name="username1" type="text" id="username1" size="30"/>  </td>
  </tr>
       	  <tr>
       	    <td align="right">�� �룺</td>
       	    <td><input name="userpwd1" type="password" id="userpwd1" size="30"></td>
    </tr>
       	  <tr>
  <td align="right">ȷ�����룺</td>
  <td><input name="rguserpwd1" type="password" id="rguserpwd1" size="30"/>  </td>
  </tr>
  <tr>
    <td colspan="3" align="center" height='30'>
  <input name="useradd" type="submit" id="useradd" value="ȷ�����" onClick="return chkf();"/> 
   <input type="reset" name="Submit" value="����"></td>  
  </tr>
</table>
</form>
<?php }?>
</BODY></HTML>
