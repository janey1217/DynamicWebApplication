<? include("inc/config.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>网站后台管理系统</title>
<LINK href="images/private.css" type=text/css rel=stylesheet>
<style type="text/css">
<!--
body{background: #DAE6F3;}
.STYLE1 {
	font-size: 14px;
	color: #023C9F;
	font-weight: bold;
}
-->
</style>
</head>
<script language="javascript">
	function chkf()
	{
		if (form1.username.value=="")
		{
			alert("请输入用户名！");						
			form1.username.focus();
			return false;
		}
		if (form1.userpwd.value=="")
		{
			alert("请输入密码！");						
			form1.userpwd.focus();
			return false;
		}
		if (form1.isval.value=="")
		{
			alert("请输入验证码！");						
			form1.isval.focus();
			return false;
		}
	}
</script>
<?
	$username=$db->replace($_REQUEST["username"]);
	$userpwd=md5($db->replace($_REQUEST["userpwd"]).BR);
	$isval=$db->replace($_REQUEST["isval"]);
	if(isset($_REQUEST["Submit1"]))
	{	
		Chk_user($username,$userpwd,$isval,"main.php");
	}
	
?>
<body>

<div style="margin-top:100px; text-align:center;">
  <form id="form1" name="form1" method="post" action="login.php">
    <table width="670" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#C0D1F1">
      <tr>
        <td height="408" valign="top" background="images/bg.jpg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="160" colspan="3" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="25%" height="95">&nbsp;</td>
                <td width="75%" align="left" valign="bottom"><span class="STYLE1">系统后台登录</span></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
            </table></td>
            </tr>
          <tr>
            <td width="34%" height="25" align="right">用户名：</td>
            <td height="25" colspan="2" align="left"><input name="username" style="height:15px;" type="text" id="username" /></td>
          </tr>
          <tr>
            <td height="25" align="right">密 码：</td>
            <td height="25" colspan="2" align="left"><input name="userpwd" style="height:15px;" type="password" id="userpwd" /></td>
          </tr>
          <tr>
            <td height="25" align="right">验证码：</td>
            <td width="9%" height="25" align="left"><input name="isval" style="height:15px;" type="text" id="isval" size="6" /></td>
            <td width="57%" align="left"><img src="inc/imgcode.php" /></td>
          </tr>
          <tr>
            <td height="25" align="right">&nbsp;</td>
            <td height="25" colspan="2" align="left"><input name="Submit1" type="submit" id="Submit1" value="登录" onclick="return chkf();" style="width:45px;" /></td>
          </tr>
        </table></td>
      </tr>
    </table>
  </form>
</div>
</body>
</html>
