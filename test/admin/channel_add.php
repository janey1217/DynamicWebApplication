<?php
	include_once("inc/config.php");
	Isuser();
	Chaoshi();
	$lb=$_GET['lb'];
	$querybb=$db->query("select * from `banben` where id=1");//�������԰汾
	$banben=$db->fetch_array($querybb);
	$title=$db->replace($_REQUEST["title"]);
	$content=$_REQUEST["content"];
	$lb=$_REQUEST["lb"];
	$pd=$_REQUEST["pd"];
	$system=$_REQUEST["system"];
	if(isset($_REQUEST["channeladd"]))
	{
		$db->query("insert into `channel`(`title`,`lb`,`content`,`system`)values('$title','0','$content','$system')");
		Show_msg("channel_add.php","Ƶ����ӳɹ���");
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
		alert("������Ƶ�����ƣ�");
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
		<th colspan="2">���Ƶ��</th>
	</tr>
     	  <tr>
  <td align="right">Ƶ�����ƣ�</td>
  <td><input name="title" type="text" id="title" size="40"/><input type="hidden" name="lb" value="<?php echo $lb ?>"><?php echo $lb ?>  </td>
  </tr>
  
  <?php if($banben["cn"]=='1'){?>
       	  <tr>
       	    <td align="right">Ƶ�����ݣ�</td>
       	    <td><textarea name="content" id="content" style="display:none;"></textarea><IFRAME src="fckeditor/editor/fckeditor.html?InstanceName=content&amp;Toolbar=Default" frameBorder=0 width=96% scrolling=no height=350>
</IFRAME></td>
    </tr><?php }?>
	      <!--<tr>
	        <td align="right">Ƶ������(en)��</td>
	        <td><textarea name="en_content" id="en_content" style="display:none;"></textarea><IFRAME src="fckeditor/editor/fckeditor.html?InstanceName=en_content&amp;Toolbar=Default" frameBorder=0 width=96% scrolling=no height=350>
</IFRAME></td>
    </tr>-->
    
    <tr>
       	    <td align="right">Ƶ�����ԣ�</td>
       	    <td><input name="system" type="radio" value="0" checked>
       	      ϵͳƵ��
              <input type="radio" name="system" value="1">
            ��ͨƵ��</td>
    </tr>
  <tr>
    <td colspan="3" align="center" height='30'>
  <input name="channeladd" type="submit" id="channeladd" value="ȷ�����" onClick="return chkf();"/> 
   <input type="reset" name="Submit" value="����"></td>  
  </tr>
</table>
</form>
</BODY></HTML>
