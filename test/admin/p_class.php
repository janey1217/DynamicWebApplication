<?php
	include_once("inc/config.php");
	Isuser();
	Chaoshi();
	$querybb=$db->query("select * from `banben` where id=1");
	$banben=$db->fetch_array($querybb);
	$classname=$db->replace($_REQUEST["classname"]);
	$en_classname=$db->replace($_REQUEST["en_classname"]);
	$f_id=$_REQUEST["f_id"];
	$sorts=$_REQUEST["sorts"];
	if(isset($_REQUEST["n_classadd"]))
	{
		$db->query("insert into `p_class`(`f_id`,`classname`,`en_classname`,`sorts`)values('$f_id','$classname','$en_classname','$sorts')");
		Show_msg("p_class.php","产品类别添加成功！");
	}	
	
	if(isset($_REQUEST["edbigclass"]))//修改大类排序
	{
		$sorts1=$db->replace($_REQUEST["sorts1"]);
		$bigid=$db->replace($_REQUEST["bigid"]);
		Edsorts("p_class",$sorts1,$bigid);			
	}	
	
	if(isset($_REQUEST["edsmclass"]))//修改小类排序
	{
		$sorts2=$db->replace($_REQUEST["sorts2"]);
		$smid=$db->replace($_REQUEST["smid"]);
		Edsorts("p_class",$sorts2,$smid);	;
	}
	if(isset($_REQUEST["edsmclass3"]))//修改小类排序
	{
		$sorts3=$db->replace($_REQUEST["sorts3"]);
		$smid3=$db->replace($_REQUEST["smid3"]);
		Edsorts("p_class",$sorts3,$smid3);	;
	}
	$edid2=$db->replace($_REQUEST["edid2"]);
	if(isset($_REQUEST["n_classedit"]))
	{
		$db->query("update `p_class` set `classname`='$classname',`en_classname`='$en_classname',`f_id`='$f_id',`sorts`='$sorts' where `id`='$edid2'");
		Show_msg("p_class.php","产品类别修改成功！");
	}	
	
	if(!empty($_REQUEST["delid"]))
	{
		$delid=$db->replace($_REQUEST["delid"]);
		$db->query("delete from `p_class` where `id`='$delid'");
		$db->query("delete from `p_class` where `f_id`='$delid'");
		Show_msg("p_class.php","产品类别删除成功！");
	}
	?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD><TITLE>后台管理系统</TITLE><link rel="stylesheet" type="text/css" href="images/css.css">
<META http-equiv=Content-Type content="text/html; charset=gb2312">
<META content=Alan name=Author><LINK href="images/private.css"
type=text/css rel=stylesheet>
<META content="MSHTML 6.00.6000.16890" name=GENERATOR></HEAD>
<script language="javascript">
function chkf()
{
	if(form1.classname.value=="")
	{
		alert("请输入类别名称！");
		form1.classname.focus();
		return false;
	}
	var sj=/^\d+$/;
	var st=form1.sorts.value;
	if(!st.match(sj)||sj=="")
	{
		alert("排序值必须为数字！");
		form1.sorts.focus();
		return false;
	}	
}

function chkf2()
{
	if(form4.classname.value=="")
	{
		alert("请输入类别名称！");
		form4.classname.focus();
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
<BODY>
<BR>
<table border=0 cellspacing=1 align=center class=form>

	<tr>
		<th colspan="4">类别管理</th>
	</tr>
     	  <tr>
     	    <td width="69%" align="center"><strong>分类名称</strong></td>
     	    <td width="14%" align="center"><strong>排 序</strong></td>
   	        <td width="8%" align="center"><strong>操作一</strong></td>
   	        <td width="9%" align="center"><strong>操作二</strong></td>
   	    </tr>
		<?php $qu1=$db->query("select * from `p_class` where `f_id`=0 order by sorts desc,id desc");					
				while($r1=$db->fetch_array($qu1)){?>
				
     	  <tr>
  <td align="left"><img src="images/+.gif" width="17" height="9"><?php echo $r1["classname"]?>[<?php echo $r1["id"]?>]</td>
  <td align="center"><form name="form2<?php echo $r1["id"]?>" method="post" action="p_class.php">
    <input name="sorts1" type="text" id="sorts1"  ONKEYPRESS="event.returnValue=IsDigit();" value="<?php echo $r1["sorts"]?>" size="3">
    <input name="edbigclass" type="submit" id="edbigclass" value="修改" >
    <input name="bigid" type="hidden" id="bigid" value="<?php echo $r1["id"]?>">
  </form>
  </td>
  <td align="center"><a href="?edid=<?php echo $r1["id"]?>">修 改</a></td>
  <td align="center"><a onClick="return confirm('确定要删除此类别吗？')" href="?delid=<?php echo $r1["id"]?>">删 除</a></td>
  </tr><?php $qu2=$db->query("select * from `p_class` where `f_id`=$r1[id] order by sorts desc,id desc");
		   while($r2=$db->fetch_array($qu2))
		   {?>
       	  <tr>
       	    <td align="left" style="padding-left:15px;"><img src="images/-.gif" width="20" height="13"><?php echo $r2["classname"]?> [<?php echo $r2["id"]?>]</td>
       	    <td align="center"><form name="form3<?php echo $r2["id"]?>" method="post" action="p_class.php">
       	      <input name="sorts2" type="text" id="sorts2"  ONKEYPRESS="event.returnValue=IsDigit();" value="<?php echo $r2["sorts"]?>" size="3">
                        <input name="edsmclass" type="submit" id="edsmclass" value="修改">
       	                <input name="smid" type="hidden" id="smid" value="<?php echo $r2["id"]?>">
       	    </form>
       	    </td>
            <td align="center"><a href="?edid=<?php echo $r2["id"]?>">修 改</a></td>
            <td align="center"><a onClick="return confirm('确定要删除此类别吗？')" href="?delid=<?php echo $r2["id"]?>">删 除</a></td>
    </tr>
	<?php $qu3=$db->query("select * from `p_class` where `f_id`=$r2[id] order by sorts desc,id desc");
		   while($r3=$db->fetch_array($qu3))
		   {?>
       	  <tr>
       	    <td align="left" style="padding-left:30px;"><img src="images/-.gif" width="20" height="13"><?php echo $r3["classname"]?> <?php echo $r3["en_classname"]?></td>
       	    <td align="center"><form name="form31<?php echo $r3["id"]?>" method="post" action="p_class.php">
       	      <input name="sorts3" type="text" id="sorts3"  ONKEYPRESS="event.returnValue=IsDigit();" value="<?php echo $r3["sorts"]?>" size="3">
                        <input name="edsmclass3" type="submit" id="edsmclass3" value="修改">
       	                <input name="smid3" type="hidden" id="smid3" value="<?php echo $r3["id"]?>">
       	    </form>
       	    </td>
            <td align="center"><a href="?edid=<?php echo $r3["id"]?>">修 改</a></td>
            <td align="center"><a onClick="return confirm('确定要删除此类别吗？')" href="?delid=<?php echo $r3["id"]?>">删 除</a></td>
    </tr>
	
	<? } } }?>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="20">&nbsp;</td>
  </tr>
</table>

<?php if(!empty($_REQUEST["edid"]))
{
?>
<form name="form4" method="post" action="p_class.php">
<table border=0 cellspacing=1 align=center class=form>

	<tr>
		<th colspan="2">修改类别</th>
	</tr>
     	  <tr>
     	    <td align="right">所属分类：</td>
     	    <td>
			<?php $edid=$db->replace($_REQUEST["edid"]);
			$edqu=$db->query("select * from `p_class` where `id`='$edid'");
			$rcls=$db->fetch_array($edqu);
			?>
			<select name="f_id" id="f_id">	
			<option value="0">==设为一级分类==</option>			
			<?php $edqu2=$db->query("select * from `p_class` where `f_id`=0 order by sorts desc,id desc");
				while($rcls2=$db->fetch_array($edqu2)){?>				
				<option <?php if($rcls["f_id"]==$rcls2["id"]) echo "selected"?> value="<?php echo $rcls2["id"]?>"><?php echo $rcls2["classname"]?></option>
				<?php $edqu3=$db->query("select * from `p_class` where `f_id`=$rcls2[id] order by sorts desc,id desc");
				while($rcls3=$db->fetch_array($edqu3)){?>
				<option <?php if($rcls["f_id"]==$rcls3["id"]) echo "selected"?> value="<?php echo $rcls3["id"]?>">&nbsp;┗<?php echo $rcls3["classname"]?></option>
				<?php } }?>
   	      </select>     	    </td>
   	    </tr>
		<?php if($banben["cn"]=='1'){?>
     	  <tr>
  <td align="right">类别名称：</td>
  <td><input name="classname" type="text" id="classname" size="40" value="<?php echo $rcls["classname"]?>"/>  </td>
  </tr><?php }
  ?>
       	  <!--<tr>
       	    <td align="right">类别名称(en)：</td>
       	    <td><input name="en_classname" type="text" id="en_classname" value="<?php echo $rcls["en_classname"]?>" size="40"></td>
    </tr>-->
    <tr>
       	    <td align="right">分类排序：</td>
       	    <td><input name="sorts" type="text" id="sorts" size="10"  ONKEYPRESS="event.returnValue=IsDigit();" value="<?php echo $rcls["sorts"]?>"></td>
    </tr>	
  <tr>
    <td colspan="3" align="center" height='30'>
  <input type="hidden" name="edid2" value="<?php echo $_REQUEST["edid"]?>">
  <input name="n_classedit" type="submit" id="n_classedit" value="确认修改" onClick="return chkf2();"/> 
   <input type="reset" name="Submit" value="重填"></td>  
  </tr>
</table>
</form><?php }else{?>
<form name="form1" method="post" action="p_class.php">
<table border=0 cellspacing=1 align=center class=form>

	<tr>
		<th colspan="2">添加类别</th>
	</tr>
     	  <tr>
     	    <td width="29%" align="right">所属分类：</td>
     	    <td width="71%"><select name="f_id" id="f_id">
			<option value="0">==设为一级分类==</option>
			<?php $query=$db->query("select * from `p_class` where `f_id`=0 order by sorts desc,id desc");					
				while($row=$db->fetch_array($query)){				
				echo "<option value=\"$row[id]\">$row[classname]</option>";
				$query2=$db->query("select * from `p_class` where `f_id`=$row[id] order by sorts desc,id desc");
					while($row2=$db->fetch_array($query2))
					{
						echo "<option value=\"$row2[id]\">&nbsp;┗$row2[classname]</option>";			
					}
				}
			?>
   	      </select>     	    </td>
   	    </tr>
		<?php if($banben["cn"]=='1'){?>
     	  <tr>
  <td align="right">类别名称：</td>
  <td><input name="classname" type="text" id="classname" size="40"/>  </td>
  </tr><?php }
  ?>
       	  <!--<tr>
       	    <td align="right">类别名称(en)：</td>
       	    <td><input name="en_classname" type="text" id="en_classname" size="40"></td>
    </tr>-->
    <tr>
       	    <td align="right">分类排序：</td>
       	    <td><input name="sorts" type="text" id="sorts" value="0"  ONKEYPRESS="event.returnValue=IsDigit();" size="10"></td>
    </tr>	
  <tr>
    <td colspan="3" align="center" height='30'>
  <input name="n_classadd" type="submit" id="n_classadd" value="确认添加" onClick="return chkf();"/> 
   <input type="reset" name="Submit" value="重填"></td>  
  </tr>
</table>
</form><?php }?>

</BODY></HTML>
