<?php include_once("inc/config.php");
	Isuser();
	Chaoshi();
	$title=$db->replace($_REQUEST["title"]);
	$en_content=$db->replace($_REQUEST["en_content"]);
	$content=$db->replace($_REQUEST["content"]);	
	$picurl=$db->replace($_REQUEST["picurl"]);
	$sorts=$db->replace($_REQUEST["sorts"]);
	$date=$db->replace($_REQUEST["date"]);
	if(isset($_REQUEST["newsadd"]))
	{
		if($db->query("insert into `al`(`data`,`title`,`en_content`,`content`,`picurl`,`sorts`)values('$date','$title','$en_content','$content','$picurl','$sorts')"))
		{
			
			Show_msg("al_add.php","��ӳɹ���");
		}else
		{
			Show_msg("al_add.php","���ʧ�ܣ�");
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

<form name="form1" method="post" action="al_add.php">
<table width="98%" border=0 align=center cellspacing=1 class=form>

	<tr>
		<th colspan="2">�������</th>
	</tr>
		
     	  <tr>
  <td width="6%" align="right">�� �⣺</td>
  <td width="94%"><input name="title" type="text" id="title" size="40"/></td>
  </tr>    
  
    <tr>
       	    <td align="right">ͼƬ��ַ��</td>
       	    <td><input name="picurl" type="text" id="picurl" size="40"></td>
       	  </tr>
       <tr>
	      <td align="right">�ϴ�ͼƬ��</td>
	      <td><Iframe src="Upfiles.php?inputurl=picurl" scrolling="no" frameborder="0" height="20" width="100%"></Iframe></td>
	    </tr>
        <tr>
  <td align="right">���ӵ�ַ��</td>
  <td><input name="en_content" type="text" value="http://" id="en_content" size="70"></td>
  </tr>
  
        <tr>
       	    <td align="right">����ʱ�䣺</td>
       	    <td><input name="date" type="text" id="date" value="<?php echo date("Y-m-d");?>"/></td>
    </tr>
    <tr>
       	    <td align="right">�� ��</td>
       	    <td><input name="sorts" type="text" id="sorts" size="10" value="0"  ONKEYPRESS="event.returnValue=IsDigit();"/></td>
    </tr>
  <tr>
    <td colspan="3" align="center" height='30'>
  <input name="newsadd" type="submit" id="newsadd" value="ȷ�����" onClick="return chkf();"/> 
   <input type="reset" name="Submit" value="����"></td>  
  </tr>
</table>
</form>
</BODY></HTML>
