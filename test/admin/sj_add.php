<?php include_once("inc/config.php");
	Isuser();
	Chaoshi();
	$title=$db->replace($_REQUEST["title"]);
	$youshi=$db->replace($_REQUEST["youshi"]);
	$gongzuo=$db->replace($_REQUEST["gongzuo"]);
	$sorts=$db->replace($_REQUEST["sorts"]);
	$date=$db->replace($_REQUEST["date"]);
	$f_id=$db->replace($_REQUEST["f_id"]);
	$picurl=$db->replace($_REQUEST["picurl"]);
	$temp_pic = explode(",",$f_id);

		for ($i=0;$i<count(array_filter($temp_pic));$i++)
		{
			$f_id=$temp_pic[0];
			$fid=$temp_pic[1];
			$ffid=$temp_pic[2];
		}
		
	if(isset($_REQUEST["newsadd"]))
	{
		if($db->query("insert into `sj`(`f_id`,`fid`,`ffid`,`picurl`,`title`,`youshi`,`gongzuo`,`sorts`,`date`)values('$f_id','$fid','$ffid','$picurl','$title','$youshi','$gongzuo','$sorts','$date')"))
		{
			Show_msg("sj_add.php","��ӳɹ���");
		}else
		{
			Show_msg("sj_add.php","���ʧ�ܣ�");
		}
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

	if(form1.title.value=="")
	{
		alert("��������⣡");
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

<form name="form1" method="post" action="sj_add.php">
<table border=0 cellspacing=1 align=center class=form>

	<tr>
		<th colspan="2">��Ӳ�Ʒ</th>
	</tr>
		
  <tr>
       	    <td align="right">�б���⣺</td>
       	    <td><input name="youshi" type="text" id="youshi" size="40"/></td>
    </tr>
     	  <tr>
  <td align="right">��Ʒ���ƣ�</td>
  <td><input name="title" type="text" id="title" size="40"/>  </td>
  </tr>  
    <tr>
       	    <td align="right">��ϸ���ܣ�</td>
       	    <td><textarea name="gongzuo" id="gongzuo" style="display:none;"></textarea><IFRAME src="fckeditor/editor/fckeditor.html?InstanceName=gongzuo&amp;Toolbar=Default" frameBorder=0 width=96% scrolling=no height=350>
</IFRAME></td>
    </tr>
    
    <tr>
       	    <td align="right">�� ��</td>
       	    <td><input name="sorts" type="text" id="sorts" size="10" value="0"  ONKEYPRESS="event.returnValue=IsDigit();"/></td>
    </tr>
    <tr>
       	    <td align="right">����ʱ�䣺</td>
       	    <td><input name="date" type="text" id="date" value="<?php echo date("Y-m-d");?>"/></td>
    </tr>
  <tr>
    <td colspan="3" align="center" height='30'>
  <input name="newsadd" type="submit" id="newsadd" value="ȷ�����" onClick="return chkf();"/> 
   <input type="reset" name="Submit" value="����"></td>  
  </tr>
</table>
</form>
</BODY></HTML>
