<?php include_once("inc/config.php");
	include_once('uploadclass.php'); 
	$pic=$uploadfile; 
	Isuser();
	Chaoshi();
	$querybb=$db->query("select * from `banben` where id=1");
	$banben=$db->fetch_array($querybb);
	$title=$db->replace($_REQUEST["title"]);
	$content=$db->replace($_REQUEST["content"]);
	$sorts=$db->replace($_REQUEST["sorts"]);
	$date=$db->replace($_REQUEST["date"]);
	$f_id=$db->replace($_REQUEST["f_id"]);
	if(isset($_REQUEST["newsadd"]))
	{
		if($db->query("insert into `news`(`f_id`,`title`,`content`,`date`,`sorts`,`picurls`)values('$f_id','$title','$content','$date','$sorts','$pic')"))
		{
			Show_msg("news_add.php?f_id=$f_id","添加成功！");
		}else
		{
			Show_msg("news_add.php?f_id=$f_id","添加失败！");
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
	if(form1.f_id.value=="0")
	{
		alert("请选择分类！");
		form1.f_id.focus();
		return false;
	}
	if(form1.title.value=="")
	{
		alert("请输入新闻标题！");
		form1.title.focus();
		return false;
	}
	
}
function aa()
{
	var a=document.getElementById("fid").value;
	if (a==9 || a==11 || a==12)
	{
		document.getElementById("a1").style.display="block";
	}else
	{
		document.getElementById("a1").style.display="none";
	}
}
function IsDigit()
	{
		return ((event.keyCode >= 48) && (event.keyCode <= 57));
	}
</script>
<BODY>
<BR>
<?
	 $f_id=$_REQUEST["f_id"];
?>

<form name="form1" method="post" action="news_add.php" enctype="multipart/form-data"> 
<table border=0 cellspacing=1 align=center class=form>

	<tr>
		<th colspan="2">添加</th>
	</tr>
   
   
  <tr>
  <td align="right">标题：</td>
  <td><input name="title" type="text" id="title" size="40"/><input type="hidden" name="f_id" id="f_id" value="<? echo $f_id ?>"></td>
  </tr>
  <tr>
  <td align="right">图片：</td>
  <td>
        <input name="file" type="file"  > 
       
  </td>
  </tr> 
   
  <tr>
       	    <td align="right">内容：</td>
       	    <td><textarea name="content" id="content"  style="display:none;"></textarea><IFRAME src="fckeditor/editor/fckeditor.html?InstanceName=content&amp;Toolbar=Default" frameBorder=0 width=96% scrolling=no height=350>
</IFRAME></td>
    </tr>
	    
    <tr>
       	    <td align="right">发布时间：</td>
       	    <td><input name="date" type="text" id="date" value="<?php echo date("Y-m-d");?>"/></td>
    </tr><tr>
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
