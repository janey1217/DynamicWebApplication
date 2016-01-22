<?php
	include_once("inc/config.php");
	Isuser();
	Chaoshi();
	$lb=$_GET['lb'];
	$querybb=$db->query("select * from `banben` where id=1");//设置语言版本
	$banben=$db->fetch_array($querybb);
	$title=$db->replace($_REQUEST["title"]);
	$content=$_REQUEST["content"];
	$lb=$_REQUEST["lb"];
	$pd=$_REQUEST["pd"];
	$system=$_REQUEST["system"];
	if(isset($_REQUEST["channeladd"]))
	{
		$db->query("insert into `channel`(`title`,`lb`,`content`,`system`)values('$title','0','$content','$system')");
		Show_msg("channel_add.php","频道添加成功！");
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
		alert("请输入频道名称！");
		form1.title.focus();
		return false;
	}
		
}

</script>
<BODY>
<BR>

<form name="form1" method="post" action="channel_add.php">
<table border=0 cellspacing=1 align=center class=form>

	<tr>
		<th colspan="2">添加频道</th>
	</tr>
     	  <tr>
  <td align="right">频道名称：</td>
  <td><input name="title" type="text" id="title" size="40"/><input type="hidden" name="lb" value="<?php echo $lb ?>"><?php echo $lb ?>  </td>
  </tr>
  
  <?php if($banben["cn"]=='1'){?>
       	  <tr>
       	    <td align="right">频道内容：</td>
       	    <td><textarea name="content" id="content" style="display:none;"></textarea><IFRAME src="fckeditor/editor/fckeditor.html?InstanceName=content&amp;Toolbar=Default" frameBorder=0 width=96% scrolling=no height=350>
</IFRAME></td>
    </tr><?php }?>
	      <!--<tr>
	        <td align="right">频道内容(en)：</td>
	        <td><textarea name="en_content" id="en_content" style="display:none;"></textarea><IFRAME src="fckeditor/editor/fckeditor.html?InstanceName=en_content&amp;Toolbar=Default" frameBorder=0 width=96% scrolling=no height=350>
</IFRAME></td>
    </tr>-->
    
    <tr>
       	    <td align="right">频道属性：</td>
       	    <td><input name="system" type="radio" value="0" checked>
       	      系统频道
              <input type="radio" name="system" value="1">
            普通频道</td>
    </tr>
  <tr>
    <td colspan="3" align="center" height='30'>
  <input name="channeladd" type="submit" id="channeladd" value="确认添加" onClick="return chkf();"/> 
   <input type="reset" name="Submit" value="重填"></td>  
  </tr>
</table>
</form>
</BODY></HTML>
