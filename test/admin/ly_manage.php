<?php include_once("inc/config.php");
	Isuser();
	Chaoshi();
	
	if(!empty($_REQUEST["cdid"]))//删除单条记录
	{
		$cdid=$_REQUEST["cdid"];
		$f_id=$_REQUEST["f_id"];
		Deldy("al",$cdid);
		Show_msg("al_manage.php","删除成功！");
	}
	if(isset($_REQUEST["delall"]))//批量删除记录
	{
		$f_id=$_REQUEST["f_id"];
		Delall("al","id",$_REQUEST["SoftID"]);
		Show_msg("al_manage.php","删除成功!");
	}	
	
	if($_REQUEST["act"]=="eds")//修改排序值
	{
		$sorts=$_REQUEST["sorts"];
		$id=$_REQUEST["id"];
		$f_id=$_REQUEST["f_id"];
		$db->query("update `ai` set `sorts`='$sorts' where `id`='$id' limit 1");
		Show_msg("al_manage.php","修改成功!");
	}
	?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD><TITLE>后台管理系统</TITLE><link rel="stylesheet" type="text/css" href="images/css.css">
<META http-equiv=Content-Type content="text/html; charset=gb2312">
<META content=Alan name=Author><LINK href="images/private.css"
type=text/css rel=stylesheet>
<META content="MSHTML 6.00.6000.16890" name=GENERATOR></HEAD>
<script language="javascript">
function edst(id,f_id)
{
	window.location="al_manage.php?act=eds&f_id="+f_id+"&tb=al&id="+id+"&sorts="+document.getElementById("sorts"+id).value;
}

function resul()
{
if(xmlHttp.readyState==4)
    {
        if(xmlHttp.status==200)
        {
		 	window.location="al_manage.php";
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
	$title=$db->replace($_REQUEST["title"]);
	$content=$db->replace($_REQUEST["content"]);	
	$picurl=$db->replace($_REQUEST["picurl"]);
	$sorts=$db->replace($_REQUEST["sorts"]);
	$guanjian=$db->replace($_REQUEST["guanjian"]);
	$scj=$db->replace($_REQUEST["scj"]);
	$jhl=$db->replace($_REQUEST["jhl"]);
	$miaoshu=$db->replace($_REQUEST["miaoshu"]);
	$f_id=$db->replace($_REQUEST["f_id"]);
	$biaoti=$db->replace($_REQUEST["biaoti"]);
	$date=$db->replace($_REQUEST["date"]);
	if(isset($_REQUEST["channeledit"]))
	{
		$db->query("update `al` set `content`='$content',`title`='$title',`picurl`='$picurl',`sorts`='$sorts',`f_id`='$f_id' where `id`='$ceid' limit 1");
		Show_msg("al_manage.php","修改成功！");
	}

if(!empty($_REQUEST["cid"]))
{
	$cid=$_REQUEST["cid"];
	$db->query("update `ly` set `ck`=1 where `id`='$cid' limit 1");
	$query2=($db->query("select * from `ly` where `id`='$cid' limit 1"));
	$row2=$db->fetch_array($query2);	
?>
<form name="form2" method="post" action="al_manage.php">
<table border=0 cellspacing=1 align=center class=form>

	<tr>
		<th colspan="2">修改</th>
	</tr>
     	  <tr>
  <td width="14%" align="right">标 题：</td>
  <td width="86%"><? echo $row2["title"] ?></td>
  </tr>
  <tr>
       	    <td align="right">联系人：</td>
       	    <td><? echo $row2["lxr"] ?></td>
    </tr>
  <tr>
       	    <td align="right">电话：</td>
       	    <td><? echo $row2["dianhua"] ?></td>
       	  </tr>
       	  <tr>
       	    <td align="right">公司：</td>
       	    <td><? echo $row2["gongsi"] ?></td>
       	  </tr>
          
          
          <tr>
       	    <td align="right">内容：</td>
       	    <td><? echo $row2["about"] ?></td>
    </tr>
 
       	  <tr>
       	    <td align="right">时间：</td>
       	    <td><? echo $row2["addtime"] ?></td>
    </tr>
  <tr>
    <td colspan="3" align="center" height='30'>
  
   
      <a href="ly_manage.php">返回</a></td>  
  </tr>
</table>
</form>
</form>
<?php }else{?>
<? $fid=$_REQUEST["fid"]; ?>
<table border=0 cellspacing=1 align=center class=form>

	<tr>
		<th colspan="4">管理</th>
	</tr>
    <?
    $f_id=$_REQUEST["f_id"];
	?>
    <form name="form1" method="post" action="al_manage.php?f_id=<? echo $f_id ?>">
     	  <tr>
     	    <td align="center"><strong>选中</strong></td>
     	    <td align="center"><strong>标 题</strong></td>
     	    <td width="12%" align="center"><strong>操作一</strong></td>
   	        <td width="13%" align="center"><strong>操作二</strong></td>
        </tr>
		<?php
		
			$result=$db->query("select `id` from `ly`");
		$num=$db->num_rows($result);
		pageft($num, 20,"?txtsea=$search");
		if ($firstcount < 0) $firstcount = 0;
		$query=$db->query("select * from `ly` order by id desc limit $firstcount, $displaypg");
		
		while($row=$db->fetch_array($query))
		{
		?>
     	  <tr>
  <td width="5%" align="center"><input name="SoftID[]" type="checkbox" id="SoftID[]" value="<?php echo $row["id"]?>"></td>
  <td align="left"><?php echo $row["title"]?><span style="color:#F00">&nbsp;<? if ($row["ck"]==0) { ?>[新留言]<? } ?></span></td>
  <td align="center"><a href="?cid=<?php echo $row["id"]?>">修 改</a></td>
  <td align="center"><a onClick="return confirm('确定要删除此新闻吗？')" href="?cdid=<?php echo $row["id"]?>&f_id=<? echo $row["f_id"] ?>">删 除</a></td>
  </tr>   
  <?php }
  if ($num=='0')
  {
  ?>
  <tr>
  <td colspan="4" align="center">对不起，暂无案例！</td>
  </tr>   
  <?php }?>
  <tr>
  <td colspan="4" align="center">全选
    <input name="chkAll" type="checkbox" id="chkAll" value="checkbox" onClick="CheckAll(this.form)">
    <input name="delall" type="submit" id="delall" value="批量删除" onClick="return subdel('SoftID[]')"></td>
  </tr></form>
  <tr>
		<th colspan="4"><?php echo $pagenav;?></th>
  </tr>
</table>


<?php }?>
</BODY></HTML>
