<?php include_once("inc/config.php");
	Isuser();
	Chaoshi();
	
	if(!empty($_REQUEST["cdid"]))//删除单条记录
	{
		$cdid=$_REQUEST["cdid"];
		$pid=$_REQUEST["pid"];
		Deldy("tp",$cdid);
		Show_msg("glpic.php?pid=$pid","删除成功！");
	}
	if(isset($_REQUEST["delall"]))//批量删除记录
	{
		$pid=$_REQUEST["pid"];
		Delall("cppic","id",$_REQUEST["SoftID"]);
		Show_msg("glpic.php?pid=$pid","删除成功!");
	}	
	
	if($_REQUEST["act"]=="eds")//修改排序值
	{
		$sorts=$_REQUEST["sorts"];
		$id=$_REQUEST["id"];
		$pid=$_REQUEST["pid"];
		$db->query("update `cppic` set `sorts`='$sorts' where `id`='$id' limit 1");
		Show_msg("glpic.php?pid=$pid","修改成功!");
	}
	?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD><TITLE>后台管理系统</TITLE><link rel="stylesheet" type="text/css" href="images/css.css">
<META http-equiv=Content-Type content="text/html; charset=gb2312">
<META content=Alan name=Author><LINK href="images/private.css"
type=text/css rel=stylesheet>
<META content="MSHTML 6.00.6000.16890" name=GENERATOR></HEAD>
<script language="javascript">
function edst(id,pid)
{
	window.location="glpic.php?act=eds&pid="+pid+"&tb=cppic&id="+id+"&sorts="+document.getElementById("sorts"+id).value;
}

function resul()
{
if(xmlHttp.readyState==4)
    {
        if(xmlHttp.status==200)
        {
		 	window.location="glpic.php";
        }
    }
}

function chkf2()
{
	if(form2.title.value=="")
	{
		alert("请输入新闻标题！");
		form2.title.focus();
		return false;
	}	
	
	var sj=/^\d+$/;
	var st=form4.sorts.value;
	if(!st.match(sj)||sj=="")
	{
		alert("排序值必须为数字！");
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
	$picurl=$db->replace($_REQUEST["picurl"]);
	$sorts=$db->replace($_REQUEST["sorts"]);
	$pid=$db->replace($_REQUEST["pid"]);
	if(isset($_REQUEST["channeledit"]))
	{
		
		$db->query("update `cppic` set `picurl`='$picurl',`sorts`='$sorts' where `id`='$ceid' limit 1");
		Show_msg("glpic.php?pid=$pid","修改成功！");
	}

if(!empty($_REQUEST["cid"]))
{
	$cid=$_REQUEST["cid"];
	$query2=($db->query("select * from `cppic` where `id`='$cid' limit 1"));
	$row2=$db->fetch_array($query2);	
?>
<form name="form2" method="post" action="glpic.php">
<table border=0 cellspacing=1 align=center class=form>

	<tr>
		<th colspan="2">修改</th>
	</tr>
  <tr>
       	    <td width="14%" align="right">图片地址：</td>
       	    <td width="86%"><input name="picurl" type="text" id="picurl" size="40" value="<?php echo $row2["picurl"]?>"></td>
       	  </tr>
       	  <tr>
       	    <td align="right">上传图片：</td>
       	    <td><Iframe src="Upfiles.php?inputurl=picurl" scrolling="no" frameborder="0" height="20" width="100%"></Iframe></td>
       	  </tr>
 
       	  <tr>
       	    <td align="right">排序：</td>
       	    <td><input name="sorts" type="text" id="sorts" ONKEYPRESS="event.returnValue=IsDigit();" value="<?php echo $row2["sorts"]?>" size="10"></td>
    </tr>
  <tr>
    <td colspan="3" align="center" height='30'>
  <input name="ceid" type="hidden" id="ceid" value="<?php echo $_REQUEST["cid"]?>">
  <input name="channeledit" type="submit" id="channeledit" value="确认修改" onClick="return chkf2();"/> 
   <input type="reset" name="Submit" value="重填"></td>  
  </tr>
</table>
</form>
</form>
<?php }else{?>
<? $fid=$_REQUEST["fid"]; ?>
<table border=0 cellspacing=1 align=center class=form>

	<tr>
		<th colspan="5">管理</th>
	</tr>
    <?
    $f_id=$_REQUEST["f_id"];
	?>
    <form name="form1" method="post" action="glpic.php?f_id=<? echo $f_id ?>">
     	  <tr>
     	    <td align="center"><strong>选中</strong></td>
     	    <td align="center"><strong>图片</strong></td>
     	    <td width="14%" align="center"><strong>排 序</strong></td>
   	        <td width="12%" align="center"><strong>操作一</strong></td>
   	        <td width="13%" align="center"><strong>操作二</strong></td>
        </tr>
		<?php
			$pid=$_REQUEST["pid"];
			$result=$db->query("select `id` from `cppic` where pid=$pid");
		$num=$db->num_rows($result);
		pageft($num, 20,"?txtsea=$search");
		if ($firstcount < 0) $firstcount = 0;
		$query=$db->query("select * from `cppic` where pid=$pid order by sorts desc,id desc limit $firstcount, $displaypg");
		
		while($row=$db->fetch_array($query))
		{
		?>
     	  <tr>
  <td width="5%" align="center"><input name="SoftID[]" type="checkbox" id="SoftID[]" value="<?php echo $row["id"]?>"></td>
  <td width="56%" align="left"><IMG height=77
	src="<? echo $row["picurl"] ?>"  width=143></span></td>
  <td align="center"><input name="sorts<?php echo $row["id"]?>" type="text" id="sorts<?php echo $row["id"]?>" size="3"  ONKEYPRESS="event.returnValue=IsDigit();" value="<?php echo $row["sorts"]?>">
    <input name="edsort" type="button" id="edsort" onClick="edst(<?php echo $row["id"]?>,<? echo $row["pid"] ?>);" value="修改"></td>
  <td align="center"><a href="?cid=<?php echo $row["id"]?>">修 改</a></td>
  <td align="center"><a onClick="return confirm('确定要删除此新闻吗？')" href="?cdid=<?php echo $row["id"]?>&pid=<? echo $row["pid"] ?>">删 除</a></td>
  </tr>   
  <?php }
  if ($num=='0')
  {
  ?>
  <tr>
  <td colspan="5" align="center">对不起，暂无案例！</td>
  </tr>   
  <?php }?>
  <tr>
  <td colspan="5" align="center">全选
    <input name="chkAll" type="checkbox" id="chkAll" value="checkbox" onClick="CheckAll(this.form)">
    <input name="delall" type="submit" id="delall" value="批量删除" onClick="return subdel('SoftID[]')"></td>
  </tr></form>
  <tr>
		<th colspan="5"><?php echo $pagenav;?></th>
  </tr>
</table>


<?php }?>
</BODY></HTML>
