<?php include_once("inc/config.php");
	Isuser();
	Chaoshi();
	
	if(!empty($_REQUEST["cdid"]))//ɾ��������¼
	{
		$cdid=$_REQUEST["cdid"];
		Deldy("sj",$cdid);
		Show_msg("sj_manage.php","ɾ���ɹ���");
	}
	
	if(isset($_REQUEST["delall"]))//����ɾ����¼
	{
		Delall("sj","id",$_REQUEST["SoftID"]);
		Show_msg("sj_manage.php","ɾ���ɹ�!");
	}	
	
	if(!empty($_REQUEST["accaa"]))//�޸�����ֵ
	{
		$sorts=$_REQUEST["sorts"];
		$idd=$_REQUEST["id"];
		$db->query("update `sj` set `sorts`='$sorts' where `id`='$idd' limit 1");
		Show_msg("sj_manage.php","�����ɹ�!");
	}
	?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD><TITLE>��̨����ϵͳ</TITLE><link rel="stylesheet" type="text/css" href="images/css.css">
<META http-equiv=Content-Type content="text/html; charset=gb2312">
<META content=Alan name=Author><LINK href="images/private.css"
type=text/css rel=stylesheet>
<META content="MSHTML 6.00.6000.16890" name=GENERATOR></HEAD>
<script language="javascript">
function edst(id,fid)
{
    window.location="sj_manage.php?accaa=accaa&tb=sj&id="+id+"&fid="+fid+"&sorts="+document.getElementById("sorts"+id).value;
	
}

function resul()
{
if(xmlHttp.readyState==4)
    {
        if(xmlHttp.status==200)
        {
		 	window.location="sj_manage.php";
        }
    }
}

function chkf2()
{
	if(form2.title.value=="")
	{
		alert("���������ű��⣡");
		form2.title.focus();
		return false;
	}	
	
	var sj=/^\d+$/;
	var st=form4.sorts.value;
	if(!st.match(sj)||sj=="")
	{
		alert("����ֵ����Ϊ���֣�");
		form4.sorts.focus();
		return false;
	}
}

function IsDigit()
	{
		return ((event.keyCode >= 48) && (event.keyCode <= 57));
	}

</script>
<script language="javascript" src="images/check.js"></script>
<BODY>
<BR>

<?php

	$ceid=$_REQUEST["ceid"];
	$title=$db->replace($_REQUEST["title"]);
	$youshi=$db->replace($_REQUEST["youshi"]);
	$gongzuo=$db->replace($_REQUEST["gongzuo"]);
	$sorts=$db->replace($_REQUEST["sorts"]);
	$date=$db->replace($_REQUEST["date"]);

	if(isset($_REQUEST["channeledit"]))
	{
		$db->query("update `sj` set `title`='$title',`youshi`='$youshi',`youshi`='$youshi',`gongzuo`='$gongzuo',`sorts`='$sorts',`date`='$date' where `id`='$ceid' limit 1");
		Show_msg("sj_manage.php?fid=$fid","�޸ĳɹ���");
	}

if(!empty($_REQUEST["cid"]))
{
	$cid=$_REQUEST["cid"];
	$query2=($db->query("select * from `sj` where `id`='$cid' limit 1"));
	$row2=$db->fetch_array($query2);	
?>
<form name="form2" method="post" action="sj_manage.php">
<table border=0 cellspacing=1 align=center class=form>

	<tr>
		<th colspan="2">�޸�����</th>
	</tr>
<tr>
       	    <td align="right">�б���⣺</td>
       	    <td><input name="youshi" type="text" id="youshi" size="40" value="<?php echo $row2["youshi"]?>"/></td>
    </tr>
     	  <tr>
  <td align="right">��Ʒ���ƣ�</td>
  <td><input name="title" type="text" id="title" size="40" value="<?php echo $row2["title"]?>"/>  </td>
  </tr>
    <tr>
       	    <td align="right">��ϸ���ܣ�</td>
       	    <td><textarea name="gongzuo" id="gongzuo" style="display:none;"><?php echo $row2["gongzuo"]?></textarea><IFRAME src="fckeditor/editor/fckeditor.html?InstanceName=gongzuo&amp;Toolbar=Default" frameBorder=0 width=96% scrolling=no height=350>
</IFRAME></td>
    </tr>
    
    <tr>
       	    <td align="right">�� ��</td>
       	    <td><input name="sorts" type="text"  id="sorts" size="10" value="<? echo $row2["sorts"] ?>" /></td>
    </tr>
    <tr>
       	    <td align="right">����ʱ�䣺</td>
       	    <td><input name="date" type="text" id="date" value="<? echo $row2["date"] ?>"/></td>
    </tr>
  <tr>
    <td colspan="3" align="center" height='30'>
  <input name="ceid" type="hidden" id="ceid" value="<?php echo $_REQUEST["cid"]?>">
  <input name="channeledit" type="submit" id="channeledit" value="ȷ���޸�" onClick="return chkf2();"/> 
   <input type="reset" name="Submit" value="����"></td>  
  </tr>
</table>
</form>
</form>
<?php }else{?>
<table border=0 cellspacing=1 align=center class=form>

	<tr>
		<th colspan="6">��������</th>
	</tr><form name="form1" method="post" action="sj_manage.php">
     	  <tr>
     	    <td align="center"><strong>ѡ��</strong></td>
     	    <td align="center"><strong>��Ʒ����</strong></td>
     	    
     	    <td width="17%" align="center"><strong>�� ��</strong></td>
   	        <td width="15%" align="center"><strong>����һ</strong></td>
   	        <td width="15%" align="center"><strong>������</strong></td>
        </tr>
		<?php
		$fid=$_REQUEST["fid"];
		$result=$db->query("select `id` from `sj`");
		$num=$db->num_rows($result);
		pageft($num, 20,"?txtsea=$search");
		if ($firstcount < 0) $firstcount = 0;
		$query=$db->query("select * from `sj` order by sorts desc,id desc limit $firstcount, $displaypg");
		while($row=$db->fetch_array($query))
		{
		?>
     	  <tr>
  <td width="9%" align="center"><input name="SoftID[]" type="checkbox" id="SoftID[]" value="<?php echo $row["id"]?>"></td>
  <td width="44%" align="left"><?php echo $row["title"]?></td>
  
  <td align="center"><input name="sorts<?php echo $row["id"]?>" type="text" id="sorts<?php echo $row["id"]?>" size="3"  ONKEYPRESS="event.returnValue=IsDigit();" value="<?php echo $row["sorts"]?>">
    <input name="edsort" type="button" id="edsort" onClick="edst(<?php echo $row["id"]?>,<?php echo $row["fid"]?>);" value="�޸�"></td>
  <td align="center"><a href="?cid=<?php echo $row["id"]?>&fid=<? echo $row["fid"] ?>">�� ��</a></td>
  <td align="center"><a onClick="return confirm('ȷ��Ҫɾ����������')" href="?cdid=<?php echo $row["id"]?>">ɾ ��</a></td>
  </tr>   
  <?php }
  if ($num=='0')
  {
  ?>
  <tr>
  <td colspan="6" align="center">�Բ�������Ʒ�ƣ�</td>
  </tr>   
  <?php }?>
  <tr>
  <td colspan="6" align="center">ȫѡ
    <input name="chkAll" type="checkbox" id="chkAll" value="checkbox" onClick="CheckAll(this.form)">
    <input name="delall" type="submit" id="delall" value="����ɾ��" onClick="return subdel('SoftID[]')"></td>
  </tr></form>
  <tr>
		<th colspan="6"><?php echo $pagenav;?></th>
  </tr>
</table>


<?php }?>
</BODY></HTML>
