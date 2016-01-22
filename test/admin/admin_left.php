<? include_once("inc/config.php");
	Isuser();
	Chaoshi();
	?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD><TITLE>PHP100_left</TITLE><link rel="stylesheet" type="text/css" href="images/css.css">
<META http-equiv=Content-Type content="text/html; charset=gb2312"><LINK
href="images/private.css" type=text/css rel=stylesheet>
<SCRIPT language=javascript>
<!--
function menu_tree(meval)
{
  var left_n=eval(meval);
  if (left_n.style.display=="none")
  { eval(meval+".style.display='';"); }
  else
  { eval(meval+".style.display='none';"); }
}
-->
</SCRIPT>

<META content="MSHTML 6.00.6000.16890" name=GENERATOR></HEAD>
<BODY>
<CENTER>

<TABLE class=Menu cellSpacing=0>
  <TBODY>
  <TR>
    <TH onClick="javascript:menu_tree('left_1');" align=middle>≡ 系统设置 ≡</TH>
  </TR>
  <TR id=left_1 style="display:none;">
    <TD>
      <TABLE width="100%">
        <TBODY>
		
        <TR>
			<TD><IMG src="images/menu.gif" align=absMiddle border=0>&nbsp;
		  <A href="admin_main.php" target=main>网站信息</A></TD>
		</TR>
      

        <TR>
          <TD><IMG src="images/menu.gif" align=absMiddle border=0>&nbsp;
		  <A onClick="return confirm('确定要退出系统吗？')" href="admin_main.php?action=logout"  target=_parent>退出后台</A>		  </TD>
		</TR>
        
	 </TBODY></TABLE>
	 </TD></TR></TBODY></TABLE>


  <TABLE class=Menu cellSpacing=0 style="margin-top:5px">
  <TBODY>
  <TR>
    <TH onClick="javascript:menu_tree('left_2');" align=middle>≡ 新闻系统 ≡</TH></TR>
  <TR id=left_2 style="display:none;">
    <TD>
      <TABLE width="100%">
        <TBODY>
      <TR>
			<TD><IMG src="images/menu.gif" align=absMiddle border=0>&nbsp;
		  <A href="new_add.php?f_id=3" target=main>添加公司公告</A></TD>
		</TR>
		        <TR>
			<TD><IMG src="images/menu.gif" align=absMiddle border=0>&nbsp;
		  <A href="new_manage.php?f_id=3" target=main>管理公司公告</A></TD>
		</TR>
		<TR>
			<TD><IMG src="images/menu.gif" align=absMiddle border=0>&nbsp;
		  <A href="news_add.php?f_id=4" target=main>添加公司新闻</A></TD>
		</TR>
		        <TR>
			<TD><IMG src="images/menu.gif" align=absMiddle border=0>&nbsp;
		  <A href="news_manage.php?f_id=4" target=main>管理公司新闻</A></TD>
		</TR>
		<TR>
			<TD><IMG src="images/menu.gif" align=absMiddle border=0>&nbsp;
		  <A href="new_add.php?f_id=5" target=main>添加行业新闻</A></TD>
		</TR>
		        <TR>
			<TD><IMG src="images/menu.gif" align=absMiddle border=0>&nbsp;
		  <A href="new_manage.php?f_id=5" target=main>管理行业新闻</A></TD>
		</TR>
   
	 </TBODY></TABLE>
  </TD></TR></TBODY></TABLE>
  
    <TABLE class=Menu cellSpacing=0 style="margin-top:5px">
  <TBODY>
  <TR>
    <TH onClick="javascript:menu_tree('left_3');" align=middle>≡ 加入我们 ≡</TH></TR>
  <TR id=left_3 style="display:none;">
    <TD>
      <TABLE width="100%">
        <TBODY>
      <TR>
			<TD><IMG src="images/menu.gif" align=absMiddle border=0>&nbsp;
		  <A href="news_add.php?f_id=6" target=main>添加员工风采</A></TD>
		</TR>
		        <TR>
			<TD><IMG src="images/menu.gif" align=absMiddle border=0>&nbsp;
		  <A href="news_manage.php?f_id=6" target=main>管理员工风采</A></TD>
		</TR>
		<TR>
			<TD><IMG src="images/menu.gif" align=absMiddle border=0>&nbsp;
		  <A href="news_add.php?f_id=7" target=main>添加员工培训</A></TD>
		</TR>
		        <TR>
			<TD><IMG src="images/menu.gif" align=absMiddle border=0>&nbsp;
		  <A href="news_manage.php?f_id=7" target=main>管理工培训</A></TD>
		</TR>
		<TR>
			<TD><IMG src="images/menu.gif" align=absMiddle border=0>&nbsp;
		  <A href="news_add.php?f_id=8" target=main>添加招聘信息</A></TD>
		</TR>
		        <TR>
			<TD><IMG src="images/menu.gif" align=absMiddle border=0>&nbsp;
		  <A href="news_manage.php?f_id=8" target=main>管理招聘信息</A></TD>
		</TR>
   
	 </TBODY></TABLE>
  </TD></TR></TBODY></TABLE>
  
  <TABLE class=Menu cellSpacing=0 style="margin-top:5px">
  <TBODY>
  <TR>
    <TH onClick="javascript:menu_tree('left_4');" align=middle>≡ 页面管理 ≡</TH></TR>
  <TR id=left_4 style="display:none;">
    <TD>
      <TABLE width="100%">
        <TBODY>
		<TR>
			<TD><IMG src="images/menu.gif" align=absMiddle border=0>&nbsp;
		  <A href="news_add.php?f_id=1" target=main>添加关于我们</A></TD>
		</TR>
		<TR>
			<TD><IMG src="images/menu.gif" align=absMiddle border=0>&nbsp;
		  <A href="news_manage.php?f_id=1" target=main>管理关于我们</A></TD>
		</TR>
		<!--<TR>
			<TD><IMG src="images/menu.gif" align=absMiddle border=0>&nbsp;
		  <A href="news_add.php?f_id=2" target=main>添加公司业务</A></TD>
		</TR>
		<TR>
			<TD><IMG src="images/menu.gif" align=absMiddle border=0>&nbsp;
		  <A href="news_manage.php?f_id=2" target=main>管理公司业务</A></TD>
		</TR>
		<TR>
			<TD><IMG src="images/menu.gif" align=absMiddle border=0>&nbsp;
		  <A href="news_add.php?f_id=9" target=main>添加使用条款</A></TD>
		</TR>
		<TR>
			<TD><IMG src="images/menu.gif" align=absMiddle border=0>&nbsp;
		  <A href="news_manage.php?f_id=9" target=main>管理使用条款</A></TD>
		</TR>-->
		<TR>
			<TD><IMG src="images/menu.gif" align=absMiddle border=0>&nbsp;
		  <A href="news_add.php?f_id=10" target=main>添加法律声明</A></TD>
		</TR>
		<TR>
			<TD><IMG src="images/menu.gif" align=absMiddle border=0>&nbsp;
		  <A href="news_manage.php?f_id=10" target=main>管理法律声明</A></TD>
		</TR>
   
	 </TBODY></TABLE>
  </TD></TR></TBODY></TABLE>
  
  <!--<TABLE class=Menu cellSpacing=0 style="margin-top:5px">
  <TBODY>
  <TR>
    <TH onClick="javascript:menu_tree('left_32');" align=middle>≡ 网站语言选择 ≡</TH></TR>
  <TR id=left_32 style="display:none;">
    <TD>
      <TABLE width="100%">
        <TBODY>
		<TR>
			<TD><IMG src="images/menu.gif" align=absMiddle border=0>&nbsp;
		  <A href="admin_main.php?F=cn" target=main>简体中文</A></TD>
		</TR>
		<TR>
			<TD><IMG src="images/menu.gif" align=absMiddle border=0>&nbsp;
		  <A href="admin_main.php?F=fn" target=main>繁体中文</A></TD>
		</TR>
		<TR>
			<TD><IMG src="images/menu.gif" align=absMiddle border=0>&nbsp;
		<A href="admin_main.php?F=en" target=main>英文</A></TD>
		
		</TR>
		<TR>
			<TD><IMG src="images/menu.gif" align=absMiddle border=0>&nbsp;
		<A href="admin_main.php?F=rn" target=main>日文</A></TD>
		</TR>
   
	 </TBODY></TABLE>
  </TD></TR></TBODY></TABLE>-->
  
   <!-- <TABLE class=Menu cellSpacing=0 style="margin-top:5px">
  <TBODY>
  <TR>
    <TH onClick="javascript:menu_tree('left_33');" align=middle>≡ 贤才招聘 ≡</TH></TR>
  <TR id=left_33 style="display:none;">
    <TD>
      <TABLE width="100%">
        <TBODY>
		<TR>
			<TD><IMG src="images/menu.gif" align=absMiddle border=0>&nbsp;
		  <A href="news_add.php?f_id=11" target=main>添加贤才招聘</A></TD>
		</TR>
		<TR>
			<TD><IMG src="images/menu.gif" align=absMiddle border=0>&nbsp;
		  <A href="news_manage.php?f_id=11" target=main>管理贤才招聘</A></TD>
		</TR>
		
   
	 </TBODY></TABLE>
  </TD></TR></TBODY></TABLE>-->
  
<TABLE class=Menu cellSpacing=0 style="margin-top:5px">
  <TBODY>
  <TR>
    <TH onClick="javascript:menu_tree('left_20');" align=middle>≡ 用户管理 ≡</TH></TR>
  <TR id=left_20 style="display:none;">
    <TD>
      <TABLE width="100%">
        <TBODY>
        <TR>
			<TD><IMG src="images/menu.gif" align=absMiddle border=0>&nbsp;
		  <A href="user_manage.php" target=main>用户管理</A></TD>
		</TR>
	 </TBODY></TABLE>
	 </TD></TR></TBODY></TABLE>
<TABLE class=Menu cellSpacing=0 style="margin-top:5px">
  <TBODY>
  <TR>
    <TH align=middle>〓 版本信息 〓</TH></TR>
  <TR>
    <TD align=middle>技术支持：<a href="http://www.lovecaifu.com" target="_blank">上海申彤投资管理有限公司</a></TD></TR>
  <TR>
    <TD align=middle>BANGRUI 1.0</TD></TR>
  <TR>
    <TD align=middle>服务电话：15901717682</TD>
  </TR></TBODY></TABLE></CENTER></BODY></HTML>
