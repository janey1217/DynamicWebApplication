<?php include_once("inc/config.php");
	Isuser();
	Chaoshi();	
	$querybb=$db->query("select * from `banben` where id=1");//�������԰汾
	$banben=$db->fetch_array($querybb);
	
	if(!empty($_REQUEST["cdid"]))//ɾ��������¼
	{
		$cdid=$_REQUEST["cdid"];
		Deldy("news",$cdid);
		Show_msg("news_manage.php","ɾ���ɹ���");
	}
	
	if(isset($_REQUEST["delall"]))//����ɾ����¼
	{
		Delall("news","id",$_REQUEST["SoftID"]);
		Show_msg("news_manage.php","ɾ���ɹ�!");
	}	
	
	if($_REQUEST["act"]="eds")//�޸�����ֵ
	{
		$sorts=$_REQUEST["sorts"];
		$idd=$_REQUEST["id"];
		$tab=$_REQUEST["tb"];
		Edsorts($tab,$sorts,$idd);
	}
	?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD><TITLE>��̨����ϵͳ</TITLE><link rel="stylesheet" type="text/css" href="images/css.css">
<META http-equiv=Content-Type content="text/html; charset=gb2312">
<META content=Alan name=Author><LINK href="images/private.css"
type=text/css rel=stylesheet>
<META content="MSHTML 6.00.6000.16890" name=GENERATOR></HEAD>
<script language="javascript">
function edst(id)
{
	createXmlHttp();
    xmlHttp.onreadystatechange=resul;
    var url="news_manage.php?act=eds&tb=news&id="+id+"&sorts="+document.getElementById("sorts"+id).value;
    xmlHttp.open("get",url,true);//OPEN������    
    xmlHttp.send(null);//SEND������
}

function resul()
{
if(xmlHttp.readyState==4)
    {
        if(xmlHttp.status==200)
        {
		 	window.location="news_manage.php";
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
<script language="javascript" src="images/check.js"></script>
<BODY>
<BR>

<?php
	include_once('uploadclass.php'); 
	$pic=$uploadfile; 
	$ceid=$_REQUEST["ceid"];
	$title=$db->replace($_REQUEST["title"]);
	$content=$db->replace($_REQUEST["content"]);
	$date=$db->replace($_REQUEST["date"]);
	$sorts=$db->replace($_REQUEST["sorts"]);
	$f_id=$db->replace($_REQUEST["f_id"]);
	if(isset($_REQUEST["channeledit"]))
	{
		
		$db->query("update `news` set `title`='$title',`content`='$content',`sorts`='$sorts',`date`='$date',`picurls`='$pic' where `id`='$ceid' limit 1");
		Show_msg("news_manage.php?f_id=$f_id","�����޸ĳɹ���");
	}

if(!empty($_REQUEST["cid"]))//��ʾҪ�޸ĵ�����
{
	$cid=$_REQUEST["cid"];
	$query2=($db->query("select * from `news` where `id`='$cid' limit 1"));
	$row2=$db->fetch_array($query2);	
?>
<form name="form2" method="post" action="news_manage.php" enctype="multipart/form-data">
<table border=0 cellspacing=1 align=center class=form>

	<tr>
		<th colspan="2">�޸�����</th>
	</tr>
        
     	  <tr>
  <td align="right">���ű��⣺</td>
  <td><input name="title" type="text" id="title" size="40" value="<?php echo $row2["title"]?>"/><input type="hidden" name="f_id" id="f_id" value="<? echo $row2["f_id"] ?>"></td>
  </tr>
  <tr>
  <td align="right">ͼƬ��</td>
  <td>
        <input name="file" type="file"  > 
  </td>
  </tr> 
       	  <tr>
       	    <td align="right">�������ݣ�</td>
       	    <td><textarea name="content" id="content" style="display:none;"><?php echo $row2["content"]?></textarea><IFRAME src="fckeditor/editor/fckeditor.html?InstanceName=content&amp;Toolbar=Default" frameBorder=0 width=96% scrolling=no height=350>
</IFRAME></td>
       	  </tr>
       	  
       	  <tr>
       	    <td align="right">����ʱ�䣺</td>
       	    <td><input name="date" type="text" id="date" value="<?php echo $row2["date"]?>"></td>
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
<?php }else{?>
<table border=0 cellspacing=1 align=center class=form>

	<tr>
		<th colspan="7">��������</th>
	</tr>
     	  <tr>
     	    <td colspan="7" align="left"><form name="form3" method="post" action="news_manage.php">���ű���
     	      <input name="txtsea" type="text" id="txtsea" size="30">
   	        <input name="btnsea" type="submit" id="btnsea" value="����">
            </form>
     	    </td>
   	    </tr><form name="form1" method="post" action="news_manage.php">
     	  <tr>
     	    <td align="center"><strong>ѡ��</strong></td>
     	    <td align="center"><strong>���ű���</strong></td>
   	        <td width="9%" align="center"><strong>����ʱ��</strong></td>
   	        <td width="12%" align="center"><strong>�� ��</strong></td>
   	        <td width="7%" align="center"><strong>����һ</strong></td>
   	        <td width="7%" align="center"><strong>������</strong></td>
        </tr>
		<?php
		$f_id=$_REQUEST["f_id"];
		$ff="";
		if ($f_id!="")
		{
			$ff=" and f_id=".$f_id;	
		}
		
		$search=$db->replace($_REQUEST["txtsea"]);
		if(!empty($search))
		{
			$result=$db->query("select `id` from `news` where `title` like '%".$search."%' and 1=1 $ff");
		}else{
			$result=$db->query("select `id` from `news` where 1=1 $ff");
		}
		$num=$db->num_rows($result);
		pageft($num, 20,"?txtsea=$search");
		if ($firstcount < 0) $firstcount = 0;
		
		if(!empty($search))
		{
			$query=$db->query("select * from `news` where `title` like '%".$search."%' and 1=1 $ff order by sorts desc,id desc limit $firstcount, $displaypg");
		}else{
			$query=$db->query("select * from `news` where 1=1 $ff order by sorts desc,id desc limit $firstcount, $displaypg");
		}
		while($row=$db->fetch_array($query))
		{
		?>
     	  <tr>
  <td width="5%" align="center"><input name="SoftID[]" type="checkbox" id="SoftID[]" value="<?php echo $row["id"]?>"></td>
  <td width="45%" align="left"><?php echo $row["title"]?></td>

  <td align="center"><?php echo $row["date"]?></td>
  <td align="center"><input name="sorts<?php echo $row["id"]?>" type="text" id="sorts<?php echo $row["id"]?>" size="3"  ONKEYPRESS="event.returnValue=IsDigit();" value="<?php echo $row["sorts"]?>">
    <input name="edsort" type="button" id="edsort" onClick="edst(<?php echo $row["id"]?>);" value="�޸�"></td>
  <td align="center"><a href="?cid=<?php echo $row["id"]?>">�� ��</a></td>
  <td align="center"><a onClick="return confirm('ȷ��Ҫɾ����������')" href="?cdid=<?php echo $row["id"]?>&f_id=<? echo $row["f_id"] ?>">ɾ ��</a></td>
  </tr>   
  <?php }
  if ($num=='0')
  {
  ?>
  <tr>
  <td colspan="7" align="center">�Բ����������ţ�</td>
  </tr>   
  <?php }?>
  <tr>
  <td colspan="7" align="center">ȫѡ
    <input name="chkAll" type="checkbox" id="chkAll" value="checkbox" onClick="CheckAll(this.form)">
    <input name="delall" type="submit" id="delall" value="����ɾ��" onClick="return subdel('SoftID[]')"></td>
  </tr></form>
  <tr>
		<th colspan="7"><?php echo $pagenav;?></th>
  </tr>
</table>


<?php }?>
</BODY></HTML>
