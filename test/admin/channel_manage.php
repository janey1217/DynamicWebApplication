<?php include_once("inc/config.php");
	Isuser();
	Chaoshi();	
		$querybb=$db->query("select * from `banben` where id=1");//�������԰汾
	$banben=$db->fetch_array($querybb);
	if(!empty($_REQUEST["cdid"]))
	{
		$cdid=$_REQUEST["cdid"];
		Deldy("channel",$cdid);
		Show_msg("channel_manage.php","Ƶ��ɾ���ɹ���");
	}
	?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD><TITLE>��̨����ϵͳ</TITLE><link rel="stylesheet" type="text/css" href="images/css.css">
<META http-equiv=Content-Type content="text/html; charset=gb2312">
<META content=Alan name=Author><LINK href="images/private.css"
type=text/css rel=stylesheet>
<META content="MSHTML 6.00.6000.16890" name=GENERATOR></HEAD>
<script language="javascript">

function chkf2()
{
	if(form2.title.value=="")
	{
		alert("������Ƶ�����ƣ�");
		form2.title.focus();
		return false;
	}	
}
</script>
<BODY>
<BR>

<?php
    $lb=$_POST['lb'];
	$ceid=$_REQUEST["ceid"];
	$title=$_REQUEST["title"];
	$content=$_REQUEST["content"];
	$system=$_REQUEST["system"];
	$lb=$_REQUEST["lb"];
	if(isset($_REQUEST["channeledit"]))
	{
		$db->query("update `channel` set `title`='$title',`lb`='0',`content`='$content',`system`='$system' where `id`='$ceid' limit 1");
		Show_msg("channel_manage.php","Ƶ���޸ĳɹ���");
	}

if(!empty($_REQUEST["cid"]))
{
	$cid=$_REQUEST["cid"];
	$query2=($db->query("select `title`,`content`,`system` from `channel` where `id`='$cid' limit 1"));
	$row2=$db->fetch_array($query2);	
?>
<form name="form2" method="post" action="channel_manage.php">
<table border=0 cellspacing=1 align=center class=form>

	<tr>
		<th colspan="2">�޸�Ƶ��</th>
	</tr>
     	  <tr>
  <td align="right">Ƶ�����ƣ�</td>
  <td><input name="title" type="text" id="title" size="40" value="<?php echo $row2["title"]?>"/><input type="hidden" name="lb" value="<?php echo $lb ?>"></td>
  </tr> <tr>
       	    <td align="right">Ƶ�����ݣ�</td>
       	    <td><textarea name="content" id="content" style="display:none;"><?php echo $row2["content"]?></textarea><IFRAME src="fckeditor/editor/fckeditor.html?InstanceName=content&amp;Toolbar=Default" frameBorder=0 width=96% scrolling=no height=350>
</IFRAME></td>
       	  </tr>
		  
       	  <!--<tr>
       	    <td align="right">Ƶ������(en)��</td>
       	    <td><textarea name="en_content" id="en_content" style="display:none;"><?php echo $row2["en_content"]?></textarea><IFRAME src="fckeditor/editor/fckeditor.html?InstanceName=en_content&amp;Toolbar=Default" frameBorder=0 width=96% scrolling=no height=350>
</IFRAME></td>
    </tr>-->
       	  
  <td align="right">Ƶ�����ԣ�</td>
       	    <td><input name="system" type="radio" value="0" <?php if($row2["system"]=='0') echo "checked"?>>
       	      ϵͳƵ��
              <input type="radio" name="system" value="1" <?php if($row2["system"]=='1') echo "checked"?>>
            ��ͨƵ��</td>
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
		<th colspan="4">Ƶ������</th>
	</tr>
     	  <tr>
     	    <td align="center"><strong>Ƶ������</strong></td>
     	    <td width="31%" align="center"><strong>Ƶ�����õ�ַ</strong></td>
   	        <td width="13%" align="center"><strong>����һ</strong></td>
   	        <td width="11%" align="center"><strong>������</strong></td>
        </tr>
		<?php
		$result=$db->query("select `id` from `channel`");
		$num=$db->num_rows($result);
		pageft($num, 30);
		if ($firstcount < 0) $firstcount = 0;
		$query=$db->query("select * from `channel` order by id asc limit $firstcount, $displaypg");
		while($row=$db->fetch_array($query))
		{
		?>
     	  <tr>
  <td width="45%" align="center"><?php echo $row["title"]?></td>
  <td align="center">ID=<?php echo $row["id"]?></td>
  <td align="center"><a href="?cid=<?php echo $row["id"]?>">�� ��</a><?php if($row["system"]=='0') {?><font color="#ff0000"> ϵ ͳ</font><? }else{?> �� ͨ<?php }?></td>
  <td align="center"><?php if($row["system"]=='0') {?><s>ɾ ��</s><?php }else{?> <a onClick="return confirm('ȷ��Ҫɾ����Ƶ����')" href="?cdid=<?php echo $row["id"]?>">ɾ ��</a><?php }?></td>
  </tr>   
  <?php }
  if ($num=='0')
  {
  ?>
  <tr>
  <td colspan="4" align="center">�Բ���������Ϣ��</td>
  </tr>   
  <?php }?>
  <tr>
		<th colspan="4"><?php echo $pagenav;?></th>
	</tr>
</table>
<?php }?>
</BODY></HTML>
