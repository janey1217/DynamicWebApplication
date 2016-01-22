 ﻿<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<META http-equiv="X-UA-Compatible" content="IE=8" >
</META>
<link rel="Shortcut Icon" href="javascript:;bitbug_favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>鼎界培训</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="css/style.css" rel="stylesheet" type="text/css">
<script src="js/jquery-1.8.3.min.js"></script>
<script src="js/jquery.nav.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery.nivo.slider.pack.js"></script>
</head>
<?php 
	require_once("function.php");
	?>
﻿<body>
<div id="page"> 
  <div id="top_bg">
	<div id="logo">
		<a href="index.html">
			<img src="img/shouye-3.png" width="449" height="36">
		</a>
	</div>
	<div class="photo">
		<a href="javascript:;http://www.shstzz.com/" target="_blank"><img src="img/stlogo.png" width="52" height="39"/><a>&nbsp;|&nbsp;
		<img src="img/kf.gif" width="20" height="20"/><span style="color:#000;">电话:</span><span>021-XXXX-XXXX</span>
	</div>
	<div class="clear"></div>
  </div>
  <div id="topNav"> 
  
    <script type="text/javascript">
startList = function() {
	if (document.all&&document.getElementById) {
		navRoot = document.getElementById("nav");
		for (i=0; i<navRoot.childNodes.length; i++) {
			node = navRoot.childNodes[i];
			if (node.nodeName=="LI") {
				node.onmouseover=function() {
					this.className+=" over";
				}
				node.onmouseout=function() {
					this.className=this.className.replace(" over", "");
				}
			}
		}
	}
}
window.onload=startList;
</script>
        <div id="popimg">
      <ul id="nav">
	  <?php						
		$sql = "select * from banner where p_id=0  order by id asc limit 0,4";
		$result = mysql_query($sql);
		while( $row=mysql_fetch_array($result) )
		{
	?>
        <li><a href="<?php echo $row['url']?>"><?php echo $row['name']?></a> 
          <ul>
		  <?php
			$sqlR = "select * from banner where p_id=".$row['id'];
			$resultR = mysql_query($sqlR);
			while( $rowR=mysql_fetch_array($resultR) )
			{
		?>
            <li><a href="<?php echo $rowR['url']?>"><?php echo $rowR['name']?></a></li>
		<?php
		}
		?>
		
		</ul>
        </li>
		 <?php
			}
		 ?>
		 <li><a href= "http://www.shstzz.com" target="_blank"><?php banner('29')?></a></li>
      </ul>
    </div>
  </div>
  <!---头部end---> 