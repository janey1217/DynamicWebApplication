<?php include_once("inc/config.php");
	Isuser();
	Chaoshi();	
		
	if(!empty($_REQUEST["cdid"]))//ɾ��������¼
	{
		$cdid=$_REQUEST["cdid"];
		Deldy("users",$cdid);
		echo ("<script>alert('��Աɾ���ɹ���');window.location='users_manage.php';</script>");
	}
	if(!empty($_REQUEST["cccid"]))//ɾ��������¼
	{
		$cccid=$_REQUEST["cccid"];
		$db->query("update `users` set `sj`='1' where `id`='$cccid' limit 1")or die(mysql_error());
		echo ("<script>alert('���óɹ���');window.location='users_manage.php';</script>");
	}
	if(!empty($_REQUEST["ccccid"]))//ɾ��������¼
	{
		$ccccid=$_REQUEST["ccccid"];
		$db->query("update `users` set `sj`='0' where `id`='$ccccid' limit 1")or die(mysql_error());
		echo ("<script>alert('ȡ���ɹ���');window.location='users_manage.php';</script>");
	}
	if(isset($_REQUEST["delall"]))//����ɾ����¼
	{
		Delall("users","id",$_REQUEST["SoftID"]);
		echo ("<script>alert('��Աɾ���ɹ���');window.location='users_manage.php';</script>");
	}	
	?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD><TITLE>��̨����ϵͳ</TITLE><link rel="stylesheet" type="text/css" href="images/css.css">
<META http-equiv=Content-Type content="text/html; charset=gb2312">
<META content=Alan name=Author><LINK href="images/private.css"
type=text/css rel=stylesheet>
<META content="MSHTML 6.00.6000.16890" name=GENERATOR></HEAD>
<script language="javascript" src="../js/region.js"></script>
<SCRIPT language=javascript src="../pcasunzip.js"></script>
<SCRIPT language=javascript src="date.js"></script>
<script language="javascript" defer>

function chkf2()
{
	if(form2.userpwd.value!=form2.rguserpwd.value)
	{
		alert("������������벻һ�£�");
		form2.userpwd.focus();
		return false;
	}
}


</script>
<script language="javascript" src="images/check.js">
function tz()
{
	alert("aaa");
	window.location='users_manage.php';
	}
</script>


<?php

	$username=$db->replace($_REQUEST["username"]);
	$userpwd=md5($db->replace($_REQUEST["userpwd"]));
	$question=$db->replace($_REQUEST["question"]);
	$answer=$db->replace($_REQUEST["answer"]);
	$name=$db->replace($_REQUEST["name"]);
	$lx=$db->replace($_REQUEST["lx"]);
	$addprovince=$db->replace($_REQUEST["addprovince"]);
	$addcity=$db->replace($_REQUEST["addcity"]);
	$addarea=$db->replace($_REQUEST["addarea"]);
	$diqu=$db->replace($_REQUEST["addprovince"]).",".$db->replace($_REQUEST["addcity"]).",".$db->replace($_REQUEST["addarea"]);
	$sfz=$db->replace($_REQUEST["sfz"]);	
	$sex=$db->replace($_REQUEST["sex"]);
	$qh=$db->replace($_REQUEST["qh"]);
	$tel=$db->replace($_REQUEST["tel"]);
	$mobtel=$db->replace($_REQUEST["mobtel"]);	
	$add=$db->replace($_REQUEST["add"]);
	$yb=$db->replace($_REQUEST["yb"]);
	$lockuser=$db->replace($_REQUEST["lockuser"]);
	$date=date("Y-m-d");
	if(isset($_REQUEST["channeledit"]))
	{
		if($_REQUEST["userpwd"]!='')
		{
			$db->query("update `users` set `dy`='$dy',`userpwd`='$userpwd',`lx`='$lx',`addprovince`='$addprovince',`addcity`='$addcity',`addarea`='$addarea',`name`='$name',`sex`='$sex',`sfz`='$sfz',`qh`='$qh',`tel`='$tel',`add`='$add',`lockuser`='$lockuser',`yb`='$yb',`mobtel`='$mobtel',`diqu`='$diqu' where `id`='$ceid' limit 1")or die(mysql_error());
		}else{
			$db->query("update `users` set `username`='$username',`lx`='$lx',`addprovince`='$addprovince',`addcity`='$addcity',`addarea`='$addarea',`name`='$name',`sex`='$sex',`sfz`='$sfz',`qh`='$qh',`tel`='$tel',`add`='$add',`lockuser`='$lockuser',`yb`='$yb',`mobtel`='$mobtel',`diqu`='$diqu' where `id`='$ceid' limit 1")or die(mysql_error());

		}
		echo ("<script>alert('��Ա�޸ĳɹ���');window.location='users_manage.php';</script>");
	}


	if(isset($_REQUEST['addyh'])){
		$username=$db->replace($_REQUEST['username']);
		$title=$db->replace($_REQUEST['title']);
		$mz=$db->replace($_REQUEST['mz']);
		$zdxf=$db->replace($_REQUEST['zdxf']);
		$yxq=$db->replace($_REQUEST['yxq']);
		$date=date("Y-m-d");		
		if($db->query("insert into `useryhq`(`username`,`title`,`mz`,`zdxf`,`yxq`,`date`)values('$username','$title','$mz','$zdxf','$yxq','$date')")){
			Show_msg("users_manage.php","�Ż�ȯ��ӳɹ���");
		}
	}
	
	if(isset($_REQUEST['edyh'])){
		$edidd=$db->replace($_REQUEST['edidd']);
		$title=$db->replace($_REQUEST['title']);
		$mz=$db->replace($_REQUEST['mz']);
		$zdxf=$db->replace($_REQUEST['zdxf']);
		$yxq=$db->replace($_REQUEST['yxq']);
		if($db->query("update `useryhq` set `title`='$title',`mz`='$mz',`zdxf`='$zdxf',`yxq`='$yxq' where `id`='$edidd' limit 1")){
			echo ("<script>alert('�Ż�ȯ�޸ĳɹ���');window.location='users_manage.php';</script>");
		}
	}
	
	if(!empty($_REQUEST['dlyid'])){
		$db->query("delete from `useryhq` where `id`='$_REQUEST[dlyid]' limit 1");
		echo ("<script>alert('�Ż�ȯɾ���ɹ���');window.location='users_manage.php';</script>");
	}
?>
<BODY>
<BR>
<?php if(!empty($_REQUEST["bjid"])){
$qbj=$db->query("select * from `useryhq` where `id`='$_REQUEST[bjid]' limit 1");
$rbj=$db->fetch_array($qbj);
?>
<form name="form4" method="post" action="users_manage.php">
<table border=0 cellspacing=1 align=center class=form>

	<tr>
		<th colspan="2">�޸��Ż�ȯ</th>
	</tr>
   <!--<tr>
       	    <td align="right">�������⣺</td>
       	    <td><input name="question" type="text" id="question" value="<'?php echo $row2["question"]?>" size="30"></td>
    </tr>
       	  <tr>
       	    <td align="right">����𰸣�</td>
       	    <td><input name="answer" type="text" id="answer" value="<'?php echo $row2["answer"]?>" size="30"></td>
    </tr>-->
       	  <tr>
       	    <td align="right">������Ա��</td>
       	    <td><input name="username" type="text" id="username" value="<?php echo $rbj["username"]?>" readonly size="30"></td>
    </tr>
       	  <tr>
       	    <td align="right">�� �ţ�</td>
       	    <td><input name="title" type="text" id="title" size="30" value="<?php echo $rbj["title"]?>"></td>
    </tr>
       	  <tr>
       	    <td align="right">�� ֵ��</td>
       	    <td><input name="mz" type="text" id="mz" size="10" value="<?php echo $rbj["mz"]?>">
       	      Ԫ</td>
       	  </tr>
       	  <tr>
       	    <td align="right">������ѽ�</td>
       	    <td><input name="zdxf" type="text" id="zdxf" size="10" value="<?php echo $rbj["zdxf"]?>">
       	      Ԫ</td>
    </tr>
       	  <tr>
       	    <td align="right">��Ч�ڣ�</td>
       	    <td><input name="yxq" type="text" id="yxq" onFocus="calendar()" value="<?php echo $rbj["yxq"]?>"></td>
    </tr>
  <tr>
    <td colspan="3" align="center" height='30'>
      <input name="edidd" type="hidden" id="edidd" value="<?php echo $rbj["id"]?>">
      <input name="edyh" type="submit" id="edyh" value="ȷ���޸�" /> 
   <input type="reset" name="Submit" value="����"></td>  
  </tr>
</table>
<br>
</form>
<?php }?>
<?php if(!empty($_REQUEST["did"])){?>
<form name="form3" method="post" action="users_manage.php">
<table border=0 cellspacing=1 align=center class=form>

	<tr>
		<th colspan="2">����Ż�ȯ</th>
	</tr>
   <!--<tr>
       	    <td align="right">�������⣺</td>
       	    <td><input name="question" type="text" id="question" value="<'?php echo $row2["question"]?>" size="30"></td>
    </tr>
       	  <tr>
       	    <td align="right">����𰸣�</td>
       	    <td><input name="answer" type="text" id="answer" value="<'?php echo $row2["answer"]?>" size="30"></td>
    </tr>-->
       	  <tr>
       	    <td align="right">������Ա��</td>
       	    <td><input name="username" type="text" id="username" value="<?php echo $_REQUEST["username"]?>" readonly size="30"></td>
    </tr>
       	  <tr>
       	    <td align="right">�� �ţ�</td>
       	    <td><? echo date('YmdHis') . mt_rand(1, 9999) ?><input name="title" value="<? echo date('YmdHis') . mt_rand(1, 9999) ?>" type="hidden" id="title" size="30"></td>
    </tr>
       	  <tr>
       	    <td align="right">�� ֵ��</td>
       	    <td><input name="mz" type="text" id="mz" size="10">
       	      Ԫ</td>
       	  </tr>
       	  <tr>
       	    <td align="right">������ѽ�</td>
       	    <td><input name="zdxf" type="text" id="zdxf" size="10">
       	      Ԫ</td>
    </tr>
       	  <tr>
       	    <td align="right">��Ч�ڣ�</td>
       	    <td><input name="yxq" type="text" id="yxq" onFocus="calendar()"></td>
    </tr>
  <tr>
    <td colspan="3" align="center" height='30'>
  <input name="addyh" type="submit" id="addyh" value="ȷ�����" /> 
   <input type="reset" name="Submit" value="����"></td>  
  </tr>
</table>
<br>
</form>

<?php }?>
<?php if(!empty($_REQUEST["cid"]))
{
	$cid=$_REQUEST["cid"];
	$query2=($db->query("select * from `users` where `id`='$cid' limit 1"));
	$row2=$db->fetch_array($query2);?>
<form name="form2" method="post" action="users_manage.php">
<table border=0 cellspacing=1 align=center class=form>

	<tr>
		<th colspan="2">��Ա�޸�</th>
	</tr>
     	  <tr>
     	    <td width="25%" align="right">�û�����</td>
  <td width="75%"><input name="username" type="text" id="username" size="30" value="<?php echo $row2["username"]?>" readonly/>
  (�û��������޸�)  </td>
  </tr> 
    <tr>
      <td align="right">�Ƿ����ʼ���</td>
      <td><input name="dy" type="radio" value="1" <?php if($row2["dy"]=='1') echo "checked"?>>
        ��
        <input type="radio" name="dy" value="0" <?php if($row2["dy"]=='0') echo "checked"?>>
        ��</td>
    </tr>
    <tr>
      <td align="right">�Ƿ��ʼ���</td>
      <td><input name="yz" type="radio" value="1" <?php if($row2["yz"]=='1') echo "checked"?>>
        ��
        <input type="radio" name="yz" value="0" <?php if($row2["yz"]=='0') echo "checked"?>>
        ��</td>
    </tr>
 
  <!--<tr>
  <td align="right">�Ż�ȯ��Ϣ��</td>
  <td><?php $qyh=$db->query("select * from `useryhq` where `username`='$row2[username]' order by id desc");
  while($ryh=$db->fetch_array($qyh)){
  	echo "��ţ�".$ryh['title']."&nbsp;&nbsp;��ֵ��".$ryh['mz']."Ԫ&nbsp;&nbsp;������ѣ�".$ryh['zdxf']."Ԫ&nbsp;&nbsp;��Ч�ڣ�".$ryh['yxq']."&nbsp;&nbsp;<a href='?bjid=".$ryh['id']."'>�� ��</a>  <a href='?dlyid=".$ryh['id']."'>ɾ ��</a><br>";
  }
  ?></td>
  </tr>-->
  
  <tr>
    <td colspan="3" align="center" height='30'>
  <input name="ceid" type="hidden" id="ceid" value="<?php echo $_REQUEST["cid"]?>">
  <a href="javascript:history.go(-1);">����</a> </td>  
  </tr>
</table>
</form>
<?php }else{?>
<table border=0 cellspacing=1 align=center class=form>

	<tr>
		<th colspan="6">��Ա����</th>
	</tr>
     	  <tr>
     	    <td colspan="6" align="left"><form name="form3" method="post" action="users_manage.php">
     	      ��Ա����
     	      <input name="txtsea" type="text" id="txtsea" size="30">
   	        <input name="btnsea" type="submit" id="btnsea" value="����">
            </form>     	    </td>
   	    </tr><form name="form1" method="post" action="users_manage.php">
     	  <tr>
     	    <td align="center"><strong>ѡ��</strong></td>
     	    <td align="center"><strong>��Ա����</strong></td>
     	    <td width="6%" align="center"><strong>������</strong></td>
            
     	  </tr>
		<?php
		$search=$db->replace($_REQUEST["txtsea"]);
		if(!empty($search))
		{
			$result=$db->query("select `id` from `users` where `username` like '%".$search."%'");
		}else{
			$result=$db->query("select `id` from `users`");
		}
		$num=$db->num_rows($result);
		pageft($num, 20,"?txtsea=$search");
		if ($firstcount < 0) $firstcount = 0;
		
		if(!empty($search))
		{
			$query=$db->query("select * from `users` where `username` like '%".$search."%' order by id desc limit $firstcount, $displaypg");
		}else{
			$query=$db->query("select * from `users` order by id desc limit $firstcount, $displaypg");
		}
		while($row=$db->fetch_array($query))
		{
		?>
     	  <tr>
  <td width="7%" align="center"><input name="SoftID[]" type="checkbox" id="SoftID[]" value="<?php echo $row["id"]?>"></td>
  <td align="left"><?php echo $row["username"]?></td>
  <td align="center"><a onClick="return confirm('ȷ��Ҫɾ���û�Ա��')" href="?cdid=<?php echo $row["id"]?>">ɾ ��</a></td>
 
     	  </tr>   
  <?php }
  if ($num=='0')
  {
  ?>
  <tr>
  <td colspan="6" align="center">�Բ������޻�Ա��</td>
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
