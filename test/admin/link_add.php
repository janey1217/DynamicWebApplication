<?php include_once("inc/config.php");
	Isuser();
	Chaoshi();
	$title=$db->replace($_REQUEST["title"]);
	$f_id=$db->replace($_REQUEST["f_id"]);
	$picurl=$db->replace($_REQUEST["picurl"]);
	$sorts=$db->replace($_REQUEST["sorts"]);
	$links=$db->replace($_REQUEST["links"]);
	if(isset($_REQUEST["newsadd"]))
	{
		if($db->query("insert into `tp`(`links`,`title`,`f_id`,`picurl`,`sorts`)values('$links','$title','$f_id','$picurl','$sorts')"))
		{
			Show_msg("link_add.php?f_id=$f_id","添加成功！");
		}else
		{
			Show_msg("link_add.php?f_id=$f_id","添加失败！");
		}
	}
	?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD><TITLE>后台管理系统</TITLE><link rel="stylesheet" type="text/css" href="images/css.css">
<META http-equiv=Content-Type content="text/html; charset=gb2312">
<META content=Alan name=Author><LINK href="images/private.css"
type=text/css rel=stylesheet>
<META content="MSHTML 6.00.6000.16890" name=GENERATOR></HEAD>
<script language="javascript">
function chkf()
{

	if(form1.title.value=="")
	{
		alert("请输入标题！");
		form1.title.focus();
		return false;
	}
	
}
function IsDigit()
	{
		return ((event.keyCode >= 48) && (event.keyCode <= 57));
	}
</script>
<BODY>
<BR>

<form name="form1" method="post" action="link_add.php">
<table width="98%" border=0 align=center cellspacing=1 class=form>

	<tr>
		<th colspan="2">添加图片</th>
	</tr>
		
     	  <tr>
  <td width="15%" align="right">标 题：</td>
  <td width="85%"><input name="title" type="text" id="title" size="40"/><input type="hidden" name="f_id" id="f_id" value="<? echo $_REQUEST["f_id"] ?>"></td>
  </tr>  
	  <tr>
       	    <td align="right">图片地址：</td>
       	    <td><input name="picurl" type="text" id="picurl" size="40"></td>
	  </tr>
       <tr>
	      <td align="right">上传图片：</td>
	      <td><Iframe src="Upfiles.php?inputurl=picurl" scrolling="no" frameborder="0" height="20" width="100%"></Iframe></td>
	    </tr>
  <tr>
       	    <td align="right">链接地址：</td>
       	    <td><input name="links" type="text" id="links" size="70"></td>
	  </tr>
        <tr>
       	    <td align="right">排 序：</td>
       	    <td><input name="sorts" type="text" id="sorts" size="10" value="0"  ONKEYPRESS="event.returnValue=IsDigit();"/></td>
    </tr>
  <tr>
    <td colspan="3" align="center" height='30'>
  <input name="newsadd" type="submit" id="newsadd" value="确认添加" onClick="return chkf();"/> 
   <input type="reset" name="Submit" value="重填"></td>  
  </tr>
</table>
</form>
</BODY></HTML>
