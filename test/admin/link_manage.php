<?php include_once("inc/config.php");
	Isuser();
	Chaoshi();
	
	if(!empty($_REQUEST["cdid"]))//ɾ��������¼
	{
		$cdid=$_REQUEST["cdid"];
		$f_id=$_REQUEST["f_id"];
		Deldy("tp",$cdid);
		Show_msg("link_manage.php?f_id=$f_id","ɾ���ɹ���");
	}
	if(isset($_REQUEST["delall"]))//����ɾ����¼
	{
		$f_id=$_REQUEST["f_id"];
		Delall("tp","id",$_REQUEST["SoftID"]);
		Show_msg("link_manage.php?f_id=$f_id","ɾ���ɹ�!");
	}	
	
	if($_REQUEST["act"]=="eds")//�޸�����ֵ
	{
		$sorts=$_REQUEST["sorts"];
		$id=$_REQUEST["id"];
		$f_id=$_REQUEST["f_id"];
		$db->query("update `tp` set `sorts`='$sorts' where `id`='$id' limit 1");
		Show_msg("link_manage.php?f_id=$f_id","�޸ĳɹ�!");
	}
	?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD><TITLE>��̨����ϵͳ</TITLE><link rel="stylesheet" type="text/css" href="images/css.css">
<META http-equiv=Content-Type content="text/html; charset=gb2312">
<META content=Alan name=Author><LINK href="images/private.css"
type=text/css rel=stylesheet>
<META content="MSHTML 6.00.6000.16890" name=GENERATOR></HEAD>
<script language="javascript">
function edst(id,f_id)
{
	window.location="link_manage.php?act=eds&f_id="+f_id+"&tb=al&id="+id+"&sorts="+document.getElementById("sorts"+id).value;
}

function resul()
{
if(xmlHttp.readyState==4)
    {
        if(xmlHttp.status==200)
        {
		 	window.location="link_manage.php";
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
	$picurl=$db->replace($_REQUEST["picurl"]);
	$sorts=$db->replace($_REQUEST["sorts"]);
	$f_id=$db->replace($_REQUEST["f_id"]);
	$links=$db->replace($_REQUEST["links"]);
	if(isset($_REQUEST["channeledit"]))
	{
		
		$db->query("update `tp` set `links`='$links',`title`='$title',`picurl`='$picurl',`sorts`='$sorts' where `id`='$ceid' limit 1");
		Show_msg("link_manage.php?f_id=$f_id","�޸ĳɹ���");
	}

if(!empty($_REQUEST["cid"]))
{
	$cid=$_REQUEST["cid"];
	$query2=($db->query("select * from `tp` where `id`='$cid' limit 1"));
	$row2=$db->fetch_array($query2);	
?>
<form name="form2" method="post" action="link_manage.php">
<table border=0 cellspacing=1 align=center class=form>

	<tr>
		<th colspan="2">�޸�</th>
	</tr>
     	  <tr>
  <td width="14%" align="right">�� �⣺</td>
  <td width="86%"><input name="title" type="text" id="title" size="40" value="<?php echo $row2["title"]?>"/><input type="hidden" name="f_id" id="f_id" value="<? echo $row2["f_id"] ?>"></td>
  </tr>
  <tr>
       	    <td align="right">ͼƬ��ַ��</td>
       	    <td><input name="picurl" type="text" id="picurl" size="40" value="<?php echo $row2["picurl"]?>"></td>
       	  </tr>
       	  <tr>
       	    <td align="right">�ϴ�ͼƬ��</td>
       	    <td><Iframe src="Upfiles.php?inputurl=picurl" scrolling="no" frameborder="0" height="20" width="100%"></Iframe></td>
       	  </tr>
 <tr>
       	    <td align="right">���ӵ�ַ��</td>
       	    <td><input name="links" value="<? echo $row2["links"] ?>" type="text" id="links" size="70"></td>
    </tr>
       	  <tr>
       	    <td align="right">����</td>
       	    <td><input name="sorts" type="text" id="sorts" ONKEYPRESS="event.returnValue=IsDigit();" value="<?php echo $row2["sorts"]?>" size="10"></td>
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
<? $fid=$_REQUEST["fid"]; ?>
<table border=0 cellspacing=1 align=center class=form>

	<tr>
		<th colspan="5">����</th>
	</tr>
    <?
    $f_id=$_REQUEST["f_id"];
	?>
    <form name="form1" method="post" action="link_manage.php?f_id=<? echo $f_id ?>">
     	  <tr>
     	    <td align="center"><strong>ѡ��</strong></td>
     	    <td align="center"><strong>�� ��</strong></td>
     	    <td width="14%" align="center"><strong>�� ��</strong></td>
   	        <td width="12%" align="center"><strong>����һ</strong></td>
   	        <td width="13%" align="center"><strong>������</strong></td>
        </tr>
		<?php
		
			$result=$db->query("select `id` from `tp` where f_id=$f_id");
		$num=$db->num_rows($result);
		pageft($num, 20,"?txtsea=$search");
		if ($firstcount < 0) $firstcount = 0;
		$query=$db->query("select * from `tp` where f_id=$f_id order by sorts desc,id desc limit $firstcount, $displaypg");
		
		while($row=$db->fetch_array($query))
		{
		?>
     	  <tr>
  <td width="5%" align="center"><input name="SoftID[]" type="checkbox" id="SoftID[]" value="<?php echo $row["id"]?>"></td>
  <td width="56%" align="left"><?php echo $row["title"]?><span style="color:#F00">[<? echo $row["sorts"] ?>]</span></td>
  <td align="center"><input name="sorts<?php echo $row["id"]?>" type="text" id="sorts<?php echo $row["id"]?>" size="3"  ONKEYPRESS="event.returnValue=IsDigit();" value="<?php echo $row["sorts"]?>">
    <input name="edsort" type="button" id="edsort" onClick="edst(<?php echo $row["id"]?>,<? echo $row["f_id"] ?>);" value="�޸�"></td>
  <td align="center"><a href="?cid=<?php echo $row["id"]?>">�� ��</a></td>
  <td align="center"><a onClick="return confirm('ȷ��Ҫɾ����������')" href="?cdid=<?php echo $row["id"]?>&f_id=<? echo $row["f_id"] ?>">ɾ ��</a></td>
  </tr>   
  <?php }
  if ($num=='0')
  {
  ?>
  <tr>
  <td colspan="5" align="center">�Բ������ް�����</td>
  </tr>   
  <?php }?>
  <tr>
  <td colspan="5" align="center">ȫѡ
    <input name="chkAll" type="checkbox" id="chkAll" value="checkbox" onClick="CheckAll(this.form)">
    <input name="delall" type="submit" id="delall" value="����ɾ��" onClick="return subdel('SoftID[]')"></td>
  </tr></form>
  <tr>
		<th colspan="5"><?php echo $pagenav;?></th>
  </tr>
</table>


<?php }?>
</BODY></HTML>
