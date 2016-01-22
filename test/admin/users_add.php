<?php
	include_once("inc/config.php");
	Isuser();
	Chaoshi();
	$username=$db->replace($_REQUEST["username"]);
	if(isset($_REQUEST["useradd"]))
	{	
		$isuser=is_array($db->fetch_array($db->query("select * from `users` where `username`='$username'")));
		if($isuser>0)
		{
			Show_msg("users_add.php","用户名已存在！");
		}else
		{
			if($db->query("insert into `users`(`username`)values('$username')")or die(mysql_error())){
				Show_msg("Users_Add.php","添加成功！");
			}
		}		
	}
	?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD><TITLE>后台管理系统</TITLE><link rel="stylesheet" type="text/css" href="images/css.css">
<META http-equiv=Content-Type content="text/html; charset=gb2312">
<META content=Alan name=Author><LINK href="images/private.css"
type=text/css rel=stylesheet>
<META content="MSHTML 6.00.6000.16890" name=GENERATOR></HEAD>
<script language="javascript" src="../js/region.js"></script>
<SCRIPT language=javascript src="../pcasunzip.js"></script>
<script language="javascript">
function chkf()
{
	if(form1.username.value=="")
	{
		alert("请输入用户名！");
		form1.username.focus();
		return false;
	}
	if(form1.userpwd.value=="")
	{
		alert("请输入密码！");
		form1.userpwd.focus();
		return false;
	}
	if(form1.userpwd.value!=form1.rguserpwd.value)
	{
		alert("两次输入的密码不一致！");
		form1.userpwd.focus();
		return false;
	}
}

</script>
<BODY>
<BR>


<form name="form1" method="post" action="users_add.php">
<table border=0 cellspacing=1 align=center class=form>

	<tr>
		<th colspan="2">添加会员</th>
	</tr>
     	  <tr>
  <td width="25%" align="right">用户名：</td>
  <td width="75%"><input name="username" type="text" id="username" size="30"/>  </td>
  </tr><!--
       	  <tr>
       	    <td align="right">所在地区：</td>
       	    <td><select name="addprovince" id="addprovince" runat="server"></select> 
<select name="addcity" id="addcity" runat="server" ></select>
<select name="addarea" runat="server" id="addarea"></select>
<input type="hidden" runat="server" id="hprovince" name="hprovince" onFocus="getaddress()" />
<input type="hidden" runat="server" id="hcity" name="hcity" />
<input type="hidden" runat="server" id="harea" name="harea" />      
	<script language="javascript" defer>
	new PCAS("addprovince","addcity","addarea");
	</script>
	<script type="text/javascript">
	function getaddress()
	{
		form1.hprovince.value=form1.addprovince.value;
		form1.hcity.value=form1.addcity.value;
		form1.harea.value=form1.addarea.value;
	}
	</script></td>
    </tr>-->
  <tr>
    <td colspan="3" align="center" height='30'>
      <input name="useradd" type="submit" id="useradd" value="确认添加" onClick="return chkf();"/> 
      <input type="reset" name="Submit" value="重填"></td>  
  </tr>
</table>
</form>
</BODY></HTML>
