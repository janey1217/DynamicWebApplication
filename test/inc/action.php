<?php
include_once("config.php");
switch($_REQUEST['action']){
	case "jm":
		$jid=$db->replace($_POST['jid']);
		$company=$db->replace($_POST['company']);
		$names=$db->replace($_POST['names']);
		$tel=$db->replace($_POST['tel']);
		$address=$db->replace($_POST['address']);
		$content=$db->replace($_POST['content']);
		$date=date("Y-m-d");
		if($db->query("insert into `jiam`(`jid`,`company`,`names`,`tel`,`address`,`content`,`date`)values('$jid','$company','$names','$tel','$address','$content','$date')") or die(mysql_error())){
			echo "<script language='javascript'>alert('加盟信息提交成功，请等待我们的回复！');window.location='../jmwd.php'</script>";
		}

		break;

	case "lxjm":
		$names=$db->replace($_POST['names']);
		$tel=$db->replace($_POST['tel']);
		$address=$db->replace($_POST['address']);
		$content=$db->replace($_POST['content']);
		$email=$db->replace($_POST['email']);
		$date=date("Y-m-d");
		if($db->query("insert into `lxjm`(`names`,`tel`,`address`,`content`,`date`,`email`)values('$names','$tel','$address','$content','$date','$email')")or die(mysql_error())){
			echo "<script language='javascript'>alert('提交成功，请等待我们的回复！');window.location='../lxjm.php'</script>";
		}
		break;

	case "reg":
		$userhyname=$db->replace($_POST['userhyname']);
		$username=$db->replace($_POST['useremail1']);
		$userpwd=md5($db->replace($_POST['userpwd']));
		$yzm=$db->replace($_POST['yzm']);
		$date=date("Y-m-d");
		if($_SESSION["code"]==$yzm){
			if($db->query("insert into `users`(`username`,`userpwd`,`date`)values('$username','$userpwd','$date')")or die(mysql_error())){
				if(!empty($userhyname)){
					$db->query("update `users` set `jf2`=`jf2`+100 where `username`='$userhyname'");
				}
				echo "<script language='javascript'>alert('恭喜您，注册成功！');window.location='../dl.php'</script>";
			}
		}else{
			echo "<script language='javascript'>alert('验证码错误，请重新输入！');window.location='../dl.php'</script>";
		}
		break;

	case "userlogin":
		$username2=$db->replace($_POST['useremail']);
		$userpwd2=md5($db->replace($_POST['userpwd1']));
		$yzm=$db->replace($_POST['yzm1']);
		if($_SESSION["code"]==$yzm){
			$query=$db->query("select * from `users` where `username`='$username2'");
			$users=is_array($row=$db->fetch_array($query));
			if($users>0){
				if($row["userpwd"]==$userpwd2)
				{
					$_SESSION["users_idd"]=$row["id"];
					$_SESSION["yqjusername"]=$row["username"];
					$_SESSION["users_names"]=md5($row["username"].$row["userpwd"]);
					$_SESSION["users_times"]=mktime();
					echo "<script language='javascript'>location.href='../wdzh.php';</script>";
				}
				else
				{
					Show_msg("../dl.php","密码错误！");
					session_destroy();
				}
			}
			else
			{
				Show_msg("../dl.php","该会员名不存在！");
			}
		}else{
			echo"<script language='javascript'>alert('验证码错误！');history.go(-1)</script>";
		}
		break;
	case "eduser":
		$hid=$db->replace($_POST['hid']);
		$username=$db->replace($_POST['username']);
		$name=$db->replace($_POST['name']);
		$lx=$db->replace($_POST['lx']);
		$picurl=$db->replace($_POST['picurl']);
		$sex=$db->replace($_POST['sex']);
		$sfz=$db->replace($_POST['sfz']);
		$qh=$db->replace($_POST['qh']);
		$tel=$db->replace($_POST['tel']);
		$mobtel=$db->replace($_POST['mobtel']);
		$diqu=$db->replace($_POST['addprovince']).",".$db->replace($_POST['addcity']).",".$db->replace($_POST['addarea']);
		$addprovince=$db->replace($_POST['addprovince']);
		$addcity=$db->replace($_POST['addcity']);
		$addarea=$db->replace($_POST['addarea']);
		$add=$db->replace($_POST['add']);
		$yb=$db->replace($_POST['yb']);
		$content=$db->replace($_POST["content"]);
		$qu=$db->query("select * from `lxdz` where `uid`='$hid'");
		if($db->query("update `users` set `name`='$name',`lx`='$lx',`picurl`='$picurl',`sex`='$sex',`sfz`='$sfz',`qh`='$qh',`tel`='$tel',`mobtel`='$mobtel',`diqu`='$diqu',`addprovince`='$addprovince',`addcity`='$addcity',`addarea`='$addarea',`add`='$add',`yb`='$yb',`content`='$content' where `id`='$hid' limit 1")or die(mysql_error())){

			if(($db->num_rows($qu))=='0'){
				$que=$db->query("insert into `lxdz`(`uid`,`username`,`name`,`addprovince`,`addcity`,`addarea`,`sex`,`add`,`diqu`,`qh`,`tel`,`mobtel`,`sfz`,`yb`,`content`)values('$hid','$username','$name','$addprovince','$addcity','$addarea','$sex','$add','$diqu','$qh','$tel','$mobtel','$sfz','$yb','$content')");
			}
			Show_msg("../jbxx.php","资料修改成功！");
		}
		break;

	case "regpwd":
		$hid=$db->replace($_POST['hid']);
		$agpwd=md5($db->replace($_POST['agpwd']));
		$userpwd=md5($db->replace($_POST['userpwd']));
		$query=$db->query("select * from `users` where `id`='$hid' limit 1");
		$r=$db->fetch_array($query);
		if($agpwd!=$r['userpwd']){
			Show_msg("../xgmm.php","旧密码错误，请重新输入！");
		}else{
			if($db->query("update `users` set `userpwd`='$userpwd' where `id`='$hid' limit 1")){
				Show_msg("../xgmm.php","密码修改成功！");
			}
		}
		break;

	case "addlxdz":
		$hid=$db->replace($_POST['hid']);
		$username=$db->replace($_POST['username']);
		$name=$db->replace($_POST['name']);
		$qh=$db->replace($_POST['qh']);
		$tel=$db->replace($_POST['tel']);
		$mobtel=$db->replace($_POST['mobtel']);
		$diqu=$db->replace($_POST['addprovince']).",".$db->replace($_POST['addcity']).",".$db->replace($_POST['addarea']);
		$addprovince=$db->replace($_POST['addprovince']);
		$addcity=$db->replace($_POST['addcity']);
		$addarea=$db->replace($_POST['addarea']);
		$add=$db->replace($_POST['add']);
		$yb=$db->replace($_POST['yb']);
		$content=$db->replace($_POST["content"]);
		if($que=$db->query("insert into `lxdz`(`uid`,`username`,`name`,`addprovince`,`addcity`,`addarea`,`add`,`diqu`,`qh`,`tel`,`mobtel`,`sfz`,`yb`,`content`)values('$hid','$username','$name','$addprovince','$addcity','$addarea','$add','$diqu','$qh','$tel','$mobtel','$sfz','$yb','$content')")){
			echo Show_msg("../shxx.php","收货信息添加成功！");
		}
		break;

	case "edlxdz":
		$hid=$db->replace($_POST['hid']);
		$name=$db->replace($_POST['name']);
		$qh=$db->replace($_POST['qh']);
		$tel=$db->replace($_POST['tel']);
		$mobtel=$db->replace($_POST['mobtel']);
		$diqu=$db->replace($_POST['addprovince']).",".$db->replace($_POST['addcity']).",".$db->replace($_POST['addarea']);
		$addprovince=$db->replace($_POST['addprovince']);
		$addcity=$db->replace($_POST['addcity']);
		$addarea=$db->replace($_POST['addarea']);
		$add=$db->replace($_POST['add']);
		$yb=$db->replace($_POST['yb']);
		$content=$db->replace($_POST["content"]);
		if($que=$db->query("update `lxdz` set `name`='$name',`addprovince`='$addprovince',`addcity`='$addcity',`addarea`='$addarea',`add`='$add',`yb`='$yb',`diqu`='$diqu',`tel`='$tel',`mobtel`='$mobtel',`qh`='$qh',`content`='$content' where `id`='$hid' limit 1")){
			echo Show_msg("../shxx.php","收货信息修改成功！");
		}
		break;

	case "quit":
		$_SESSION["users_idd"]='';
		$_SESSION["yqjusername"]='';
		$_SESSION["users_names"]='';
		$_SESSION["users_times"]='';
		Show_msg("../dl.php","退出成功！");
		break;

	case "addgwc":
		$pid=$db->replace($_POST['pid']);
		$username=$db->replace($_POST['username']);
		$jf1=$db->replace($_POST['jf1']);
		$jiag=$db->replace($_POST['jiag']);
		$date=date("Y-m-d H:i:s");
		$que=$db->query("select * from `prodg` where `username`='$username' and `pid`='$pid' and `zht`='0'");
		if($db->num_rows($que)>0){
			$db->query("update `prodg` set `shul`=`shul`+1,`jiag2`=`jiag`*`shul` where `username`='$username' and `pid`='$pid' and `zht`='0'");
			echo "<script language='javascript'>location.href='../gwc.php'</script>";
		}else{
			if($db->query("insert into `prodg`(`pid`,`username`,`jiag`,`jiag2`,`date`)values('$pid','$username','$jiag','$jiag','$date')")){
				echo "<script language='javascript'>location.href='../gwc.php'</script>";
			}
		}
		break;

	case "edgwc":
		$totaljg=$db->replace($_POST['totaljg']);
		$shid=$db->replace($_POST['shid']);
		$shsj=$db->replace($_POST['shsj']);
		$content=$db->replace($_POST['content']);
		$ysfs=$db->replace($_POST['ysfs']);
		$zjf=$db->replace($_POST['zjf']);
		$zffs=$db->replace($_POST['zffs']);
		$ddh=mktime();
		$date=date("Y-m-d m:i:s");
		$username=$db->replace($_POST['username']);
		if($shid==''){
			echo Show_msg("../gwc2.php","请选择收货地址，或者新增地址！");
			exit;
		}
		if($ysfs==''){
			echo Show_msg("../gwc2.php","请选择配送方式！");
			exit;
		}

		$qu=$db->query("select * from `jinxiao` where `id`='$ysfs' limit 1");
		$rs=$db->fetch_array($qu);
		$tojg=$totaljg+$rs['yf'];
		if($db->query("insert into `order`(`ddh`,`username`,`totaljg`,`shid`,`shsj`,`ysfs`,`content`,`yf`,`zjf`,`zffs`,`date`)values('$ddh','$username','$tojg','$shid','$shsj','$rs[title]','$content','$rs[yf]','$zjf','$zffs','$date')")){
			$db->query("update `prodg` set `ddh`='$ddh',`zht`='1' where `username`='$username' and `zht`='0'");
			//$db->query("update `users` set `jf1`=`jf1`+$zjf where `username`='$username'");
			if($zffs=='1'){
				echo "<script language='javascript'>window.open('../aliplay/index.php?porname=".$ddh."&body=".$ddh."&pric=".$tojg."&ddid=".$ddh."','_self');</script>";
			}else{
				echo "<script language='javascript'>location.href='../gwc4.php?ddh=".$ddh."'</script>";
			}
		}
		break;

	case "fqtc":
		$pid=$db->replace($_POST['pid']);
		$tgj=$db->replace($_POST['tgj']);
		$jf1=$db->replace($_POST['jf1']);
		$shid=$db->replace($_POST['shid']);
		$shsj=$db->replace($_POST['shsj']);
		$ysfs=$db->replace($_POST['ysfs']);
		$zffs=$db->replace($_POST['zffs']);
		$ddh=mktime();
		$date=date("Y-m-d m:i:s");
		$username=$db->replace($_POST['username']);
		if($shid==''){
			echo Show_msg("../gwc2.php","请选择收货地址，或者新增地址！");
			exit;
		}
		if($ysfs==''){
			echo Show_msg("../gwc2.php","请选择配送方式！");
			exit;
		}

		$qu=$db->query("select * from `jinxiao` where `id`='$ysfs' limit 1");
		$rs=$db->fetch_array($qu);
		$tojg=$tgj+$rs['yf'];
		if($db->query("insert into `hytg`(`ddh`,`username`,`tgj`,`shid`,`shsj`,`ysfs`,`yf`,`jf1`,`zffs`,`pid`,`date`)values('$ddh','$username','$tgj','$shid','$shsj','$rs[title]','$rs[yf]','$jf1','$zffs','$pid','$date')") or die(mysql_error())){
			$db->query("insert into `hytg2`(`ddh`,`username`,`tgj`,`shid`,`shsj`,`ysfs`,`yf`,`jf1`,`zffs`,`pid`,`date`)values('$ddh','$username','$tgj','$shid','$shsj','$rs[title]','$rs[yf]','$jf1','$zffs','$pid','$date')") or die(mysql_error());
			//$db->query("update `users` set `jf1`=`jf1`+$zjf where `username`='$username'");
			if($zffs=='1'){
				echo "<script language='javascript'>window.open('../aliplay/index.php?porname=".$ddh."&body=".$ddh."&pric=".$tgj."&ddid=".$ddh."','_self');</script>";
			}else{
				echo "<script language='javascript'>location.href='../gwc4.php?ddh=".$ddh."'</script>";
			}
		}

		break;

	case "cjtc":
		$pid=$db->replace($_POST['pid']);
		$tgj=$db->replace($_POST['tgj']);
		$jf1=$db->replace($_POST['jf1']);
		$shid=$db->replace($_POST['shid']);
		$shsj=$db->replace($_POST['shsj']);
		$ysfs=$db->replace($_POST['ysfs']);
		$zffs=$db->replace($_POST['zffs']);
		$ddh=mktime();
		$date=date("Y-m-d m:i:s");
		$username=$db->replace($_POST['username']);
		if($shid==''){
			echo Show_msg("../gwc2.php","请选择收货地址，或者新增地址！");
			exit;
		}
		if($ysfs==''){
			echo Show_msg("../gwc2.php","请选择配送方式！");
			exit;
		}

		$qu=$db->query("select * from `jinxiao` where `id`='$ysfs' limit 1");
		$rs=$db->fetch_array($qu);
		$tojg=$tgj+$rs['yf'];
		if($db->query("update `hytg` set `tgsl`=`tgsl`+1 where `pid`='$pid'") or die(mysql_error())){
			$db->query("insert into `hytg2`(`ddh`,`username`,`tgj`,`shid`,`shsj`,`ysfs`,`yf`,`jf1`,`zffs`,`pid`,`date`)values('$ddh','$username','$tgj','$shid','$shsj','$rs[title]','$rs[yf]','$jf1','$zffs','$pid','$date')") or die(mysql_error());
			//$db->query("update `users` set `jf1`=`jf1`+$zjf where `username`='$username'");
			if($zffs=='1'){
				echo "<script language='javascript'>window.open('../aliplay/index.php?porname=".$ddh."&body=".$ddh."&pric=".$tgj."&ddid=".$ddh."','_self');</script>";
			}else{
				echo "<script language='javascript'>location.href='../gwc4.php?ddh=".$ddh."'</script>";
			}
		}

		break;


	case "addpl":
		$pid=$_POST['pid'];
		$username=$_POST['username'];
		$title=$db->replace($_POST['title']);
		$content=$db->replace($_POST['content']);
		$date=date("Y-m-d");
		if($db->query("insert into `propl`(`pid`,`username`,`title`,`content`,`date`)values('$pid','$username','$title','$content','$date')")){
			echo "<script language='javascript'>alert('感谢您的评论！');location.href='../wddp.php'</script>";
		}
		break;

	case "edpl":
		$id=$_POST['id'];
		$title=$db->replace($_POST['title']);
		$content=$db->replace($_POST['content']);
		if($db->query("update `propl` set `title`='$title',`content`='$content' where `id`='$id' limit 1")){
			echo "<script language='javascript'>alert('评论修改成功！');location.href='../wddp.php'</script>";
		}
		break;

	case "addspx":
		$title=$db->replace($_POST['title']);
		$picurl=$db->replace($_POST['picurl']);
		$content=$db->replace($_POST['content']);
		$username=$db->replace($_POST['username']);
		$date=date("Y-m-d");
		if($db->query("insert into `procpx`(`username`,`title`,`content`,`picurl`,`date`)values('$username','$title','$content','$picurl','$date')")){
			echo Show_msg("../spx.php","商品秀发布成功！");
		}
		break;

	case "edspx":
		$title=$db->replace($_POST['title']);
		$picurl=$db->replace($_POST['picurl']);
		$content=$db->replace($_POST['content']);
		$idd=$_POST['id'];
		if($db->query("update `procpx` set `title`='$title',`picurl`='$picurl',`content`='$content' where `id`='$idd'")){
			echo Show_msg("../spx.php","商品秀修改成功！");
		}
		break;
}
?>